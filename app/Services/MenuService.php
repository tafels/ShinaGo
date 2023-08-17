<?php

namespace App\Services;

use App\Models\Menu;

class MenuService extends BaseService
{
    public function getMenuId()
    {

    }

    public function getMenuType($type, $hierarchy = false)
    {

        $hierarchy = true;

        $menu = Menu::where('published', true)
            ->where('menu_type', $type)
            ->with(['getMenuLanguage' => function ($q) {
                $q->where('language', request()->getLocale());
            }
            ])->get();


        $menu = collect($menu)->map(function ($value, $key) {
            return [
                'id' => $value->id,
                'title' => $value->getMenuLanguage->title,
                'categoryId' => $value->category_id,
                'parent_id' => $value->parent_id,
                'url' => CategoryService::getCategoryUrlById($value->category_id),
            ];
        })->all();

//        $menu = $menu->groupBy('parent_id');



//        $menu = $menu->keyBy('id');

//        dd($menu[6]['categoryId']);

        $category = CategoryService::getCategoryUrlById($menu[6]['categoryId']);



    }

    public function getMenuUrl ()
    {
        return '';
    }
}
