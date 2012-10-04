<?php
namespace TYPO3\Release\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Branch
 *
 * @Flow\Scope("prototype")
 * @Flow\Entity
 */
class Branch {

	/**
	 * The product
	 * @var \TYPO3\Release\Domain\Model\Product
	 * @ORM\ManyToOne(inversedBy="branches")
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
	 * The branch release notes url
	 * @var string
	 */
	protected $releaseNotesUrl;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\TYPO3\Release\Domain\Model\Release>
	 * @ORM\OneToMany(mappedBy="branch")
	 */
	protected $releases;

	/**
	 * Construct
	 *
	 * @param Product $product
	 * @param string $version
	 */
	public function __construct(Product $product, $version) {
		$this->releases = new \Doctrine\Common\Collections\ArrayCollection();
		$this->product = $product;
		$this->version = $version;
		$this->product->addBranch($this);
	}

	/**
	 * Get the Branch's product
	 *
	 * @return \TYPO3\Release\Domain\Model\Product The Branch's product
	 */
	public function getProduct() {
		return $this->product;
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

	/**
	 * Get the Branch's git url
	 *
	 * @return string The Branch's release notes url
	 */
	public function getReleaseNotesUrl() {
		return $this->releaseNotesUrl;
	}

	/**
	 * Sets this Branch's git url
	 *
	 * @param string $releaseNotesUrl The Branch's release notes url
	 * @return void
	 */
	public function setReleaseNotesUrl($releaseNotesUrl) {
		$this->releaseNotesUrl = $releaseNotesUrl;
	}

	/**
	 * Adds a release
	 *
	 * @param Release $release
	 * @return void
	 */
	public function addRelease(Release $release) {
		$this->releases[$release->getVersion()] = $release;
	}

	/**
	 * Returns all releases
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getReleases() {
		return $this->releases;
	}

	/**
	 * Returns a specific release
	 *
	 * @param $version Version number of that release, for example "1.3.4"
	 * @return Release
	 */
	public function getRelease($version) {
		/*
			FIXME: This doesn't work due to some weird Doctrine initialization behavior:
		return $this->releases->containsKey($version) ? $this->releases[$version] : NULL;
		 */
		foreach ($this->releases as $release) {
			if ($release->getVersion() === $version) {
				return $release;
			}
		}
		return NULL;
	}

	/**
	 * Returns the first release
	 *
	 * @return Release
	 */
	public function getFirstRelease() {
		$firstRelease = NULL;
		foreach ($this->releases as $release) {
			if (($firstRelease === NULL || version_compare($release->getVersion(), $firstRelease->getVersion(), '<')) && $release->getStatus() === Release::STATUS_RELEASED) {
				$firstRelease = $release;
			}
		}
		return $firstRelease;
	}

	/**
	 * Returns the latest release (with the highest version number)
	 *
	 * @return Release
	 */
	public function getLatestRelease() {
		$latestRelease = NULL;
		foreach ($this->releases as $release) {
			if (($latestRelease === NULL || version_compare($release->getVersion(), $latestRelease->getVersion(), '>')) && $release->getStatus() === Release::STATUS_RELEASED) {
				$latestRelease = $release;
			}
		}
		return $latestRelease;
	}

	/**
	 * Returns the status of this branch.
	 *
	 * @return string
	 */
	public function getStatus() {
		foreach ($this->releases as $release) {
			if ($release->getStatus() === Release::STATUS_RELEASED) {
				return Release::STATUS_RELEASED;
			}
		}
		return Release::STATUS_PLANNED;
	}

}
?>