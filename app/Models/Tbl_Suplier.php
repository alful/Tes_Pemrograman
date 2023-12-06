<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Suplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function tbl_hbeli()
    {
        return $this->hasMany(Tbl_Hbeli::class);
    }
}
