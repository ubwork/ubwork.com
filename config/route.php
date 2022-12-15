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
            'filter' => [
                'title' => "Tìm CV",
                'route' => 'company.filter',
                'icon'  => 'la la-search',
            ],
            'manage-cv' => [
                'title' => "Quản lý CV",
                'route' => 'company.manageCV',
                'icon'  => 'la la-newspaper-o',
            ],
            'history-payment' => [
                'title' => "Lịch sử giao dịch",
                'route' => 'company.historyPayment',
                'icon'  => 'la la-history',
            ],
            'profile' => [
                'title' => "Sửa thông tin",
                'route' => 'company.profile',
                'icon'  => 'la la-user-tie',
            ],
            'package' => [
                'title' => "Gói cước",
                'route' => 'company.listPackage',
                'icon'  => 'la la-bitcoin',
            ],
            'image-paper' => [
                'title' => "Giấy phép kinh doanh",
                'route' => 'company.image-paper',
                'icon'  => 'la la-file',
            ]
        ]
    ]
];