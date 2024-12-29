<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table = 't_detail_peminjaman';
    protected $guarded = ['f_id'];
    protected $primaryKey = 'f_id';

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'f_idpeminjaman', 'f_id');
    }


    public function detailbuku()
    {
        return $this->belongsTo(DetailBuku::class, 'f_iddetailbuku', 'f_id');
    }
}
