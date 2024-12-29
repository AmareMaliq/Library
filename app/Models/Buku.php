<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 't_buku';
    protected $guarded = ['f_id'];

    protected $primaryKey = 'f_id';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'f_idkategori', 'f_id');
    }

    public function detailbuku()
    {
        return $this->hasOne(DetailBuku::class, 'f_idbuku', 'f_id');
    }
}
