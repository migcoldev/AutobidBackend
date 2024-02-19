<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ScrappingHistory;

class ScrappingHistoryController extends Controller
{
    public function index(Request $request)
    {
        $ixp = 20;
        if($request->ixp){
            $ixp = intval($request->ixp);
        }
        $result = ScrappingHistory::orderBy("id","desc")->paginate($ixp);
        return $result;
    }
}