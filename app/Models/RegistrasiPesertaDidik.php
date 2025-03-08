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
}
