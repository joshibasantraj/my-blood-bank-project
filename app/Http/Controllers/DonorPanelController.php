<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use Illuminate\Http\Request;
use App\Models\DonorPanel;
use Illuminate\Support\Facades\Auth;
use App\Models\Donor;
use App\Models\Requests;
use DB;
use Illuminate\Support\Facades\Hash;

class DonorPanelController extends Controller
{
    protected $donorpanel=null;
    protected $donor=null;
    protected $bloods=null;
    protected $requests=null;

    public function __construct(DonorPanel $donorpanel, Donor $donor,Blood $bloods, Requests $requests){
         $this->donorpanel= $donorpanel;
         $this->donor= $donor;
         $this->bloods= $bloods;
         $this->requests= $requests;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data=$this->donorpanel->where('id',Auth::user()->id)->get();
        return view('home.donor_panel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_profile(){
        $this->donor =$this->donor->find(Auth::user()->id);
        if(!$this->donor){
           return redirect()->route('homepage')->with('alert','user not found.');
        }
        return view('home.donor_panel.update_form')->with('donor_data',$this->donor);
    }


    public function update_profile(Request $request,$id){
        $request->request->add(['role'=>'donor']);
      

        $rules =[
            'image'=>'sometimes|image|max:5000',
            'blood_group'=>'required|in:a+,a-,b-,b+,ab-,ab+,o+,o-',
            'mobile'=>'required|string',
          
        ];

        $request->validate($rules);
        $data =$request->all();
        //dd($data);
        $this->donor= $this->donor->find($id);
        if(!$this->donor){
            return redirect()->route('update_profile')->with('alert','user not found.');           
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
        if(!$success){
            return redirect()->route('update_profile')->with('alert','user not updated.');
        } 
              
        return redirect()->route('donorpanel.index')->with('alert','user updated .');
    }





    public function signout(Request $request){
        Auth::logout();
        return redirect('/signin');
    }


    public function donationhistory(){
        $data['email']=Auth::user()->email;
        $success= DB::table('bloods')->select()->where('email',$data['email'])->orderBy('id','DESC')->get();
        // dd($success);
        // $this->bloods =$this->bloods->find(Auth::user()->email);
        //dd($this->bloods);
        return view('home.donor_panel.history')->with('name',$success);
    }


    public function request_view(){
        $this->requests=$this->requests->orderBy('id','DESC')->where('date','>=',date('Y-m-d'))->get();
        return view('home.donor_panel.requests')->with('name',$this->requests);
    }



    public function change_password(){
        $this->donor =$this->donor->find(Auth::user()->id);
        if(!$this->donor){
           return redirect()->route('homepage')->with('alert','user not found.');
        }
        return view('home.donor_panel.change_password_form')->with('donor_data',$this->donor);
    }


    public function update_password(Request $request, $id){
        $rules =[
            'password'=>'required|string|confirmed'
        ];
        $request->validate($rules);
        $data =$request->all();
        //dd($data);
        $this->donor= $this->donor->find($id);
        if(!$this->donor){
            return redirect()->route('update_password')->with('alert','user not found.');           
        }

        $data['password']= Hash::make($request->password);
        $this->donor->fill($data);
        $success =$this->donor->save();
        if(!$success){
            return redirect()->route('update_profile')->with('alert','user not updated.');
        } 
              
        return redirect()->route('donorpanel.index')->with('alert','user updated .');
        
    }
}
