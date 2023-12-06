<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Hbeli extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['tbl_suplier'];

    public function tbl_dbeli()
    {
        return $this->hasMany(Tbl_Dbeli::class);
    }

    public function tbl_suplier()
    {
        return $this->belongsTo(Tbl_Suplier::class);
    }
}
