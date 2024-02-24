<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\BidImage;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;

class BidController extends Controller
{
    public function index(Request $request)
    {
        $ixp = 20;
        if($request->ixp){
            $ixp = intval($request->ixp);
        }
        $searchtext = "";
        if($request->searchtext){
            $searchtext = trim($request->searchtext);
        }
        // Que muestre estado 1 activo y 2 caduco pero no 0 inactivo
        $rsquery = Bid::select( 'bid.*',
        DB::raw('(select CONCAT("'.config("app.s3_url").'", IFNULL(image_full, "no_image.svg")) from bid_image bi where bi.id_bid = bid.id order by bi.id asc limit 1) as image_thumb'))
        ->where("alias","!=","")->where("status","!=", 0);
        if($searchtext != ""){
            $rsquery->where(function($query) use ($searchtext){
                $query->where('lot_number', 'like', '%'.$searchtext.'%')
                ->orWhere('vin', 'like', '%'.$searchtext.'%');
            });
        }
        $result = $rsquery->orderBy("id","asc")->paginate($ixp);
     
        //return response()->json($result, 200);
        return $result;
    }

    public function detail(Request $request)
    {
        $bid = Bid::where("alias",trim($request->alias))->first();
        if($bid){
            $bid->images = BidImage::selectRaw('CONCAT("'.config("app.s3_url").'", image_thumb) as image_thumb, CONCAT("'.config("app.s3_url").'", image_hd) as image_hd, CONCAT("'.config("app.s3_url").'", image_full) as image_full')->where("id_bid",intval($bid->id))->get();
            return $bid;
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }

    public function all(Request $request)
    {
        $ixp = 20;
        if($request->ixp){
            $ixp = intval($request->ixp);
        }
        $searchtext = "";
        if($request->searchtext){
            $searchtext = trim($request->searchtext);
        }
        $rsquery = Bid::select( 'bid.*',
        DB::raw('(select CONCAT("'.config("app.s3_url").'", IFNULL(image_full, "no_image.svg")) from bid_image bi where bi.id_bid = bid.id order by bi.id asc limit 1) as image_thumb'))
        ->where("alias","!=","");
        if($searchtext != ""){
            $rsquery->where(function($query) use ($searchtext){
                $query->where('lot_number', 'like', '%'.$searchtext.'%')
                ->orWhere('vin', 'like', '%'.$searchtext.'%');
            });
        }
        $result = $rsquery->orderBy("id","desc")->paginate($ixp);
     
        //return response()->json($result, 200);
        return $result;
    }

    public function activate(Request $request)
    {
        $validated = $request->validate([
            'code'    => 'required|string'
        ]);
        $bid = Bid::where("code",trim($request->code))->first();
        if($bid){
            $bid->update(['status' => 1]);
            return response()->json(['message' => "Ok"], 200);
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }

    public function deactivate(Request $request)
    {
        $validated = $request->validate([
            'code'    => 'required|string'
        ]);
        $bid = Bid::where("code",trim($request->code))->first();
        if($bid){
            $bid->update(['status' => 0]);
            return response()->json(['message' => "Ok"], 200);
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'code'    => 'required|string'
        ]);
        $bid = Bid::where("code",trim($request->code))->first();
        if($bid){
            if($bid->status == 0){
                $bid->delete();
                return response()->json(['message' => "Ok"], 200);
            }else{
                return response()->json(['message' => "Invalid status"], 400);
            }
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }
}