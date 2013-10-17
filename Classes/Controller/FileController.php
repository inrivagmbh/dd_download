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
 * @author Dennis Puszalowski <info@wildpixel.de>, Benjamin Rau <rau@codearts.at>
 * @package dd_download
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_DdDownload_Controller_FileController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * fileRepository
	 *
	 * @var Tx_DdDownload_Domain_Repository_FileRepository
	 */
	protected $fileRepository;

	/**
	 * injectFileRepository
	 *
	 * @param Tx_DdDownload_Domain_Repository_FileRepository $fileRepository
	 * @return void
	 */
	public function injectFileRepository(Tx_DdDownload_Domain_Repository_FileRepository $fileRepository) {
		$this->fileRepository = $fileRepository;
	}

	/**
	 * categoryRepository
	 *
	 * @var Tx_DdDownload_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * injectCategoryRepository
	 *
	 * @param Tx_DdDownload_Domain_Repository_CategoryRepository $categoryRepository
	 * @return void
	 */
	public function injectCategoryRepository(Tx_DdDownload_Domain_Repository_CategoryRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * action list
	 *
	 * @param Tx_DdDownload_Domain_Model_Category $category
	 * @return void
	 */
	public function listAction(Tx_DdDownload_Domain_Model_Category $category = NULL) {
		$permittedCategoryUids = explode(',', $this->settings['categories']);
		$permittedCategories = $this->categoryRepository->findByUids($permittedCategoryUids);

		if (TRUE === isset($category) && TRUE == intval($this->settings['enableFeCategoryFilter'])) {
			$selectedFilterCategory = $category;

			if (TRUE === in_array($selectedFilterCategory->getUid(), $permittedCategoryUids)) {
				$categories[] = $selectedFilterCategory;
				$this->view->assign('selectedFilterCategory', $selectedFilterCategory);
			}
		}

		if (FALSE === isset($categories)) {
			$categories = $permittedCategories;
		}

		$fileSort = $this->settings['sorting'];
		$orderBy = $this->settings['orderBy'];

		if (empty($this->settings['orderBy'])) {
			$orderBy = 'uid';
		}

		switch ($fileSort) {
			case 'ORDER_ASCENDING':
				$defaultOrderings = array($orderBy => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
				break;

			case 'ORDER_DESCENDING':
				$defaultOrderings = array($orderBy => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING);
				break;

			default:
				$defaultOrderings = array($orderBy => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
				break;
		}

		if ('' !== $this->settings['orderBy'] || '' !== $this->settings['sorting']) {
			$this->fileRepository->setDefaultOrderings($defaultOrderings);
			$files = array();
			foreach ($categories AS $category) {
				$categoryUid = $category->getUid();
				$files = $this->fileRepository->findByCategory($categoryUid, TRUE);
				$category->setFiles($files);
			}
		}

		/**
		 * Template Switch
		 */
		if ($this->settings['template']) {
			$this->view->setTemplatePathAndFilename($this->settings['template']);
		}

		$this->view->assign('permittedCategories', $permittedCategories);
		$this->view->assign('categories', $categories);
	}
}