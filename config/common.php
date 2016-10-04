<?php

return [
    'avatar_path' => 'uploads/images',
    'avatar_default' => 'default.jpg',
    'category_per_page' => '3',
    'user_per_page' => '4',
    'product_per_page' => '2',
    'order_per_page' => '3',
    'default_rate_average' => '0',
    'default_rate_count' => '0',
    'default_view_count' => '0',
    'step_of_price' => '0.01',
    'min_price_product' => '0',
    'min_quantity_product' => '1',
    'product' => [
        'status' => [
            'active' => 1,
            'disable' => 0,
        ],
    ],
    'order' => [
        'status' => [
            'paid' => 1,
            'unpaid' => 2,
            'paypal' => 3,
            'destroy' => 0,
        ],
    ],
    'item' => [
        'status' => [
            'paid' => 1,
            'unpaid' => 2,
            'paypal' => 3,
            'destroy' => 0,
        ],
    ],
    'filter' => [
        'all' => 1,
        'best_price' => 2,
        'best_selling' => 3,
    ],
    'path_cloud_avatar' => 'foods/avatar/',
    'path_cloud_product' => 'foods/product/',
    'default_product_image' => 'http://trinhthien.com.vn/images/commont/noimage.png',
];
