<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddProductImageController extends Controller
{
    public function index(){
        return view('layout_dashboard.d_master.d_add_pimage');
    }

    public function showTitle(){
        $product = Product::all();
        return view('layout_dashboard.d_master.d_add_pimage' , ['products'=>$product]);
    }

    public function store(Request $request)
    {
        $files = $request->pimage;
        Validator::make($request->all(),[
            'title'=>'required',
            'pimage'=>'required|mimes:png,jpg,jpeg|max:1024',
        ])->validate();

        $filename = '';
        $filename = rand(). '.' . $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $files->move('images/products', $filename);

        ProductImage::create([
            'product_id' => $request->title,
            'pimage' => $filename,
        ]);

        return redirect()->back()->with('success','Image Added Successfully');







        /*$files = $request->file('pimage');
        Validator::make($request->all(),[
            'title'=>'required',
            'pimage'=>'required|mimes:png,jpg,jpeg|max:1024',
        ])->validate();

        if(!empty($files)):

            foreach($files as $file):
                $filename = '';
                $filename = rand(). '.' . $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $file->move('images/products', $filename);

                ProductImage::create([
                    'product_id' => $request->title,
                    'pimage' => $filename,
                ]);
            endforeach;

        endif;
        return redirect()->back()->with('success','Image Added Successfully');*/

    }

}
