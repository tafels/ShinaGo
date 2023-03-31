<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class PostController extends RouteController
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->postService = app(PostService::class);
    }

    /**
     * @param Request $request
     * @return object|false
     */
    public function init()
    {

        $this->postService->initRoutePost();
        if(!$this->postService->getPostId()){
            return false;
        }
        $this->postService->findView();
//        $this->catalogService->getContent();
//        $this->catalogService->getLanguage();

        // dump($this->catalogService);



        return View::make($this->postService->getView(), $this->postService->getParameters());

    }
}
