<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Addressee;
use Illuminate\Http\Request;

class AddresseeController extends BaseController
{
    public function showAllAddressees()
    {
        return response()->json(Addressee::all());
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function showOneAddressees($id){
        return response()->json(Addressee::find($id));
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     * 
     */
    public function createAddressees(Request $request)
    {
        /**
         * Beefed up validation
         */
        $this->validate($request,[
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone'      => 'required|regex:/(01)[0-9]{9}/',
            'email'      => 'required|email'
            ]);
        
        $addressee = Addressee::create($request->all());

        return response()->json($addressee, 201);
    }
    
    /**
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function updateAddressees($id, Request $request)
    {
        $author = Addressee::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function deleteAddressees($id)
    {
        Addressee::findOrFail($id)->delete();
        return response('Addressee Deleted Successfully', 200);
    }
}
