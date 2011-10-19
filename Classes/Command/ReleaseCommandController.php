<?php
namespace TYPO3\Release\Command;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use TYPO3\Release\Domain\Model\Product;
use TYPO3\Release\Domain\Model\Branch;

/**
 * Branch command controller for the TYPO3.Release package
 *
 * @FLOW3\Scope("singleton")
 */
class ReleaseCommandController extends \TYPO3\FLOW3\MVC\Controller\CommandController {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\Release\Domain\Repository\ProductRepository
	 */
	protected $productRepository;

	/**
	 * Create a new product
	 *
	 * This command creates a new product with the given name.
	 *
	 * @param string $name The product name
	 * @return void
	 */
	public function createProductCommand($name) {
		if ($this->productRepository->findOneByName($name) !== NULL) {
			$this->outputLine('Product "%s" already exists.', array($name));
			$this->quit(1);
		}

		$product = new Product();
		$product->setName($name);
		$this->productRepository->add($product);

		$this->outputLine('Created new product "%s".', array($name));
	}

	/**
	 * Create a product branch
	 *
	 * This command creates a new product branch.
	 *
	 * @param string $productName The product name
	 * @param string $version The branch version, for example "1.3"
	 * @param string $phpVersions The supported PHP versions
	 * @param string $mysqlVersions The supported MySQL versions
	 * @param string $gitUrl The git URL pointing to HEAD
	 * @return void
	 */
	public function createBranchCommand($productName, $version, $phpVersions, $mysqlVersions, $gitUrl) {
		$product = $this->productRepository->findOneByName($productName);
		if ($product === NULL) {
			$this->outputLine('Product "%s" does not exist.', array($productName));
			$this->quit(1);
		}

		$branch = new Branch();
		$branch->setProduct($product);
		$branch->setVersion($version);
		$branch->setPhpVersions($phpVersions);
		$branch->setMysqlVersions($mysqlVersions);
		$branch->setGitUrl($gitUrl);
		$product->addBranch($branch);

		$this->productRepository->update($product);

		$this->outputLine('Created new product branch "%s %s".', array($productName, $version));
	}

}

?>