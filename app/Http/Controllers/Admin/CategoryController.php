<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.category',compact('categories'));
    }

    public function create(){
        return view('admin.add-category');
    }

    public function storeCategory(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->save();
        
        return redirect()->back()->with('message','Category added successfully');
    }
}
