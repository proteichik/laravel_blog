<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\BaseController;

class CategoryController extends BaseController
{
    protected function getConfig($key, $default = null)
    {
        return config('blog.back.' . $key, $default);
    }

    protected function defineViews()
    {
        return [
            'list' => 'admin.category.list',
            'create' => 'admin.category.create',
        ];
    }


}