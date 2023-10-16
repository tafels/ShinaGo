<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [];

        $menuId = 1;

        $tables[] = ['menu' => ['category_id' => 1, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Шини', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Шины', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['category_id' => 2, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Диски', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Диски', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['parent_id' => 1, 'category_id' => 3, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Літні', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Летние', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['parent_id' => 1, 'category_id' => 4, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Зимові', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Зимние', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['parent_id' => 1, 'category_id' => 5, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Всесезонні', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Внесезонные', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['parent_id' => 2, 'category_id' => 6, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Литі', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Литые', 'language' => 'ru'],]];
        $tables[] = ['menu' => ['parent_id' => 2, 'category_id' => 7, 'menu_type' => 'header', 'params' => '{}'], 'menu_languages' => ['ua' => ['menu_id' => $menuId, 'title' => 'Сталеві', 'language' => 'ua'], 'ru' => ['menu_id' => $menuId++, 'title' => 'Стальные', 'language' => 'ru'],]];


        foreach ($tables as $table){
            foreach ($table as $nameTable => $dataTable) {
                DB::table('tbl_' . $nameTable)->insert($dataTable);
            }
        }
    }
}
