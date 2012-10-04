<?php
namespace TYPO3\Release\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

/**
 * Release controller for the TYPO3.Release package
 *
 * @Flow\Scope("singleton")
 */
class ReleaseController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Release\Domain\Repository\ProductRepository
	 */
	protected $productRepository;

	/**
	 * Shows an overview
	 *
	 * @return void
	 */
	public function indexAction() {
		$product = $this->productRepository->findOneByName($this->settings['productName']);
		if ($product !== NULL) {
			$this->view->assign('branches', $product->getBranches());
		}
	}

}

?>