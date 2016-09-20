<?php

use Illuminate\Database\Seeder;

use App\Widget;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Widget::class, 100)->create()->each(function ($widget) {
            //$user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
