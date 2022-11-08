<?php
return [
    'company' => [
        'sidebar'=>[
            'dashboard'=>[
                'title' => "Tổng quan",
                'route' => 'company.home',
                'icon'  => 'la la-home',
            ],
            'post' => [
                'title' => "Tin tuyển dụng",
                'route' => 'company.post.index',
                'icon'  => 'la la-paper-plane',
            ],
            // 'info' => [
            //     'route' => 'company.info.index',
            //     'icon'  => 'la la-paper-plane',
            // ]
        ]
    ]
];