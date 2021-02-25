<?php

return [
    'get_name' => 'sa_el_feature_list',
    'name' => 'Feature_List',
    'class' => '\SA_EL_ADDONS\Elements\Feature_List\Feature_List',
    'dependency' => [
        'css' => [
           'feature_list.css' => SA_EL_ADDONS_PATH . 'Elements/Feature_List/assets/index.min.css',
        ]
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
