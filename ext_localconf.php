<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TectrolProducts.' . $_EXTKEY,
	'Tectrolproducts',
	array(
		'Products' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Products' => '',
		
	)
);
