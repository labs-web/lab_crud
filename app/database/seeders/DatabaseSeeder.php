<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\Autorisation\{
    UserSeeder,
    RoleSeeder
};

use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
};




class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(GestionProjetsSeeder::class);
    }
}