<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    protected $news=null;
    public function __construct(News $news){
        return $this->news=$news;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->news=$this->news->get();
       return view('admin.news.index')->with('news_data',$this->news); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        return view('admin.news.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= $this->news->getRules();
        $request->validate($rules);

        $data= $request->all();
        if($request->image){
            $image =uploadImage($request->image,'news');
            if($image){
                $data['image'] =$image;
            }else{
                $data['image'] =null;
            }
        }

        $this->news=$this->news->fill($data);
        $success= $this->news->save();
        if($success){
            $request->session()->flash('success','News added successfully');
        }else{
            $request->session()->flash('error','News not added');
        }
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->news=$this->news->find($id);
        if(!$this->news){
            request()->session()->flash('error','News not found');
            return redirect()->route('news.index');
        }
        else{
            return view('admin.news.form')->with('news_data',$this->news);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= $this->news->getRules();
        $request->validate($rules);

        $data= $request->all();

        $this->news =$this->news->find($id);
        $old_image=$this->news->image;
        //dd($old_image);

            if($request->image){
                $image =uploadImage($request->image,'news');
                if($image){
                    if($old_image != null && file_exists(public_path()."/images/news/".$old_image)){
                        unlink(public_path()."/images/news/".$old_image);
                    }
                    $data['image'] =$image;
                }
        }

        $this->news=$this->news->fill($data);
        $success= $this->news->save();
        if($success){
            $request->session()->flash('success','News updated successfully');
        }else{
            $request->session()->flash('error','News not updated');
        }
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news=$this->news->find($id);
        if(!$this->news){
            request()->session()->flash('error','News not found');
            return redirect()->route('news.index');
        }
        $image =$this->news->image;

       $delete= $this->news->delete();
       if($delete){
           if($image != null && file_exists(public_path().'/images/news/'.$image)){
               unlink(public_path().'/images/news/'.$image);
           }
            request()->session()->flash('success','News deleted successfully');
       }else{
            request()->session()->flash('error','News not deleted');
       }
       return redirect()->route('news.index');
    }
}
