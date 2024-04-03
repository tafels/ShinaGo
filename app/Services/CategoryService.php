<?php

namespace App\Services;

use App\Models\Category;
use App\Facades\UrlHelper;
use App\Models\CategoryContent;
use App\Models\Template;


class CategoryService extends BaseService
{
    const DEFAULT = 'asc';
    const SORT = [
        'asc',
        'desc',
    ];

    /**
     * @return array
     */
    public function initCategory()
    {
        $segments = UrlHelperService::excludeSegmentLocale();
        $Category = app(Category::class);
        $categoryId = 0;

        for ($i = 0; $i < count($segments); $i++) {
            $categoryId = UrlHelper::searchSlugSegments($Category, $categoryId, $segments[$i]);
            if (!$categoryId) break;
        }

        return $this->findView($categoryId);
    }

    public function getFullUrlCategory(Category $category)
    {
        $urlCategory = collect([]);

        /** @var CategoryContent $content */
        $content = $category->getContentLocale();
        $urlCategory->push($content->getSlug());

        do {
            /** @var Category $parentCategory */
            $parentCategory = $category->getParentCategory();
            if ($parentCategory) {
                $category = $parentCategory;

                /** @var CategoryContent $content */
                $content = $parentCategory->getContentLocale();
                $urlCategory->push($content->getSlug());
            }
        } while ($parentCategory);

        $urlCategory = $urlCategory->sortKeysDesc()->implode('/');
        return UrlHelperService::routeUrl('initCategory', ['category' => $urlCategory], null, false);
    }

    public function findView($categoryId)
    {
        /** @var Template $template */
        $template = Category::find($categoryId)->getTemplate;

        return [
            'categoryId' => $categoryId,
            'template' => 'category.' . $template->getName(),
            'parameters' => $template->getParams()
        ];
    }
}
