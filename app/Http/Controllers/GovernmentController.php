<?php

namespace App\Http\Controllers;
use App\Models\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GovernmentController extends Controller
{
    public function index()
    {
        $governments = Governorate::all();
        return view('country.index',compact('governments'));
    }

    public function index2()
    {
        $governments = Governorate::all();
        return $governments;
    }

    public function create()
    {
        return view('country.creategovernment');
    }

    public function store(Request $request)
    {   
        
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $governorate = new Governorate();
        $governorate->name = $request->name;
        $governorate->save();
        return redirect()->route('governmet.index');
    } 

    public function edit($id)
    {
        $governorate = Governorate::find($id);
        return view('country.editgovernment',compact('governorate'));
    }

    public function update(Request $request,$id)
    {   
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $governorate = Governorate::find($id);
        $governorate->name = $request->name;
        $governorate->save();

        return redirect()->route('governmet.index');
    } 

    public function destroy($id)
    {   
        $governorate = Governorate::find($id);
        $governorate->delete();
        return redirect()->route('governmet.index');
    } 
}
