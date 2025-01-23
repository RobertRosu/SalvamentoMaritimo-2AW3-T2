<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\CrewMember;
use App\Models\RescuedPerson;
use App\Models\Rescue;
use App\Models\Travel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::create([
            'name'=>'Jon Zabala',
            'email'=>'jon@gmail.com',
            'email_verified_at' => now(),
            'password'=> Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole('Admin');
        User::create([
            'name'=>'Robert Rosu',
            'email'=>'robert@gmail.com',
            'email_verified_at' => now(),
            'password'=> Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole('Admin');
        User::create([
            'name'=>'Ander Patino',
            'email'=>'ander@gmail.com',
            'email_verified_at' => now(),
            'password'=> Hash::make('password'),
            'remember_token' => Str::random(10)
        ])->assignRole('Admin');

        User::factory(22)->create()->each(function ($user) {
            $user->assignRole('Viewer');
        });


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
