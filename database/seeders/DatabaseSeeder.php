<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
               $this->call([
            RoleSeeder::class,
        ]);
      $admin =  User::factory()->create([
          'name' => 'Diego Andres',
            'email' => 'sanabriadiego336@gmail.com',
            'password' => Hash::make('Diego336@'),
            'last_name' => 'Sanabria Perez',
        
            'telefono' => '3222479758'
        ]);
        $admin->assignRole('Admin');
    }
}
