<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        /*User::create([
            'name'=>'HiraTsuki',
            'email'=>'kuroitsu@gmail.com',
            'password'=>bcrypt('12345')
        ]);
        
        User::create([
            'name'=>'OrenJingga',
            'email'=>'kurasaki@gmail.com',
            'password'=>bcrypt('12345')
        ]);*/
        
        User::factory(3)->create();

        Category::create([
            'name'=>'Programming',
            'slug'=>'programming'
        ]);

        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design'
        ]);

        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        Post::factory(20)->create();

    }
}
