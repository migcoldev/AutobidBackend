<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    public $table = "contact_request";
    //
    protected $fillable = [
        'id_bid', 
        'code', 
        'url', 
        'first_name',
        'last_name', 
        'email',
        'phone',
        'message',
        'created_at'
    ];
}
