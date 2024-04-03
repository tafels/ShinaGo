<?php

namespace App\Http\Controllers;

use App\Services\FilterService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    private $categoryService;
    private $filterService;

    /**
     * @param CategoryService $categoryService
     * @param FilterService $filterService
     */
    public function __construct(CategoryService $categoryService, FilterService $filterService)
    {
        $this->categoryService = $categoryService;
        $this->filterService = $filterService;
    }

    /**
     * @param Request $request
     * @return object|false
     */
    public function initCategory()
    {
        $dataCategory = $this->categoryService->initCategory();
        $this->isErrorPage($dataCategory['categoryId']);
        $this->filterService->initCategoryFilter();

        return $this->renderView($dataCategory['template'], $dataCategory['parameters']);
    }
}
