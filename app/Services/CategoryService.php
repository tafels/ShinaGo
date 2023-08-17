<?php

namespace App\Services;

use App\Models\Category;
use App\Facades\UrlHelper;


class CategoryService extends BaseService
{
    const DEFAULT = 'asc';
    const SORT = [
        'asc',
        'desc',
    ];

    public $categoryId = 0;
    public $view;
    public $parameters = [];

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }


    /**
     * @param string $key
     * @param array|string $value
     * @return void
     */
    public function setParameters(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @param string $view
     */
    public function setView(string $view): void
    {
        $this->view = $view;
    }

    /**
     * @return bool
     */
    public function initCategory()
    {
        $segments = UrlHelperService::excludeSegmentLocale();
        $Category = app(Category::class);

        for ($i = 0; $i < count($segments); $i++) {
            $categoryId = UrlHelper::searchSlugSegments($Category, $this->getCategoryId(), $segments[$i]);
            if (!$categoryId) break;
            $this->setCategoryId($categoryId);
        }
    }

    public function getCategoryUrlById($categoryId)
    {
        $urlCategory = collect([]);

        $category = Category::find($categoryId)->getContent()->where('language', request()->getLocale())->first();
        $urlCategory->push($category['slug']);

        do {
            $parentCategory = Category::find($categoryId)->getParentCategory()->first();
            if ($parentCategory) {
                $categoryId = $parentCategory['id'];
                $content = $parentCategory->getContent()->where('language', request()->getLocale())->first();
                $urlCategory->push($content['slug']);
            }
        } while ($parentCategory);

        $urlCategory = $urlCategory->sortKeysDesc()->implode('/');
        return UrlHelperService::routeUrl('initCategory', ['category' => $urlCategory], null, false);
    }

    public function findView()
    {
        $template = Category::find($this->getCategoryId())->getTemplate;

        $this->setView('category.' . $template->name);
        $this->setParameters('template', json_decode($template->params));
    }


}
