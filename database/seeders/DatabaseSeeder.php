<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Exercice;
use App\Models\Language;
use App\Models\Module;
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
            'name' => 'admin',
            'email' => 'youssefachchiraj@gmail.com',
            'password' => bcrypt("yousseftest")
        ]);
        User::factory()->create([
            'name' => 'tester',
            'email' => 'tester@email.com',
            'password' => bcrypt("testeraccount")
        ]);
        User::factory(18)->create();

        Language::factory()->create(['name' => 'javascript']);
        Language::factory()->create(['name' => 'php']);
        Language::factory()->create(['name' => 'sql']);
        Language::factory()->create(['name' => 'plsql']);
        Language::factory()->create(['name' => 'java']);
        Language::factory()->create(['name' => 'bash']);


        Module::factory()->create(['name' => 'DATABASE']);
        Module::factory()->create(['name' => 'JAVA OOP']);
        Module::factory()->create(['name' => 'WEB']);
        Module::factory()->create(['name' => 'SCRIPT BASH']);

        Exercice::factory(100)->create();

        // generate an unique couple of user_id and idea_id

        foreach(range(1, 20) as $user_id){
            foreach(range(1, 100) as $exercice_id){
                if($exercice_id % 2 === 0 )
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'exercice_id' => $exercice_id
                    ]);
            }
        }

        // generate comments for our ideas
        foreach(Exercice::all() as $exercice){
            Comment::factory(5)->create(['exercice_id' => $exercice->id]);
        }
    }
}
