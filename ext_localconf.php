<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Df.' . $_EXTKEY,
	'Products',
	array(
		'Products' => 'list, show',		
		
	),
	// non-cacheable actions
	array(
		'Products' => '',
		'Categories' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Df.' . $_EXTKEY,
	'Catfilter',
	array(
		'Categories' => 'list',		
		
	),
	// non-cacheable actions
	array(
		'Products' => '',
		'Categories' => '',
		
	)
);