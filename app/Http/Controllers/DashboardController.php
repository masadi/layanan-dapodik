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

class DashboardController extends Controller
{
    private function loggedUser(){
        return auth()->user();
    }
    public function get_wilayah(){
        $data = Wilayah::where(function($query){
            if(request()->kabupaten_id){
                $query->where('mst_kode_wilayah', request()->kabupaten_id);
            } elseif (request()->provinsi_id) {
                $query->where('mst_kode_wilayah', request()->provinsi_id);
            } else {
                $query->where('id_level_wilayah', 1);
            }
        })->orderBy('kode_wilayah')->get();
        return response()->json($data);
    }
}
