<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public static function index(){
        return view('login');
    }

    public static function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            return redirect('/home');
        }else{
            return redirect()->back()->with('message', 'Wrong Email or Password!');
        }

    }

    public function logout(){
        Auth::logout();
        
        return redirect('/login');
    }

    public function profile(){

        return view('profile');
    }

    public function edit(Request $request){
        
        $account = Account::find(Auth::User()->id);
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'middle_name' => 'nullable|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns|unique:accounts,email,'.$account->id.',id',
            'role' => 'required',
            'password' => 'nullable|min:8',
            'file' => 'nullable|image',
        ]);

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

        if($request->password != null)
            $account->password = password_hash($request->password, PASSWORD_DEFAULT);
        
        $image = $request->file('file');

        if($image!=null){
            $imagename = $image->getClientOriginalName();
            Storage::putFileAs('public/images', $image, $imagename);
            $imagepath = 'images/'.$imagename;
            $account->display_picture_link = $imagepath;
        }
        
        $account->save();

        return redirect()->back()->with('message','Edit Profile success!');
    }

    public function accMain(){
        $account = Account::all();
        return view('accountMaintenance',['account'=>$account]);
    }

    public function updateRoleIndex($id){
        $account = Account::Where('id',$id)->first();
        return view('updateRole',['account'=>$account]);
    }

    public function updateRole(Request $request, $id){
        $account = Account::Where('id',$id)->first();


        if($request->role=='Admin')
            $account->role_id=1;
        if($request->role=='User')
            $account->role_id=2;
        
        $account->save();
        
        return redirect('/accountMaintenance');
    }

    public function deleteAccount($id){
        DB::delete('DELETE FROM Accounts WHERE id = ?', [$id]);
        return redirect()->back();
    }

}
