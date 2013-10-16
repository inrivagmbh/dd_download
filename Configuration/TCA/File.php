<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_dddownload_domain_model_file'] = array(
	'ctrl' => $TCA['tx_dddownload_domain_model_file']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, file, filename, thumb, link, categories',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, file, categories,--div--;LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.add;sys_language_uid;;;;1-1-1, filename, link, description, thumb,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_dddownload_domain_model_file',
				'foreign_table_where' => 'AND tx_dddownload_domain_model_file.pid=###CURRENT_PID### AND tx_dddownload_domain_model_file.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
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
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
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
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.description',
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
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext[]',
		),
		'file' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_dddownload',
				'allowed' => 'gif,png,jpg,jpeg,eps,ai,svg,webm,mp4,mov,ogv,wav,mp3,pdf,html,css,js,flv,swf,txt,zip,tar,rar,doc,docx,xls,xlsx,ppt,pptx,tex,epub,csv,xml',
				'disallowed' => 'php',
				'size' => 5,
			),
		),
		'filename' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.filename',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'thumb' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.thumb',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_dddownload',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
		'link' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'categories' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.categories',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file.categorychoose', 0),
				),
				'foreign_table' => 'tx_dddownload_domain_model_category',
				'MM' => 'tx_dddownload_file_category_mm',
				'minitems' => 0,
				'maxitems' => 999,
				'size' => 5,
			),
		),
	),
);

?>