<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
            'name' => 'ir.Nikolas',
            'username' => 'niko',
            'email' => 'ir.Nikolas@gmail.com',
            'password' => bcrypt('12345')

        ]);

        //User::create([
            //'name' => 'Nabila Sayangku',
            //'username' => 'nabila',
            //'email' => 'nabila@gmail.com',
            //'password' => bcrypt('12345')

        //]);

        //User::create([
            //'name' => 'Bagong',
            //'username' => 'bagong',
            //'email' => 'Bagong@gmail.com',
            //'password' => bcrypt('12345')

        //]);



        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

       

        
    }
}
