<?php

namespace TYPO3\SkIsotopeGallery\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
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
 * Test case for class \TYPO3\SkIsotopeGallery\Domain\Model\Group.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Isotope Gallery
 *
 */
class GroupTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\SkIsotopeGallery\Domain\Model\Group
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\SkIsotopeGallery\Domain\Model\Group();
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
	public function getItemsReturnsInitialValueForItem() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getItems()
		);
	}

	/**
	 * @test
	 */
	public function setItemsForObjectStorageContainingItemSetsItems() { 
		$item = new \TYPO3\SkIsotopeGallery\Domain\Model\Item();
		$objectStorageHoldingExactlyOneItems = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneItems->attach($item);
		$this->fixture->setItems($objectStorageHoldingExactlyOneItems);

		$this->assertSame(
			$objectStorageHoldingExactlyOneItems,
			$this->fixture->getItems()
		);
	}
	
	/**
	 * @test
	 */
	public function addItemToObjectStorageHoldingItems() {
		$item = new \TYPO3\SkIsotopeGallery\Domain\Model\Item();
		$objectStorageHoldingExactlyOneItem = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneItem->attach($item);
		$this->fixture->addItem($item);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneItem,
			$this->fixture->getItems()
		);
	}

	/**
	 * @test
	 */
	public function removeItemFromObjectStorageHoldingItems() {
		$item = new \TYPO3\SkIsotopeGallery\Domain\Model\Item();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($item);
		$localObjectStorage->detach($item);
		$this->fixture->addItem($item);
		$this->fixture->removeItem($item);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getItems()
		);
	}
	
}
?>