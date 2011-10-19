<?php
namespace TYPO3\Release\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use TYPO3\FLOW3\MVC\Controller\ActionController;

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

}

?>