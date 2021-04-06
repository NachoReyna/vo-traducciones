<?php

return [
    'get_name' => 'sa_el_video_box',
    'name' => 'Video_Box',
    'class' => '\SA_EL_ADDONS\Elements\Video_Box\Video_Box',
    'dependency' => [
        'css' => [
            'Video_Box.css' => SA_EL_ADDONS_PATH . 'Elements/Video_Box/assets/index.min.css',
        ],
        'js' => [
            'Video_Box.js' => SA_EL_ADDONS_PATH . 'Elements/Video_Box/assets/index.min.js',
        ],
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
