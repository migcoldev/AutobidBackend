<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    
    public function index(Request $request)
    {
        $ixp = 20;
        if($request->ixp){
            $ixp = intval($request->ixp);
        }
        $result = ContactRequest::leftJoin("bid", 'bid.id', '=', "contact_request.id_bid")
        ->orderBy("id","desc")->selectRaw("contact_request.*, bid.vin, bid.lot_number, bid.alias")->paginate($ixp);
        return $result;
    }

    public function detail(Request $request)
    {
        $contact = ContactRequest::where("code",trim($request->code))->first();
        if($contact){
            $bid = Bid::where("id",$contact->id_bid)->first();
            $contact->bid = $bid;
            return $contact;
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }

    public function askus(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string',
            'last_name'    => 'required|string',
            'email'       => 'required|string|email',
            'message'       => 'required|string'
        ]);
        $bid = Bid::where("alias",trim($request->alias))->first();
        if($bid){
            $code = $this->createRandomString(20);
            $contact_request = new ContactRequest([
                'code' => $code,
                'id_bid' => intval($bid->id),
                'url' => trim($request->url),
                'first_name' => trim($request->first_name),
                'last_name' => trim($request->last_name),
                'email' => trim($request->email),
                'phone' => trim($request->phone),
                'message' => trim($request->message),
            ]);
            if($contact_request->save()){
                Mail::send('emails.newrequest', ['contact_request' => $contact_request, 'bid' => $bid], function ($m) use ($contact_request, $bid) {
                    $m->from("webmaster@mail.autobidregistry.com", 'Autobid Registry');
                    $m->to(config("app.notification_email"), config("app.notification_email"))->subject('Nueva solicitud en la web!');
                });
            }
            return response()->json(['code' => $code, 'message' => "Thank you, we will contact you soon.!"], 200);
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'code'    => 'required|string'
        ]);
        $contact = ContactRequest::where("code",trim($request->code))->first();
        if($contact){
            $contact->delete();
            return response()->json(['message' => "Ok"], 200);
        }else{
            return response()->json(['message' => "Invalid code"], 400);
        }
    }
}