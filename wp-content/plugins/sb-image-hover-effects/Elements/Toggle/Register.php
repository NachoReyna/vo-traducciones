<?php

return [
    'get_name' => 'sa-el-toggle',
    'name' => 'Content Toggle',
    'class' => '\SA_EL_ADDONS\Elements\Toggle\Toggle',
    'dependency' => [
        'css' => [
            'Toggle.css' => SA_EL_ADDONS_PATH . 'Elements/Toggle/assets/index.min.css',
        ],
        'js' => [
            'Toggle.js' => SA_EL_ADDONS_PATH . 'Elements/Toggle/assets/index.min.js',
        ],
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
