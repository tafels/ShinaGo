<?php

namespace App\Services;

use App\Models\Menu;

class MenuService extends BaseService
{
    public function getDataMenu(Menu $menu): array
    {
        $childMenu = [];

        /** @var Menu $item */
        $child = $menu->getChild();

        if (count($child)) {
            foreach ($child as $item) {
                if ($menu->getId() == $item->getId()) {
                    continue;
                }
                $childMenu[] = $this->getDataMenu($item);
            }
        }

        return [
            'id' => $menu->getId(),
            'title' => $menu->getMenuLanguage()->getTitle(),
            'childMenu' => $childMenu,
            'url' => CategoryService::getFullUrlCategory($menu->getCategory()),
        ];
    }

    public function getMenuType($type, $hierarchy = false)
    {
        $hierarchy = true;

        /** @var Menu $menu */
        $menu = Menu::where('published', true)
            ->where('menu_type', $type)->get();

        $menu = collect($menu)->map(function ($value, $key) {
            if (is_null($value->getParentId())) {
                return $this->getDataMenu($value);
            }
        })->filter();

        return $menu;
    }
}
