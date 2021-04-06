<?php

return [
    'get_name' => 'sa_el_step_flow',
    'name' => 'Step_Flow',
    'class' => '\SA_EL_ADDONS\Elements\Step_Flow\Step_Flow',
    'dependency' => [
        'css' => [
            'Step_Flow.css' => SA_EL_ADDONS_PATH . 'Elements/Step_Flow/assets/index.min.css',
        ],
    ],
    'category' => 'Content Elements',
    'Premium' => FALSE,
    'condition' => '',
    'API' => ''
];
