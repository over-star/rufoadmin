<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menus;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = Menus::firstOrNew([
            'slug' => '分类-1',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'       => '分类 1',
            ])->save();
        }

        $category = Menus::firstOrNew([
            'slug' => '分类-2',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'       => '分类 2',
            ])->save();
        }
    }
}
