<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    protected $table="requesters";

    protected $fillable=['name','address','email','gender','age','blood_group','role','mobile','date','details'];

    public function getRules($options='add'){
        return [
            'name'=>'required|string',
            'email'=>(($options == 'add') ? 'required' : 'nullable').'|email|'.(($options == 'add') ? 'unique:requesters,email' : ''),
            
            'address'=>'required|string',
            'age'=>'nullable|integer',
            'mobile'=>'required|string',
            'date'=>'required|date',
            'details'=>'nullable|string',
            
            'gender'=>'required|in:male,female',
            'blood_group'=>'required|in:a+,a-,b-,b+,ab-,ab+,o+,o-',
        ];
    }

}
