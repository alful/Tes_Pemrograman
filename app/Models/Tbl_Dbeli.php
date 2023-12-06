<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Dbeli extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'tbl_barang', 'tbl_hbeli'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tbl_barang()
    {
        return $this->belongsTo(Tbl_barang::class);
    }

    public function tbl_hbeli()
    {
        return $this->belongsTo(Tbl_hbeli::class);
    }

    public function tbl_stock()
    {
        return $this->belongsTo(Tbl_stock::class);
    }
}
