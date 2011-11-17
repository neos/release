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

	const STATUS_PLANNED = 'planned';
	const STATUS_RELEASED = 'released';

	/**
	 * @var \TYPO3\Release\Domain\Model\Branch
	 * @ORM\ManyToOne(inversedBy="releases")
	 */
	protected $branch;

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
	 * @var string
	 */
	protected $status = self::STATUS_PLANNED;

	/**
	 * The ChangeLog URI
	 * @var string
	 */
	protected $changeLogUri;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\TYPO3\Release\Domain\Model\Download>
	 * @ORM\OneToMany(mappedBy="xrelease")
	 */
	protected $downloads;

	/**
	 * Construct
	 *
	 * @param Product $product
	 * @param string $version
	 */
	public function __construct($branch, $version) {
		$this->downloads = new \Doctrine\Common\Collections\ArrayCollection();
		$this->branch = $branch;
		$this->version = $version;
	}

	/**
	 * Get the Release's version
	 *
	 * @return string The Release's version
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * Get the ChangeLog URI for this version
	 *
	 * @return string
	 */
	public function getChangeLogUri() {
		return $this->changeLogUri;
	}

	/**
	 * Set the ChangeLog URI for this version
	 *
	 * @param string $changeLogUri
	 * @return void
	 */
	public function setChangeLogUri($changeLogUri) {
		$this->changeLogUri = $changeLogUri;
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

	/**
	 * @param Download $download
	 */
	public function addDownload(Download $download) {
		$this->downloads[] = $download;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getDownloads() {
		return $this->downloads;
	}
}
?>