<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $appends=['contactName','contactImage'];

    public function getContactNameAttribute(){
        return $this->contact->name;    
    }

    public function getContactImageAttribute(){
        return '/images/'.$this->contact->image;    
    }

    public function contact(){
        //Conversation N 1 User (one to many (inverse))
        return $this->belongsTo(User::Class);  
    }
}
