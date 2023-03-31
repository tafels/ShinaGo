<?php

namespace App\Http\Controllers;


class RouteController extends BaseController
{
    /**
     * RouteController construct
     */
    public function __construct()
    {
    }

    public function __invoke()
    {
        /** @var CatalogController $controller */
        $controller = app(CatalogController::class);
        $catalog = $controller->init();

        if($catalog){
            return $catalog;
        }

        /** @var PostController $controller */
        $controller = app(PostController::class);
        $post = $controller->init();

        if($post){
            return $post;
        }

        abort(404);

    }


}
