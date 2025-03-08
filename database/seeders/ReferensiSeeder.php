<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Wilayah;
use App\Models\Sekolah;
use App\Models\JenisPtk;
use App\Models\JabatanPtk;
use File;

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
        $files = File::files(public_path('json/wilayah'));
        sort($files, SORT_NATURAL);
        foreach($files as $file){
            $a = File::get($file);
            $this->command->info($file);
            foreach(json_decode($a) as $b){
                Wilayah::updateOrCreate(
                    [
                        'kode_wilayah' => trim($b->kode_wilayah),
                    ],
                    [
                        'nama' => $b->nama,
                        'id_level_wilayah' => $b->id_level_wilayah,
                        'mst_kode_wilayah' => ($b->mst_kode_wilayah) ? trim($b->mst_kode_wilayah) : NULL,
                        'negara_id' => $b->negara_id,
                    ]
                );
            }
        }
        $files = File::files(public_path('json/jenis_ptk'));
        foreach($files as $file){
            $a = File::get($file);
            $this->command->info($file);
            foreach(json_decode($a) as $b){
                JenisPtk::updateOrCreate(
                    [
                        'jenis_ptk_id' => $b->jenis_ptk_id,
                    ],
                    [
                        'nama' => $b->jenis_ptk,
                    ]
                );
            }
        }
        $files = File::files(public_path('json/jabatan_ptk'));
        foreach($files as $file){
            $a = File::get($file);
            $this->command->info($file);
            foreach(json_decode($a) as $b){
                JabatanPtk::updateOrCreate(
                    [
                        'jabatan_ptk_id' => $b->jabatan_ptk_id,
                    ],
                    [
                        'jenis_ptk_id' => $b->jenis_ptk_id,
                        'nama' => $b->jabatan_ptk,
                    ]
                );
            }
        }
        $bentuk = [1, 2, 4, 5, 6, 13, 15];
        foreach($bentuk as $b){
            $page = 1;
            $response = $this->getData($b, $page);
            $result = $response->object();
            $this->command->info('satu:'.$b.'. '.$page);
            if(count($result->data)){
                $this->prosesData($result);
                $page = $page + 1;
                $response = $this->getData($b, $page);
                $result = $response->object();
                $this->command->info('dua:'.$b.'. '.$page);
                if(count($result->data)){
                    $page = $page + 1;
                    $this->prosesData($result);
                    $response = $this->getData($b, $page);
                    $result = $response->object();
                    $this->command->info('tiga:'.$b.'. '.$page);
                }
            }
        }
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
    }
    private function getData($b, $page){
        $response = Http::get('http://sync.erapor-smk.net/api/v7/all-sekolah', [
            'bentuk_pendidikan_id' => $b,
            'kabupaten_id' => '052600',
            'page' => $page,
        ]);
        return $response;
    }
    private function prosesData($result){
        $i=1;
        $role = Role::where('name', 'sekolah')->first();
        foreach($result->data as $s){
            Sekolah::updateOrCreate(
                [
                    'sekolah_id' => $s->sekolah_id,
                ],
                [
                    'npsn' => $s->npsn,
                    'nama' => $s->nama,
                    'bentuk_pendidikan_id' => $s->bentuk_pendidikan_id,
                    'alamat_jalan' => $s->alamat_jalan,
                    'nama_dusun' => $s->nama_dusun,
                    'desa_kelurahan' => $s->desa_kelurahan,
                    'kode_wilayah' => $s->kode_wilayah,
                    'email' => $s->email,
                    'website' => $s->website,
                    'status_sekolah' => $s->status_sekolah,
                    'kode_registrasi' => $s->kode_registrasi,
                ]
            );
            $user = User::updateOrCreate([
                'sekolah_id' => $s->sekolah_id,
            ],[
                'username' => $s->npsn,
                'email' => $s->npsn.'@email.com',
                'password' => bcrypt($s->npsn),
                'name' => $s->nama,
                'description' => $s->nama,
                'status' => 1,
            ]);
            $user->attachRole($role);
            //$this->info($i.'. '.$s->nama);
            $i++;
        }
    }
}
