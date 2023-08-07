<?php

namespace App\Http\Controllers;

use App\Facades\FilterService;
use App\Models\Characteristic;
use App\Services\CategoryService;
use App\Services\CharacteristicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends BaseController
{

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * CategoryController construct
     */
    public function __construct()
    {
        $this->categoryService = app(CategoryService::class);
    }

    /**
     * @param Request $request
     * @return object|false
     */
    public function __invoke()
    {
        $this->categoryService->initCategory();
        if(!$this->categoryService->getCategoryId()){
            abort(404);
        }

        FilterService::initCategoryFilter();

        $this->categoryService->findView();

        return View::make($this->categoryService->getView(), $this->categoryService->getParameters());

    }
}
