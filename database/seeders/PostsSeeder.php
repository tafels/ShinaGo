<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [];

        $postId = 1;

        $tables[] = ['posts' => ['parent_id' => 0, 'template_id' => 4, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Новини', 'slug' => 'novini', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Новости', 'slug' => 'novosti', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 0, 'template_id' => 4, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Контакти', 'slug' => 'kontakti', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Контакты', 'slug' => 'kontakty', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 0, 'template_id' => 4, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Акції', 'slug' => 'akciyi', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Акции', 'slug' => 'akcii', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 0, 'template_id' => 4, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Як це працює', 'slug' => 'yak-ce-pracyuye', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Как это работает', 'slug' => 'kak-eto-rabotaet', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 1, 'template_id' => 5, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Новини 1', 'slug' => 'novini-1', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Новости 1', 'slug' => 'novosti-1', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 1, 'template_id' => 5, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Новини 2', 'slug' => 'novini-2', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Новости 2', 'slug' => 'novosti-2', 'language' => 'ru'],]];
        $tables[] = ['posts' => ['parent_id' => 1, 'template_id' => 5, 'params' => '[]', 'created_at' => now(), 'updated_at' => now()], 'post_contents' => ['ua' => ['post_id' => $postId, 'title' => 'Новини 3', 'slug' => 'novini-3', 'language' => 'ua'], 'ru' => ['post_id' => $postId++, 'title' => 'Новости 3', 'slug' => 'novosti-3', 'language' => 'ru'],]];

        foreach ($tables as $table){
            foreach ($table as $nameTable => $dataTable) {
                DB::table('tbl_' . $nameTable)->insert($dataTable);
            }
        }
    }
}
