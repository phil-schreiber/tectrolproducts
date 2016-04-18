<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'TectrolProducts.' . $_EXTKEY,
	'Tectrolproducts',
	'TECTROL Products'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TECTROL Products');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tectrolproducts_domain_model_products', 'EXT:tectrolproducts/Resources/Private/Language/locallang_csh_tx_tectrolproducts_domain_model_products.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tectrolproducts_domain_model_products');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tectrolproducts_domain_model_productpackages', 'EXT:tectrolproducts/Resources/Private/Language/locallang_csh_tx_tectrolproducts_domain_model_productpackages.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tectrolproducts_domain_model_productpackages');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tectrolproducts_domain_model_categories', 'EXT:tectrolproducts/Resources/Private/Language/locallang_csh_tx_tectrolproducts_domain_model_categories.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tectrolproducts_domain_model_categories');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tectrolproducts_domain_model_targetgroups', 'EXT:tectrolproducts/Resources/Private/Language/locallang_csh_tx_tectrolproducts_domain_model_targetgroups.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tectrolproducts_domain_model_targetgroups');
