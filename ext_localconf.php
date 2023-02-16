<?php
defined('TYPO3_MODE') || die('Access denied.');



(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Demio',
        'List',
        [
            \Netresearch\Demio\Controller\EventController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Netresearch\Demio\Controller\EventController::class => 'list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Demio',
        'Single',
        [
            \Netresearch\Demio\Controller\EventController::class => 'show'
        ],
        // non-cacheable actions
        [
            \Netresearch\Demio\Controller\EventController::class => 'show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = demio-plugin-list
                        title = LLL:EXT:demio/Resources/Private/Language/locallang_db.xlf:tx_demio_list.name
                        description = LLL:EXT:demio/Resources/Private/Language/locallang_db.xlf:tx_demio_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = demio_list
                        }
                    }
                    single {
                        iconIdentifier = demio-plugin-single
                        title = LLL:EXT:demio/Resources/Private/Language/locallang_db.xlf:tx_demio_single.name
                        description = LLL:EXT:demio/Resources/Private/Language/locallang_db.xlf:tx_demio_single.description
                        tt_content_defValues {
                            CType = list
                            list_type = demio_single
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

