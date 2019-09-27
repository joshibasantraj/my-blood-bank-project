<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $fillable=['email','camp','donated_date','quantity'];
    protected $table='bloods';

    public function getRules($options='add'){
        return [
            'email'=>(($options == 'add') ? 'required' : 'nullable').'|email',
            'camp'=>(($options == 'add') ? 'required' : 'nullable').'|exists:camps,title',
            'quantity'=>(($options == 'add') ? 'required' : 'nullable').'|integer',
            'donated_date'=>(($options == 'add') ? 'required' : 'nullable').'|date',
        ];
    }
    
}
