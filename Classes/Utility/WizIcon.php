<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dennis Puszalowski <info@wildpixel.de>
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
 *
 *
 * @package dd_download
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
 
 class tx_dddownfe_wizicon {

	/**
	 * Processing the wizard items array
	 *
	 * @param	array		$wizardItems: The wizard items
	 * @return	array		array with wizard items
	 */
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_dddownload'] = array(
			'icon' => t3lib_extMgm::extRelPath('dd_download') . 'Resources/Public/Icons/ce_wiz.gif',
			'title' => $LANG->getLLL('tx_dddownload_domain_model_file.extname', $LL),
			'description' => $LANG->getLLL('tx_dddownload_domain_model_file.extdesc', $LL),
			'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=dddownload_dddownfe',
			'tt_content_defValues' => array(
				'CType' => 'list',
			),
		);

		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the \$LOCAL_LANG array found in that file.
	 *
	 * @return	The array with language labels
	 */
	function includeLocalLang() {
		$localizationParser = t3lib_div::makeInstance('t3lib_l10n_parser_Llxml');
		$LOCAL_LANG = $localizationParser->getParsedData(
			t3lib_extMgm::extPath('dd_download') . 'Resources/Private/Language/locallang.xml',
			$GLOBALS['LANG']->lang
		);

		return $LOCAL_LANG;
	}
}
 
 ?>