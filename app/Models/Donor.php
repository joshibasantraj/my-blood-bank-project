<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table="users";

    protected $fillable=['name','address','email','password','age','blood_group','status','role','mobile','image','added_by','gender'];

    public function getRules($options='add'){
        return [
            'name'=>'required|string',
             'email'=>(($options == 'add') ? 'required' : 'nullable').'|email|'.(($options == 'add') ? 'unique:users,email' : ''),
            'address'=>'required|string',
            'age'=>'nullable|integer',
            'mobile'=>'required|string',
            'image'=>(($options == 'add') ? 'required' : 'sometimes').'|image|max:5000',
           'password'=>(($options == 'add') ? 'required' : 'nullable').'|string|confirmed',
            'status'=>'required|in:active,inactive',
            'gender'=>'required|in:male,female',
            'role'=>'required|in:admin,donor',
            'blood_group'=>'required|in:a+,a-,b-,b+,ab-,ab+,o+,o-',
        ];
    }
}
