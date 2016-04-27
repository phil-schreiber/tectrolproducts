<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,viskovg,viskoj300,viskoj306,nlgi,anwendungsempfehlung,freigaben,spezifikation,typeimage,packages,downloads,category,targetgroups,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tectrolproducts') . 'Resources/Public/Icons/tx_tectrolproducts_domain_model_products.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, viskovg, viskoj300, viskoj306, nlgi, anwendungsempfehlung, freigaben, spezifikation, typeimage, packages, downloads, category, targetgroups',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description;;;richtext:rte_transform[mode=ts_links], viskovg, viskoj300, viskoj306, nlgi, anwendungsempfehlung;;;richtext:rte_transform[mode=ts_links], freigaben;;;richtext:rte_transform[mode=ts_links], spezifikation;;;richtext:rte_transform[mode=ts_links], typeimage, packages, downloads, category, targetgroups, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_tectrolproducts_domain_model_products',
				'foreign_table_where' => 'AND tx_tectrolproducts_domain_model_products.pid=###CURRENT_PID### AND tx_tectrolproducts_domain_model_products.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'viskovg' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.viskovg',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'viskoj300' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.viskoj300',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'viskoj306' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.viskoj306',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'nlgi' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.nlgi',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'anwendungsempfehlung' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.anwendungsempfehlung',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'freigaben' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.freigaben',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'spezifikation' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.spezifikation',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'typeimage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.typeimage',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'typeimage',
				array(
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
					),
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
					'maxitems' => 1
				)
			),
		),
		'packages' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.packages',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_tectrolproducts_domain_model_productpackages',
				'foreign_field' => 'products',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
                'downloads' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.downloads',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_tectrolproducts_domain_model_productdownloads',
				'foreign_field' => 'products',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.category',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_tectrolproducts_domain_model_categories',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'targetgroups' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tectrolproducts/Resources/Private/Language/locallang_db.xlf:tx_tectrolproducts_domain_model_products.targetgroups',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_tectrolproducts_domain_model_targetgroups',
				'foreign_field' => 'products',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
	),
);