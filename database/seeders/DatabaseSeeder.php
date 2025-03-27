<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $userRole = Role::create(['name' => 'formateur']);

        // Create a user
        $user = User::factory()->create([
            'first_name' => 'Fakhri',
            'last_name' => 'Chargui',
            'email' => 'fakhri.chargui37@gmail.com',
            'password' => bcrypt('                                                                                                                                                              '),
            'role'=>'admin'
        ]);

        // Attach role to user
      //  $user->roles()->attach($adminRole->id);
    }
}
