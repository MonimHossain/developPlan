<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $top_menu= 'menu';

        $allData = \App\Menu::get();
        if(count($allData)<1)
        {
            $top_menu = new \App\Menu([
                'name' => $top_menu,
                'link'     => 'Sohel Bijay',
                'parent_menu'    => 0,
                'status'     => '1',
                'created_by'     => '1',
            ]);
            $top_menu->save();
        }
        else {
            $firstRow = \App\Menu::find(1)->first();
            $firstRow->name = $top_menu;
            $firstRow->save();
        }

    }
}
