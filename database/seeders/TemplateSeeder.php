<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = [];

        $columns[] = ['name' => 'index', 'params' => '{"type":"index"}'];
        $columns[] = ['name' => 'category_tires', 'params' => '{"type":"category_tires"}'];
        $columns[] = ['name' => 'category_rims', 'params' => '{"type":"category_rims"}'];
        $columns[] = ['name' => 'category_posts', 'params' => '{"type":"category_posts"}'];
        $columns[] = ['name' => 'category_post', 'params' => '{"type":"category_post"}'];

        foreach ($columns as $colum) {
            DB::table((new Template())->getTable())->insert($colum);
        }

    }
}
