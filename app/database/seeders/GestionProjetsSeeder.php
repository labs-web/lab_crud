<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
};


class GestionProjetsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(GestionProjetsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            ProjetsSeeder::class,
        ];
    }
}