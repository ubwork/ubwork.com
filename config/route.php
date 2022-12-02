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
            ],
            'filter' => [
                'title' => "Tìm CV",
                'route' => 'company.filter',
                'icon'  => 'la la-search',
            ],
            'image-paper' => [
                'title' => "Giấy phép kinh doanh",
                'route' => 'company.image-paper',
                'icon'  => 'la la-file',
            ],
            'view-open-cv' => [
                'title' => "Quản lý CV",
                'route' => 'company.viewOpenCv',
                'icon'  => 'la la-home',
            ],
            'history-payment' => [
                'title' => "Lịch sử giao dịch",
                'route' => 'company.historyPayment',
                'icon'  => 'la la-history',
            ]
        ]
    ]
];