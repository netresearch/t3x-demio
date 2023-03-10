<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Demio',
    'description' => 'This extension provides a plugin for the TYPO3 CMS to integrate Demio webinars into your TYPO3 website.',
    'category' => 'plugin',
    'author' => 'André Lademann, Philipp Madl, Andreas Müller',
    'author_email' => 'andre.lademann@netresearch.de, philipp.madl@netresearch.de, andreas.mueller@netresearch.de',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Netresearch\\Demio\\' => 'Classes/',
        ],
    ],
];
