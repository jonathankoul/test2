<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{
  public function __construct()
   {
     //  $this->middleware('auth:api');
   }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function authenticate(Request $request)
   {
       $this->validate($request, [
       'email' => 'required',
       'password' => 'required'
        ]);
      $user = User::where('email', $request->input('email'))->first();
//      $test = Hash::check($request->input('password'));
//     if(Hash::check($request->input('password'), $user->password)){
          $apikey = base64_encode("1234");
          User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
          return response()->json(['status' => 'success','api_key' => $apikey]);
//      }else{
//          return response()->json(['status' => $test],401);
//      }
   }
}    
