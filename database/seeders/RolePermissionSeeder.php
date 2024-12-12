<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage users',
            'manage kuisioner',
            'manage banner',
            'manage videos',
            'manage gallery',
            'manage faq',
            'manage documents',
            'manage merchant',
            'manage video banner',
            'manage pengumuman'
        ];

        // Create or find permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }



        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminPermissions = ['manage users', 'manage kuisioner', 'manage banner', 'manage videos', 'manage gallery', 'manage faq', 'manage documents', 'manage video banner', 'manage pengumuman'];
        $superAdminRole->syncPermissions($superAdminPermissions);


        // Create or find roles and assign permissions
        $MerchantRole = Role::firstOrCreate(['name' => 'Merchant']);
        $MerchantPermissions = ['manage users', 'manage kuisioner'];
        $MerchantRole->syncPermissions($MerchantPermissions);

        $pegawaiRole = Role::firstOrCreate(['name' => 'pegawai']);
        $pegawaiPermissions = ['manage kuisioner'];
        $pegawaiRole->syncPermissions($pegawaiPermissions);

        // Create a super admin user and assign the super admin role
        $user = User::firstOrCreate([
            'email' => 'super@admin.com'
        ], [
            'name' => 'Super Admin',
            'phone_number' => '089666463314',
            'address' => 'Pemalang',
            'password' => bcrypt('1234567890')
        ]);

        $user->assignRole($superAdminRole);
    }
}
