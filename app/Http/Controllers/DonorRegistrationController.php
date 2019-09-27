<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;

class DonorRegistrationController extends Controller
{
    protected $donor =null;
    public function __construct(Donor $donor){
       return $this->donor =$donor;
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules =[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed',
            'image'=>'required|image|max:5000',
            'blood_group'=>'required|in:a+,a-,b-,b+,ab-,ab+,o+,o-',
            'mobile'=>'required|string'
        ];
        $request->validate($rules);

        $data=$request->except('_token', 'password_confirmation');
        if($request->image)
        $data['image']= uploadImage($request->image,'users');
        $data['password']=Hash::make($request->password);
        $data['created_at']=now();
        $success= DB::table('users')->insert($data);

        if($success){
            return redirect()->route('homepage')->with('alert','User added successfully');
        }else{
            return redirect()->route('homepage')->with('alert','User not added at this time');
        }

       

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


    public function searchblood(Request $request)
    {
        
        $this->donor = $this->donor->where('status', 'active')->orderBy('id','DESC')->Where('blood_group', '=',  $request->search)->get();
       
    //dd($this->donor);
    return view('home.displaySearchresult')->with('search', $this->donor);
    }



    public function donor_login(Request $request){
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            
                if($request->user()->role =='donor'){
                    return redirect()->route('donorpanel.index');
                }else{
                    return redirect()->route('admin');
                }
                
            }
            
        else{
            return redirect()->back()->with('alert','Username/password not match. Please try again later.');
        }
    }


}
