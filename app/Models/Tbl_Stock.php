<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_Stock extends Model
{
    use HasFactory;
    public $table = "TBL_STOCK";
    protected $primaryKey = 'KODEBRG';

    protected $with = ['tbl_dbeli'];
    protected $fillable = [
        'KODEBRG',
        'QTYBELI',
    ];
    public function tbl_dbeli()
    {
        return $this->belongsTo(Tbl_Dbeli::class);
    }

    // public function tbl_dbeli()
    // {
    //     return $this->hasMany(Tbl_DBeli::class);
    // }
}
