<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Property;
use App\Models\Image;
use App\Models\Location;
use App\Models\Category;
// use Request;

class HomeController extends Controller
{
    public function index(){
        $slides = Slide::where('status','Active')->orderBy('created_at', 'DESC')->get();
        $properties = Property::where('status','Not Bought')->orWhere('status','Not Rented')->orderBy('created_at', 'DESC')->paginate(6);
        $locations = Location::all();
        $categories = Category::all();
        return view('index',compact('slides','properties','locations','categories'));
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
        if(request()->get('sort') == 'price_asc'){
            $properties = Property::where('status','Not Bought')->orWhere('status','Not Rented')->orderBy('price','ASC')->paginate(9);
        }elseif (request()->get('sort') == 'price_desc') {
            $properties = Property::where('status','Not Bought')->orWhere('status','Not Rented')->orderBy('price','DESC')->paginate(9);
        }else{
            $properties = Property::where('status','Not Bought')->orWhere('status','Not Rented')->paginate(9);
        }
        
        return view('all-properties',compact('properties'));
    }
    
}
