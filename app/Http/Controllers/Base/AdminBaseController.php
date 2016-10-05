<?php

namespace App\Http\Controllers\Base;

abstract class AdminBaseController extends BaseController
{
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    protected function getConfig($key, $default = null)
    {
        return config('blog.back.' . get_class($this) . '.' . $key, $default);
    }

}