<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(Request $request){
        $slides = Slide::
        where('name', 'like', '%'.$request->input('query').'%')
        ->orWhere('slug', 'like', '%'.$request->input('query').'%')
        ->orWhere('status', 'like', '%'.$request->input('query').'%')
        ->orWhere('price', 'like', '%'.$request->input('query').'%')
        ->orWhere('property_type', 'like', '%'.$request->input('query').'%')
        ->orWhere('created_at', 'like', '%'.$request->input('query').'%')
        ->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.slide',compact('slides'));
    }

    public function create(){
        return view('admin.add-slide');
    }

    public function storeSlide(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'property_type' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $slide = new Slide;
            $slide->name = $request->name;
            $file = $request->file('image');
            $imageName = Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(public_path('slide_images'),$imageName);

        $slide->slug = Str::slug($request->slug);
        $slide->image = $imageName;
        $slide->price = $request->price;
        $slide->short_description = $request->short_description;
        $slide->property_type = $request->property_type;
        $slide->status = $request->status;
        $slide->save();
        }
        return redirect()->back()->with('message','Slide added successfully');
    }

    public function editSlide($id){
        $slide = Slide::find($id);
        return view('admin.edit-slide',compact('slide'));
 
     }

     public function updateSlide(Request $request, $id){

        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'property_type' => 'required',
            'status' => 'required',
        ]);
     
            $slide = Slide::find($id);
            $slide->name = $request->name;
            $slide->slug = Str::slug($request->slug);
            $slide->price = $request->price;
            $slide->short_description = $request->short_description;
            $slide->property_type = $request->property_type;
            $slide->status = $request->status;
            $image=$request->file('image');

            if ($image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('slide_images'), $imageName);
                $slide->image = $imageName;
            }

            $slide->save();

        return redirect()->back()->with('message','Slider updated successfully');
    }

    public function deleteSlide($id){
        $slide = Slide::find($id);
        $slide->delete();

        return redirect()->back()->with('message','Slide removed successfully');
    }
}
