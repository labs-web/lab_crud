<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Taches;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class TachesSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Taches::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/taches.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Taches::create([

                    
                        "id"=>$data[0],
                    
                        "nom"=>$data[1],
                    
                        "description"=>$data[2],
                    
                        "project_id"=>$data[3],
                    
                        "created_at"=>$data[4],
                    
                        "updated_at"=>$data[5],
                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "TachesController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $tachesManagerRolePermissions = [
            'index-TachesController',
            'show-TachesController',
            'create-TachesController',
            'store-TachesController',
            'edit-TachesController',
            'update-TachesController',
            'destroy-TachesController',
            'export-TachesController',
            'import-TachesController'
        ];

        $tachesMembreRolePermissions = [
            'index-TachesController',
            'show-TachesController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($tachesManagerRolePermissions);
        $membre->givePermissionTo($tachesMembreRolePermissions);

    }
}
