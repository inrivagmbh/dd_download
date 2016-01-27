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
class Tx_DdDownload_Domain_Model_File extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * File
	 *
	 * @var string
	 */
	protected $file;

	/**
	 * Optional Filename
	 *
	 * @var string
	 */
	protected $filename;

	/**
	 * Thumbnail
	 *
	 * @var string
	 */
	protected $thumb;

	/**
	 * Link
	 *
	 * @var string
	 */
	protected $link;

	/**
	 * Category
	 *
	 * @var Tx_DdDownload_Domain_Model_Category
	 * @lazy
	 */
	protected $category;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the file
	 *
	 * @return string $file
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * Sets the file
	 *
	 * @param string $file
	 * @return void
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * Returns the filename
	 *
	 * @return string $filename
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * Sets the filename
	 *
	 * @param string $filename
	 * @return void
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
	}

	/**
	 * Returns the thumb
	 *
	 * @return string $thumb
	 */
	public function getThumb() {
		return $this->thumb;
	}

	/**
	 * Sets the thumb
	 *
	 * @param string $thumb
	 * @return void
	 */
	public function setThumb($thumb) {
		$this->thumb = $thumb;
	}

	/**
	 * Returns the link
	 *
	 * @return string $link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * Sets the link
	 *
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * Returns the category
	 *
	 * @return Tx_DdDownload_Domain_Model_Category $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param Tx_DdDownload_Domain_Model_Category $category
	 * @return void
	 */
	public function setCategory(Tx_DdDownload_Domain_Model_Category $category) {
		$this->category = $category;
	}

}
?>