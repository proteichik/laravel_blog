<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Base\AdminBaseController;
use App\Http\Requests\StoreBlogPostRequest;
use App\Model\BaseServiceInterface;
use Illuminate\Http\Request;
use App;
use App\Entity\Post;

class PostController extends AdminBaseController
{
    /**
     * @var App\Model\BaseServiceInterface
     */
    protected $categoryService;

    /**
     * PostController constructor.
     * @param BaseServiceInterface $service
     */
    public function __construct(BaseServiceInterface $service)
    {
        parent::__construct($service);
        
        $this->categoryService = app('CategoryService');
    }

    /**
     * @return array
     */
    protected function defineViews()
    {
        return [
            'list' => 'admin.post.list',
            'create' => 'admin.post.create',
            'update' => 'admin.post.update',
        ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm(Request $request)
    {
        $categories = $this->categoryService->getSelectList();
        
        return view($this->getView('create'), ['categories' => $categories, 
            'object' => $this->getEntity(),
            'route' => [
                $this->getConfig('form_routes.create'),
            ],
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateForm(Request $request, $id)
    {
        $object = $this->objectManager->findOrThrowsException($id);
        
        $categories = $this->categoryService->getSelectList();

        return view($this->getView('update'), [
            'categories' => $categories,
            'object' => $object,
            'route' => [
                $this->getConfig('form_routes.update'),
                $id,
            ],
        ]);
    }

    /**
     * @param StoreBlogPostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(StoreBlogPostRequest $request, $id)
    {
        /** @var Post $post */
        $post = $this->objectManager->findOrThrowsException($id, 'Post not found');
        $category = $this->categoryService->findOrThrowsException(
            $request->input('category', null), 'Category not found');
        
        $post->hydrate($request->escapeInput());
        $post->setCategory($category);
        $this->objectManager->save($post);

        return redirect()->route('admin.posts');
    }

    /**
     * @param StoreBlogPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StoreBlogPostRequest $request)
    {
        $category = $this->categoryService->findOrThrowsException(
            $request->input('category', null), 'Category not found');

        /** @var Post $post */ 
        $post = $this->getEntity();
        $post->hydrate($request->escapeInput());
        $post->setCategory($category);
        $this->objectManager->save($post);
        
        return redirect()->route('admin.posts');
    }

    /**
     * @return App\Model\BaseEntityInterface
     */
    protected function getEntity()
    {
        return new Post();
    }


}