<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
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
    public function propertyDetail(){
        return view('property-detail');
    }

    public function allProperties(){
        return view('all-properties');
    }
    
}
