<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Branch
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Branch {

	/**
	 * The product
	 * @var \TYPO3\Release\Domain\Model\Product
	 * @ORM\ManyToOne
	 */
	protected $product;

	/**
	 * The version
	 * @var string
	 */
	protected $version;

	/**
	 * The php versions
	 * @var string
	 */
	protected $phpVersions;

	/**
	 * The mysql versions
	 * @var string
	 */
	protected $mysqlVersions;

	/**
	 * The git url
	 * @var string
	 */
	protected $gitUrl;


	/**
	 * Get the Branch's product
	 *
	 * @return \TYPO3\Release\Domain\Model\Product The Branch's product
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * Sets this Branch's product
	 *
	 * @param \TYPO3\Release\Domain\Model\Product $product The Branch's product
	 * @return void
	 */
	public function setProduct(Product $product) {
		$this->product = $product;
	}

	/**
	 * Returns a label for this branch
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->product->getName() . ' ' . $this->version;
	}

	/**
	 * Get the Branch's version
	 *
	 * @return string The Branch's version
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * Sets this Branch's version
	 *
	 * @param string $version The Branch's version
	 * @return void
	 */
	public function setVersion($version) {
		$this->version = $version;
	}

	/**
	 * Get the Branch's php versions
	 *
	 * @return string The Branch's php versions
	 */
	public function getPhpVersions() {
		return $this->phpVersions;
	}

	/**
	 * Sets this Branch's php versions
	 *
	 * @param string $phpVersions The Branch's php versions
	 * @return void
	 */
	public function setPhpVersions($phpVersions) {
		$this->phpVersions = $phpVersions;
	}

	/**
	 * Get the Branch's mysql versions
	 *
	 * @return string The Branch's mysql versions
	 */
	public function getMysqlVersions() {
		return $this->mysqlVersions;
	}

	/**
	 * Sets this Branch's mysql versions
	 *
	 * @param string $mysqlVersions The Branch's mysql versions
	 * @return void
	 */
	public function setMysqlVersions($mysqlVersions) {
		$this->mysqlVersions = $mysqlVersions;
	}

	/**
	 * Get the Branch's git url
	 *
	 * @return string The Branch's git url
	 */
	public function getGitUrl() {
		return $this->gitUrl;
	}

	/**
	 * Sets this Branch's git url
	 *
	 * @param string $gitUrl The Branch's git url
	 * @return void
	 */
	public function setGitUrl($gitUrl) {
		$this->gitUrl = $gitUrl;
	}

}
?>