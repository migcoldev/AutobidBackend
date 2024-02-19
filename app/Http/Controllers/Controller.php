<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cleanString($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $arr = array("á" => "a","é" => "e","í" => "i","ó" => "o","ú" => "u","ñ" => "n");
        $string = str_replace(array_keys($arr), $arr,$string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return strtolower(preg_replace('/-+/', '-', $string)); // Replaces multiple hyphens with single one.
    }
    
    public function createRandomString($caracteres){
        return Str::random($caracteres);
    }

    public function converToUserTimezone($value)
     {
        $timezone = optional(auth()->user())->timezone ?? config('app.timezone');
        return Carbon::parse($value)->timezone($timezone);
     }
}