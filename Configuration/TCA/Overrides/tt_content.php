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
    'Demio',
    'List',
    'LLL:EXT:demio/Resources/Private/Language/locallang.xlf:plugin.list.title',
    'EXT:demio/Resources/Public/Icons/Icon.png'
);
$pluginSignature = 'demio_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:demio/Configuration/FlexForms/PluginList.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,layout,select_key,recursive';


// Single plugin
// ==============================
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Demio',
    'Single',
    'LLL:EXT:demio/Resources/Private/Language/locallang.xlf:plugin.single.title',
    'EXT:demio/Resources/Public/Icons/Icon.png'
);
$pluginSignature = 'demio_single';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:demio/Configuration/FlexForms/PluginSingle.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,recursive';
