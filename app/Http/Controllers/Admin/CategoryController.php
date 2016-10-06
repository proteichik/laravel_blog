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
            'update' => 'admin.category.update',
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

    /**
     * @param StoreCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(StoreCategoryRequest $request, $id)
    {
        $category = $this->objectManager->findOrThrowsException($id);
        $category->hydrate($request->escapeInput());

        $this->objectManager->save($category);

        return redirect()->route('admin.categories');
    }

}