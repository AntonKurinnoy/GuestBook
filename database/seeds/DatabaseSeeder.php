<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'admin' => true
        ]);
        $this->call([
            UsersTableSeeder::class,
            CommentsTableSeeder::class,
        ]);
    }
}
