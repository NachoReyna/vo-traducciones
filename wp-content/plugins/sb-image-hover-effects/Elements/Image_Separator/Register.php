<?php

return [
    'get_name' => 'sa_el_image_separator',
    'name' => 'Image_Separator',
    'class' => '\SA_EL_ADDONS\Elements\Image_Separator\Image_Separator',
    'dependency' => [
        'css' => [
            'Image_Separator.css' => SA_EL_ADDONS_PATH . 'Elements/Image_Separator/assets/index.min.css',
        ],
    ],
    'category' => 'Image Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
