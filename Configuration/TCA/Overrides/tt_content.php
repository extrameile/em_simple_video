<?php
\defined('TYPO3_MODE') or die;

\call_user_func(
    static function () {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
            [
                'LLL:EXT:em_simple_video/Resources/Private/Language/locallang_be.xlf:em_simple_video.wizard.title',
                'em_simple_video',
                'content-em_simple_video',
            ],
            'textmedia',
            'after'
        );

        // load the fields from the regular text element
        $GLOBALS['TCA']['tt_content']['types']['em_simple_video'] = $GLOBALS['TCA']['tt_content']['types']['text'];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            'assets,image',
            'em_simple_video',
            'before:bodytext'
        );

        // already set from textpic
        $GLOBALS['TCA']['tt_content']['types']['em_simple_video']['columnsOverrides'] = \array_merge_recursive($GLOBALS['TCA']['tt_content']['types']['em_simple_video']['columnsOverrides'], [
            'assets' => [
                'config' => [
                    'overrideChildTca' => [
                        'columns' => [
                            'uid_local' => [
                                'config' => [
                                    'appearance' => [
                                        'elementBrowserAllowed' => 'mp4',
                                    ],
                                ],
                            ],
                        ],
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '--palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
            ],
            'image' => [
                'config' => [
                    'overrideChildTca' => [
                        'columns' => [
                            'uid_local' => [
                                'config' => [
                                    'appearance' => [
                                        'elementBrowserAllowed' => 'jpg,png,gif',
                                    ],
                                ],
                            ],
                        ],
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '--palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['em_simple_video'] = $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['textmedia'];
    }
);
