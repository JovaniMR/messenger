<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;
class MessageController extends Controller
{
    public function index(Request $request){

        $userId = auth()->id();
        $contact_id = $request->contact_id;

        return Message::select(
            'id',
            DB::raw("IF(from_id=$userId, TRUE, FALSE) as writtenByMe"),
            'content',
            'created_at'
        )->where(function($query) use ($userId,$contact_id){
           $query->where('from_id',$userId)->where('to_id',$contact_id);
        })->orWhere(function($query) use ($userId,$contact_id){
           $query->where('from_id',$contact_id)->where('to_id',$userId);
        })->get();
    }

    public function store(Request $request){
           
        $userId = auth()->id();

        $message = new Message();
        $message->from_id = $userId; 
        $message->to_id = $request->to_id; 
        $message->content = $request->content;
        
        $message->save();

        $data = [];
        $data['message']=$message;
        return $data;
        
    }
}
