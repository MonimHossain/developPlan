<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_email= 'admin@adp.com';
        $super_admin_password=  bcrypt('123456');
        $allData = \App\User::get();
        if(count($allData)<1)
        {
            $admin = new \App\User([
                'name'     => 'Sohel Bijay',
                'email'    => $super_admin_email,
                'password' => $super_admin_password,
                'admin'     => '0',
                'user_group'     => '1',
                'parent_user'     => '0',
            ]);
            $admin->save();
        }
        else {
            $firstRow = \App\User::find(1)->first();
            $firstRow->email = $super_admin_email;
            $firstRow->save();
        }
    }
}

