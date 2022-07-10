<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
         
       $user =  User::factory()->create([
            'name' => 'John Doe'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
        

        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        // $user = User::factory()->create();
    
        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);
        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);
        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);
       

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title'=>'My Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem Ipsom',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. quam, quos!'
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title'=>'My Work Post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => 'Lorem Ipsom',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. quam, quos!'
        // ]);
    }
}
