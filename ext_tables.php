<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Dddownfe',
	'DD Downloads'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'DD Downloads');

t3lib_extMgm::addLLrefForTCAdescr('tx_dddownload_domain_model_file', 'EXT:dd_download/Resources/Private/Language/locallang_csh_tx_dddownload_domain_model_file.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_dddownload_domain_model_file');
$TCA['tx_dddownload_domain_model_file'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_file',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,file,filename,thumb,link,category,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/File.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dddownload_domain_model_file.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_dddownload_domain_model_category', 'EXT:dd_download/Resources/Private/Language/locallang_csh_tx_dddownload_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_dddownload_domain_model_category');
$TCA['tx_dddownload_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_category',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,icon,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dddownload_domain_model_category.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_dddownload_domain_model_tag', 'EXT:dd_download/Resources/Private/Language/locallang_csh_tx_dddownload_domain_model_tag.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_dddownload_domain_model_tag');
$TCA['tx_dddownload_domain_model_tag'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:dd_download/Resources/Private/Language/locallang_db.xml:tx_dddownload_domain_model_tag',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,icon,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Tag.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dddownload_domain_model_tag.gif'
	),
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . 'dddownfe';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_dddownload.xml');


$TCA['pages']['columns']['module']['config']['items'][] = array('DD Download', 'dddownfe', t3lib_extMgm::extRelPath($_EXTKEY).'Resources/Public/Icons/tx_dddownload_folder.png');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-dddownfe', t3lib_extMgm::extRelPath($_EXTKEY).'Resources/Public/Icons/tx_dddownload_folder.png');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_dddownfe_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Utility/WizIcon.php';
}

?>