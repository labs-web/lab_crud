<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\{
    UserSeeder
};
use Database\Seeders\Autorisation\RoleSeeder;
use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
    TagsSeeder,
};




class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GestionProjetsSeeder::class);
    }
}
