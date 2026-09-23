<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Look previews for Camino',
    'description' => 'Content elements of the TYPO3 Camino theme in the page module, rendered with the real frontend templates through EXT:look.',
    'category' => 'be',
    // set from the release tag by the publish workflow (tailor set-version)
    'version' => '0.0.0',
    'state' => 'stable',
    'author' => 'Sascha Egerer',
    'author_email' => 'sascha.egerer@flowd.de',
    'author_company' => 'Flowd GmbH',
    'license' => 'GPL-2.0-or-later',
    'constraints' => [
        'depends' => [
            'php' => '8.2.0-8.5.99',
            'typo3' => '14.3.0-14.99.99',
            'theme_camino' => '14.3.0-14.99.99',
            'look' => '1.1.0-1.99.99',
        ],
    ],
];
