<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBuku extends Model
{
    use HasFactory;

    protected $table = 't_detailbuku';
    protected $guarded = ['f_id'];

    protected $primaryKey = 'f_id';



    public function buku()
    {
        return $this->belongsTo(Buku::class, 'f_idbuku', 'f_id');
    }
}
