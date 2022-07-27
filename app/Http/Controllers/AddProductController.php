<?php

namespace App\Http\Controllers;

use App\PBrand;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AddProductController extends Controller
{
    public function index(){
        return view('layout_dashboard.d_master.d_add');
    }
    public function index2(){
        return view('layout_dashboard.d_master.d_add_brand');
    }
    public function showBrandName(){
        $brands = PBrand::all();
        return view('layout_dashboard.d_master.d_add' , ['brand'=>$brands]);
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string',
            'catalog' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',

        ])->validate();


        $prod = Product::where('title', $request->title)->first();
        if ($prod != '')
        {
            return redirect()->back()->with('error', 'Title Already Exist! Try different Title/Name')->withInput();
        }
        else
        {

            Product::create([
                'title' => $request->title,
                'catalog' => $request->catalog,
                'category' => $request->category,
                'brand' => $request->brand,
                'price' => $request->price,
            ]);

            return redirect()->back()->with('success', 'Product Added Successfully');

        }

    }

    public function storeBrand(Request $request)
    {
        Validator::make($request->all(), [
            'brand1' => ['required', 'string'],
            'image'=>'required|mimes:png,jpg,jpeg|max:1024',

        ])->validate();


        $prod = PBrand::where('brand', ucwords($request->brand1))->get();
        if (count($prod) > 0 && !empty($prod))
        {
            return redirect()->back()->with('error', 'Brand name Already Exist!')->withInput();
        }
        else
        {
            $filename = '';
            $files = $request->image;

            $filename = rand(). '.' . $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $files->move('images/brands', $filename);
                    PBrand::create([
                        'brand' => ucwords($request->brand1),
                        'image' => $filename,
                    ]);

                return redirect()->back()->with('success', 'Brand added');




        }

    }
}
