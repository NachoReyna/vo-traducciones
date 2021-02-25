<?php

return [
    'get_name' => 'sa_el_flip_carousel',
    'name' => 'Flip_Carousel',
    'class' => '\SA_EL_ADDONS\Elements\Flip_Carousel\Flip_Carousel',
    'dependency' => [
        'css' => [
            'flip_carousel.css' => SA_EL_ADDONS_PATH . 'assets/vendor/flipster/css/jquery.flipster.min.css',
        ],
        'js' => [
            'query.flipster.min.js' => SA_EL_ADDONS_PATH . 'assets/vendor/flipster/js/jquery.flipster.min.js',
            'flip_carousel.js' => SA_EL_ADDONS_PATH . 'Elements/Flip_Carousel/assets/index.min.js',
        ]
    ],
    'category' => 'Carousel & Slider',
    'Premium' => TRUE,
    'condition' => '',
    'API' => ''
];
