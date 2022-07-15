<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request){
        $properties = Property::
        where('title', 'like', '%'.$request->input('query').'%')
        ->orWhere('title', 'like', '%'.$request->input('query').'%')
        ->orWhere('price', 'like', '%'.$request->input('query').'%')
        ->orWhere('location_id', 'like', '%'.$request->input('query').'%')
        ->orWhere('category_id', 'like', '%'.$request->input('query').'%')
        ->orWhere('property_type', 'like', '%'.$request->input('query').'%')
        ->orWhere('landlord_name', 'like', '%'.$request->input('query').'%')
        ->orWhere('agent_name', 'like', '%'.$request->input('query').'%')
        ->orWhere('status', 'like', '%'.$request->input('query').'%')
        ->orWhere('created_at', 'like', '%'.$request->input('query').'%')
        ->orderBy('created_at', 'DESC')->paginate(10);
        // $category = Category::where('category_id',$properties->id)->get();
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
//adding main image
        if ($request->has('main_image')) {
            $image = $request->main_image;
            $imageName = $data['title'].'-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$image->extension();
            $request->main_image->move(public_path('property_main_images'),$imageName);
            $new_property->main_image = $imageName;
            $new_property->save();
        };
//adding sub images
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

    public function deleteProperty($id){
        $property = Property::find($id);
        $property->delete();

        return redirect()->back()->with('message','Property removed successfully');
    }

    public function viewProperty($id){
        $property = Property::find($id);
        if(!$property) abort(404);
        $images = Image::where('property_id',$property->id)->get();
        return view('admin.property-details',compact('property','images'));
    }

}
