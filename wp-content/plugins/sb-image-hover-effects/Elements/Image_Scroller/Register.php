<?php

return [
    'get_name' => 'sa_el_img_scroller',
    'name' => 'Image_Scroller',
    'class' => '\SA_EL_ADDONS\Elements\Image_Scroller\Image_Scroller',
    'dependency' => [
        'css' => [
            'Image_Scroller.css' => SA_EL_ADDONS_PATH . 'Elements/Image_Scroller/assets/index.min.css',
        ],
        'js' => [
            'Image_Scroller.js' => SA_EL_ADDONS_PATH . 'Elements/Image_Scroller/assets/index.min.js',
        ]
    ],
    'category' => 'Image Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
