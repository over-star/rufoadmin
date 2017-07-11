<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menus;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Menus::firstOrCreate([
            'name' => 'admin',
        ]);
    }
}
