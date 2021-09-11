<?php
return
    [
        [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Account Manager',
            'route' => 'account.index',
            'icon' => 'fa-user',
            'item' =>
            [
                [
                    'label' => 'List Account',
                    'route' => 'account.index',
                ]
            ]

        ],   [
            'label' => 'Banner Manager',
            'route' => 'banner.index',
            'icon' => 'fa-image',
            'item' =>
            [
                [
                    'label' => 'List Banner',
                    'route' => 'banner.index',
                ],
                [
                    'label' => 'Add Banner',
                    'route' => 'banner.create',
                ]
            ]

        ],
        [
            'label' => 'Blog Manager',
            'route' => 'blog.index',
            'icon' => 'fa-blog',
            'item' =>
            [
                [
                    'label' => 'List Blog',
                    'route' => 'blog.index',
                ],
                [
                    'label' => 'Add Blog',
                    'route' => 'blog.create',
                ]
            ]
        ],
        [
            'label' => 'Category Manager',
            'route' => 'category.index',
            'icon' => 'fa-list-alt',
            'item' =>
            [
                [
                    'label' => 'List Category',
                    'route' => 'category.index',
                ],
                [
                    'label' => 'Add Category',
                    'route' => 'category.create',
                ]
            ]

        ],
        [
            'label' => 'Order Manager',
            'route' => 'order.index',
            'icon' => 'fa-cart-arrow-down',
            'item' =>
            [
                [
                    'label' => 'List Order',
                    'route' => 'order.index',
                ],
                [
                    'label' => 'Statices Order',
                    'route' => 'orderdetail.index',
                ]
            ]

        ], [
            'label' => 'Product Manager',
            'route' => 'order.index',
            'icon' => 'fa-cart-arrow-down',
            'item' =>
            [
                [
                    'label' => 'List Product',
                    'route' => 'product.index',
                ],
                [
                    'label' => 'Add Product',
                    'route' => 'product.create',
                ]
            ]

        ],
        [
            'label' => 'File Manager',
            'route' => 'admin.file',
            'icon' => 'fa-image',
        ]
    ]
?>