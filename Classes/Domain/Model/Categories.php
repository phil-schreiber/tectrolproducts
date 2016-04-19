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
 * Categories
 */
class Categories extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    /**
     * titleoverride
     * 
     * @var string
     */
    protected $titleoverride = '';
    
    /**
     * description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * catimage
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $catimage = null;
    
    /**
     * parentid
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $parentid = 0;
    
    /**
     * parentidoverride
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $parentidoverride = 0;
    
    /**
     * orderoverride
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $orderoverride = 0;
    
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
     * Returns the titleoverride
     * 
     * @return string $titleoverride
     */
    public function getTitleoverride()
    {
        return $this->titleoverride;
    }
    
    /**
     * Sets the titleoverride
     * 
     * @param string $titleoverride
     * @return void
     */
    public function setTitleoverride($titleoverride)
    {
        $this->titleoverride = $titleoverride;
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
     * Returns the catimage
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $catimage
     */
    public function getCatimage()
    {
        return $this->catimage;
    }
    
    /**
     * Sets the catimage
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $catimage
     * @return void
     */
    public function setCatimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $catimage)
    {
        $this->catimage = $catimage;
    }
    
    /**
     * Returns the parentid
     * 
     * @return int $parentid
     */
    public function getParentid()
    {
        return $this->parentid;
    }
    
    /**
     * Sets the parentid
     * 
     * @param int $parentid
     * @return void
     */
    public function setParentid($parentid)
    {
        $this->parentid = $parentid;
    }
    
    /**
     * Returns the parentidoverride
     * 
     * @return int $parentidoverride
     */
    public function getParentidoverride()
    {
        return $this->parentidoverride;
    }
    
    /**
     * Sets the parentidoverride
     * 
     * @param int $parentidoverride
     * @return void
     */
    public function setParentidoverride($parentidoverride)
    {
        $this->parentidoverride = $parentidoverride;
    }
    
    /**
     * Returns the orderoverride
     * 
     * @return int $orderoverride
     */
    public function getOrderoverride()
    {
        return $this->orderoverride;
    }
    
    /**
     * Sets the orderoverride
     * 
     * @param int $orderoverride
     * @return void
     */
    public function setOrderoverride($orderoverride)
    {
        $this->orderoverride = $orderoverride;
    }

}