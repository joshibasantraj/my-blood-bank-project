<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Requests;
use App\Models\Camp;
use App\Models\CampImages;
use App\Models\News;
use App\Models\Image;

class FrontendController extends Controller
{
    protected $request =null;
    protected $camp =null;
    protected $campImages=null;
    protected $news=null;
    protected $image=null;

    public function __construct(Requests $request,Camp $camp, CampImages $campImages, News $news, Image $image){
      $this->request=$request;
      $this->camp=$camp;
      $this->campImages=$campImages;
      $this->news=$news;
      $this->image=$image;
    }

    public function index(){
        $this->image=$this->image->where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $this->news=$this->news->orderBy('id','DESC')->limit(2)->where('status','published')->where('news_date','>=',date('Y-m-d'))->get();
        return view('home.index')->with('news',$this->news)->with('image',$this->image);
    }

    public function contact_us(){
        return view('home.contact_us');
    }

    public function about_us(){
        return view('home.about_us');
    }

    public function register(){
        return view('home.register');
    }

    public function request(){
        return view('home.blood_request');
    }


    public function view_request(){
        $this->request=$this->request->orderBy('date','ASC')->where('date','>=',date('Y-m-d'))->get();
        return view('home.blood_view_request')->with('name',$this->request);
    }


    public function camps(){
        $this->camp=$this->camp->orderBy('id','DESC')->where('status','active')->get();
        return view('home.camps')->with('camp',$this->camp);
    }

    public function allcampimages($id){
        $this->campImages=$this->campImages->orderBy('id','DESC')->where('camp_id',$id)->get();
        return view('home.campgallery')->with('camp_images',$this->campImages);
    }




    public function signin(){
        return view('home.signin');
    }

    public function search(){
        return view('home.search');
    }


    public function donorhelp(){
        return view('home.donorhelp');
    }

}
