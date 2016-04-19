<?php

namespace Df\Tectrolproducts\Tests\Unit\Domain\Model;

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
 * Test case for class \Df\Tectrolproducts\Domain\Model\Products.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProductsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Df\Tectrolproducts\Domain\Model\Products
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Df\Tectrolproducts\Domain\Model\Products();
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
	public function getViskovgReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getViskovg()
		);
	}

	/**
	 * @test
	 */
	public function setViskovgForStringSetsViskovg()
	{
		$this->subject->setViskovg('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'viskovg',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getViskoj300ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getViskoj300()
		);
	}

	/**
	 * @test
	 */
	public function setViskoj300ForStringSetsViskoj300()
	{
		$this->subject->setViskoj300('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'viskoj300',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getViskoj306ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getViskoj306()
		);
	}

	/**
	 * @test
	 */
	public function setViskoj306ForStringSetsViskoj306()
	{
		$this->subject->setViskoj306('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'viskoj306',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNlgiReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNlgi()
		);
	}

	/**
	 * @test
	 */
	public function setNlgiForStringSetsNlgi()
	{
		$this->subject->setNlgi('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'nlgi',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnwendungsempfehlungReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnwendungsempfehlung()
		);
	}

	/**
	 * @test
	 */
	public function setAnwendungsempfehlungForStringSetsAnwendungsempfehlung()
	{
		$this->subject->setAnwendungsempfehlung('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'anwendungsempfehlung',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFreigabenReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFreigaben()
		);
	}

	/**
	 * @test
	 */
	public function setFreigabenForStringSetsFreigaben()
	{
		$this->subject->setFreigaben('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'freigaben',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpezifikationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSpezifikation()
		);
	}

	/**
	 * @test
	 */
	public function setSpezifikationForStringSetsSpezifikation()
	{
		$this->subject->setSpezifikation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'spezifikation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeimageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getTypeimage()
		);
	}

	/**
	 * @test
	 */
	public function setTypeimageForFileReferenceSetsTypeimage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setTypeimage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'typeimage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPackagesReturnsInitialValueForProductpackages()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPackages()
		);
	}

	/**
	 * @test
	 */
	public function setPackagesForObjectStorageContainingProductpackagesSetsPackages()
	{
		$package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
		$objectStorageHoldingExactlyOnePackages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePackages->attach($package);
		$this->subject->setPackages($objectStorageHoldingExactlyOnePackages);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePackages,
			'packages',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPackageToObjectStorageHoldingPackages()
	{
		$package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
		$packagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$packagesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($package));
		$this->inject($this->subject, 'packages', $packagesObjectStorageMock);

		$this->subject->addPackage($package);
	}

	/**
	 * @test
	 */
	public function removePackageFromObjectStorageHoldingPackages()
	{
		$package = new \Df\Tectrolproducts\Domain\Model\Productpackages();
		$packagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$packagesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($package));
		$this->inject($this->subject, 'packages', $packagesObjectStorageMock);

		$this->subject->removePackage($package);

	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategories()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForCategoriesSetsCategory()
	{
		$categoryFixture = new \Df\Tectrolproducts\Domain\Model\Categories();
		$this->subject->setCategory($categoryFixture);

		$this->assertAttributeEquals(
			$categoryFixture,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTargetgroupsReturnsInitialValueForTargetgroups()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getTargetgroups()
		);
	}

	/**
	 * @test
	 */
	public function setTargetgroupsForObjectStorageContainingTargetgroupsSetsTargetgroups()
	{
		$targetgroup = new \Df\Tectrolproducts\Domain\Model\Targetgroups();
		$objectStorageHoldingExactlyOneTargetgroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneTargetgroups->attach($targetgroup);
		$this->subject->setTargetgroups($objectStorageHoldingExactlyOneTargetgroups);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneTargetgroups,
			'targetgroups',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTargetgroupToObjectStorageHoldingTargetgroups()
	{
		$targetgroup = new \Df\Tectrolproducts\Domain\Model\Targetgroups();
		$targetgroupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$targetgroupsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($targetgroup));
		$this->inject($this->subject, 'targetgroups', $targetgroupsObjectStorageMock);

		$this->subject->addTargetgroup($targetgroup);
	}

	/**
	 * @test
	 */
	public function removeTargetgroupFromObjectStorageHoldingTargetgroups()
	{
		$targetgroup = new \Df\Tectrolproducts\Domain\Model\Targetgroups();
		$targetgroupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$targetgroupsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($targetgroup));
		$this->inject($this->subject, 'targetgroups', $targetgroupsObjectStorageMock);

		$this->subject->removeTargetgroup($targetgroup);

	}
}
