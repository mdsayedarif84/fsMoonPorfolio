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
    protected function userImageUpload($request ){
        $slideImage           =   $request->file('image');
        $filetype = $slideImage->getClientOriginalExtension();
        $imageName = $request->name . '.' . $filetype;
        $directory              =   'uploads/';
        $imageUrl               =    $directory.$imageName;
        Image::make($slideImage)->resize(972, 800)->save($imageUrl);
        return $imageUrl;
    }
    public function userSaveInfo($request,$imageUrl){
        
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->auth_type = $request->author_name;
        $user->save();

        $profile = new Profile();
        $id = User::select('id')->where('email', $request->email)->first();
        $profile->user_id = $id->id;
        
        $profile->image = $imageUrl;
        $profile->designation = $request->designation;
        $profile->district = $request->district;
        $profile->phone_number = $request->phone_number;
        $profile->status = $request->status;
        $profile->save();
        session::put('userId',$id);
    }

    public function sotre(Request $request){
        $imageUrl   =   $this->userImageUpload($request);
        $this->userSaveInfo($request,$imageUrl);
        return redirect('/user')->with('message', 'User Info Save Successfully');
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

        // $profile = Profile::find($id);
        // // return $profile;
        // $profile->status = 0;
        // $profile->save();
        $users  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id',$id)
                    ->update(['status'=>0]);
                    // return $users;
        // $users->status  = 0;
        // return $users;
        // $users->save();
        return redirect('manage/user')->with('message', 'User info inactive successfully');
    }
    public function activeUser($id){
        // $profile = Profile::find($id);
        // // return $profile;
        // $profile->status = 1;
        // $profile->save();
        $users  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id',$id)
                    ->update(['status'=>1]);
        return redirect('manage/user')->with('message', 'User info Active successfully');
    }
}
