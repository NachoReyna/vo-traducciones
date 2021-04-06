<?php

return [
    'get_name' => 'sa-el-testimonial-slider',
    'name' => 'Testimonial_Slider',
    'class' => '\SA_EL_ADDONS\Elements\Testimonial_Slider\Testimonial_Slider',
    'dependency' => [
        'css' => [
            'Testimonial_Slider.css' => SA_EL_ADDONS_PATH . 'Elements/Testimonial_Slider/assets/index.min.css',
        ],
        'js' => [
            'Testimonial_Slider.js' => SA_EL_ADDONS_PATH . 'Elements/Testimonial_Slider/assets/index.min.js',
        ],
    ],
    'category' => 'Carousel & Slider',
    'Premium' => TRUE,
    'condition' => '',
    'API' => ''
];
