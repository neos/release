<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * A Product
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Product {

	/**
	 * The name
	 * @var string
	 * @FLOW3\Validate(type="StringLength", options={ "minimum"=3, "maximum"=255 })
	 */
	protected $name;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\TYPO3\Release\Domain\Model\Branch>
	 * @ORM\OneToMany(mappedBy="product")
	 */
	protected $branches;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->branches = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the Product's name
	 *
	 * @return string The Product's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Product's name
	 *
	 * @param string $name The Product's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a product branch
	 *
	 * @param Branch $branch
	 * @return void
	 */
	public function addBranch(Branch $branch) {
		$this->branches->add($branch);
	}

	/**
	 * Returns all branches
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getBranches() {
		return $this->branches;
	}

}
?>