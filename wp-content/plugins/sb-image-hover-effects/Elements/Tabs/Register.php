<?php

return [
    'get_name' => 'sa_el_tabs',
    'name' => 'Tabs',
    'class' => '\SA_EL_ADDONS\Elements\Tabs\Tabs',
    'dependency' => [
        'css' => [
            'Tabs.css' => SA_EL_ADDONS_PATH . 'Elements/Tabs/assets/index.min.css',
        ],
        'js' => [
            'Tabs.js' => SA_EL_ADDONS_PATH . 'Elements/Tabs/assets/index.min.js',
        ],
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
