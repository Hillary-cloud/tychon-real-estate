<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PriceRange;
class PriceRangeController extends Controller
{
    public function index(){
        $price_ranges = PriceRange::all();
        return view('admin.price-range',compact('price_ranges'));
    }

    public function create(){
        return view('admin.add-price-range');
    }

    public function storePriceRange(Request $request){
        $this->validate($request,[
            'price_range' => 'required',
        ]);
        $price_range = new PriceRange;
        $price_range->price_range = $request->price_range;
        $price_range->save();
        
        return redirect()->back()->with('message','Price range added successfully');
    }

    public function editPriceRange($id){
        $price_range = PriceRange::find($id);
        return view('admin.edit-price-range',compact('price_range'));
    }

    public function updatePriceRange(Request $request, $id){
        $price_range = PriceRange::find($id);
        $price_range->price_range = $request->price_range;
        $price_range->save();

        return redirect()->back()->with('message','Price range updated successfully');
    }

    public function deletePriceRange($id){
        $price_range = PriceRange::find($id);
        $price_range->delete();

        return redirect()->back()->with('message','Price range deleted successfully');
    }
}
