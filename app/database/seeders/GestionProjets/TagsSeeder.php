<?php

namespace Database\Seeders\GestionProjets;


use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Tag;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class TagsSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/tags.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                if (isset($data[0]) && isset($data[1])) {
                    Tag::create([
                        "nom" => $data[0],
                        "description" => $data[1]
                    ]);
                }
            }
            $firstline = false;
        }

        fclose($csvFile);
        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "TagController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $tagManagerRolePermissions = [
            'index-TagController',
            'show-TagController',
            'create-TagController',
            'store-TagController',
            'edit-TagController',
            'update-TagController',
            'destroy-TagController',
            'export-TagController',
            'import-TagController'
        ];

        $tagMembreRolePermissions = [
            'index-TagController',
            'show-TagController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($tagManagerRolePermissions);
        $membre->givePermissionTo($tagMembreRolePermissions);

    }
}
