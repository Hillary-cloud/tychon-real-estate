<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request){
        $properties = Property::
        where('title', 'like', '%'.$request->input('query').'%')
        ->orWhere('price', 'like', '%'.$request->input('query').'%')
        ->orWhere('location_id', 'like', '%'.$request->input('query').'%')
        ->orWhere('category_id', 'like', '%'.$request->input('query').'%')
        ->orWhere('property_type', 'like', '%'.$request->input('query').'%')
        ->orWhere('landlord_name', 'like', '%'.$request->input('query').'%')
        ->orWhere('agent_name', 'like', '%'.$request->input('query').'%')
        ->orWhere('status', 'like', '%'.$request->input('query').'%')
        ->orWhere('created_at', 'like', '%'.$request->input('query').'%')
        ->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.property',compact('properties'));
    }

    public function create(){
        $locations = Location::all();
        $categories = Category::all();
        return view('admin.add-property',compact('locations','categories'));
    }

    public function storeProperty(Request $request)
    {
       $this->validate($request,[
          'title' => 'required',
          'slug' => 'required|unique:properties',
          'description' => 'required',
          'location_id' => 'required',
          'price' => 'required',
          'category_id' => 'required',
          'property_type' => 'required',
          'main_image' => 'required',
    ]); 
//adding main image
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(public_path('property_main_images'),$imageName);

            $property = new Property;
            $property->title = $request->title;
            $property->slug = Str::slug($request->slug);
            $property->description = $request->description;
            $property->location_id = $request->location_id;
            $property->address = $request->address;
            $property->price = $request->price;
            $property->category_id = $request->category_id;
            $property->property_type = $request->property_type;
            $property->landlord_name = $request->landlord_name;
            $property->landlord_phone = $request->landlord_phone;
            $property->agent_name = $request->agent_name;
            $property->agent_phone = $request->agent_phone;
            if ($property->property_type == 'Buy') {
                $property->status = 'Not Bought';
            }else  {
                $property->status = 'Not Rented';
            }
            
            $property->main_image = $imageName;
            $property->save();
        };
//adding sub images
        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
                $file->move(public_path('property_sub_images'),$imageName);
                Image::create([
                    'property_id'=>$property->id,
                    'image'=>$imageName
                ]);
            }
        };
 
        return redirect()->back()->with('message', 'Property added successfully');
    }

    public function deleteProperty($id){
        $property = Property::find($id);
        if (File::exists('property_main_images/'.$property->main_image)) {
            File::delete('property_main_images/'.$property->main_image);
        }
        $images = Image::where('property_id',$property->id)->get();
        foreach ($images as $image) {
            if (File::exists('property_sub_images/'.$image->image)) {
                File::delete('property_sub_images/'.$image->image);
            }
        
        }
        $property->delete();

        return redirect()->back()->with('message','Property removed successfully');
    }

    public function viewProperty($slug){
        $property = Property::where('slug',$slug)->first();
        if(!$property) abort(404);
        $images = Image::where('property_id',$property->id)->get();
        return view('admin.property-details',compact('property','images'));
    }

    public function editProperty($id){
        $property = Property::find($id);
        $locations = Location::all();
        $categories = Category::all();
        $images = Image::where('property_id',$property->id)->get();
        return view('admin.edit-property', compact('property','locations','categories','images'));
    }

    public function updateProperty(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'location_id' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'property_type' => 'required',
      ]); 

        $property = Property::findOrFail($id);
        if ($request->hasFile('main_image')) {
            if (File::exists('property_main_images/'.$property->main_image)) {
                File::delete('property_main_images/'.$property->main_image);
            }
            $file = $request->file('main_image');
            $property->main_image = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(\public_path('/property_main_images'),$property->main_image);
            $request['main_image']=$property->main_image;
        }
        $property->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->slug),
            'description'=>$request->description,
            'location_id'=>$request->location_id,
            'address'=>$request->address,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'property_type'=>$request->property_type,
            'landlord_name'=>$request->landlord_name,
            'landlord_phone'=>$request->landlord_phone,
            'agent_name'=>$request->agent_name,
            'agent_phone'=>$request->agent_phone,
            'status'=>$request->status,
            'main_image'=>$property->main_image,

        ]);

        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
                $file->move(public_path('property_sub_images'),$imageName);
                Image::create([
                    'property_id'=>$property->id,
                    'image'=>$imageName
                ]);
            }
        };
        return redirect()->back()->with('message', 'Property updated successfully');
    }

    public function deleteSubImage($id){
        $images = Image::findOrFail($id);
        if (File::exists('property_sub_images/'.$images->image)) {
            File::delete('property_sub_images/'.$images->image);
        }
        Image::find($id)->delete();
        return back();
    }
    //to delete main image
    // public function deleteMainImage($id){
    //     $main_image = Property::findOrFail($id)->main_image;
    //     if (File::exists('property_main_images/'.$main_image)) {
    //         File::delete('property_main_images/'.$main_image);
    //     }
    //     return back();
    // }

    public function confirmProperty($id){
        $property = Property::find($id);
        if ($property->property_type == 'Buy') {
            $property->status = 'Bought';
        }else{
            $property->status = 'Rented';
        }
        $property->save();
        return redirect()->back();
    }


}
