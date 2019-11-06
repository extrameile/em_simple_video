<?php
defined('TYPO3_MODE') or die();

if(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('fluid_styled_content')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'em_simple_video',
        'Configuration/TypoScript/',
        'Simple Video Rendering (Fluid Styled Content)'
    );
}