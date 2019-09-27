<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRequest;

class AdminRequestController extends Controller
{
    protected $adminRequest=null;
    
    public function __construct(AdminRequest $adminRequest){
       $this->adminRequest =$adminRequest;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminRequest=$this->adminRequest->orderBy('id','DESC')->get();
        return view('admin.request.index')->with('data',$this->adminRequest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.request.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =$this->adminRequest->getRules();
        $request->validate($rules);

        $data =$request->all();
      
        $this->adminRequest->fill($data);
        $success= $this->adminRequest->save();
        if($success){
            $request->session()->flash('success','Request  added successfully');
        }else{
            $request->session()->flash('error','sorry please try again');
        }
        return redirect()->route('blood_request.index');
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
        $this->adminRequest=$this->adminRequest->find($id);
        if(!$this->adminRequest){
            request()->session()->flash('error','Request not found.');
            return redirect()->route('adminRequest.index');
        }
        return view('admin.request.form')->with('data',$this->adminRequest);
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
        $rules =$this->adminRequest->getRules('update');
        $request->validate($rules);

        $data =$request->all();
        
        $this->adminRequest =$this->adminRequest->find($id);   

        $data['email']=$this->adminRequest->email;
        
        $this->adminRequest->fill($data);
        $success= $this->adminRequest->save();
        if($success){
            $request->session()->flash('success','Request updated successfully');
        }else{
            $request->session()->flash('error','Sorry, not updated at this time. Please try again');
        }
        return redirect()->route('blood_request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->adminRequest=$this->adminRequest->find($id);
        if(!$this->adminRequest){
            request()->session()->flash('error','Request not found');
            return redirect()->route('adminRequest.index');
        }
       
        $success=$this->adminRequest->delete();
        if($success){
            request()->session()->flash('success','Request deleted successfully');
             
        }else{
            request()->session()->flash('error','Request not deleted');  
        }
        return redirect()->route('blood_request.index');
    }
}
