<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tables = [];

        $catalogId = 1;

        $tables[] = ['catalogs' => ['parent_id' => 0, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Шини', 'slug' => 'shyny', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Шини', 'slug' => 'shini', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 0, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Диски', 'slug' => 'dysky', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Диски', 'slug' => 'diski', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Літні шини', 'slug' => 'litni', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Летние шини', 'slug' => 'letnie', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Зимові шини', 'slug' => 'zymovi', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Зимние шини', 'slug' => 'zimnie', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Всесезонні шини', 'slug' => 'vsesezonni', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Внесезонные шини', 'slug' => 'vnesezonnye', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 2, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Диски литі', 'slug' => 'lyti', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Диски литые', 'slug' => 'litye', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 2, 'template_id' => 3,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Диски сталеві', 'slug' => 'stalevi', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Диски стальные', 'slug' => 'stalnye', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 1, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 3, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Літні шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Летние шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 4, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Зимові шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Зимние шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];
        $tables[] = ['catalogs' => ['parent_id' => 5, 'template_id' => 2,'params' => '{}', 'created_at' => now(), 'updated_at' => now()], 'catalog_contents' => ['ua' => ['catalog_id' => $catalogId, 'title' => 'Всесезонні шини Мішелин', 'slug' => 'michelin', 'language' => 'ua'], 'ru' => ['catalog_id' => $catalogId++, 'title' => 'Вcесезонные шини Мишелин', 'slug' => 'michelin', 'language' => 'ru'],]];

        foreach ($tables as $table){
            foreach ($table as $nameTable => $dataTable) {
                DB::table('tbl_' . $nameTable)->insert($dataTable);
            }
        }

    }
}
