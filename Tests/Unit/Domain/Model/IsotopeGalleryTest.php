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
 * Test case for class \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Isotope Gallery
 *
 */
class IsotopeGalleryTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery();
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
	public function getGroupsReturnsInitialValueForGroup() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getGroups()
		);
	}

	/**
	 * @test
	 */
	public function setGroupsForObjectStorageContainingGroupSetsGroups() { 
		$group = new \TYPO3\SkIsotopeGallery\Domain\Model\Group();
		$objectStorageHoldingExactlyOneGroups = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneGroups->attach($group);
		$this->fixture->setGroups($objectStorageHoldingExactlyOneGroups);

		$this->assertSame(
			$objectStorageHoldingExactlyOneGroups,
			$this->fixture->getGroups()
		);
	}
	
	/**
	 * @test
	 */
	public function addGroupToObjectStorageHoldingGroups() {
		$group = new \TYPO3\SkIsotopeGallery\Domain\Model\Group();
		$objectStorageHoldingExactlyOneGroup = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneGroup->attach($group);
		$this->fixture->addGroup($group);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneGroup,
			$this->fixture->getGroups()
		);
	}

	/**
	 * @test
	 */
	public function removeGroupFromObjectStorageHoldingGroups() {
		$group = new \TYPO3\SkIsotopeGallery\Domain\Model\Group();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($group);
		$localObjectStorage->detach($group);
		$this->fixture->addGroup($group);
		$this->fixture->removeGroup($group);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getGroups()
		);
	}
	
}
?>