<?php

namespace Database\Seeders;

use App\Models\Catalog;
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

        $columns[] = ['short_name' => 'w', 'slug' => 'w', 'params' => '{"ordering_main_filter": 1, "slug_ordering": 4}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'h', 'slug' => 'h', 'params' => '{"ordering_main_filter": 2, "slug_ordering": 5}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'r', 'slug' => 'r', 'params' => '{"ordering_main_filter": 3, "slug_ordering": 6}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 's', 'slug' => 'season', 'params' => '{"ordering_main_filter": 4, "slug_ordering": 1}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'b', 'slug' => 'brand', 'params' => '{"ordering_main_filter": 5, "slug_ordering": 3}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'ta','slug' => 'vehicle', 'params' => '{"slug_ordering": 2}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'sh','slug' => 'ship', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'pr','slug' => 'price', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'tr','slug' => 'tread', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'is','slug' => 'speed_index', 'params' => '{"slug_ordering": 7}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'in','slug' => 'load_index', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 1, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'd-r', 'slug' => 'r', 'params' => '{"ordering_main_filter": 1, "slug_ordering": 4}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'd-w', 'slug' => 'w', 'params' => '{"ordering_main_filter": 2, "slug_ordering": 3}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'd-pcd', 'slug' => 'pcd', 'params' => '{"ordering_main_filter": 3, "slug_ordering": 5}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'd-dia', 'slug' => 'dia', 'params' => '{"ordering_main_filter": 4, "slug_ordering": 7}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'd-et', 'slug' => 'et', 'params' => '{"ordering_main_filter": 5, "slug_ordering": 6}', 'is_main_filter' => true, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'radio'];
        $columns[] = ['short_name' => 'd-td','slug' => 'disk_type', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'd-b','slug' => 'brand', 'params' => '{"slug_ordering": 2}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'checkbox'];
        $columns[] = ['short_name' => 'd-pr','slug' => 'price', 'params' => '{"slug_ordering": 1}', 'is_main_filter' => false, 'is_filter' => true, 'group_id' => 2, 'type_input' => 'checkbox'];

            foreach ($columns as $colum => $dataTable) {
                DB::table((new Characteristic())->getTable())->insert($dataTable);
            }

    }
}
