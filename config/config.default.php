<?php

return [
    'settings' => [
        'displayErrorDetails' => false,
        'db' => [
            'db_skif' => [
                'host' => 'localhost',
                'db_name' => 'skif',
                'user' => '',
                'password' => '',
            ],
        ],
        'layout' => [
            'admin' => 'layouts/layout.admin.tpl.php',
            'empty' => 'layouts/layout.empty.tpl.php',
            'blank' => 'layouts/layout.blank.tpl.php',
            'main' => 'layouts/layout.main.tpl.php'
        ],

    ],
    'log_path' => '/var/www/log',
    'tmp_path' => '/var/www/tmp',
    'skif_url_path' => '/admin',
    'site_url' => '/skif',
    'site_path' => '/var/www/skif/public',
    'assets_url_path' => '/assets',
    'site_name' => 'Скиф',
    'site_title' => 'WebSK. Skif',
    'site_email' => 'support@websk.ru',
    'salt' => 'webskskif',
];
