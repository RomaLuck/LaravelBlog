<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = [
            'Technology',
            'Business',
            'Travel',
            'Politics',
            'Opinion'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        User::factory(5)->has(Post::factory()->count(5))->create();

        $roles =['Admin','Moderator'];
        foreach ($roles as $role){
            Role::create([
                'name'=>$role,
                'slug'=>Str::slug($role)
            ]);
        }

    }
}
