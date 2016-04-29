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
    
    
     protected function initializeAction() {
        $this->id = (int)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
        $this->pageinfo = \TYPO3\CMS\Backend\Utility\BackendUtility::readPageAccess($this->id, $GLOBALS['BE_USER']->getPagePermsClause(1));
 
        $configurationManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Configuration\BackendConfigurationManager');
        
        $this->settings = $configurationManager->getConfiguration(
            $this->request->getControllerExtensionName(),
            $this->request->getPluginName()
        );
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);
        
    }
 
    
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
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->persistence);
        $categories=$this->categoriesRepository->findAll();
        
        //$this->prepareTables();
        //$this->buildCatLookup();
        //$this->startImport();                 
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
            $this->categoryLookup['title']=$category->uid;
        }
    }
    
    private function startImport(){
       
        if (($handle = fopen($this->setting['importFile'], "r")) !== FALSE) {
            $counter=0;
            $dataIndex=array();
            while($data = $this->getCsvWrapper($handle, 1000, ';')){
                if($counter==0){
                  $dataIndex=$data;
                }else{                        
                    $this->prepareProduct($data);
                }                                         
                $counter++;
            }
        }                                                       
    }
    
    private function prepareProduct($data){
        if($product=$this->productsRepository->findOneByTitle($data[3])){
            $package = new Df\Tectrolproducts\Domain\Model\Package();
            $product->addPackage($package);
            $this->productsRepository->update($product);                
        }else{
            $product = new Df\Tectrolproducts\Domain\Model\Product();
            $product->setTitle()
                    ->setDescription()
                    ->setViskovg()
                    ->setViskoj300()
                    ->setViskoj306()
                    ->setNlgi()
                    ->setAnwendungsempfehlung()
                    ->setFreigaben()
                    ->setShoplink()
                    ->setSpezifikation()
                    ->setTypeimage()
                    ->setCategory();
            $package = new Df\Tectrolproducts\Domain\Model\Package();
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