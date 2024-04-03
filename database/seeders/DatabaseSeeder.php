<?php

namespace Database\Seeders;

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
        $this->call(TemplateSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CharacteristicSeeder::class);
        $this->call(CharacteristicValueSeeder::class);
        $this->call(CharacteristicValueLanguageSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
