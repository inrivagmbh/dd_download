<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dennis Donzelmann <info@dennisdonzelmann.de>
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
class Tx_DdDownload_ViewHelpers_FilesizeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
	 * Returns the filesize
	 *
	 * @param string $file
	 * @return integer
	 */
	public function render($file) {
	
		if(!preg_match('/fileadmin/', $file)) {
			$file = 'uploads/tx_dddownload/'.$file;
		}
		
		$filesize = filesize($file); // displays in bytes  
		$file_kb = round(($filesize / 1024), 2); // bytes to KB  
		$file_mb = round(($filesize / 1048576), 2); // bytes to MB  
		$file_gb = round(($filesize / 1073741824), 2); // bytes to GB
		
		
		if($filesize < 1024) {
			return $filesize.' Byte';
		}
		elseif($filesize >= 1024 && $filesize < 1048576) {
			return $file_kb.' KB';
		}
		elseif($filesize >= 1048576 && $filesize < 1073741824) {
			return $file_mb.' MB';
		}
		elseif($filesize >= 1073741824) {
			return $file_gb.' GB';
		}
		else {
			return $filesize.' Byte';
		}
		
	}

}
?>