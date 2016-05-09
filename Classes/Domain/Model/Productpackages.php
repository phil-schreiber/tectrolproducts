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
 * Productpackages
 */
class Productpackages extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * size
     * 
     * @var string
     */
    protected $size = '';
    
    /**
     * unit
     * 
     * @var string
     */
    protected $unit = '';
    
    /**
     * image
     * 
     * @var string
     */
    protected $image = '';
    
    /**
     * Returns the size
     * 
     * @return string $size
     */
    public function getSize()
    {
        return $this->size;
    }
    
    /**
     * Sets the size
     * 
     * @param string $size
     * @return void
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
    
    /**
     * Returns the unit
     * 
     * @return string $unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Sets the unit
     * 
     * @param string $unit
     * @return void
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }
    
    /**
     * Returns the image
     * 
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     * 
     * @param string $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}