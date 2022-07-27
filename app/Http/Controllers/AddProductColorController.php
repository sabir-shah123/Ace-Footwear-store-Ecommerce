<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AddProductColorController extends Controller
{
    public function index(){
        return view('layout_dashboard.d_master.d_add_pcolor');
    }

    public function showTitle(){
        $product = Product::all();
        return view('layout_dashboard.d_master.d_add_pcolor' , ['products'=>$product]);
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'color' => 'required',
            'size' => 'required',
            'qty' => 'required|numeric',
        ])->validate();
        $prod = ProductColor::where('product_id', $request->title)->where('pcolor', $request->color)->where('psize', $request->size)->get();
        if (count($prod) > 0 && !empty($prod))
        {
            return redirect()->back()->with('error', 'Given Title,Color & size already stored! Try add different')->withInput(Input::all());
        }
        else {

            ProductColor::create([
                'product_id' => $request->title,
                'pcolor' => $request->color,
                'psize' => $request->size,
                'pquantity' => $request->qty,
            ]);
            return redirect()->back()->with('success', 'Color Added Successfully');
        }

    }

}
