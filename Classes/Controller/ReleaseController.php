<?php
namespace TYPO3\Release\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

use TYPO3\FLOW3\MVC\Controller\ActionController;
use \TYPO3\Release\Domain\Model\Release;

/**
 * Release controller for the TYPO3.Release package
 *
 * @FLOW3\Scope("singleton")
 */
class ReleaseController extends ActionController {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\Release\Domain\Repository\ProductRepository
	 */
	protected $productRepository;

	/**
	 * Shows an overview
	 *
	 * @return void
	 */
	public function indexAction() {
		$product = $this->productRepository->findOneByName('FLOW3');
		if ($product !== NULL) {
			$this->view->assign('branches', $product->getBranches());
		}
	}

	/**
	 * Shows a single release object
	 *
	 * @param \TYPO3\Release\Domain\Model\Release $release The release to show
	 * @return void
	 */
	public function showAction(Release $release) {
		$this->view->assign('release', $release);
	}

	/**
	 * Shows a form for creating a new release object
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new release object to the release repository
	 *
	 * @param \TYPO3\Release\Domain\Model\Release $release A new release to add
	 * @return void
	 */
	public function createAction(Release $newRelease) {
		$this->releaseRepository->add($newRelease);
		$this->flashMessageContainer->add('Created a new release.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing release object
	 *
	 * @param \TYPO3\Release\Domain\Model\Release $release The release to edit
	 * @return void
	 */
	public function editAction(Release $release) {
		$this->view->assign('release', $release);
	}

	/**
	 * Updates the given release object
	 *
	 * @param \TYPO3\Release\Domain\Model\Release $release The release to update
	 * @return void
	 */
	public function updateAction(Release $release) {
		$this->releaseRepository->update($release);
		$this->flashMessageContainer->add('Updated the release.');
		$this->redirect('index');
	}

	/**
	 * Removes the given release object from the release repository
	 *
	 * @param \TYPO3\Release\Domain\Model\Release $release The release to delete
	 * @return void
	 */
	public function deleteAction(Release $release) {
		$this->releaseRepository->remove($release);
		$this->flashMessageContainer->add('Deleted a release.');
		$this->redirect('index');
	}

}

?>