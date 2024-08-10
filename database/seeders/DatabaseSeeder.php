<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\Bookable;
use App\Models\BookableType;
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

        // Create an 'admin'
        $user = User::create([
            'name' => 'Admin John Dou',
            'email' => 'admin@asdf.com',
            'password' => Hash::make('123456'),
        ]);

        $role = Role::create(['name' => UserRole::Admin->value]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        Bookable::query()->insert([
            [
                'per_hour_rate' => 12,
                'name' => 'Number One',
                'image' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'per_hour_rate' => 10,
                'name' => 'Number Two',
                'image' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Tennis Court
        $tennis = Bookable::query()->firstWhere('per_hour_rate', 12);
        $tennis->type()
            ->associate(BookableType::query()->create(['name' => 'tennis court']));
        $tennis->user()->associate($user);
        $tennis->save();

        // Snooker Table
        $snooker = Bookable::query()->firstWhere('per_hour_rate', 10);
        $snooker->type()
            ->associate(BookableType::query()->create(['name' => 'snooker table']));
        $snooker->user()->associate($user);
        $snooker->save();

        // Create a 'client'
        $user = User::create([
            'name' => 'John Dou',
            'email' => 'asdf@asdf.com',
            'password' => Hash::make('123456'),
        ]);

        $role = Role::create(['name' => UserRole::Client->value]);

        $permissions = Permission::query()
            ->where(
                function (Builder $builder) {
                    $builder->orWhere('name', 'LIKE', 'bookable.user.%');
                }
            )
            ->pluck('id', 'id')
            ->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
