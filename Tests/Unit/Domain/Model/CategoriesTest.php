<?php

namespace TectrolProducts\Tectrolproducts\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
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
 * Test case for class \TectrolProducts\Tectrolproducts\Domain\Model\Categories.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CategoriesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TectrolProducts\Tectrolproducts\Domain\Model\Categories
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TectrolProducts\Tectrolproducts\Domain\Model\Categories();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleoverrideReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitleoverride()
		);
	}

	/**
	 * @test
	 */
	public function setTitleoverrideForStringSetsTitleoverride()
	{
		$this->subject->setTitleoverride('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'titleoverride',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCatimageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCatimage()
		);
	}

	/**
	 * @test
	 */
	public function setCatimageForFileReferenceSetsCatimage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setCatimage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'catimage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getParentidReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setParentidForIntSetsParentid()
	{	}

	/**
	 * @test
	 */
	public function getParentidoverrideReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setParentidoverrideForIntSetsParentidoverride()
	{	}

	/**
	 * @test
	 */
	public function getOrderoverrideReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setOrderoverrideForIntSetsOrderoverride()
	{	}
}
