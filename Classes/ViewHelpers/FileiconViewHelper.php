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
class Tx_DdDownload_ViewHelpers_FileiconViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	
	/**
	 * Returns the fileicon
	 *
	 * @param string $file
	 * @return string
	 */
	public function render($file) {
		
		$fileSuffix = pathinfo($file, PATHINFO_EXTENSION);
		
		switch($fileSuffix) {
			case 'pdf':
				return 'document-pdf-text.png';
				break;
				
			case 'txt':
				return 'document-text.png';
				break;
				
			case 'csv':
				return 'document-excel-csv.png';
				break;
				
			case 'xls':
				return 'document-excel.png';
				break;
				
			case 'xlsx':
				return 'document-excel.png';
				break;
				
			case 'doc':
				return 'document-word-text.png';
				break;
				
			case 'docx':
				return 'document-word-text.png';
				break;
				
			case 'ppt':
				return 'document-powerpoint.png';
				break;
				
			case 'pptx':
				return 'document-powerpoint.png';
				break;
				
			case 'ai':
				return 'document-illustrator.png';
				break;
				
			case 'eps':
				return 'document-illustrator.png';
				break;
				
			case 'svg':
				return 'document-illustrator.png';
				break;
				
			case 'psd':
				return 'document-photoshop.png';
				break;
				
			case 'fla':
				return 'document-flash.png';
				break;
				
			case 'png':
				return 'document-image.png';
				break;
				
			case 'jpg':
				return 'document-image.png';
				break;
				
			case 'jpeg':
				return 'document-image.png';
				break;
				
			case 'gif':
				return 'document-image.png';
				break;
				
			case 'zip':
				return 'document-zipper.png';
				break;
				
			case 'tar':
				return 'document-zipper.png';
				break;
				
			case 'rar':
				return 'document-zipper.png';
				break;
				
			case 'mp3':
				return 'document-music.png';
				break;
				
			case 'wav':
				return 'document-music.png';
				break;
				
			case 'wma':
				return 'document-music.png';
				break;
				
			case 'cda':
				return 'document-music.png';
				break;
				
			case 'mp4':
				return 'document-film.png';
				break;
				
			case 'mov':
				return 'document-film.png';
				break;
				
			case 'mkv':
				return 'document-film.png';
				break;
				
			case 'wmv':
				return 'document-film.png';
				break;
				
			case 'avi':
				return 'document-film.png';
				break;
				
			case 'flv':
				return 'document-flash-movie.png';
				break;
				
			case 'swf':
				return 'document-flash-movie.png';
				break;
				
			case 'html':
				return 'document-code.png';
				break;
				
			case 'css':
				return 'document-code.png';
				break;
				
			case 'js':
				return 'document-code.png';
				break;
				
			case 'tex':
				return 'document-tex.png';
				break;
				
			case 'epub':
				return 'document-epub.png';
				break;
				
			default:
				return 'document-smiley.png';
				break;
		} 
		
	}

}
?>