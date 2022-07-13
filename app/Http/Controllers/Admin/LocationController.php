<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.location',compact('locations'));
    }

    public function create(){
        return view('admin.add-location');
    }

    public function storeLocation(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:locations',
        ]);
        $location = new Location;
        $location->name = $request->name;
        $location->slug = Str::slug($request->slug);
        $location->save();
        
        return redirect()->back()->with('message','Location added successfully');
    }

    public function editLocation($id){
        $location = Location::find($id);
        return view('admin.edit-location',compact('location'));
 
     }

     public function updateLocation(Request $request, $id){
        $location = Location::find($id);
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->save();

        return redirect()->back()->with('message','Location updated successfully');
    }

    public function deleteLocation($id){
        $location = Location::find($id);
        $location->delete();

        return redirect()->back()->with('message','Location removed successfully');
    }
}
