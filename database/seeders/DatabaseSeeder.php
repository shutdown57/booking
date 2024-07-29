<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (UserPermission::cases() as $permission) {
            Permission::create(['name' => $permission->value]);
        }

        $user = User::create([
            'name' => 'Admin John Dou',
            'email' => 'admin@asdf.com',
            'password' => Hash::make('123456'),
        ]);

        $role = Role::create(['name' => UserRole::Admin->value]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'John Dou',
            'email' => 'asdf@asdf.com',
            'password' => Hash::make('123456'),
        ]);

        $role = Role::create(['name' => UserRole::Client->value]);

        $permissions = Permission::query()
            ->whereNot('name', 'LIKE', 'booking%')
            ->where(
                function (Builder $builder) {
                    $builder->where('name', 'LIKE', '%show')
                        ->orWhere('name', 'LIKE', '%index')
                        ->orWhere('name', 'LIKE', 'own%');
                }
            )
            ->pluck('id', 'id')
            ->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
