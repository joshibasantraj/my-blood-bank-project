<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Camp;
use App\Models\Donor;
use Illuminate\Http\Request;

class BloodController extends Controller
{
    protected $blood=null;
    protected $camp=null;
    protected $donor=null;
    public function __construct(Blood $blood, Camp $camp, Donor $donor){
        $this->blood=$blood;
        $this->camp=$camp;
        $this->donor=$donor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->blood=$this->blood->orderBy('id','DESC')->get();
        return view('admin.blood.index')->with('blood_data',$this->blood);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camp =$this->camp->where('status','active')->get();
        $return_camp=array();
        foreach($camp as $camp_data){
            $return_camp[$camp_data->title] = $camp_data->title;
        }
        return view('admin.blood.form')->with('data',$return_camp);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules =$this->blood->getRules();
        $request->validate($rules);

        $data =$request->all();
      //dd($data);
        $this->blood->fill($data);
        $success= $this->blood->save();
        if($success){
            $data1=[
                'status'=>'inactive'
            ];
            $this->donor=$this->donor->where('email',$data['email'])->first();
            $id=$this->donor->id;
            $this->donor=$this->donor->find($id);
            $this->donor->fill($data1);
            $this->donor->save();
            
            $request->session()->flash('success','blood donated added successfully');
        }else{
            $request->session()->flash('error','sorry please try again');
        }
        return redirect()->route('blood.index');
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
        $camp =$this->camp->where('status','active')->get();
        $return_camp=array();
        foreach($camp as $camp_data){
            $return_camp[$camp_data->title] = $camp_data->title;
        }
        $this->blood=$this->blood->find($id);
        if(!$this->blood){
            request()->session()->flash('error','Blood Donated list not found.');
            return redirect()->route('blood.index');
        }
        return view('admin.blood.form')->with('edit_data',$this->blood)->with('data',$return_camp);
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
        $rules =$this->blood->getRules('update');
        $request->validate($rules);

        $data =$request->all();
        
        $this->blood =$this->blood->find($id);
        if(!$this->blood){
            $request->session()->flash('error','Sorry, blood donor history not found. Please try again');
        }  

        $this->blood->fill($data);
        $success= $this->blood->save();
        if($success){
            $request->session()->flash('success','Blood daonated list updated successfully');
        }else{
            $request->session()->flash('error','Sorry, not updated at this time. Please try again');
        }
        return redirect()->route('blood.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blood=$this->blood->find($id);
        if(!$this->blood){
            request()->session()->flash('error','blood not found');
            return redirect()->route('blood.index');
        }
       
        $success=$this->blood->delete();
        if($success){
            request()->session()->flash('success','Blood donated deleted successfully');
             
        }else{
            request()->session()->flash('error','Blood donated not deleted');  
        }
        return redirect()->route('blood.index');
    }
}
