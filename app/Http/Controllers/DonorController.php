<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    protected $donor= null;
    
    public function __construct(Donor $donor)
    {
      $this->donor= $donor;   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->donor=$this->donor->orderBy('id','DESC')->where('id','!=',request()->user()->id)->get();
        return view('admin.donor.index')->with('data',$this->donor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donor.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =$this->donor->getRules();
        $request->validate($rules);

        $data =$request->all();
        
        if($request->image){
            $file_name =uploadImage($request->image,'users');
            if($file_name){
                $data['image']=$file_name;
            }else{
                $data['image']=null;
            }
        }
        $data['password']=Hash::make($request->password);
       
        $data['added_by']=$request->user()->id;
        $this->donor->fill($data);
        $success= $this->donor->save();
        if($success){
            $request->session()->flash('success','User added successfully');
        }else{
            $request->session()->flash('error','sorry please try again');
        }
        return redirect()->route('donor.index');

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
        $this->donor =$this->donor->find($id);
        if(!$this->donor){
            request()->session()->flash('error','donor not found');
            return redirect()->route('donor.index');
        }
        return view('admin.donor.form')->with('donor_data',$this->donor);
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
        //dd($request);
        $this->donor= $this->donor->find($id);
        if(!$this->donor){
            request()->session()->flash('error','donor not found');
            return redirect()->route('donor.index');
        }

        $rules =$this->donor->getRules('update');
        $request->validate($rules);
       // dd($request);
       
        $data =$request->all();
        $data['email']=$this->donor->email;
        if($request->change_password){
            $data['password']= Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

       
        $image=$this->donor->image;
        if($request->image){
            $file_name =uploadImage($request->image,'users');
            if($file_name){
                $data['image']=$file_name;
                if(!empty($image) && file_exists(public_path().'/images/users/'.$image)){
                    unlink(public_path().'/images/users/'.$image);
                }
            }
        }

       
        $this->donor->fill($data);
        $success =$this->donor->save();
        if($success){
            $request->session()->flash('success','donor updated successfully');
        }else{
            $request->session()->flash('error',' error while updating donor ');
        }
        return redirect()->route('donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->donor=$this->donor->find($id);
        if(!$this->donor){
            request()->session()->flash('error','donor not found');
            return redirect()->route('donor.index');
        }
        $image=$this->donor->image;
        $success=$this->donor->delete();
        if($success){
            if(!empty($image) && file_exists(public_path().'/images/users/'.$image)){
                unlink(public_path().'/images/users/'.$image);
            }
            request()->session()->flash('success','donor deleted successfully');
             
        }else{
            request()->session()->flash('error','donor not deleted');  
        }
        return redirect()->route('donor.index');
    }





    public function adminProfile(){
        $this->donor =$this->donor->find(request()->user()->id);
        if(!$this->donor){
            request()->session()->flash('error','donor not found');
            return redirect()->route('donor.index');
        }
        return view('admin.donor.admin-form')->with('donor_data',$this->donor);
    }



    public function UpdateAdmin(Request $request ,$id){
        $request->request->add(['role'=>'admin']);
        $request->request->add(['status'=>'active']);
        


        $rules =$this->donor->getRules('update');
        $request->validate($rules);

        $data =$request->all();
        if($request->change_password){
            $data['password']= Hash::make($data['password']);
        }else{
            unset($data['password']);
            
        }

        $this->donor= $this->donor->find($id);
        $this->donor->fill($data);
        $success =$this->donor->save();
        if($success){
            $request->session()->flash('success','Profile updated successfully');
        }else{
            $request->session()->flash('error',' error while updating profile ');
        }
        return redirect()->route('donor.index');
    }
}
