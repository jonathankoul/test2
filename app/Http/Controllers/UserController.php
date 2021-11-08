<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends BaseController
{
    
  public function __construct()
   {
     $this->middleware('auth:api');
   }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    
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
  
   /**
     * 
     * @param Request $request
     * @return type
     * 
     */
    public function createUsers(Request $request)
    {
        /**
         * Beefed up validation
         */
        $this->validate($request,[
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required|regex:/(01)[0-9]{9}/',
            'email'      => 'required|email',
            'password'   => 'required'
            ]);
        
        $user = User::create($request->all());

        return response()->json($user, 201);
    }
    
    /**
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function updateUsers($id, Request $request)
    {
        $user = User::findOrFail($id);
        /**
         * Beefed up validation
         */
        $this->validate($request,[
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required|regex:/(01)[0-9]{9}/',
            'email'      => 'required|email',
            'password'   => 'required'
            ]);
        $user->update($request->all());

        return response()->json($user, 200);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function deleteUsers($id)
    {
        User::findOrFail($id)->delete();
        return response('User Deleted Successfully', 410);
    }
}    
