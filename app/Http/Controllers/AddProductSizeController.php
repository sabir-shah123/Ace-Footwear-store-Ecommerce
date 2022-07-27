<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddProductSizeController extends Controller
{
    public function index(){
        return view('layout_dashboard.d_master.d_add_psize');
    }

    public function showTitle(){
        $product = Product::all();
        return view('layout_dashboard.d_master.d_add_psize' , ['products'=>$product]);
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'psize' => 'required',
        ])->validate();

        ProductSize::create([
            'product_id' => $request->title,
            'psize' => $request->psize,
        ]);

        return redirect()->back()->with('success','Size Added Successfully');

    }

}
