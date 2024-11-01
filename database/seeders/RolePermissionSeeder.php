<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat permission
        Permission::create(['name' => 'manage profile']);
        Permission::create(['name' => 'manage members']);
        Permission::create(['name' => 'manage forum']);
        Permission::create(['name' => 'manage komentar']);
        Permission::create(['name' => 'membuat komentar']);
        Permission::create(['name' => 'manage posting']);
        Permission::create(['name' => 'membuat posting']);

        // Membuat role Admin dan memberikan semua permission
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // Membuat role Librarian dan memberikan permission khusus

        // Membuat role Member dan memberikan permission peminjaman buku
        $member = Role::create(['name' => 'member']);
        $member->givePermissionTo(['manage profile','membuat komentar','membuat posting']);
    }
}
