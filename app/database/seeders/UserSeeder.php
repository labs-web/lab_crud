<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = User::ADMIN;
        $membreRole = User::MEMBRE;

        User::create([
            'name' => 'membre',
            'email' => 'membre@gmail.com',
            'password' => Hash::make('membre'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($membreRole);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($adminRole);
    }
}
