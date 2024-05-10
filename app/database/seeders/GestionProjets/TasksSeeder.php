<?php

namespace Database\Seeders\GestionTasks;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionTasks\Task;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Psy\Readline\Hoa\Console;



class TasksSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Task::truncate();
        Schema::enableForeignKeyConstraints();

        // TODO : Organisation de code , espaces 
        // get data from csv file
        $csvFile = fopen(base_path("database/data/tasks.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Task::create([
                    "nom"=>$data['0'],
                    "description" =>$data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "TaskController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $projectManagerRolePermissions = [
            'index-TaskController',
            'show-TaskController',
            'create-TaskController',
            'store-TaskController',
            'edit-TaskController',
            'update-TaskController',
            'destroy-TaskController',
            'export-TaskController',
            'import-TaskController'
        ];

        $projectMembreRolePermissions = [
            'index-TaskController',
            'show-TaskController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($projectManagerRolePermissions);
        $membre->givePermissionTo($projectMembreRolePermissions);

    }
}
