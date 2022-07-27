<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\PBrand;
use App\Product;
use App\ProductColor;
use App\ProductImage;
use App\ProductSize;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function deleteProduct($id){
        Product::where('id', $id)->delete();
        /*$img =ProductImage::where('product_id' , $id)->get() ;
        unlink(public_path(). '/images/products');*/
       return redirect()->back()->with('success', 'Product Deleted Successfully');

    }
    public function deleteBrand($id){
        $brand = PBrand::findOrFail($id);
        // unlink(public_path(). '/images/brands/' . $brand->image);
        $brand->where('id',$id)->delete();
        return redirect()->back()->with('success','Brand Deleted Successfully');
    }
    public function deleteColorSize($id){
        ProductColor::where('id', $id)->delete();
        return redirect()->back()->with('success','Product Color and Size Deleted Successfully');

    }
    public function deleteImage($id){
       $img = ProductImage::findOrFail($id);
    //    unlink(public_path(). '/images/products/' . $img->pimage);
       $img->where('id',$id)->delete();

        return redirect()->back()->with('success','Product Color and Size Deleted Successfully');

    }
    public function deleteCancelOrder($id){
        /*Order::where('id', $id)->delete();
        OrderDetails::where('order_id', $id)->delete();
        return redirect()->back()->with('success','Order Cancelled Successfully');*/
        dd('del');
    }



}
