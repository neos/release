<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Release notes
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class ReleaseNotes {

	/**
	 * The teaser
	 * @var string
	 */
	protected $teaser;

	/**
	 * The article
	 * @var string
	 */
	protected $article;


	/**
	 * Get the Release notes's teaser
	 *
	 * @return string The Release notes's teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets this Release notes's teaser
	 *
	 * @param string $teaser The Release notes's teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Get the Release notes's article
	 *
	 * @return string The Release notes's article
	 */
	public function getArticle() {
		return $this->article;
	}

	/**
	 * Sets this Release notes's article
	 *
	 * @param string $article The Release notes's article
	 * @return void
	 */
	public function setArticle($article) {
		$this->article = $article;
	}

}
?>