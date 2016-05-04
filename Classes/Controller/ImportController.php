<?php
namespace Df\Tectrolproducts\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * ImportController
 */
class ImportController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    // TypoScript settings
    protected $settings = array();
    
    // id of selected page
    protected $id;
    
    // info of selected page
    protected $pageinfo;
    
    private $categoryLookup=array();
    
    private $dataindex = array();
    
    private $oldproduct=array();        
    
    private $oldproductObjStore=array();        
    
    /**
    * Categories repository
    *
    * @var \Df\Tectrolproducts\Domain\Repository\CategoriesRepository
    * @inject
    */
    protected $categoriesRepository;

   /**
    * Products repository
    *
    * @var \Df\Tectrolproducts\Domain\Repository\ProductsRepository
    * @inject
    */
    protected $productsRepository;
    
    /**
    * Images repository
    *
    * @var \Df\Tectrolproducts\Domain\Repository\ImagesRepository
    * @inject
    */
    protected $imagesRepository;
    
    /**
    * Products dummyTypeImage
    *
    * @var \Df\Tectrolproducts\Domain\Model\Images
    * @inject
    */
    private $dummyTypeImage;
    
    /**
    * Products dummyImage
    *
    * @var \Df\Tectrolproducts\Domain\Model\Images
    * @inject
    */
    private $dummyImage;
    
    /**
    * pesistenceManager - not neccessary since 6.2
    *
    * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
    * @inject
    */
    protected $persistenceManager;
    
    
    /**
     * action create
     * 
     * @return void
     */
    public function createAction()
    {        	        
        $this->setting=array(
            'storagePid' => 3,
            'importFile' => '../fileadmin/test.csv'
        );
      
        
        
        
        $this->prepareTables();
        $this->buildCatLookup();
        
        
        
        $dummyTP=$this->imagesRepository->findOneByTitle('dummyType');
        $dummy=$this->imagesRepository->findOneByTitle('dummy');
        
        $this->dummyTypeImage=$dummyTP->getImagereference()->getOriginalResource();
        $this->dummyImage=$dummy->getImagereference()->getOriginalResource();
        
        
        $this->startImport();                 
    }
    
    private function prepareTables(){
        $GLOBALS['TYPO3_DB']->exec_TRUNCATEquery('tx_tectrolproducts_domain_model_products'); 
        $GLOBALS['TYPO3_DB']->exec_TRUNCATEquery('tx_tectrolproducts_domain_model_productpackages'); 
        $GLOBALS['TYPO3_DB']->exec_TRUNCATEquery('tx_tectrolproducts_domain_model_productdownloads'); 
        	        
        $this->productsRepository->removeAll();        
    }
    
    private function buildCatLookup(){
        $categories=$this->categoriesRepository->findAll();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($categories);
        foreach($categories as $category){
            
            $this->categoryLookup[$category->getTitle()]=$category;
        }
    }
    
    private function startImport(){
        
        
        if (($handle = fopen($this->setting['importFile'], "r")) !== FALSE) {
            $counter=0;
            
            while($data = $this->getCsvWrapper($handle, 1000, ';','"')){
                if($counter==0){
                  $this->dataindex=$data;
                }else{                        
                    $this->prepareProduct($data);
                }                                         
                $counter++;
            }
        }
        
    }
    
    private function prepareProduct($data){
        
        
        $oldInd=array_search(md5($data[array_search('Artikelbezeichnung lang',$this->dataindex)]),$this->oldproduct);            
        
        if($oldInd === FALSE){
            $el=array_push($this->oldproduct,md5($data[array_search('Artikelbezeichnung lang',$this->dataindex)]));
            $product = new \Df\Tectrolproducts\Domain\Model\Products();
            $product->setTitle($data[array_search('Artikelbezeichnung lang',$this->dataindex)]);
            $product->setDescription('');
            $product->setViskovg($data[array_search('Viskosität ISO VG',$this->dataindex)]);
            $product->setViskoj300($data[array_search('Viskosität J 300 (Motor)',$this->dataindex)]);
            $product->setViskoj306($data[array_search('Viskosität J 306 (Getriebe)',$this->dataindex)]);
            $product->setNlgi($data[array_search('NLGI Klasse',$this->dataindex)]);
            $product->setAnwendungsempfehlung($data[array_search('Anwendungsempfehlung_PR',$this->dataindex)]);
            $product->setFreigaben($data[array_search('Freigaben_PR',$this->dataindex)]);
            $product->setShoplink($data[array_search('Tectrol.de',$this->dataindex)] );
            $product->setSpezifikation($data[array_search('Spezifikation_PR',$this->dataindex)] );            
            
            if($data[array_search('B - Grundoeltyp Asset Reference ID',$this->dataindex)] != '' && $tpImg=$this->imagesRepository->findOneByTitle($data[array_search('B - Grundoeltyp Asset Reference ID',$this->dataindex)] )){
                $product->setTypeimage($this->addImage($tpImg->getImagereference()));
                
            }else{
                $product->setTypeimage($this->addImage($this->dummyTypeImage));
                
                
            }
            
            
            $categoryName=$data[array_search('U-Ebene',$this->dataindex)]; 
            if($this->categoryLookup[$categoryName]){ 
                $product->setCategory($this->categoryLookup[$categoryName]);
            }
             
            
            $package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
            $package->setSize($data[array_search('Gebindeinhalt',$this->dataindex)]);
            $package->setUnit($data[array_search('Gebindeeinheit',$this->dataindex)]);
            
            if($data[array_search('B - Primary Image Asset Reference ID',$this->dataindex)] != '' && $tpImg=$this->imagesRepository->findOneByTitle($data[array_search('B - Grundoeltyp Asset Reference ID',$this->dataindex)] )){
                $package->setImage($this->addImage($tpImg->getImagereference()));
            }else{
                
                $package->setImage($this->addImage($this->dummyImage));
            }
            
            $product->addPackage($package);                                
            $this->productsRepository->add($product);
            $this->oldproductObjStore[$el-1]=$product;
        }else{
            $package = new \Df\Tectrolproducts\Domain\Model\Productpackages();                        
            $package->setSize($data[array_search('Gebindeinhalt',$this->dataindex)]);
            $package->setUnit($data[array_search('Gebindeeinheit',$this->dataindex)]);
            if($data[array_search('B - Primary Image Asset Reference ID',$this->dataindex)] != '' && $tpImg=$this->imagesRepository->findOneByTitle($data[array_search('B - Grundoeltyp Asset Reference ID',$this->dataindex)] )){
                $package->setImage($this->addImage($tpImg->getImagereference()));
            }else{
                
                $package->setImage($this->addImage($this->dummyImage));
            }
            //$package->setImage(1);
            
            $this->oldproductObjStore[$oldInd]->addPackage($package);
            
            //$this->productsRepository->update($this->oldproductObjStore[$oldInd]);                
        }
    }
    
    private function getCsvWrapper($handle, $length, $divider,$wrap){
		if($wrap){
			return fgetcsv($handle, $length, $divider,$wrap);
		}else{
			return fgetcsv($handle, $length, $divider);
		}
	}
    
     /**
     * Action addImage
     *
     * @param \TYPO3\CMS\Core\Resource\FileReference $originalFile
     * @return string
     */
    public function addImage(\TYPO3\CMS\Core\Resource\FileReference $originalFile) {                   
        return 'fileadmin'.$originalFile->getOriginalFile()->getIdentifier();

    }

    
}