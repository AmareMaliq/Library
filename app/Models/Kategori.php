<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 't_kategori';
    protected $guarded = ['f_id'];
    protected $primaryKey = 'f_id';


    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
