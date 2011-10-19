<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Release
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Release {

	/**
	 * The version
	 * @var string
	 */
	protected $version;

	/**
	 * The date
	 * @var \DateTime
	 */
	protected $date;

	/**
	 * The status
	 * @var integer
	 */
	protected $status;

	/**
	 * Get the Release's version
	 *
	 * @return string The Release's version
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * Sets this Release's version
	 *
	 * @param string $version The Release's version
	 * @return void
	 */
	public function setVersion($version) {
		$this->version = $version;
	}

	/**
	 * Get the Release's date
	 *
	 * @return \DateTime The Release's date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets this Release's date
	 *
	 * @param \DateTime $date The Release's date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Get the Release's status
	 *
	 * @return integer The Release's status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Sets this Release's status
	 *
	 * @param integer $status The Release's status
	 * @return void
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

}
?>