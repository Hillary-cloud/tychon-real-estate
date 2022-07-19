<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Property;
use App\Models\Image;
class HomeController extends Controller
{
    public function index(){
        $slides = Slide::orderBy('created_at', 'DESC')->get();
        $properties = Property::orderBy('created_at', 'DESC')->paginate(10);
        return view('index',compact('slides','properties'));
    }

    public function about(){
        return view('about');
    }

    
    public function buy(){
        return view('buy-property');
    }

    
    public function rent(){
        return view('rent-property');
    }

    public function agent(){
        return view('agent');
    }

    public function blog(){
        return view('blog');
    }

    public function contact(){
        return view('contact');
    }
    public function propertyDetail($slug){
        $property = Property::where('slug',$slug)->first();
        $images = Image::where('property_id',$property->id)->get();
        return view('property-detail',compact('property','images'));
    }

    public function allProperties(){
        return view('all-properties');
    }
    
}
