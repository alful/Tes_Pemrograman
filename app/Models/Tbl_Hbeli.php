<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Hbeli extends Model
{
    use HasFactory;
    public $table = "TBL_HBELI";
    protected $primaryKey = 'id';


    protected $guarded = ['id'];
    // protected $with = ['tbl_suplier'];
    protected $with = ['tbl_barang'];

    public function tbl_dbeli()
    {
        return $this->hasMany(Tbl_Dbeli::class);
    }

    public function tbl_hutang()
    {
        return $this->hasMany(Tbl_Hutang::class);
    }
    public function tbl_barang()
    {
        return $this->belongsTo(Tbl_Barang::class);
    }

    // public function tbl_suplier()
    // {
    //     return $this->belongsTo(Tbl_Suplier::class);
    // }
}
