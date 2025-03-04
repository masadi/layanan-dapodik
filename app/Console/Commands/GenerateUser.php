<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\User;
use App\Models\Sekolah;

class GenerateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:user';

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
        $role = Role::where('name', 'sekolah')->first();
        Sekolah::orderBy('sekolah_id')->doesntHave('user')->chunk(200, function ($data) use ($role) {
            foreach ($data as $d) {
                $user = User::updateOrCreate([
                    'sekolah_id' => $d->sekolah_id,
                ],[
                    'username' => $d->npsn,
                    'email' => $d->npsn.'@email.com',
                    'password' => bcrypt($d->npsn),
                    'name' => $d->nama,
                    'description' => $d->nama,
                    'status' => 1,
                ]);
                $user->attachRole($role);
            }        
        });
        $this->info(User::count());
        $this->info(Sekolah::count());
        return Command::SUCCESS;
    }
}
