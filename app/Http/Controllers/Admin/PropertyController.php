<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Image;

class PropertyController extends Controller
{
    public function index(){
        $properties = Property::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.property',compact('properties'));
    }

    public function create(){
        $locations = Location::all();
        $categories = Category::all();
        return view('admin.add-property',compact('locations','categories'));
    }

    public function storeProperty(Request $request)
    {
       $data = $request->validate([
          'title' => 'required',
          'slug' => 'required|unique:properties',
          'description' => 'required',
          'location_id' => 'required',
          'address' => 'required',
          'price' => 'required',
          'category_id' => 'required',
          'property_type' => 'required',
          'status' => 'required',
          'landlord_name' => '',
          'landlord_phone' => '',
          'agent_name' => '',
          'agent_phone' => '',
          'main_image' => 'required',
    ]); 
        $new_property = Property::create($data);

        if ($request->has('main_image')) {
            $image = $request->main_image;
            $imageName = $data['title'].'-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$image->extension();
            $request->main_image->move(public_path('property_main_images'),$imageName);
            $new_property->main_image = $imageName;
            $new_property->save();
        };
       
        if($request->has('images')){
            foreach($request->file('images') as $image){
                $imageName = $data['title'].'-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$image->extension();
                $image->move(public_path('property_sub_images'),$imageName);
                Image::create([
                    'property_id'=>$new_property->id,
                    'image'=>$imageName
                ]);
            }
        }
 
        return redirect()->back()->with('message', 'Property added successfully');
    }

}
