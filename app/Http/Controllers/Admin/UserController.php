<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Profile;
use DB;
use Auth;

class UserController extends Controller{
    public function index(){
        return view('admin.user.add-user');
    }
    protected function userValidation($request){
        $this->validate($request, [
            'name'          => 'required|min:3|max:50',
            'author_name'   => 'required',
            'status'        => 'required',
            'designation'   => 'required|regex:/^[a-zA-Z\s]+$/',
            'district'      => 'required',
            'password'      => 'required||regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|min:6|confirmed',
            'image'         => 'required',
            'phone_number'  => 'required|max:11',
            ],
            [
                'name.required' => 'Your name must be required!',
                'author_name.required' => 'Please select this author name!',
                'phone_number.max' => 'Not more than 11 digit',
                'status.required' => 'Please select the status!',
                'designation.regex' => 'Letter & Space only Accepted!',
                'password.regex' => 'Password must be minimum 6 characters with at least 1 upper case, 1 lower case, 1 numeric character and 1 special character.',
                'password.confirmed' => 'Password is not matching'
            ]
        );
    }
    protected function userImageUpload($request ){
        $slideImage     =   $request->file('image');
        $filetype       =   $slideImage->getClientOriginalExtension();
        $imageName      =   $request->name.'.'.$filetype;
        $directory      =   'uploads/';
        $imageUrl       =   $directory.$imageName;
        Image::make($slideImage)->resize(972, 800)->save($imageUrl);
        return $imageUrl;
    }
    public function userSaveInfo($request,$imageUrl){
        $user               = new User();
        $user->email        = $request->email;
        $user->name         = $request->name;
        $user->password     = bcrypt($request->password);
        $user->auth_type    = $request->author_name;
        $user->save();

        $profile            = new Profile();
        $id                 = User::select('id')->where('email', $request->email)->first();
        $profile->user_id = $id->id;
        
        $profile->image         = $imageUrl;
        $profile->designation   = $request->designation;
        $profile->district      = $request->district;
        $profile->phone_number  = $request->phone_number;
        $profile->status        = $request->status;
        $profile->save();
        session::put('userId',$id);
    }

    public function sotre(Request $request){
        $this->userValidation($request);
        $imageUrl               =   $this->userImageUpload($request);
        $this->userSaveInfo($request,$imageUrl);
        return redirect('/user')->with('message','User Info Save Successfully');
    }
    public function manageUserInfo(){
        $userId     =  Auth::user()->id;
        $auth_type  =  Auth::user()->auth_type;
        if($auth_type=="user"){
            $users =DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->select('users.name','users.id','users.email','users.auth_type','profiles.designation','profiles.district','profiles.phone_number','profiles.status','profiles.image')
                    ->where('profiles.user_id',$userId)
                    ->get();
                return view('admin.user.manage-user',['users'=>$users]);
        }else{
            $users  =DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->select('users.name','users.id','users.email','users.auth_type','profiles.designation','profiles.district','profiles.phone_number','profiles.status','profiles.image')
                    ->get(); 
                        // return $users;
            return view('admin.user.manage-user',['users'=>$users]);
        }
    }
    public function inactiveUser($id){
        $users  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id',$id)
                    ->update(['status'=>0]);
                    // return $users;
        return redirect('manage/user')->with('message', 'User info inactive successfully');
    }
    public function activeUser($id){
        $users  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id',$id)
                    ->update(['status'=>1]);
        return redirect('manage/user')->with('message', 'User info Active successfully');
    }
    public function editUser($id){
        $user  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id',$id)
                    ->first();
                    // return $user;
        return view('admin.user.edit-user',['user'=>$user]);
    }
    public function userUpdateBasicInfo(Request $request, $imageUrl=null){
        $user = User::where('email', $request->email)->first();
        // return $user;
        $user->name         = $request->name;
        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }else{
            $user->password = $request->password;
        }
        $user->auth_type = $request->author_name;
        // return $user;
        $user->save();   
        
        $profile                = Profile::find($request->u_id);
        // return $profile;
        $userImage              =   $request->file('image');
        $profile->designation   = $request->designation;
        $profile->district      = $request->district;
        $profile->phone_number  = $request->phone_number;
        if($imageUrl){
            $profile->image     =   $imageUrl;
        }
        $profile->status        = $request->status;
        if($userImage){
            unlink($profile->image);
            $imageUrl   =   $this->userImageUpload($request);
            $this->userUpdateBasicInfo($request,$imageUrl);
        }else{
            $this->userUpdateBasicInfo($request);
        }
        // return $profile;
        $profile->save(); 
        return redirect('/manage/user')->with('message','User Info Update Successfully');
    } 
    public function userUpdateFinalInfo(Request $request,$imageUrl=null){
        $profile                = Profile::find($request->u_id);
        // return $profile;
        // $userImage              =   $request->file('image');
        $profile->designation   = $request->designation;
        $profile->district      = $request->district;
        $profile->phone_number  = $request->phone_number;
        if($imageUrl){
            $profile->image     =   $imageUrl;
        }
        $profile->status        = $request->status;
        return $profile;

        if($userImage){
            unlink($profile->image);
            $imageUrl   =   $this->userImageUpload($request);
            $this->userUpdateBasicInfo($request,$imageUrl);
        }else{
            $this->userUpdateBasicInfo($request);
        }
        // return $profile;
        $profile->save(); 
        return redirect('/manage/user')->with('message','User Info Update Successfully');
    }

    public function emailCheck($email){
        $user=   User::where('email',$email)->first();
        if ($user){
            echo 'This Email Already exist.Try new email !';
        }else{
            echo 'This Email Available for you !';
        }
    }
}
