<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'      => 'Admin',
            'email'     => 'admin@app.com',
            'password'  => bcrypt('123456'),
            'is_admin'  => true
        ]);
    }
}
