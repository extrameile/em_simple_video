<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:em_simple_video/Configuration/TSconfig/Wizards/SimpleVideo.tsconfig">
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:em_simple_video/Configuration/TSconfig/Page/TCEFORM.tsconfig">
    ');

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $icons = [
        'content-em_simple_video' => 'EXT:em_simple_video/Resources/Public/Icons/film-solid.svg',
    ];
    foreach ($icons as $iconIdentifier => $pathAndFile) {
        $iconRegistry->registerIcon(
            $iconIdentifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => $pathAndFile]
        );
    }

});


