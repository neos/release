<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A download format
 *
 * @Flow\Scope("prototype")
 * @Flow\Entity
 */
class DownloadFormat {

	/**
	 * The filename

	 * @var string
	 */
	protected $filename;

	/**
	 * The url
	 * @var string
	 */
	protected $url;

	/**
	 * The sha1
	 * @var string
	 */
	protected $sha1;

	/**
	 * @var \TYPO3\Release\Domain\Model\Download
	 * @ORM\ManyToOne(inversedBy="formats")
	 */
	protected $download;

	/**
	 * @param Download $download
	 * @param $filename
	 * @param $sha1
	 * @param $url
	 */
	public function __construct(Download $download, $filename, $sha1, $url) {
		$this->download = $download;
		$this->filename = $filename;
		$this->url = $url;
		$this->sha1 = $sha1;
	}

	/**
	 * Get the Download's filename
	 *
	 * @return string The Download's filename
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * Sets this Download's filename
	 *
	 * @param string $filename The Download's filename
	 * @return void
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
	}

	/**
	 * Get the Download's url
	 *
	 * @return string The Download's url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets this Download's url
	 *
	 * @param string $url The Download's url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Get the Download's sha1
	 *
	 * @return string The Download's sha1
	 */
	public function getSha1() {
		return $this->sha1;
	}

	/**
	 * Sets this Download's sha1
	 *
	 * @param string $sha1 The Download's sha1
	 * @return void
	 */
	public function setSha1($sha1) {
		$this->sha1 = $sha1;
	}

	/**
	 * Returns the file extension of this download format.
	 *
	 * @return string
	 */
	public function getFileExtension() {
		$pathInfo = pathinfo($this->filename);
		if (!isset($pathInfo['extension'])) {
			return '???';
		} else {
			return $pathInfo['extension'];
		}
	}

}
?>