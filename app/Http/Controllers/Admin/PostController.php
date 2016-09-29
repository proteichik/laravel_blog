<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreBlogPostRequest;
use Illuminate\Http\Request;
use App;

class PostController extends BaseController
{
    protected function defineViews()
    {
        return [
            'list' => 'admin.post.list',
            'create' => 'admin.post.create',
        ];
    }

    protected function getConfig($key, $default = null)
    {
       return config('blog.back.' . $key, $default);
    }

    public function showCreateForm(Request $request)
    {
        /** @var App\Model\BaseServiceInterface $categoryService */
        $categoryService = app('CategoryService');
        
        $categories = $categoryService->getArrayList('name');
        
        return view($this->getView('create'), ['categories' => $categories]);
    }


    public function createAction(StoreBlogPostRequest $request)
    {
        var_dump($request->all());
    }
}