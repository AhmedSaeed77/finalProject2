<?php

namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index($id)
    {
        $regions = Region::where('govern_id',$id)->get();
        return $regions;
    }

    public function create(Request $request)
    {   
        $request->validate(
            [
                'name' => 'required',
                'govern_id' => 'required',
            ]
        );
        $region = new Region();
        $region->name = $request->name;
        $region->govern_id = $request->govern_id;
        $region->save();
        return response()->json(['success' => true,'governorate' => $region], 200);
    } 

    public function indexregion()
    {
        $regions = Region::all();
        return view('country.indexregion',compact('regions'));
    }

    public function createregion()
    {
        $governorates = Governorate::all();
        return view('country.createergion',compact('governorates'));
    }

    public function store(Request $request)
    {   
        
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $region = new Region();
        $region->name = $request->name;
        $region->govern_id = $request->govern_id;
        $region->save();
        return redirect()->route('region.index');
    } 

    public function edit($id)
    {
        $region = Region::find($id);
        $governorates = Governorate::all();
        return view('country.editregion',compact('region','governorates'));
    }

    public function update(Request $request,$id)
    {   
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $region = Region::find($id);
        $region->name = $request->name;
        $region->govern_id = $request->govern_id;
        $region->save();
        return redirect()->route('region.index');
    } 

    public function destroy($id)
    {   
        $governorate = Region::find($id);
        $governorate->delete();
        return redirect()->route('region.index');
    } 
}
