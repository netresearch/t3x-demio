<?php

/*
 * This file is part of the TYPO3 CMS project. [...]
 */

defined('TYPO3') or die();

$pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'T3Demio',
    'List',
    'LLL:EXT:t3_demio/Resources/Private/Language/locallang.xlf:plugin.list.title',
    'EXT:t3_demio/Resources/Public/Icons/Extension.png'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
                    $pluginSignature,
        'FILE:EXT:t3_demio/Configuration/Flexforms/PluginList.xml'
);
