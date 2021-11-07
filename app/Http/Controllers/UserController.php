<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
          $apikey = base64_encode(Str::random(10));
          User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
          return response()->json(['status' => 'success','api_key' => $apikey]);
   }
    
  public function showAllUsers()
  {
    return response()->json(User::all());
  }
   
  public function showOneUsers($id)
  {
    /**
     * Check if ID is integer
     */
        
    return response()->json(User::find($id));
  }
}    
