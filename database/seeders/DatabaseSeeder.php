<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\CrewMember;
use App\Models\RescuedPerson;
use App\Models\Rescue;
use App\Models\Travel;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(22)->create();
        Doctor::factory(14)->create();

        CrewMember::factory(20)->create();
        $roles = CrewMember::select('rol')->distinct()->pluck('rol');
        foreach($roles as $role){
            CrewMember::factory(40)->create([
                "rol" => $role
            ]);
        }
        
        Travel::factory(18)->create();
        Rescue::factory(26)->create();
        RescuedPerson::factory(127)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
