<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();
        DB::table('handles')->truncate();
        DB::table('attachments')->truncate();
        DB::table('params')->truncate();

        $this->call(PageSeeds::class);
        $this->call(MenuSeeds::class);
    }
}
