<?php
namespace TYPO3\Tectrolproducts\ViewHelpers;

/**
 *
 * @package TYPO3
 * @subpackage tectrolproducts
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class OffsetViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
     /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param int $key The number of characters of the dummy content
     * @param array $array The number of characters of the dummy content
     * @return bool
     * @author Philipp Schreiber <schreiber@denkfabrik-group.com>
     */
    public function offsetExists($key,$array) {        
        return array_key_exists($key, $array);
    }
}