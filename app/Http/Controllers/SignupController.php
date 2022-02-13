<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{
    public static function index(){
        return view('signup');
    }

    public static function signUp(Request $request){
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'middle_name' => 'nullable|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns|unique:accounts,email',
            'role' => 'required',
            'password' => 'required|min:8',
            'file' => 'required|image',
        ]);

        $account = new Account();
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;

        if($request->gender == 'Male')
            $account->gender_id = 1;
        
        if($request->gender == 'Female')
            $account->gender_id = 2;
        $account->email = $request->email;
        
        if($request->role == 'Admin')
            $account->role_id = 1;
        
        if($request->role == 'User')
            $account->role_id = 2;
        
        $account->password = password_hash($request->password, PASSWORD_DEFAULT);

        $image = $request->file('file');
        $imagename = $image->getClientOriginalName();
            
        Storage::putFileAs('public/images', $image, $imagename);
        $imagepath = 'images/'.$imagename;
        
        $account->display_picture_link = $imagepath;
        
        $account->save();

        return redirect()->back()->with('message','Sign Up success!');
    }
}
