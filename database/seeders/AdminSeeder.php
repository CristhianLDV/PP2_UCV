<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'), // cámbialo luego
                'id_area' => null,
                
                // Asegúrate de que esta área exista
            ]
        );

        $role = Role::firstOrCreate(['name' => 'super_admin']);
        $user->assignRole($role);
    }
}
