<?php

return [
    'get_name' => 'sa_el_unfold',
    'name' => 'Unfold',
    'class' => '\SA_EL_ADDONS\Elements\Unfold\Unfold',
    'dependency' => [
        'css' => [
            'Unfold.css' => SA_EL_ADDONS_PATH . 'Elements/Unfold/assets/index.min.css',
        ],
        'js' => [
            'Unfold.js' => SA_EL_ADDONS_PATH . 'Elements/Unfold/assets/index.min.js',
        ],
    ],
    'category' => 'Dynamic Contents',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
