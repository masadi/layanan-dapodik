<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class ReferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::where('name', 'administrator')->first();
        $user = User::create([
            'username' => 'administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Qwerty123'),
            'name' => 'Administrator',
            'description' => 'Administrator',
            'status' => 1,
        ]);
        $user->attachRole($roles);
        $this->command->info('ref seeder');
    }
}
