<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreBlogPostRequest;
use App\Model\BaseServiceInterface;
use Illuminate\Http\Request;
use App;
use App\Entity\Post;

class PostController extends BaseController
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
        ];
    }

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm(Request $request)
    {
        
        $categories = $this->categoryService->getSelectList();
        
        return view($this->getView('create'), ['categories' => $categories]);
    }

    /**
     * @param StoreBlogPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAction(StoreBlogPostRequest $request)
    {
        $category = $this->categoryService->find($request->input('category', null));
        
        if (!$category) {
            throw new \RuntimeException(sprintf(
                'Category with id %s not fount'), $request->input('category', null));
        }
        
        $post = new Post();
        $post->hydrate($request->all());
        $post->setCategory($category);
        $this->objectManager->save($post);
        
        return redirect()->route('admin.posts');
    }
}