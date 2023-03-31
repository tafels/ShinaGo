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
        $columns[] = ['name' => 'catalog_rims', 'params' => '{"type":"catalog_rims"}'];
        $columns[] = ['name' => 'catalog_tires', 'params' => '{"type":"catalog_tires"}'];
        $columns[] = ['name' => 'posts', 'params' => '{"type":"posts"}'];
        $columns[] = ['name' => 'post', 'params' => '{"type":"post"}'];

        foreach ($columns as $colum) {
            DB::table((new Template())->getTable())->insert($colum);
        }

    }
}
