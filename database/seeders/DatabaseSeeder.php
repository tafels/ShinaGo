<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Template;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CatalogSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CharacteristicSeeder::class);
        $this->call(CharacteristicValueSeeder::class);
    }
}
