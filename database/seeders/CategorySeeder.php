<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tables = [];

        $categoryId = 1;

        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Шини', 'slug' => 'shini', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Шины', 'slug' => 'shiny', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Диски', 'slug' => 'dysky', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Диски', 'slug' => 'diski', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Літні шини', 'slug' => 'litni', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Летние шины', 'slug' => 'letnie', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Зимові шини', 'slug' => 'zymovi', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Зимние шины', 'slug' => 'zimnie', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Всесезонні шини', 'slug' => 'vsesezonni', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Внесезонные шины', 'slug' => 'vnesezonnye', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 2, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Диски литі', 'slug' => 'lyti', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Диски литые', 'slug' => 'litye', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 2, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Диски сталеві', 'slug' => 'stalevi', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Диски стальные', 'slug' => 'stalnye', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 3, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Літні шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Летние шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 4, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Зимові шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Зимние шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 5, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Всесезонні шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Вcесезонные шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];


        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 4, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Новини', 'slug' => 'novini', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Новости', 'slug' => 'novosti', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 4, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Контакти', 'slug' => 'kontakti', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Контакты', 'slug' => 'kontakty', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 4, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Акції', 'slug' => 'akciyi', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Акции', 'slug' => 'akcii', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 0, 'template_id' => 4, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Як це працює', 'slug' => 'yak-ce-pracyuye', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Как это работает', 'slug' => 'kak-eto-rabotaet', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 13, 'template_id' => 5, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Новини 1', 'slug' => 'novini-1', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Новости 1', 'slug' => 'novosti-1', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 13, 'template_id' => 5, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Новини 2', 'slug' => 'novini-2', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Новости 2', 'slug' => 'novosti-2', 'language' => 'ru'],]];
        $tables[] = ['categories' => ['parent_id' => 13, 'template_id' => 5, 'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'category_contents' => ['ua' => ['category_id' => $categoryId, 'title' => 'Новини 3', 'slug' => 'novini-3', 'language' => 'ua'], 'ru' => ['category_id' => $categoryId++, 'title' => 'Новости 3', 'slug' => 'novosti-3', 'language' => 'ru'],]];


        foreach ($tables as $table){
            foreach ($table as $nameTable => $dataTable) {
                DB::table('tbl_' . $nameTable)->insert($dataTable);
            }
        }

    }
}
