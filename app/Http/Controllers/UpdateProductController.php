<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\PBrand;
use App\Product;
use App\ProductColor;
use App\ProductImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProductController extends Controller
{
    public function updateProductTitle(Request $request, $id)
    {
        Validator::make($request->all(),[
            'title' => 'required|string',

        ])->validate();

        $prod = Product::where('title', $request->title)->get();
        if (count($prod) > 0 && !empty($prod))
        {
            return redirect()->back()->with('error', 'Title Already Exist! Try different Title/Name');
        }
        else {
            Product::where('id', $id)->update([
                'title' => $request->title,
            ]);

            return redirect()->back()->with('success', 'Title Updated Successfully');
        }

    }
    public function updateProduct(Request $request, $id)
    {
        Validator::make($request->all(),[
            /*'title' => 'required|string',*/
            'catalog' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',

        ])->validate();


        Product::where('id',$id)->update([
            /*'title' => $request->title,*/
            'catalog' => $request->catalog,
            'category' => $request->category,
            'brand' => $request->brand,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success','Product Updated Successfully');

    }
    public function updateBrand(Request $request, $id)
    {
        Validator::make($request->all(), [
            'brand' => ['required', 'string'],


        ])->validate();

        $prod = PBrand::where('brand', $request->brand)->first();
        if ($prod != '')
        {
            return redirect()->back()->with('error', 'Brand name Already Exist!');
        }
        else {
            PBrand::where('id', $id)->update([
                'brand' => ucwords($request->brand),
            ]);

            return redirect()->back()->with('success', 'Brand name Updated Successfully');
        }
    }
    public function updateBrandImage(Request $request, $id)
    {
        Validator::make($request->all(),[
            'image'=>'required|mimes:png,jpg,jpeg|max:1024',

        ])->validate();

        $image_name = $request->hidden_file;
        $image = $request->image;

        if(isset($image)){

            $img = PBrand::findOrFail($id);
            // unlink(public_path(). '/images/brands/' . $img->image);
            $image_name = rand().'.'. $image->getClientOriginalName();
            $image->move('images/brands/', $image_name);

            PBrand::where('id',$id)->update([
                'image' => $image_name,
            ]);
            return redirect()->back()->with('success','Brand Image Updated Successfully');
        }
    }

    public function updateProductcolorsize(Request $request, $id)
    {
        Validator::make($request->all(),[
            'pcolor' => 'required',
            'psize' => 'required',
            'pqty' => 'required|numeric',

        ])->validate();
        $p = Product::select('id')->first();
        $prod = ProductColor::where('product_id', $request->id)->where('pcolor', $request->pcolor)->where('psize', $request->psize)->get();
        if (count($prod) > 0 && !empty($prod))
        {
            return redirect()->back()->with('error', 'Given Title,Color & size already stored! Try add different')->withInput();
        }
        else {
            ProductColor::where('id', $id)->update([
                'pcolor' => $request->pcolor,
                'psize' => $request->psize,
                'pquantity' => $request->pqty,
            ]);

            return redirect()->back()->with('success', 'Product Color and Size Updated Successfully');
        }

    }
    public function updateProductcolor(Request $request,$prod , $id)
    {
        if($prod=='quantity'){
            ProductColor::where('id', $id)->update([
                'pquantity' => $request->pqty,
            ]);
            return redirect()->back()->with('success', 'Quantity Updated Successfully');
        }

        $p = Product::select('id')->first();
        $product = ProductColor::where('product_id', $request->id)->where('pcolor', $request->pcolor)->where('psize', $request->psize)->get();
        if (count($product) > 0 && !empty($product))
        {
            return redirect()->back()->with('error', 'Given Title,Color & size already stored! Try add different')->withInput();
        }
        else{
            if($prod=='color'){
                ProductColor::where('id', $id)->update([
                    'pcolor' => $request->pcolor,
                ]);
                return redirect()->back()->with('success', 'Color Updated Successfully');
            }

            if($prod=='size'){
                ProductColor::where('id', $id)->update([
                    'psize' => $request->psize,
                ]);
                return redirect()->back()->with('success', 'Size Updated Successfully');
            }
        }


    }

    public function updateOrderStatus(Request $request, $id)
    {
        Validator::make($request->all(),[
            'status' => 'required',

        ])->validate();

        Order::where('id',$id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success','Order Status Updated Successfully');

    }
    public function updateImage(Request $request, $id)
    {
        Validator::make($request->all(),[
            'pimage'=>'required|mimes:png,jpg,jpeg|max:1024',

        ])->validate();

        $image_name = $request->hidden_file;
        $image = $request->pimage;

        if(isset($image)){

            $img = ProductImage::findOrFail($id);
            unlink(public_path(). '/images/products/' . $img->pimage);
            $image_name = rand().'.'. $image->getClientOriginalName();
            $image->move('images/products/', $image_name);

            ProductImage::where('id',$id)->update([
                'pimage' => $image_name,
            ]);
            return redirect()->back()->with('success','Product Image Updated Successfully');
        }



    }

    public function updateAdminImage(Request $request, $id)
    {
        Validator::make($request->all(),[
            'photo'=>'required|mimes:png,jpg,jpeg|max:1024',

        ])->validate();

        $image_name = $request->hidden_file;
        $image = $request->photo;

        if(isset($image)){

            $img = User::findOrFail($id);
            // unlink(public_path(). '/images/admin/' . $img->uphoto);
            $image_name = rand().'.'. $image->getClientOriginalName();
            $image->move('images/admin/', $image_name);

            User::where('id',$id)->update([
                'uphoto' => $image_name,
            ]);
            return redirect()->back()->with('success','Image Updated Successfully');
        }


    }

    public function updateAdmin(Request $request, $id)
    {
        Validator::make($request->all(),[
            'name' => 'required', 'string' ,
            /*'email' => 'required' , 'string', 'email', 'max:255', 'unique:users',*/
            'cell' => 'required','numeric' ,
            'cnic' => 'required', 'numeric' ,
            'address' => 'required', 'string' ,

        ])->validate();

        User::where('id',$id)->update([
            'name' => $request->name,
            /*'email' => $request->email,*/
            'cell' => $request->cell,
            'cnic' => $request->cnic,
            'address' => $request->address,
        ]);
        return redirect()->back()->with('success','Admin Data Updated Successfully');

    }

    public function updateCancelOrder(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        if($order->user_id == \Auth::user()->id && $order->status =="pending")
        {
            $orderdetail = OrderDetails::where('order_id',$order->id)->get();
            foreach($orderdetail as $o)
            {

                $product = ProductColor::findOrFail($o->psize);
                $product->pquantity += $o->quantity;
                $product->save();
            }
            $order->delete();
            return redirect()->back()->with('success', 'Order Cancelled Successfully');

        }
        return redirect('/customer/order/history')->with('error', 'Wrong Order id');
    }











}
