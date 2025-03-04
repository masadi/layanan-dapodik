<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MutasiMasuk;

class DatatableController extends Controller
{
    public function index(){
        $function = 'get_'.str_replace('-', '_', request()->data);
        return $this->{$function}();
    }
    public function insert(){
        $function = 'insert_'.str_replace('-', '_', request()->data);
        return $this->{$function}();
    }
    private function get_mutasi_masuk(){
        $data = MutasiMasuk::orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function insert_mutasi_masuk(){
        request()->validate(
            [
                'nama' => 'required|string',
                'nik' => 'required|digits:16',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required',
                'npsn' => 'required',
                'nama_sekolah' => 'required',
                'provinsi_id' => 'required',
                'kabupaten_id' => 'required',
                'kecamatan_id' => 'required',
            ],
            [
                'nama.required' => 'Nama Lengkap tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
                'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'provinsi_id.required' => 'Provinsi tidak boleh kosong',
                'kabupaten_id.required' => 'Kabupaten/Kota tidak boleh kosong',
                'kecamatan_id.required' => 'Kecamatan tidak boleh kosong',
                'kode_wilayah.required' => 'Desa/Kelurahan tidak boleh kosong',
                'npsn.required' => 'NPSN Sekolah Asal tidak boleh kosong',
                'nama_sekolah.required' => 'Nama Sekolah Asal tidak boleh kosong',
            ]
        );
        $find = new MutasiMasuk;
        if(request()->id){
            $find = $find->find(request()->id);
        }
        $find->nama = strtoupper(request()->nama);
        $find->nik = request()->nik;
        $find->nisn = request()->nisn;
        $find->tempat_lahir = request()->tempat_lahir;
        $find->tanggal_lahir = request()->tanggal_lahir;
        $find->kode_wilayah = request()->kecamatan_id;
        $find->npsn = request()->npsn;
        $find->nama_sekolah = request()->nama_sekolah;
        $find->save();
        $data = [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Ajuan Mutasi Masuk berhasil disimpan!',
        ];
        return response()->json($data);
    }
}
