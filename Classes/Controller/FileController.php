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
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$extutil = new Tx_Extbase_Utility_Extension;
		//$extutil->createAutoloadRegistryForExtension('dd_download', t3lib_extMgm::extPath('dd_download'));
		
		$fileSort = $this->settings['sorting'];
		$orderBy = $this->settings['orderBy'];
		
		if(empty($this->settings['orderBy'])) {
			$orderBy = 'uid';
		}
		
		switch($fileSort) {
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
		
		$this->fileRepository->setDefaultOrderings($defaultOrderings);
		
		
		
		/**
		 * Template Switch
		 */
		$defaultTemplatePath = 'typo3conf/ext/'.$this->request->getControllerExtensionKey().'/Resources/Private/Templates/File/';
		$userTemplate = $this->settings['template'];
		
		if($userTemplate) {
			$this->view->setTemplatePathAndFilename($userTemplate);
		}
		else {
			$this->view->setTemplatePathAndFilename($defaultTemplatePath.'List.html');
		}
		
		
		
		$files = $this->fileRepository->findAll($fileSort);
		$categories = $this->fileRepository->getAllCat();
		
		$this->view->assignMultiple(array(
			'files'				=>		$files,
			'categories'		=>		$categories
		));
		
		//$this->view->assign('files', $files);
	}

}
?>