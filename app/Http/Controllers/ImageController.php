<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    protected $images = null;
    public function __construct(Image $images)
    {
        $this->images = $images;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->images = $this->images->get();

        return view('admin.images.index')->with('image_data', $this->images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->images->getRules();
        $request->validate($rules);

        $data = $request->all();

        if ($request->image) {
            $file_name = uploadImage($request->image, 'image');
            if ($file_name) {
                $data['image'] = $file_name;
            } else {
                $data['image'] = null;
            }
        }

        $this->images->fill($data);
        $success = $this->images->save();

        if ($success) {
            $request->session()->flash('success', 'Image added Successfully.');
        } else {
            $request->session()->flash('error', 'problem adding image');
        }
        return redirect()->route('image.index');
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
        $this->images = $this->images->find($id);

        if (!$this->images) {
            request()->session()->flash('error', 'image does not found');
            return redirect()->route('image.index');
        }
        return view('admin.images.form')->with('image_data', $this->images);
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
        $rules = $this->images->getRules('update');
        $request->validate($rules);

        $data = $request->all();
        $this->images = $this->images->find($id);
        
        
        if($request->image){
            $file_name = uploadImage($request->image,'image');
        if($file_name){
            $data['image'] =$file_name;
            if(file_exists(public_path().'/images/image/'.$this->images->image))
                unlink(public_path().'/images/image/'.$this->images->image);
        }
    }
        
        
        $this->images->fill($data);
        $success = $this->images->save();

        if ($success) {
            $request->session()->flash('success', 'Image updated Successfully.');
        } else {
            $request->session()->flash('error', 'problem updating images');
        }
        return redirect()->route('image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->images = $this->images->find($id);

        if (!$this->images) {
            request()->session()->flash('error', 'image not found');
            return redirect()->route('image.index');
        }
        $image = $this->images->image;
        $del = $this->images->delete();
        if ($del) {
            if (!empty($image) && file_exists(public_path() . '/images/image/' . $image)) {
                unlink(public_path() . '/images/image/' . $image);
            }
            request()->session()->flash('success', 'Image deleted successfully');
        } else {
            request()->session()->flash('error', ' problem deleting Image ');
        }

        return redirect()->route('image.index');
    }
}
