<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class GenerateAkses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:akses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $abilities = [
            [
                'role' => 'administrator',
                'akses' => ['Web', 'Beranda', 'Profile', 'layanan-siswa', 'layanan-ptk', 'layanan-yayasan', 'Pengguna'],
                'action' => 'read',
            ],
            [
                'role' => 'sekolah',
                'akses' => ['Web', 'Beranda', 'Profile', 'layanan-siswa', 'layanan-ptk', 'layanan-yayasan'],
                'action' => 'read',
            ],
            [
                'role' => 'dikdas',
                'akses' => ['Web', 'Beranda', 'Profile', 'layanan-siswa', 'layanan-ptk', 'layanan-yayasan', 'Pengguna'],
                'action' => 'read',
            ],
            [
                'role' => 'dikmen',
                'akses' => ['Web', 'Beranda', 'Profile', 'layanan-siswa', 'layanan-ptk', 'Pengguna'],
                'action' => 'read',
            ],
        ];
        Permission::truncate();
        foreach($abilities as $ab){
            $r = Role::where('name', $ab['role'])->first();
            foreach($ab['akses'] as $perm){
                $permission = Permission::updateOrCreate([
                    'name' => $perm,
                    'display_name' => $perm,
                    'description' => 'read',
                ]);
                if(!$r->hasPermission($permission->name)){
                    $r->attachPermission($permission);
                }
            }
            
        }
        return Command::SUCCESS;
    }
}
