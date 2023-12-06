<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Hutang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['tbl_hbeli', 'tbl_suplier'];

    public function tbl_suplier()
    {
        return $this->belongsTo(Tbl_Suplier::class);
    }
    public function tbl_hbeli()
    {
        return $this->belongsTo(Tbl_Hbeli::class);
    }
}
