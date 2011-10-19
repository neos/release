<?php
namespace TYPO3\Release\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use TYPO3\Release\Domain\Model\Product;
use TYPO3\Release\Domain\Model\Branch;

/**
 * Downloads controller for the TYPO3.Release package
 *
 * @FLOW3\Scope("singleton")
 */
class DownloadsController extends \TYPO3\FLOW3\MVC\Controller\ActionController {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\Release\Domain\Repository\ProductRepository
	 */
	protected $productRepository;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {#
		$product = $this->productRepository->findOneByName('FLOW3');
		$this->view->assign('product', $product);
	}

	/**
	 * @return string
	 */
	public function showAction() {
		return 'show';
	}

}

?>