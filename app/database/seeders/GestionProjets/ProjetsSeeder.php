<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Projet;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Psy\Readline\Hoa\Console;



class ProjetsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Projet::truncate();
        Schema::enableForeignKeyConstraints();
   
        // get data from csv file
        $csvFile = fopen(base_path("database/data/projets.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {

          

            if (!$firstline) {

                Projet::create([
                    "nom"=>$data['0'],
                    "description" =>$data['1']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];

        foreach ($actions as $action) {
            $permissionName = $action . '-' . "ProjetController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $memberRolePermissions = [
            "index-ProjetController",
            "show-ProjetController",
        ];

        $projectManagerRolePermissions = [
            'index-ProjetController',
            'show-ProjetController',
            'create-ProjetController',
            'store-ProjetController',
            'edit-ProjetController',
            'update-ProjetController',
            'destroy-ProjetController',
            'export-ProjetController',
            'import-ProjetController'
        ];

        $membreRole = Role::where('name', User::MEMBRE)->first();
        $membreRole->givePermissionTo($memberRolePermissions);

        $chefRole = Role::where('name', User::CHEF_DE_PROJET)->first();
        $chefRole->givePermissionTo($projectManagerRolePermissions);
       
    }
}