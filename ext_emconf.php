<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'T3Demio',
    'description' => 'This extension provides a plugin for the TYPO3 CMS to integrate Demio webinars into your TYPO3 website.',
    'category' => 'plugin',
    'author' => 'André Lademann, Philipp Madl',
    'author_email' => 'andre.lademann@netresearch.de, philipp.madl@netresearch.de',
    'state' => 'beta',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Netresearch\\T3Demio\\' => 'Classes/',
        ],
    ],
];
