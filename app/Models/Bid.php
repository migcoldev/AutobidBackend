<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public $table = "bid";
    //
    protected $fillable = [
        'code', 
        'title', 
        'alias', 
        'vin', 
        'lot_number', 
        'brand', 
        'model', 
        'year', 
        'description', 
        'currency', 
        'last_bid', 
        'photos_qty', 
        'sale_date', 
        'scrapped_date', 
        'scrapped_url', 
        'origin', 
        'status', 
        'created_at'
    ];
        
}
