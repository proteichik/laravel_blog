<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreBlogPostRequest;

class PostController extends BaseController
{
    protected function defineViews()
    {
        return [
            'list' => 'admin.post.list',
        ];
    }

    protected function getConfig($key, $default = null)
    {
       return config('blog.back.' . $key, $default);
    }

    public function createAction(StoreBlogPostRequest $request)
    {
        
    }
}