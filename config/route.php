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
            'profile' => [
                'title' => "Sửa thông tin",
                'route' => 'company.profile',
                'icon'  => 'la la-user-tie',
            ]
        ]
    ]
];