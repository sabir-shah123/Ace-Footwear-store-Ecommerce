<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\If_;

class DashboardController extends Controller
{
    /*public function index(){
        return view('layout_dashboard.d_master.d_add');
    }*/

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'image_1'=>'required|image|mimes:jpeg, jpg, png|max:1048',
            'image_2'=>'required',
            'image_3'=>'required',
            'image_4'=>'required',
            'title'=>'required|string',
            'catalog'=>'required',
            'category'=>'required',
            'color'=>'required',
            'brand'=>'required',
            'size'=>'required',
            'price'=>'required|numeric',

        ])->validate();


        /*$image_1 = $request->image_1;
        if ($image_1){
            $imageName1 = $image_1->getClientOriginalName();
            $image_1->move('/upload/products' , $imageName1);
            $formInput['image_1'] = $imageName1;
        }*/




        $product = new Product();



        /* if ($file = $request->file('image_1')){

             $name = $file->getClientOriginalName();

             $file->move('public_path(uploads/products/)', $name);

             $product['image_1'] = $name;

         }
         $product->save();
         if ($file = $request->file('image_2')){

             $name = $file->getClientOriginalName();

             $file->move('uploads/products/', $name);

             $product['image_2'] = $name;

         }
         $product->save();
         if ($file = $request->file('image_3')){

             $name = $file->getClientOriginalName();

             $file->move('uploads/products/', $name);

             $product['image_3'] = $name;

         }
         $product->save();
         if ($file = $request->file('image_4')){

             $name = $file->getClientOriginalName();

             $file->move('uploads/products/', $name);

             $product['image_4'] = $name;

         }
         $product->save();*/



        $filename1= '';
        $filename2= '';
        $filename3= '';
        $filename4= '';


        if ($request->hasFile('image_1'))
        {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'svg'];
            $files = $request->file('image_1');

                $filename1 = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $files->move('images/products', $filename1);
/*                    $product->image_1 = $filename1;*/
                } else {
                    return redirect()->back()->with('alert-danger', 'Photo formaat not supported');
                }
        }

        if ($request->hasFile('image_2'))
        {
            $allowedfileExtension = ['jpg', 'jped', 'png', 'svg'];
            $files = $request->file('image_2');

                $filename2 = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $files->move('images/products', $filename2);
/*                    $product->image_2 = $filename2;*/
                } else {
                    return redirect()->back()->with('alert-danger', 'Photo format not supported');
                }

        }

        if ($request->hasFile('image_3'))
        {
            $allowedfileExtension = ['jpg', 'jped', 'png', 'svg'];
            $files = $request->file('image_3');

                $filename3 = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $files->move('images/products', $filename3);
/*                    $product->image_3 = $filename3;*/
                } else {
                    return redirect()->back()->with('alert-danger', 'Photo formaat not supported');
                }

        }

        if ($request->hasFile('image_4'))
        {
            $allowedfileExtension = ['jpg', 'jped', 'png', 'svg'];
            $files = $request->file('image_4');

                $filename4 = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $files->move('images/products', $filename4);
/*                    $product->image_4 = $filename4;*/
                } else {
                    return redirect()->back()->with('alert-danger', 'Photo formaat not supported');
                }
        }

        Product::create([
            'image_1'=> $filename1,
            'image_2'=> $filename2,
            'image_3'=> $filename3,
            'image_4'=> $filename4,
            'title'=> $request->title,
            'catalog'=> $request->catalog,
            'category'=> $request->category,
            'color'=> $request->color,
            'brand'=> $request->brand,
            'size'=> $request->size,
            'price'=> $request->price,
        ]);




            /*$extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file = move($filename, 'uploads/prods');
            $file = move(public_path(). 'uploads/prod' , $file->getClientOriginalExtension());
            $prods->image_1 = $filename;
            $product->image_1 = $file->getClientOriginalExtension();
            }
        $product->save();*/

    /*if ($request->hasFile('image_1')){
        $file = $request->file('image_1');
        $extension = $file->getClientOriginalExtension();
        $filename1 = time() . '.' . $extension;
        $file = move_uploaded_file($filename1, 'uploads/products');
        $product->image_1 = $filename1;
        $product->save();
    }

    if ($request->hasFile('image_2')){
        $file = $request->file('image_2');
        $extension = $file->getClientOriginalExtension();
        $filename2 = time() . '.' . $extension;
        $file = move_uploaded_file($filename2, 'uploads/products');
        $product->image_2 = $filename2;
        $product->save();
    }

    if ($request->hasFile('image_3')){
        $file = $request->file('image_3');
        $extension = $file->getClientOriginalExtension();
        $filename3 = time() . '.' . $extension;
        $file = move_uploaded_file($filename3, 'uploads/products');
        $product->image_3 = $filename3;
        $product->save();
    }

    if ($request->hasFile('image_4')){
        $file = $request->file('image_4');
        $extension = $file->getClientOriginalExtension();
        $filename4 = time() . '.' . $extension;
        $file = move_uploaded_file($filename4, 'uploads/products');
        $product->image_4 = $filename4;
        $product->save();
    }

        Product::create([
            'image_1'=> $filename1,
            'image_2'=> $filename2,
            'image_3'=> $filename3,
            'image_4'=> $filename4,
            'title'=> $request->title,
            'catalog'=> $request->catalog,
            'category'=> $request->category,
            'color'=> $request->color,
            'brand'=> $request->brand,
            'size'=> $request->size,
            'price'=> $request->price,
        ]);*/


        return redirect()->back()->with('success','Product Added Successfully');





        /*$product->title = $request->title;*/
        /*$product->title = $request->title;
        $product->catalog = $request->title;
        $product->category = $request->title;
        $product->color = $request->title;
        $product->brand = $request->title;
        $product->size = $request->title;
        $product->price = $request->price;*/



        /*Product::create([
            'image_1'=> $products->image_1,
            'image_2'=> $products->image_2,
            'image_3'=> $products->image_3,
            'image_4'=> $products->image_4,
            'title'=> $request->title,
            'catalog'=> $request->catalog,
            'category'=> $request->category,
            'color'=> $request->color,
            'brand'=> $request->brand,
            'size'=> $request->size,
            'price'=> $request->price,
        ]);*/



    }







}
