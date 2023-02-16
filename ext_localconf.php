<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'T3Demio',
    'List',
    [
        \Netresearch\T3Demio\Controller\EventController::class => 'list'
    ],
    // non-cacheable actions
    [
        \Netresearch\T3Demio\Controller\EventController::class => 'list'
    ]
);
