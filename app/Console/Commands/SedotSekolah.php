<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Sekolah;

class SedotSekolah extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sedot:sekolah';

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
        /*
        1;"TK"
        2;"KB"
        3;"TPA"
        4;"SPS"
        5;"SD"
        6;"SMP"
        13;"SMA"
        15;"SMK"
        */
        $bentuk = [1, 2, 4, 5, 6, 13, 15];
        foreach($bentuk as $b){
            $page = 1;
            $response = $this->getData($b, $page);
            $result = $response->object();
            $this->error('satu:'.$b.'. '.$page);
            if(count($result->data)){
                $this->prosesData($result);
                $page = $page + 1;
                $response = $this->getData($b, $page);
                $result = $response->object();
                $this->error('dua:'.$b.'. '.$page);
                if(count($result->data)){
                    $page = $page + 1;
                    $this->prosesData($result);
                    $response = $this->getData($b, $page);
                    $result = $response->object();
                    $this->error('tiga:'.$b.'. '.$page);
                }
            }
        }
        return Command::SUCCESS;
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
            //$this->info($i.'. '.$s->nama);
            $i++;
        }
    }
}
