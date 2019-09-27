<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =['title','status','image'];
    protected $table="images";


    public function getRules($options='add'){
        return [
            'title'=>'nullable|string',
           'image'=>(($options == 'add') ? 'required' : 'required').'|image|max:5000',
            'status'=>'required|in:active,inactive',
           
        ];
    }
}
