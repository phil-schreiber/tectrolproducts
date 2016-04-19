<?php
namespace Df\Tectrolproducts\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Df\Tectrolproducts\Controller\CategoriesController.
 *
 */
class CategoriesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Df\Tectrolproducts\Controller\CategoriesController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Df\\Tectrolproducts\\Controller\\CategoriesController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCategoriessFromRepositoryAndAssignsThemToView()
	{

		$allCategoriess = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$categoriesRepository = $this->getMock('Df\\Tectrolproducts\\Domain\\Repository\\CategoriesRepository', array('findAll'), array(), '', FALSE);
		$categoriesRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCategoriess));
		$this->inject($this->subject, 'categoriesRepository', $categoriesRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('categoriess', $allCategoriess);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
