<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Download
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Download {

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

}
?>