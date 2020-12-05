<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\Models\User;
use App\Users;

class ConversationController extends Controller
{
    public function index(){
       
        return Conversation::where('user_id', auth()->id())->get();
        //   return Conversation::where('contact_id','!=', auth()->id())->get();
    
    }

}
