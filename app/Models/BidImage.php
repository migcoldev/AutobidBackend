<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidImage extends Model
{
    public $table = "bid_image";
    //
    protected $fillable = [
        'id_bid', 
        'image_hd', 
        'image_full', 
        'image_thumb', 
        'origin_hd', 
        'origin_full', 
        'origin_thumb', 
        'status', 
        'created_at'
    ];
}
