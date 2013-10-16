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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_DdDownload_Domain_Model_File.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage DD Downloads
 *
 * @author Dennis Puszalowski <info@wildpixel.de>
 */
class Tx_DdDownload_Domain_Model_FileTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_DdDownload_Domain_Model_File
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_DdDownload_Domain_Model_File();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getFileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFileForStringSetsFile() { 
		$this->fixture->setFile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFile()
		);
	}
	
	/**
	 * @test
	 */
	public function getFilenameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFilenameForStringSetsFilename() { 
		$this->fixture->setFilename('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFilename()
		);
	}
	
	/**
	 * @test
	 */
	public function getThumbReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setThumbForStringSetsThumb() { 
		$this->fixture->setThumb('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getThumb()
		);
	}
	
	/**
	 * @test
	 */
	public function getLinkReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLinkForStringSetsLink() { 
		$this->fixture->setLink('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLink()
		);
	}
	
	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForTx_DdDownload_Domain_Model_Category() { }

	/**
	 * @test
	 */
	public function setCategoryForTx_DdDownload_Domain_Model_CategorySetsCategory() { }
	
}
?>