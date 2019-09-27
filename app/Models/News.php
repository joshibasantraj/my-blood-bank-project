<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['title','summary','description','location','news_date','status','image','contact'];

    public function getRules(){
        return [
        'title'=>'required|string',
        'summary'=>'nullable|string',
        'description'=>'nullable|string',
        'location'=>'nullable|string',
        'news_date'=>'required|date',
        'contact'=>'nullable|string',
       
        'status'=>'required|in:published,unpublished',
        'image'=>'sometimes|image|max:5000'
    ];
}

}
