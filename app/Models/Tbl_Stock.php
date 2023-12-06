<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Stock extends Model
{
    use HasFactory;

    protected $with = ['tbl_hbeli'];

    public function tbl_hbeli()
    {
        return $this->belongsTo(Tbl_Hbeli::class);
    }

    // public function tbl_dbeli()
    // {
    //     return $this->hasMany(Tbl_DBeli::class);
    // }
}
