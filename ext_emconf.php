<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3_demio',
    'description' => 'This extension provides a plugin for the TYPO3 CMS to integrate Demio webinars into your TYPO3 website.',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.4.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Netresearch\\T3Demio\\' => 'Classes/',
        ],
    ],
];
