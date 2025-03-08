<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Wilayah;
use File;

class ProsesWilayah extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proses:wilayah';

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
        $files = File::files(public_path('json'));
        sort($files, SORT_NATURAL);
        foreach($files as $file){
            $a = File::get($file);
            $this->info($file);
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
        return Command::SUCCESS;
    }
}
