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
 * ProductsController
 */
class ProductsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * productsRepository
     * 
     * @var \Df\Tectrolproducts\Domain\Repository\ProductsRepository
     * @inject
     */
    protected $productsRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        
        $products = $this->productsRepository->findAll();
        
        
        $this->view->assign('productss', $products);
    }
    
    /**
     * action show
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Products $products
     * @return void
     */
    public function showAction(\Df\Tectrolproducts\Domain\Model\Products $products)
    {
        $this->view->assign('products', $products);
    }

}