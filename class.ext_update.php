<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Benjamin Rau <rau@codearts.at>
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
 * @package dd_download
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ext_update {

	/**
	 *
	 * @return    string    HTML to display
	 */
	function main() {

		$content = '';
		$update = t3lib_div::_GP('update');

		if ($update == 'updateRelations') {
			$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_dddownload_domain_model_file', "");
			if (FALSE === array_key_exists('categories', $records[0])) {
				$sql = "ALTER TABLE tx_dddownload_domain_model_file ADD COLUMN categories int(11) unsigned DEFAULT '0'";
				$GLOBALS['TYPO3_DB']->sql_query($sql);
				$content .= "<br>Column categories has been added.";
				$sql = "ALTER TABLE tx_dddownload_domain_model_category ADD COLUMN files int(11) unsigned DEFAULT '0'";
				$GLOBALS['TYPO3_DB']->sql_query($sql);
				$content .= "<br>Column files has been added.";
			}

			$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, category', 'tx_dddownload_domain_model_file', "category != 0");
			foreach ($records AS $record) {
				$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_dddownload_domain_model_file', 'uid=' . $record['uid'], array('category' => 0, 'categories' => 1));
				$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_dddownload_file_category_mm', array('uid_local' => $record['uid'], 'uid_foreign' => $record['category']));
				$i++;
			}
			if (TRUE === isset($i)) $content .= "<br>$i relations have been updated.";
		} else {
			$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_dddownload_domain_model_file', "");
			if (TRUE === array_key_exists('categories', $records[0])) {
				$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('count(uid) AS number_of_records', 'tx_dddownload_domain_model_file', "category != 0");
				if (0 === intval($records[0]['number_of_records'])) {
					return 'No need to run update script.';
				} else {
					$content .= '- <b>' . $records[0]['number_of_records'] . '</b> relations need to be updated.<br/>';
				}
			} else {
				$content .= "<br>- Column categories has to be added.<br>";
			}

			$content .= '<br/>The update process will update all relations from files to categories...<br/>';
			$content .= '<form name="updateForm" action="" method="post">';
			$content .= '<input type="hidden" name="update" value ="updateRelations">';
			$content .= '<p><input type="submit" name="submitButton" value ="Update relations"></p>';
			$content .= '</form>';
		}

		return $content;
	}

	/**
	 * Called on 6.X
	 * @return string
	 */
	function access() {
		$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_dddownload_domain_model_file', "");
		if (TRUE === array_key_exists('categories', $records[0])) {
			$records = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('count(uid) AS number_of_records', 'tx_dddownload_domain_model_file', "category != 0");
			if (0 === intval($records[0]['number_of_records'])) {
				return FALSE;
			}
		}
		return TRUE;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dd_download/class.ext_update.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dd_download/class.ext_update.php']);
}