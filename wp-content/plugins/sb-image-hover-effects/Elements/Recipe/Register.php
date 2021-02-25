<?php

return [
    'get_name' => 'sa-el-recipe',
    'name' => 'Recipe',
    'class' => '\SA_EL_ADDONS\Elements\Recipe\Recipe',
    'dependency' => [
        'css' => [
            'Recipe' => SA_EL_ADDONS_PATH . 'Elements/Recipe/assets/index.min.css',
        ],
    ],
    'category' => 'Creative Elements',
    'Premium' => TRUE,
    'condition' => '',
    'API' => ''
];