<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'DemioList',
    [
        \Netresearch\T3Demio\Controller\ListController::class => 'list'
    ],
    // non-cacheable actions
    [
        \Netresearch\T3Demio\Controller\ListController::class => 'list'
    ]
);