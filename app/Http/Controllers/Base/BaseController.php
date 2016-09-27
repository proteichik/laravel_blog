<?php

namespace App\Http\Controllers\Base;

use App\Model\BaseServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

abstract class BaseController extends Controller
{
    /**
     * @var BaseServiceInterface
     */
    protected $service;

    /**
     * @var array
     */
    protected $views = array();

    /**
     * PostController constructor.
     * @param BaseServiceInterface $service
     */
    public function __construct(BaseServiceInterface $service)
    {
        $this->service = $service;
        $this->views = $this->defineViews();
    }
    
    public function listAction(Request $request)
    {
        $itemsPerPage = $this->getConfig('item_per_page');

        if ($request->has('sort')) {
            $query = $this->service->createQueryBuilder('q')
                ->orderBy($request->input('sort'), $request->input('direction', 'asc'))
                ->getQuery();

            $objects = $this->service->paginate($query, $itemsPerPage);
            
        } else {
            $objects = $this->service->paginateAll($itemsPerPage);
        }



        return view($this->getView('list'), ['objects' => $objects]);
    }

    public function showAction(Request $request, $id)
    {
        $object = $this->service->find($id);

        return view($this->getView('show'), ['object' => $object]);
    }

    protected function defineViews()
    {
        return [
            
        ];
    }
    
    abstract protected function getConfig($key, $default = null);
    
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
