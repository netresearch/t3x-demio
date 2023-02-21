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
// ==============================
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Netresearch.T3Demio',
    'List',
    'LLL:EXT:t3_demio/Resources/Private/Language/locallang.xlf:plugin.list.title',
    'EXT:t3_demio/Resources/Public/Icons/Icon.png'
);
$pluginSignature = 't3demio_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:t3_demio/Configuration/FlexForms/PluginList.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,layout,select_key,recursive';


// Single plugin
// ==============================
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Netresearch.T3Demio',
    'Single',
    'LLL:EXT:t3_demio/Resources/Private/Language/locallang.xlf:plugin.single.title',
    'EXT:t3_demio/Resources/Public/Icons/Icon.png'
);
$pluginSignature = 't3demio_single';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:t3_demio/Configuration/FlexForms/PluginSingle.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,recursive';
