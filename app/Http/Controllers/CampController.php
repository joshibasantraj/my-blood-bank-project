<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camp;
use App\Models\CampImages;
use DB;

class CampController extends Controller
{
    protected $camp = null;
    protected $camp_images = null;
    public function __construct(Camp $camp)
    {
         $this->camp = $camp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->camp = $this->camp->orderBy('id', 'DESC')->get();
        return view('admin.camps.index')->with('camp_data', $this->camp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.camps.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->camp->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['added_by'] = $request->user()->id;

        if ($request->image) {
            $file_name = uploadImage($request->image, 'camps');
            if ($file_name) {
                $data['image'] = $file_name;
            } else {
                $data['image'] = null;
            }
        }


        $this->camp->fill($data);
        $success = $this->camp->save();

        if ($success) {
            if ($request->other_images) {
                foreach ($request->other_images as $other_images) {
                    $file = uploadImage($other_images, 'camps');
                    if ($file) {
                        $temp = array(
                            'camp_id' => $this->camp->id,
                            'other_images' => $file
                        );
                        CampImages::insert($temp);
                    }
                }
            }
            $request->session()->flash('success', 'Camp added successfully');
        } else {
            $request->session()->flash('error', 'sorry please try again');
        }
        return redirect()->route('camp.index');
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
        $this->camp = $this->camp->getById($id);
        if (!$this->camp) {
            request()->session()->flash('error', 'Camp not found.');
            return redirect()->route('camp.index');
        }
        return view('admin.camps.form')->with('edit_data', $this->camp);
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
        $rules = $this->camp->getRules('update');
        $request->validate($rules);

        $data = $request->all();

        $this->camp = $this->camp->find($id);

        if ($request->image) {
            $file_name = uploadImage($request->image, 'camps');
            if ($file_name) {
                $data['image'] = $file_name;

                if (file_exists(public_path() . '/images/camps/' . $this->camp->image)) {
                    unlink(public_path() . '/images/camps/' . $this->camp->image);
                }
            }
        }


        $this->camp = $this->camp->fill($data);
        $success = $this->camp->save();
        if ($success) {
            if ($request->other_images) {
                foreach ($request->other_images as $other_images) {
                    $file = uploadImage($other_images, 'camps');
                    if ($file) {
                        $temp = array(
                            'camp_id' => $this->camp->id,
                            'other_images' => $file,
                        );
                        CampImages::insert($temp);
                    }
                }
            }
            if (isset($request->del_image)) {
                foreach ($request->del_image as $del_image) {

                    $del = DB::table('camp_images')->where('other_images', '=', $del_image)->delete();
                    if ($del) {
                        if (file_exists(public_path() . '/images/camps/' . $del_image)) {
                            unlink(public_path() . '/images/camps/' . $del_image);
                        }
                    }
                }
            }
            $request->session()->flash('success', 'Camp updated successfully');
        } else {
            $request->session()->flash('error', 'Sorry, not updated at this time. Please try again');
        }
        return redirect()->route('camp.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->camp = $this->camp->find($id);
        if (!$this->camp) {
            request()->session()->flash('error', 'Camp not found');
            return redirect()->route('camp.index');
        }
        $image = $this->camp->image;
        $success = $this->camp->delete();
        if ($success) {
            if (!empty($image) && file_exists(public_path() . '/images/camps/' . $image)) {
                unlink(public_path() . '/images/camps/' . $image);
            }
            request()->session()->flash('success', 'Camp deleted successfully');
        } else {
            request()->session()->flash('error', 'Camp not deleted');
        }
        return redirect()->route('camp.index');
    }
}
