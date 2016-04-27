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
 * CategoriesController
 */
class CategoriesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
private $parentids=array();
    private $allsubs=array();
    /**
     * categoriesRepository
     * 
     * @var \Df\Tectrolproducts\Domain\Repository\CategoriesRepository
     * @inject
     */
    protected $categoriesRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $request = $this->request->getArguments();        
        $activeCat= isset($request['category']) ? $request['category']: 0;        
        $this->catTree($activeCat);
        $this->view->assign('cataloguePid',$this->settings['cataloguePid']);
    }
    private function catTree($activeid){
        if($activeid > 0){
            $category = $this->categoriesRepository->findByUid($activeid);
            $this->view->assign('category',$category);
            
        }
        
        $this->view->assign('categoryactive',$activeid);                
        $this->view->assign('categories', $this->getCategories($activeid));
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