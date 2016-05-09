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
 * CatalogueController
 */

class CatalogueController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    private $parentids=array();
    private $allsubs=array();
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
     * action show
     *       
     * @return void
     */
    public function listAction()
    {   
        $request = $this->request->getArguments();        
        $activeCat= isset($request['category']) ? $request['category']: 0;
        
        $this->catTree($activeCat);
        
        $this->listProducts($activeCat);
        $GLOBALS['TSFE']->fe_user->setKey("ses","cat",$activeCat);
        
    }
    
    public function showAction(){
        $request = $this->request->getArguments();        
        $activeCat= isset($request['category']) ? $request['category']: 0;
        $product=isset($request['product']) ? $request['product']: 0;
        $this->catTree($activeCat);
        $this->showProduct($product);
        
    }
        
    
    private function catTree($activeid){
        if($activeid > 0){
            $category = $this->categoriesRepository->findByUid($activeid);
            $this->view->assign('category',$category);
            
        }
        
        $this->view->assign('categoryactive',$activeid);                
        $this->view->assign('categories', $this->getCategories($activeid));
    }
    
    private function listProducts($activecat){
        $this->view->assign('productss', $this->getProducts($activecat));
        
    }
    
    private function showProduct($product){
        $productObj=$this->productsRepository->findByUid($product);
        $productpackages=$productObj->getPackages();
        $this->view->assign('product', $productObj);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($productpackages);
        $this->view->assign('productpackages', $productpackages);
        $firstpackage;
        foreach($productpackages as $productpackage){
            $firstpackage=$productpackage;    
            break;
        }
      //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($productObj->getTypeimage());
        $this->view->assign('lastcat',$GLOBALS["TSFE"]->fe_user->getKey("ses","cat") ? $GLOBALS["TSFE"]->fe_user->getKey("ses","cat") : $productObj->getCategory());
        $this->view->assign('productimage',$firstpackage);
        
    }
    
    
    private function getProducts($activeCat){
        $products=NULL;
        
        if($activeCat > 0){            
            $products=$this->productsRepository->findByCategories(array_key_exists($activeCat, $this->allSubs) ? $this->allSubs[$activeCat]:array($activeCat));
        }else{            
            $products=$this->productsRepository->findAll();
        }
        
        return $products;
    }
    
    private function getCategories($activeid){
        $categories = $this->categoriesRepository->findAll();
        $this->processTree($activeid,$categories);
        
        return $this->buildCategoryTree($activeid,$categories);
    }
    private function buildCategoryTree($activeid,$categories){                
        $catArray=array();        
        $allParentids=array();
        foreach($categories as $category){
            
            $allParentids[$category->getUid()]=$category->getParentid();
            
            if($category->getParentid()===0){                               
                $catArray[$category->getUid()]=array(
                    
                    'title' => $category->getTitle(),
                    'uid' => $category->getUid(),
                    'active' => array_key_exists($category->getUid(),array_flip($this->parentids)) ? 'class=active' : 'class=inactive'
                        
                );
            }else{
                $catArray[$category->getParentid()]['subcategories'][$category->getUid()]=array(
                    'title' => $category->getTitle(),
                    'uid' => $category->getUid(),
                    'active' => array_key_exists($category->getUid(),array_flip($this->parentids)) ? 'class=active' : 'class=active'             
                );
                
                
            }
        }
        
        return $catArray;
    }
    
    private function processTree($activeid,$categories){
        $allParentids=array();
        
        foreach($categories as $category){
            
                $allParentids[$category->getUid()]=$category->getParentid();
                $this->allSubs[intval($category->getParentid())][]=intval($category->getUid());
        }
        
        $this->getAllParents($activeid,$allParentids);        
    }    
    
    private function getAllParents($parentid,$allParentids){        
        array_push($this->parentids,intval($parentid));
        if(array_key_exists($parentid, $allParentids)){            
            $this->getAllParents($allParentids[$parentid],$allParentids);
        }                
    }
    
    
}