<?php
defined('TYPO3_MODE') || die('Access denied.');


(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Netresearch.T3Demio',
        'List',
        [
            \Netresearch\T3Demio\Controller\ListController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Netresearch\T3Demio\Controller\ListController::class => 'list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Netresearch.T3Demio',
        'Single',
        [
            \Netresearch\T3Demio\Controller\SingleController::class => 'show'
        ],
        // non-cacheable actions
        [
            \Netresearch\T3Demio\Controller\SingleController::class => 'show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = demio-plugin-list
                        title = LLL:EXT:t3_demio/Resources/Private/Language/locallang_db.xlf:tx_demio_list.name
                        description = LLL:EXT:t3_demio/Resources/Private/Language/locallang_db.xlf:tx_demio_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = t3demio_list
                        }
                    }
                    single {
                        iconIdentifier = demio-plugin-single
                        title = LLL:EXT:t3_demio/Resources/Private/Language/locallang_db.xlf:tx_demio_single.name
                        description = LLL:EXT:t3_demio/Resources/Private/Language/locallang_db.xlf:tx_demio_single.description
                        tt_content_defValues {
                            CType = list
                            list_type = t3demio_single
                        }
                    }
                }
                show = *
            }
       }'
    );


})();

