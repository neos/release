<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A download format
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Download {

	/**
	 * The label
	 * @var string
	 */
	protected $label;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\TYPO3\Release\Domain\Model\DownloadFormat>
	 * @ORM\OneToMany(mappedBy="download")
	 */
	protected $formats;

	/**
	 * @var \TYPO3\Release\Domain\Model\Release
	 * @ORM\ManyToOne(inversedBy="downloads")
	 */
	protected $xrelease;

	/**
	 * Construct
	 *
	 * @param Release $release
	 */
	public function __construct(Release $release) {
		$this->formats = new \Doctrine\Common\Collections\ArrayCollection();
		$this->xrelease = $release;
	}

	/**
	 * @param string $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @param DownloadFormat $format
	 */
	public function addFormat(DownloadFormat $format) {
		$this->formats[] = $format;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getFormats() {
		return $this->formats;
	}

}
?>