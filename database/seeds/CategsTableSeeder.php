<?php

use App\Categories;
use Illuminate\Database\Seeder;

class CategsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'brinquedos',
            'slug' => 'toy'
        ]);

        Categories::create([
            'name' => 'revistas',
            'slug' => 'paper'
        ]);

        Categories::create([
            'name' => 'acessórios',
            'slug' => 'clother'
        ]);
    }
}
