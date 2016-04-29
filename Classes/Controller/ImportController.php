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
    
    private $imagearray=array(
      'A304493'   => 1
    );
     
 
    
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
        
        foreach($categories as $category){
            $this->categoryLookup[$category->getTitle()]=$category;
        }
    }
    
    private function startImport(){
       
        if (($handle = fopen($this->setting['importFile'], "r")) !== FALSE) {
            $counter=0;
            
            while($data = $this->getCsvWrapper($handle, 1000, ';')){
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
        $oldproduct=$this->productsRepository->findOneByTitle($data[array_search('Artikelbezeichnung lang',$this->dataindex)]);
        if($oldproduct){
            $package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
            $package->setSize($value=array_search('Gebindeinhalt',$this->dataindex) ? $data[$value] : '' );
            $package->setUnit($value=array_search('Gebindeeinheit',$this->dataindex) ? $data[$value] : '' );
            //$package->setImage(1);
            $oldproduct->addPackage($package);
            $this->productsRepository->update($oldproduct);                
        }else{
        
            $product = new \Df\Tectrolproducts\Domain\Model\Products();
            $product->setTitle($data[array_search('Artikelbezeichnung lang',$this->dataindex)]);
            $product->setDescription('');
            $product->setViskovg($data[array_search('Viskosität ISO VG',$this->dataindex)]);
            $product->setViskoj300($data[array_search('Viskosität J 300 (Motor)',$this->dataindex)]);
            $product->setViskoj306($data[array_search('Viskosität J 306 (Getriebe)',$this->dataindex)]);
            $product->setNlgi($data[array_search('NLGI Klasse',$this->dataindex)]);
            $product->setAnwendungsempfehlung($data[array_search('Anwendungsempfehlung_PR',$this->dataindex)]);
            $product->setFreigaben($data[array_search('Freigaben_PR',$this->dataindex)]);
            $product->setShoplink($value=array_search('Tectrol.de',$this->dataindex) ? $data[$value] : '' );
            $product->setSpezifikation($value=array_search('Spezifikation_PR',$this->dataindex) ? $data[$value] : '' );
            //$product->setTypeimage(1);
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->categoryLookup[$categoryName] );
            $categoryName=$data[array_search('U-Ebene',$this->dataindex)]; 
            if($this->categoryLookup[$categoryName]){ 
                $product->setCategory($this->categoryLookup[$categoryName]);
            }
             
            
            $package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
            $package->setSize($value=array_search('Gebindeinhalt',$this->dataindex) ? $data[$value] : '' );
            $package->setUnit($value=array_search('Gebindeeinheit',$this->dataindex) ? $data[$value] : '' );
            //$package->setImage(1);
            $product->addPackage($package);
            
                    
            $this->productsRepository->add($product);
        }
    }
    
    private function getCsvWrapper($handle, $length, $divider,$wrap){
		if($wrap){
			return fgetcsv($handle, $length, $divider,$wrap);
		}else{
			return fgetcsv($handle, $length, $divider);
		}
	}
    

}