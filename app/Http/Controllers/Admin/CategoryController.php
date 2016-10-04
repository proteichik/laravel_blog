<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Http\Controllers\Base\BaseController;
use App\Model\BaseEntityInterface;

class CategoryController extends BaseController
{
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    protected function getConfig($key, $default = null)
    {
        return config('blog.back.' . $key, $default);
    }

    /**
     * @return array
     */
    protected function defineViews()
    {
        return [
            'list' => 'admin.category.list',
            'create' => 'admin.category.create',
        ];
    }

    /**
     * @return BaseEntityInterface
     */
    protected function getEntity()
    {
        return new Category();
    }


}