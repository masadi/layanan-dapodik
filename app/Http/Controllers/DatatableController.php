<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanPtk;
use App\Models\JenisPtk;
use App\Models\MutasiAsn;
use App\Models\MutasiMasuk;
use App\Models\PindahRombel;
use App\Models\PltKepsek;
use App\Models\PtkTerdaftar;
use App\Models\Referral;
use App\Models\RegistrasiPesertaDidik;
use App\Models\Wilayah;
use App\Models\Yayasan;
use App\Models\User;

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
    private function get_tarik_pd(){
        $data = RegistrasiPesertaDidik::where(function($query){
            $query->where('jenis_data', 1);
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_recovery_pd(){
        $data = RegistrasiPesertaDidik::where(function($query){
            $query->where('jenis_data', 2);
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_mutasi_masuk(){
        $data = MutasiMasuk::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pindah_rombel(){
        $data = PindahRombel::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_tarik_ptk(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 1);
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_edit_penugasan(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 2);
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_recovery_ptk(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 3);
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nisn', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_mutasi_asn(){
        $data = MutasiAsn::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nip', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_plt_kepsek_negeri(){
        $data = PltKepsek::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nip', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pengajuan_npyp(){
        $data = Yayasan::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nama_pimpinan', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pengajuan_kode_referral(){
        $data = Referral::where(function($query){
            $query->whereHas('user', function($query){
                $query->whereHas('sekolah', function($query){
                    if(auth()->user()->hasRole('sekolah')){
                        $query->where('sekolah_id', auth()->user()->sekolah_id);
                    }
                    if(auth()->user()->hasRole('dikdas')){
                        $query->whereIn('bentuk_pendidikan_id', dikdas());
                    }
                    if(auth()->user()->hasRole('dikmen')){
                        $query->whereIn('bentuk_pendidikan_id', dikmen());
                    }
                });
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('npyp', request()->id_level_wilayah);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pengguna(){
        $data = User::where(function($query){
            $query->whereHas('sekolah', function($query){
                if(auth()->user()->hasRole('dikdas')){
                    $query->whereIn('bentuk_pendidikan_id', dikdas());
                }
                if(auth()->user()->hasRole('dikmen')){
                    $query->whereIn('bentuk_pendidikan_id', dikmen());
                }
            });
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nip', request()->id_level_wilayah);
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
                'rombel' => 'required',
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
                'rombel.required' => 'Rombel Tujuan tidak boleh kosong',
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
        $find->sekolah_id = request()->sekolah_id;
        $find->nama = strtoupper(request()->nama);
        $find->nik = request()->nik;
        $find->nisn = request()->nisn;
        $find->tempat_lahir = request()->tempat_lahir;
        $find->tanggal_lahir = request()->tanggal_lahir;
        $find->rombel = request()->rombel;
        $find->kode_wilayah = request()->kecamatan_id;
        $find->npsn = request()->npsn;
        $find->nama_sekolah = request()->nama_sekolah;
        $find->keterangan = request()->keterangan;
        $find->save();
        $data = [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Ajuan Mutasi Masuk berhasil disimpan!',
        ];
        return response()->json($data);
    }
    private function insert_pindah_rombel(){
        request()->validate(
            [
                'nik' => 'required|digits:16',
                'rombel_tujuan' => 'required',
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
                'rombel_tujuan.required' => 'Rombel Tujuan tidak boleh kosong',
            ]
        );
        $find = new PindahRombel;
        if(request()->id){
            $find = $find->find(request()->id);
        }
        $find->sekolah_id = request()->sekolah_id;
        $find->nik = request()->nik;
        $find->nisn = request()->nisn;
        $find->rombel_tujuan = request()->rombel_tujuan;
        $find->save();
        $data = [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Ajuan Pindah Rombel berhasil disimpan!',
        ];
        return response()->json($data);
    }
}
