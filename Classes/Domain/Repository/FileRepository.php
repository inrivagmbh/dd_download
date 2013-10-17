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
class Tx_DdDownload_Domain_Repository_FileRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * @param Tx_DdDownload_Domain_Model_Category $category
	 * @param Tx_DdDownload_Domain_Model_Tag $tag
	 * @param boolean $returnObjectStorage
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $result
	 */
	public function findWithFilters($category, $tag = NULL, $returnObjectStorage = FALSE) {
		$query = $this->createQuery();
		$rules = $query->contains('categories', $category);
		if (TRUE === isset($tag)) {
			$tagRule = $query->contains('tags', $tag);
			$rules = $query->logicalAnd($rules, $tagRule);
		}
		$result = $query->matching($rules)->execute();

		if (TRUE === $returnObjectStorage) {
			$objectStorage = new Tx_Extbase_Persistence_ObjectStorage();
			foreach($result AS $obj) {
				$objectStorage->attach($obj);
			}
			return $objectStorage;
		}

		return $result;
	}
}