<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name' => 'Super Admin',
            'email' => 'masterionic@gmail.com',
            'username' => 'superadmin',
            'password' => bcrypt('admin'),
            'role' => 'super'
        ]);
    }
}
