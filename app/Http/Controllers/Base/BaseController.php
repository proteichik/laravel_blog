<?php

namespace App\Http\Controllers\Base;

use App\Model\BaseEntityInterface;
use App\Model\BaseServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

abstract class BaseController extends Controller
{
    /**
     * @var BaseServiceInterface
     */
    protected $objectManager;

    /**
     * @var array
     */
    protected $views = array();

    /**
     * PostController constructor.
     * @param BaseServiceInterface $objectManager
     */
    public function __construct(BaseServiceInterface $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->views = $this->defineViews();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listAction(Request $request)
    {
        $itemsPerPage = $this->getConfig('item_per_page');

        if ($request->has('sort')) {
            $query = $this->objectManager->createQueryBuilder('q')
                ->orderBy($request->input('sort'), $request->input('order', 'asc'))
                ->getQuery();

            $objects = $this->objectManager->paginate($query, $itemsPerPage);
        } else {
            $objects = $this->objectManager->paginateAll($itemsPerPage);
        }

        return view($this->getView('list'), ['objects' => $objects]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAction(Request $request, $id)
    {
        $object = $this->objectManager->findOrThrowsException($id);

        return view($this->getView('show'), [
            'object' => $object,
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm(Request $request)
    {
        return view($this->getView('create'), [
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
        
        return view($this->getView('update'), [
            'object' => $object,
            'route' => [
                $this->getConfig('form_routes.update'),
                $id,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $object = $this->objectManager->findOrThrowsException($id);

        try {
            $this->objectManager->remove($object);
        } catch (\Exception $ex) {
            return ($request->isXmlHttpRequest()) ? response()->json(['result' => $ex->getMessage()], 500)
                : redirect()->back()->withException($ex);
        }

        return ($request->isXmlHttpRequest()) ?
            response()->json(['result' => 'success'], 200) :
            redirect()->back();
    }

    /**
     * @return array
     */
    protected function defineViews()
    {
        return [
            
        ];
    }

    /**
     * @param $key
     * @param null $default
     * @return string
     */
    abstract protected function getConfig($key, $default = null);

    /**
     * @return BaseEntityInterface
     */
    abstract protected function getEntity();

    /**
     * @param $key
     * @return string
     */
    protected function getView($key)
    {
        if (!isset($this->views[$key])) {
            throw new \InvalidArgumentException(sprintf(
                'View for key %s not defined', $key
            ));
        }

        return $this->views[$key];
    }
}
