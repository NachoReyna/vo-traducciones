<?php

return [
    'get_name' => 'sa_el_weform',
    'name' => 'WeForm',
    'class' => '\SA_EL_ADDONS\Elements\WeForm\WeForm',
    'dependency' => [
        'css' => [
            'WeForm.css' => SA_EL_ADDONS_PATH . 'Elements/WeForm/assets/index.min.css',
        ]
    ],
    'category' => 'Form Elements',
    'Premium' => TRUE,
    'condition' => '',
//    'Control' => [
//        'sa-el-google-map-api' => [
//            'name'=> 'GOOGLE API',
//            'type' => 'text',
//            'default' => '',
//        ]
//    ],
    'API' => ''
];
