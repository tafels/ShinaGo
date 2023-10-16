<?php

namespace App\Services;

use App\Models\Menu;

class MenuService extends BaseService
{
    public function getMenuId()
    {

    }

    public function getDataMenu (Menu $menu): array
    {
        $childMenu = [];

        /** @var Menu $item */
        if(count($menu->getChild()) && $menu['is_main'] = true) {
            foreach ($menu->getChild() as $item) {
                if($menu->getId() == $item->getId()){
                    continue;
                }
                $childMenu[] = $this->getDataMenu($item);
            }
        }

        return [
            'id' => $menu->getId(),
            'title' => $menu->getMenuLanguage->getTitle(),
            'childMenu' => $childMenu,
            'url' => CategoryService::getCategoryUrlById($menu->getCategoryId()),
        ];
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
            if(is_null($value->getParentId())){
                return $this->getDataMenu($value);
            }
        })->filter();

        return $menu;
    }
}
