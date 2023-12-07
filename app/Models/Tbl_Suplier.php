<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Suplier extends Model
{
    use HasFactory;
    public $table = "TBL_SUPLIER";
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    public function tbl_hbeli()
    {
        return $this->hasMany(Tbl_Hbeli::class);
    }
}
