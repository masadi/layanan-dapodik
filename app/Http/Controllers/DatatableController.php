<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanPtk;
use App\Models\JenisPtk;
use App\Models\MutasiAsn;
use App\Models\PltKepsek;
use App\Models\PtkTerdaftar;
use App\Models\Referral;
use App\Models\RegistrasiPesertaDidik;
use App\Models\Wilayah;
use App\Models\Yayasan;
use App\Models\User;
use App\Models\Dokumen;

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
    private function loggedUser($query){
        return $query->whereHas('user', function($query){
            $query->whereHas('sekolah', function($query){
                if(auth()->user()->hasRole(['sd', 'smp', 'sma', 'smk'])){
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
    }
    private function get_tarik_pd(){
        $data = RegistrasiPesertaDidik::where(function($query){
            $query->where('jenis_data', 1);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nisn', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_recovery_pd(){
        $data = RegistrasiPesertaDidik::where(function($query){
            $query->where('jenis_data', 2);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nisn', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_mutasi_masuk(){
        $data = RegistrasiPesertaDidik::with(['file_mutasi'])->where(function($query){
            $query->where('jenis_data', 3);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nisn', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pindah_rombel(){
        $data = RegistrasiPesertaDidik::where(function($query){
            $query->where('jenis_data', 4);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nisn', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_tarik_ptk(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 1);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_edit_penugasan(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 2);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_recovery_ptk(){
        $data = PtkTerdaftar::where(function($query){
            $query->where('jenis_data', 4);
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nik', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_mutasi_asn(){
        $data = MutasiAsn::where(function($query){
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nip', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_plt_kepsek_negeri(){
        $data = PltKepsek::where(function($query){
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nip', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pengajuan_npyp(){
        $data = Yayasan::where(function($query){
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('nama_pimpinan', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function get_pengajuan_kode_referral(){
        $data = Referral::where(function($query){
            $this->loggedUser($query);
        })->orderBy(request()->sortby, request()->sortbydesc)
        ->when(request()->q, function($query) {
            $query->where('npyp', request()->id_level_wilayah);
            $this->loggedUser($query);
            $query->orWhere('nama', 'LIKE', '%' . request()->q . '%');
            $this->loggedUser($query);
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
            $query->where('username', request()->id_level_wilayah);
            $query->orWhere('email', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    private function tarik_pd(){
        request()->validate(
            [
                'nama' => 'required|string',
                'nik' => 'required|digits:16',
                'tempat_lahir' => 'required|string',
                'tahun' => 'required',
                'bulan' => 'required',
                'tanggal' => 'required',
                'tanggal_lahir' => 'required',
                'npsn' => 'required',
                'nama_sekolah' => 'required',
                'provinsi_id' => 'required',
                'kabupaten_id' => 'required',
                'kode_wilayah' => 'required',
                'file_ijazah' => 'required',
                'file_formulir' => 'required',
                'file_kk' => 'required',
                'file_akte' => 'required',
            ],
            [
                'nama.required' => 'Nama Lengkap tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
                'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
                'tahun.required' => 'Tahun Lahir tidak boleh kosong',
                'bulan.required' => 'Bulan Lahir tidak boleh kosong',
                'tanggal.required' => 'Tanggal Lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'npsn.required' => 'NPSN Sekolah Asal tidak boleh kosong',
                'nama_sekolah.required' => 'Nama Sekolah Asal tidak boleh kosong',
                'provinsi_id.required' => 'Provinsi tidak boleh kosong',
                'kabupaten_id.required' => 'Kabupaten/Kota tidak boleh kosong',
                'kode_wilayah.required' => 'Kecamatan tidak boleh kosong',
                'file_ijazah.required' => 'Berkas Ijazah/SKL tidak boleh kosong',
                'file_formulir.required' => 'Berkas Formulir Dapodik tidak boleh kosong',
                'file_kk.required' => 'Berkas KK tidak boleh kosong',
                'file_akte.required' => 'Berkas Akte Lahir tidak boleh kosong',
            ]
        );
        $find = new RegistrasiPesertaDidik;
        if(request()->id){
            $find = $find->find(request()->id);
        }
        $find->jenis_data = request()->jenis_data;
        $find->sekolah_id = request()->sekolah_id;
        $find->nama = strtoupper(request()->nama);
        $find->nisn = request()->nisn;
        $find->nik = request()->nik;
        $find->tempat_lahir = request()->tempat_lahir;
        $find->tanggal_lahir = request()->tanggal_lahir;
        $find->npsn = request()->npsn;
        $find->nama_sekolah = request()->nama_sekolah;
        $find->kode_wilayah = request()->kecamatan_id;
        $find->rombel_tujuan = request()->rombel_tujuan;
        $find->save();
        if(request()->file_ijazah){
            $path = request()->file_ijazah->store('public/berkas');
            Dokumen::updateOrCreate(
                [
                    'jenis_data' => 'file_ijazah',
                    'table_name' => 'registrasi_peserta_didik',
                    'table_id' => $find->id,
                ],
                [
                    'path' => basename($path),
                    'extension' => request()->file_ijazah->extension(),
                ]
            );
        }
        if(request()->file_formulir){
            $path = request()->file_formulir->store('public/berkas');
            Dokumen::updateOrCreate(
                [
                    'jenis_data' => 'file_formulir',
                    'table_name' => 'registrasi_peserta_didik',
                    'table_id' => $find->id,
                ],
                [
                    'path' => basename($path),
                    'extension' => request()->file_formulir->extension(),
                ]
            );
        }
        if(request()->file_kk){
            $path = request()->file_kk->store('public/berkas');
            Dokumen::updateOrCreate(
                [
                    'jenis_data' => 'file_kk',
                    'table_name' => 'registrasi_peserta_didik',
                    'table_id' => $find->id,
                ],
                [
                    'path' => basename($path),
                    'extension' => request()->file_kk->extension(),
                ]
            );
        }
        if(request()->file_akte){
            $path = request()->file_akte->store('public/berkas');
            Dokumen::updateOrCreate(
                [
                    'jenis_data' => 'file_akte',
                    'table_name' => 'registrasi_peserta_didik',
                    'table_id' => $find->id,
                ],
                [
                    'path' => basename($path),
                    'extension' => request()->file_akte->extension(),
                ]
            );
        }
        $data = [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Pengajuan Tarik PD berhasil disimpan!',
        ];
        return response()->json($data);
    }
    private function insert_mutasi_masuk(){
        request()->validate(
            [
                'nama' => 'required|string',
                'nik' => 'required|digits:16',
                'tempat_lahir' => 'required|string',
                'tahun' => 'required',
                'bulan' => 'required',
                'tanggal' => 'required',
                'tanggal_lahir' => 'required',
                'npsn' => 'required',
                'nama_sekolah' => 'required',
                'provinsi_id' => 'required',
                'kabupaten_id' => 'required',
                'kode_wilayah' => 'required',
                'file_mutasi' => 'required',
            ],
            [
                'nama.required' => 'Nama Lengkap tidak boleh kosong',
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.digits' => 'NIK harus terdiri dari 16 digit angka',
                'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
                'tahun.required' => 'Tahun Lahir tidak boleh kosong',
                'bulan.required' => 'Bulan Lahir tidak boleh kosong',
                'tanggal.required' => 'Tanggal Lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'npsn.required' => 'NPSN Sekolah Asal tidak boleh kosong',
                'nama_sekolah.required' => 'Nama Sekolah Asal tidak boleh kosong',
                'provinsi_id.required' => 'Provinsi tidak boleh kosong',
                'kabupaten_id.required' => 'Kabupaten/Kota tidak boleh kosong',
                'kode_wilayah.required' => 'Kecamatan tidak boleh kosong',
                'file_mutasi.required' => 'Berkas Mutasi tidak boleh kosong',
            ]
        );
        $find = new RegistrasiPesertaDidik;
        if(request()->id){
            $find = $find->find(request()->id);
        }
        $find->jenis_data = request()->jenis_data;
        $find->sekolah_id = request()->sekolah_id;
        $find->nama = strtoupper(request()->nama);
        $find->nisn = request()->nisn;
        $find->nik = request()->nik;
        $find->tempat_lahir = request()->tempat_lahir;
        $find->tanggal_lahir = request()->tanggal_lahir;
        $find->npsn = request()->npsn;
        $find->nama_sekolah = request()->nama_sekolah;
        $find->kode_wilayah = request()->kecamatan_id;
        $find->rombel_tujuan = request()->rombel_tujuan;
        $find->save();
        if(request()->file_mutasi){
            $path = request()->file_mutasi->store('public/berkas');
            Dokumen::updateOrCreate(
                [
                    'jenis_data' => 'file_mutasi',
                    'table_name' => 'registrasi_peserta_didik',
                    'table_id' => $find->id,
                ],
                [
                    'path' => basename($path),
                    'extension' => request()->file_mutasi->extension(),
                ]
            );
        }
        $data = [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Pengajuan Mutasi Masuk berhasil disimpan!',
        ];
        return response()->json($data);
    }
    private function recovery_pd(){}
    private function pindah_rombel(){}
    
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
