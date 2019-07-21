<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\Category::class,10)->create();
        factory(App\Post::class, 10)->create();
    }
}
