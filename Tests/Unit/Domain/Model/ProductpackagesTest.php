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
 * Test case for class \TectrolProducts\Tectrolproducts\Domain\Model\Productpackages.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProductpackagesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TectrolProducts\Tectrolproducts\Domain\Model\Productpackages
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TectrolProducts\Tectrolproducts\Domain\Model\Productpackages();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSizeReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 */
	public function setSizeForFloatSetsSize()
	{
		$this->subject->setSize(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'size',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getUnitReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUnit()
		);
	}

	/**
	 * @test
	 */
	public function setUnitForStringSetsUnit()
	{
		$this->subject->setUnit('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'unit',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}
}
