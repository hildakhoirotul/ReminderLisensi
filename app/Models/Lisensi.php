<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lisensi extends Model
{
    use HasFactory;
    protected $table = 'lisensi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_dokumen',
        'start',
        'end',
        'reminder1',
        'reminder2',
        'reminder3',
    ];
}
