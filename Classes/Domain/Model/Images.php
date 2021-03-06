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
 * Images
 */
class Images extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    
    
    /**
     * imagereference
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $imagereference = null;
    
   
    
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
     * Returns the imagereference
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $imagereference
     */
    public function getImagereference()
    {
        return $this->imagereference;
    }
    
    /**
     * Sets the imagereference
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imagereference
     * @return void
     */
    public function setImagereference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imagereference)
    {
        $this->imagereference = $imagereference;
    }
    

}