<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RegistrasiPesertaDidik extends Model
{
    use HasFactory;
    protected $table = 'registrasi_peserta_didik';
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne(User::class, 'sekolah_id', 'sekolah_id');
    }
    protected function approvedBy(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::find($value)?->name,
        );
    }
    public function file_mutasi()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 3);
    }
    public function file_ijazah()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 1);
    }
    public function file_formulir()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 1);
    }
    public function file_rapor()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 1);
    }
    public function file_kk()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 1);
    }
    public function file_akte()
    {
        return $this->hasOne(Dokumen::class, 'table_id')->where('table_name', 'registrasi_peserta_didik')->where('jenis_data', 1);
    }
}
