<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@123.com',
            'password' => '$2y$10$NKa5J5Akxtn7IgerIASKP.68Zp9WGVwb/wm0hW/oHkDfOPB70n5mi'
        ]);
    }
}
