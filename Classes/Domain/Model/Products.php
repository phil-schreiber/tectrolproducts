<?php
namespace Df\Tectrolproducts\Domain\Model;


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
 * Products
 */
class Products extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    /**
     * description
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $description = '';
    
    /**
     * viskovg
     * 
     * @var string
     */
    protected $viskovg = '';
    
    /**
     * viskoj300
     * 
     * @var string
     */
    protected $viskoj300 = '';
    
    /**
     * viskoj306
     * 
     * @var string
     */
    protected $viskoj306 = '';
    
    /**
     * nlgi
     * 
     * @var string
     */
    protected $nlgi = '';
    
    /**
     * anwendungsempfehlung
     * 
     * @var string
     */
    protected $anwendungsempfehlung = '';
    
    /**
     * freigaben
     * 
     * @var string
     */
    protected $freigaben = '';
    
    /**
     * spezifikation
     * 
     * @var string
     */
    protected $spezifikation = '';
    
    /**
     * typeimage
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $typeimage = null;
    
    /**
     * packages
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productpackages>
     * @cascade remove
     */
    protected $packages = null;
    
    /**
     * downloads
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productdownloads>
     * @cascade remove
     */
    protected $downloads = null;
    
    /**
     * category
     * 
     * @var \Df\Tectrolproducts\Domain\Model\Categories
     */
    protected $category = null;
    
    /**
     * targetgroups
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Targetgroups>
     * @cascade remove
     */
    protected $targetgroups = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * shoplink
     * 
     * @var string
     */
    protected $shoplink = '';
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->packages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->downloads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->targetgroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the viskovg
     * 
     * @return string $viskovg
     */
    public function getViskovg()
    {
        return $this->viskovg;
    }
    
    /**
     * Sets the viskovg
     * 
     * @param string $viskovg
     * @return void
     */
    public function setViskovg($viskovg)
    {
        $this->viskovg = $viskovg;
    }
    
    /**
     * Returns the viskoj300
     * 
     * @return string $viskoj300
     */
    public function getViskoj300()
    {
        return $this->viskoj300;
    }
    
    /**
     * Sets the viskoj300
     * 
     * @param string $viskoj300
     * @return void
     */
    public function setViskoj300($viskoj300)
    {
        $this->viskoj300 = $viskoj300;
    }
    
    /**
     * Returns the viskoj306
     * 
     * @return string $viskoj306
     */
    public function getViskoj306()
    {
        return $this->viskoj306;
    }
    
    /**
     * Sets the viskoj306
     * 
     * @param string $viskoj306
     * @return void
     */
    public function setViskoj306($viskoj306)
    {
        $this->viskoj306 = $viskoj306;
    }
    
    /**
     * Returns the nlgi
     * 
     * @return string $nlgi
     */
    public function getNlgi()
    {
        return $this->nlgi;
    }
    
    /**
     * Sets the nlgi
     * 
     * @param string $nlgi
     * @return void
     */
    public function setNlgi($nlgi)
    {
        $this->nlgi = $nlgi;
    }
    
    /**
     * Returns the anwendungsempfehlung
     * 
     * @return string $anwendungsempfehlung
     */
    public function getAnwendungsempfehlung()
    {
        return $this->anwendungsempfehlung;
    }
    
    /**
     * Sets the anwendungsempfehlung
     * 
     * @param string $anwendungsempfehlung
     * @return void
     */
    public function setAnwendungsempfehlung($anwendungsempfehlung)
    {
        $this->anwendungsempfehlung = $anwendungsempfehlung;
    }
    
    /**
     * Returns the freigaben
     * 
     * @return string $freigaben
     */
    public function getFreigaben()
    {
        return $this->freigaben;
    }
    
    /**
     * Sets the freigaben
     * 
     * @param string $freigaben
     * @return void
     */
    public function setFreigaben($freigaben)
    {
        $this->freigaben = $freigaben;
    }
    
     /**
     * Returns the shoplink
     * 
     * @return string $shoplink
     */
    public function getShoplink()
    {
        return $this->shoplink;
    }
    
    /**
     * Sets the shoplink
     * 
     * @param string $shoplink
     * @return void
     */
    public function setShoplink($shoplink)
    {
        $this->shoplink = $shoplink;
    }
    
    /**
     * Returns the spezifikation
     * 
     * @return string $spezifikation
     */
    public function getSpezifikation()
    {
        return $this->spezifikation;
    }
    
    /**
     * Sets the spezifikation
     * 
     * @param string $spezifikation
     * @return void
     */
    public function setSpezifikation($spezifikation)
    {
        $this->spezifikation = $spezifikation;
    }
    
    /**
     * Returns the typeimage
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $typeimage
     */
    public function getTypeimage()
    {
        return $this->typeimage;
    }
    
    /**
     * Sets the typeimage
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $typeimage
     * @return void
     */
    public function setTypeimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $typeimage)
    {
        $this->typeimage = $typeimage;
    }
    
    /**
     * Adds a Productpackages
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Productpackages $package
     * @return void
     */
    public function addPackage(\Df\Tectrolproducts\Domain\Model\Productpackages $package)
    {
        $this->packages->attach($package);
    }
    
    /**
     * Removes a Productpackages
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Productpackages $packageToRemove The Productpackages to be removed
     * @return void
     */
    public function removePackage(\Df\Tectrolproducts\Domain\Model\Productpackages $packageToRemove)
    {
        $this->packages->detach($packageToRemove);
    }
    
    /**
     * Returns the packages
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productpackages> $packages
     */
    public function getPackages()
    {
        return $this->packages;
    }
    
    /**
     * Sets the packages
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productpackages> $packages
     * @return void
     */
    public function setPackages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $packages)
    {
        $this->packages = $packages;
    }
    
    /**
     * Adds a Downloads
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Productdownloads $download
     * @return void
     */
    public function addDownload(\Df\Tectrolproducts\Domain\Model\Productdownloads $download)
    {
        $this->downloads->attach($download);
    }
    
    /**
     * Removes a Productdownloads
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Productdownloads $downloadToRemove The Productdownloads to be removed
     * @return void
     */
    public function removeDownload(\Df\Tectrolproducts\Domain\Model\Productdownloads $downloadToRemove)
    {
        $this->downloads->detach($downloadToRemove);
    }
    
    /**
     * Returns the downloads
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productdownloads> $downloads
     */
    public function getDownloads()
    {
        return $this->downloads;
    }
    
    /**
     * Sets the downloads
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Productdownloads> $downloads
     * @return void
     */
    public function setDownloads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $downloads)
    {
        $this->downloads = $downloads;
    }
    
    /**
     * Returns the category
     * 
     * @return \Df\Tectrolproducts\Domain\Model\Categories $category
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Sets the category
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Categories $category
     * @return void
     */
    public function setCategory(\Df\Tectrolproducts\Domain\Model\Categories $category)
    {
        $this->category = $category;
    }
    
    /**
     * Adds a Targetgroups
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Targetgroups $targetgroup
     * @return void
     */
    public function addTargetgroup(\Df\Tectrolproducts\Domain\Model\Targetgroups $targetgroup)
    {
        $this->targetgroups->attach($targetgroup);
    }
    
    /**
     * Removes a Targetgroups
     * 
     * @param \Df\Tectrolproducts\Domain\Model\Targetgroups $targetgroupToRemove The Targetgroups to be removed
     * @return void
     */
    public function removeTargetgroup(\Df\Tectrolproducts\Domain\Model\Targetgroups $targetgroupToRemove)
    {
        $this->targetgroups->detach($targetgroupToRemove);
    }
    
    /**
     * Returns the targetgroups
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Targetgroups> $targetgroups
     */
    public function getTargetgroups()
    {
        return $this->targetgroups;
    }
    
    /**
     * Sets the targetgroups
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Df\Tectrolproducts\Domain\Model\Targetgroups> $targetgroups
     * @return void
     */
    public function setTargetgroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $targetgroups)
    {
        $this->targetgroups = $targetgroups;
    }

}