<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\BaseServiceInterface;

class PostController extends Controller
{
    /**
     * @var BaseServiceInterface
     */
    protected $service;

    /**
     * PostController constructor.
     * @param BaseServiceInterface $service
     */
    public function __construct(BaseServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listAction(Request $request)
    {
        $objects = $this->service->findAll();

        var_dump($objects); die;

        return view('post.index', ['posts' => $objects]);
    }
}
