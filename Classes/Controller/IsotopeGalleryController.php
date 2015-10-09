<?php
namespace TYPO3\SkIsotopeGallery\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
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
 * @package sk_isotope_gallery
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class IsotopeGalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * isotopeGalleryRepository
	 *
	 * @var \TYPO3\SkIsotopeGallery\Domain\Repository\IsotopeGalleryRepository
	 * @inject
	 */
	protected $isotopeGalleryRepository;
	
	/**
	 * action gallery
	 *
	 * @return void
	 */
	public function galleryAction() {
		$isotopeGalleries = $this->isotopeGalleryRepository->findAll();
		$this->view->assign('allGalleries', $isotopeGalleries);
	}
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$isotopeGalleries = $this->isotopeGalleryRepository->findAll();
		$this->view->assign('isotopeGalleries', $isotopeGalleries);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery
	 * @return void
	 */
	public function showAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery) {
		$this->view->assign('isotopeGallery', $isotopeGallery);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $newIsotopeGallery
	 * @dontvalidate $newIsotopeGallery
	 * @return void
	 */
	public function newAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $newIsotopeGallery = NULL) {
		$this->view->assign('newIsotopeGallery', $newIsotopeGallery);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $newIsotopeGallery
	 * @return void
	 */
	public function createAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $newIsotopeGallery) {
		$this->isotopeGalleryRepository->add($newIsotopeGallery);
		$this->flashMessageContainer->add('Your new IsotopeGallery was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery
	 * @return void
	 */
	public function editAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery) {
		$this->view->assign('isotopeGallery', $isotopeGallery);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery
	 * @return void
	 */
	public function updateAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery) {
		$this->isotopeGalleryRepository->update($isotopeGallery);
		$this->flashMessageContainer->add('Your IsotopeGallery was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery
	 * @return void
	 */
	public function deleteAction(\TYPO3\SkIsotopeGallery\Domain\Model\IsotopeGallery $isotopeGallery) {
		$this->isotopeGalleryRepository->remove($isotopeGallery);
		$this->flashMessageContainer->add('Your IsotopeGallery was removed.');
		$this->redirect('list');
	}

}
?>