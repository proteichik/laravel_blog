<?php

return [
    'back' => [
        \App\Http\Controllers\Admin\PostController::class => [
            'item_per_page' => 10,
            'form_routes' => [
                'create' => 'admin.posts.new.save',
                'update' => 'admin.posts.edit.save',
            ],
        ],
        \App\Http\Controllers\Admin\CategoryController::class => [
            'item_per_page' => 10,
            'form_routes' => [
                'create' => 'admin.categories.new.save',
                'update' => 'admin.posts.edit.save',
            ],
        ],
        
    ],
    'front' => [
        'item_per_page' => 10,
    ]
];