<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Http\Controllers\Base\AdminBaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Model\BaseEntityInterface;

class CategoryController extends AdminBaseController
{
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

    /**
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StoreCategoryRequest $request)
    {
        $category = $this->getEntity();
        $category->hydrate($request->escapeInput());

        $this->objectManager->save($category);

        return redirect()->route('admin.categories');
    }


}