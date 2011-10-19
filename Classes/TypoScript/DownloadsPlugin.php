<?php
namespace TYPO3\Release\TypoScript;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Release".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 *
 * @FLOW3\Scope("prototype")
 */
class DownloadsPlugin extends \TYPO3\TYPO3\TypoScript\Plugin {

	protected $package = 'TYPO3.Release';
	protected $controller = 'Downloads';
	protected $action = 'index';

}
?>