<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPtk extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'jabatan_ptk';
    protected $primaryKey = 'jabatan_ptk_id';
    protected $guarded = [];
}
