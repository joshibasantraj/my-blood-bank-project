<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    protected $fillable=['title','details','date','status','organized_by','address','image','on','added_by'];

    public function getRules($options='add'){
        return [
            'title'=>'required|string',
             'organized_by'=>'required|string',
            'details'=>'nullable|string',
            'address'=>'required|string',
            'image'=>(($options == 'add') ? 'required' : 'sometimes').'|image|max:5000',
            'other_images.*'=>'sometimes|image|max:5000',
            'on'=>'required|date',
            'status'=>'required|in:active,inactive'
        ];
    }

    public function camp_images(){
        return $this->hasMany('App\Models\CampImages','camp_id','id');
    }

    public function getById($id){
        return $this->with('camp_images')->find($id);
    }
}
