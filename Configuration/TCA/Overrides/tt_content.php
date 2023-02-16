<?php


defined('TYPO3') or die();


/**
 * This file is part of the "Demio" Extension for TYPO3 CMS.
 *
 * For the full copyright information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 André Lademann <andre.lademann@netresearch.de>, Netresearch DTT GmbH
 *         Philipp Madl <philipp.madl@netresearch.de>, Netresearch DTT GmbH
 */


// List plugin
$pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Demio',
    'List',
    'LLL:EXT:t3_demio/Resources/Private/Language/locallang.xlf:plugin.list.title',
    'EXT:t3_demio/Resources/Public/Icons/Extension.png'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:t3_demio/Configuration/Flexforms/PluginList.xml'
);



// Single plugin
$pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Demio',
    'Single',
    'LLL:EXT:t3_demio/Resources/Private/Language/locallang.xlf:plugin.single.title',
    'EXT:t3_demio/Resources/Public/Icons/Extension.png'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:t3_demio/Configuration/Flexforms/PluginSingle.xml'
);

