<?php

return [
    'get_name' => 'sa_el_accordion',
    'name' => 'Accordion',
    'class' => '\SA_EL_ADDONS\Elements\Accordion\Accordion',
    'dependency' => [
        'css' => [
          'accordion.css' =>  SA_EL_ADDONS_PATH . 'Elements/Accordion/assets/index.min.css',
        ],
        'js' => [
          'accordion.js' =>  SA_EL_ADDONS_PATH . 'Elements/Accordion/assets/index.min.js',
        ],
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
