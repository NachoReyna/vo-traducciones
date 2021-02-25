<?php

return [
    'get_name' => 'sa_el_single_post',
    'name' => 'Single_Post',
    'class' => '\SA_EL_ADDONS\Elements\Single_Post\Single_Post',
    'dependency' => [
        'css' => [
            'Single_Post.css' => SA_EL_ADDONS_PATH . 'Elements/Single_Post/assets/index.min.css',
        ],
    ],
    'category' => 'Post Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];