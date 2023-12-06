<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tbl_dbeli()
    {
        return $this->hasMany(Tbl_Dbeli::class);
    }
}
