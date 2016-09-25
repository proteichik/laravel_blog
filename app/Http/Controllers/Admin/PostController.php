<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Base\BaseController;

class PostController extends BaseController
{
    protected function setViews()
    {
        return [

        ];
    }

    protected function getConfig($key, $default = null)
    {
       return config('blog.back.' . $key, $default);
    }


}