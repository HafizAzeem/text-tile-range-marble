<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Vendor;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $vendors = DB::table('vendors')->paginate(15);

        return view('vendor.index', compact('vendors'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'balance' => 'required',
        ]);
        $vendor = new Vendor;
        
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->balance = $request->balance;
        $vendor->address = $request->address;
        $vendor->notes = $request->notes;
        $vendor->mobile = $request->mobile;
        $vendor->telephone = $request->telephone;
        $vendor->save();
         return redirect('vendor')->with('user','Vendor Added successfully');
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
        
        $vendor = Vendor::find($id);
          return view('vendor.form',compact('vendor'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'balance' => 'required', 
        ]);
        $vendor= Vendor::find($id);
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->mobile = $request->mobile;
        $vendor->telephone = $request->telephone;
        $vendor->balance = $request->balance;
        $vendor->notes = $request->notes;
        $vendor->save();
  
    
        return redirect('vendor') ->with('update','Vendor Updated successfully');
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
         return redirect('vendor') ->with('user','Vendor Delete successfully');
    }
}
