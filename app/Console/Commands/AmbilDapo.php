<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Storage;

class AmbilDapo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ambil:dapo';

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
        /*$wilayah = DB::connection('dapodik')->table('ref.mst_wilayah')->orderBy('id_level_wilayah')->orderBy('kode_wilayah')->paginate(10);
        Storage::disk('public')->put('proses_sync_'.$sekolah_id.'.json', json_encode($record));
        dd($wilayah);*/
        $i=1;
        DB::connection('dapodik')->table('ref.mst_wilayah')->orderBy('id_level_wilayah')->orderBy('kode_wilayah')->chunk(500, function ($data) use (&$i){
            $this->info($i);
            if(!Storage::disk('public')->exists('wilayah_'.$i.'.json')){
                Storage::disk('public')->put('wilayah_'.$i.'.json', json_encode($data));
            }
            $i++;
        });
        $i=1;
        DB::connection('dapodik')->table('ref.jenis_ptk')->orderBy('jenis_ptk_id')->chunk(500, function ($data) use (&$i){
            $this->info($i);
            if(!Storage::disk('public')->exists('jenis_ptk_'.$i.'.json')){
                Storage::disk('public')->put('jenis_ptk_'.$i.'.json', json_encode($data));
            }
            $i++;
        });
        $i=1;
        DB::connection('dapodik')->table('ref.jabatan_ptk')->orderBy('jabatan_ptk_id')->chunk(500, function ($data) use (&$i){
            $this->info($i);
            if(!Storage::disk('public')->exists('jabatan_ptk_'.$i.'.json')){
                Storage::disk('public')->put('jabatan_ptk_'.$i.'.json', json_encode($data));
            }
            $i++;
        });
        return Command::SUCCESS;
    }
}
