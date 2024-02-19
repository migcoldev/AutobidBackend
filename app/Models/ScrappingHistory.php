<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScrappingHistory extends Model
{
    public $table = "scrapping_history";
    //
    protected $fillable = [
        'origin_code', 
        'url', 
        'proxy',
        'status', 
        'created_at'
    ];
}
