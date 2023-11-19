<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'youssef',
            'email' => 'youssefachchiraj@gmail.com',
            'password' => bcrypt("yousseftest")
        ]);
        User::factory(19)->create();

        Category::factory()->create(['name' => 'category 1']);
        Category::factory()->create(['name' => 'category 2']);
        Category::factory()->create(['name' => 'category 3']);
        Category::factory()->create(['name' => 'category 4']);


        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);

        Idea::factory(100)->create();

        // generate an unique couple of user_id and idea_id

        foreach(range(1, 20) as $user_id){
            foreach(range(1, 100) as $idea_id){
                if($idea_id % 2 === 0 )
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
            }
        }
    }
}
