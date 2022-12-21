<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Profile;
use DB;

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
        Image::make($slideImage)->resize(800, 972)->save($imageUrl);
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
        $profile->phone_number = $request->phone_number;
        $profile->save();
    }

    public function sotre(Request $request){
        $imageUrl   =   $this->userImageUpload($request);
        $this->userSaveInfo($request,$imageUrl);
        return redirect('/user')->with('message', 'User Info Save Successfully');
    }
    public function manageUserInfo(){
        $users  =   DB::table('profiles')
                    ->join('users','profiles.user_id', '=', 'users.id')
                    ->select('users.name','users.email','users.auth_type','profiles.designation','profiles.phone_number','profiles.image')
                    ->get(); 
                    // return $users;
        return view('admin.user.manage-user',['users'=>$users]);
    }
}
