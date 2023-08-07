<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = [];

        $columns[] = ['slug' => 'w', 'short_name' => 'w', 'is_main' => true, 'params' => '{}', 'group_id' => 1, 'multiple' => false, 'ordering_main' => 1, 'ordering_slug' => 3];
        $columns[] = ['slug' => 'h', 'short_name' => 'h', 'is_main' => true, 'params' => '{}', 'group_id' => 1, 'multiple' => false, 'ordering_main' => 2, 'ordering_slug' => 4,];
        $columns[] = ['slug' => 'r', 'short_name' => 'r', 'is_main' => true, 'params' => '{}', 'group_id' => 1, 'multiple' => false, 'ordering_main' => 3, 'ordering_slug' => 5];
        $columns[] = ['slug' => 'season', 'short_name' => 's', 'is_main' => true, 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_main' => 4, 'ordering_slug' => 1];
        $columns[] = ['slug' => 'brand', 'short_name' => 'b', 'is_main' => true, 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_main' => 5, 'ordering_slug' => 2];
        $columns[] = ['slug' => 'vehicle', 'short_name' => 'ta', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'ship', 'short_name' => 'sh', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'price', 'short_name' => 'pr', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'tread', 'short_name' => 'tr', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'speed_index', 'short_name' => 'is', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'load_index', 'short_name' => 'in', 'params' => '{}', 'group_id' => 1, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'r', 'short_name' => 'd-r', 'is_main' => true, 'params' => '{}', 'group_id' => 2, 'multiple' => false, 'ordering_main' => 1, 'ordering_slug' => 2];
        $columns[] = ['slug' => 'w', 'short_name' => 'd-w', 'is_main' => true, 'params' => '{}', 'group_id' => 2, 'multiple' => false, 'ordering_main' => 2, 'ordering_slug' => 1];
        $columns[] = ['slug' => 'pcd', 'short_name' => 'd-pcd', 'is_main' => true, 'params' => '{}', 'group_id' => 2, 'multiple' => false, 'ordering_main' => 3, 'ordering_slug' => 3];
        $columns[] = ['slug' => 'dia', 'short_name' => 'd-dia', 'is_main' => true, 'params' => '{}', 'group_id' => 2, 'multiple' => false, 'ordering_main' => 4, 'ordering_slug' => 5];
        $columns[] = ['slug' => 'et', 'short_name' => 'd-et', 'is_main' => true, 'params' => '{}', 'group_id' => 2, 'multiple' => false, 'ordering_main' => 5, 'ordering_slug' => 6];
        $columns[] = ['slug' => 'disk_type', 'short_name' => 'd-td', 'params' => '{}', 'group_id' => 2, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'brand', 'short_name' => 'd-b', 'params' => '{}', 'group_id' => 2, 'multiple' => true, 'ordering_slug' => 0];
        $columns[] = ['slug' => 'price', 'short_name' => 'd-pr', 'params' => '{}', 'group_id' => 2, 'multiple' => true, 'ordering_slug' => 0];

            foreach ($columns as $colum => $dataTable) {
                DB::table((new Characteristic())->getTable())->insert($dataTable);
            }

    }
}
