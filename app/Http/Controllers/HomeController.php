<?php

namespace App\Http\Controllers;
use App\PBrand;
use App\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Cart2;
use App\Product;
use App\ProductColor;
use App\ProductImage;
use App\ProductSize;
use App\User;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layout_dashboard.d_master.d_home');
    }
    public function showallProducts()
    {
        $shoes = Product::all();
        return view('layout_dashboard.d_master.d_show_all' , ["allproducts"=>$shoes]);
    }


    public function showallImages()
    {
        $image = ProductImage::all();
        return view('layout_dashboard.d_master.d_show_image' , ["allimages"=>$image]);
    }
    public function showallSizes()
    {
        $size = ProductSize::paginate(10);
        return view('layout_dashboard.d_master.d_show_size' , ["allsizes"=>$size]);
    }
    public function showallColors()
    {
        $color = ProductColor::all();
        return view('layout_dashboard.d_master.d_show_color' , ["allcolors"=>$color]);
    }
    public function showallCustomers()
    {
        $users = User::where('role', 'user')->get();
        return view('layout_dashboard.d_master.d_show_customers' , ["alluser"=>$users]);
    }
    public function showAdmin()
    {
        $admin = User::where('role', 'Admin')->get();
        return view('layout_dashboard.d_master.d_show_admin' , ["admin"=>$admin]);
    }
    public function showallOrders()
    {
        $orders = Order::orderBy('order_date','desc')->get();
      //  $order_details = OrderDetails::where('order_id' , $orders->id)->get();
        return view('layout_dashboard.d_master.d_show_orders' , ["order"=>$orders]);
    }
    public function showOrderHistory()
    {
        if(Auth::check()) {
            $orders = Order::where('user_id', Auth::user()->id)->orderBy('order_date','desc')->get();
            //  $order_details = OrderDetails::where('order_id' , $orders->id)->get();
            return view('layout_ace.ace_master.cust_order_history', ["order" => $orders]);
        }
    }



    //-------------Home----------------
    public function show()
    {
    $all = Product::all();
    $kids = Product::where('catalog' , 'Kids')->get();
    $men = Product::where('catalog' , 'Men')->get();;
    $women = Product::where('catalog' , 'Women')->get();;
    return view('layout_ace.ace_master.ace_home' , ['alls'=>$all ,'kid'=>$kids ,'mens'=>$men ,'womens'=>$women]);
    }

    public function showBrands($catalog)
    {

            $men = Product::where('brand', $catalog)->paginate(15);
            $category="";
            $url = "/brand/".$catalog."/filter";
            return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }

    public function showDataFilterBrand($catalog,$d="",$filter)
    {
        $men = array();
        $category="";
        $d = explode('-',$filter);
        $url = "/brand/".$catalog."/filter";
        try{
            if($d[0]=='color')
            {
                $filter=array();
                $men = Product::where('brand', ucwords($catalog))->get();
                foreach ($men as $p)
                {
                    $color = ProductColor::where('product_id',$p->id)->where('pcolor',$d[1])->first();
                    if($color)
                    {
                        $filter[]=$p;
                    }
                }
                $men = collect($filter)->paginate(15);
            }
            else
                $men = Product::where('brand', ucwords($catalog))->where('price' ,'>=',$d[0])->where('price','<=',$d[1])->paginate(15);
        }catch (\Exception $e)
        {

        }

        return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }

    public function showData($catalog,$category="")
    {
        $men = "";

        if($category==""  || $category=="filter")
        {
            $men = Product::where('catalog', $catalog)->paginate(15);
        }
        else
            $men = Product::where('catalog', $catalog)->where('category',$category)->paginate(15);

        $url = "/shop/".$catalog.($category!=""? "/" .$category: "/filter");
        return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }

    public function showDataFilter($catalog,$category="",$filter)
    {
        $men = "";

        $position = strpos($filter,'-');
        if($position===false)
        {

            if($category=="" || $category=="filter")
            {
                $men = Product::where('catalog', $catalog)->where('brand' ,$filter)->paginate(15);
            }
            else
                $men = Product::where('catalog', $catalog)->where('brand' ,$filter)->where('category',$category)->paginate(15);

        }
        else
        {
            $d = explode('-',$filter);
            if($d[0]=='color')
            {
                $filter = array();
                if($category==""  || $category=="filter")
                {

                    $men = Product::where('catalog', $catalog)->get();

                }
                else
                    $men = Product::where('catalog', $catalog)->where('category',$category)->paginate(15);

                foreach ($men as $p)
                {

                    $color = ProductColor::where('product_id',$p->id)->where('pcolor',$d[1])->first();
                    if($color)
                    {
                        $filter[]=$p;
                    }
                }
                $men = collect($filter)->paginate(15);
            }
            else
            {
                if($category==""  || $category=="filter")
                {
                    $men = Product::where('catalog', $catalog)->where('price' ,'>=',$d[0])->where('price','<=',$d[1])->paginate(15);
                }
                else
                    $men = Product::where('catalog', $catalog)->where('price' ,'>=',$d[0])->where('price','<=',$d[1])->where('category',$category)->paginate(15);
            }

        }
        $url = "/shop/".$catalog.($category!=""?"/".$category:"/filter");
        return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }

    public function custChangePass(Request $request)
    {
        $valid = \Validator::make($request->all(), [
            'o_pass' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',

        ]);

        if ($valid->fails()) {
            return \Redirect::back()->withErrors($valid->errors());

        }


        $user = User::findOrFail(Auth::user()->id);
        if($user) {
            if (\Hash::check($request->o_pass, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                return \Redirect::back()->with('success', 'Password Changed');


            } else {
                return \Redirect::back()->withErrors(['o_pass' => 'Old Password not matched'])->withInput();
            }
        }
      //  return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }


    public function getStock($pid,$pcolor)
    {
        $size  = ProductColor::where('product_id',$pid)->where('pcolor',$pcolor)->orderBy('psize')->get();
        if(Session::has('cart'))
        {

           foreach ($size as $s)
           {
               foreach (Session::get('cart') as $ar)
               {
                    if($s->id == $ar["psize"])
                    {
                        $s->pquantity = $s->pquantity -  $ar["qty"];
                    }
               }
           }
        }
        return response()->json(['psize'=>$size]);
    }
    public function search(Request $request)
    {
        $s=$request->search;
        $men = "";

        $men = Product::where('category', $s)->paginate(15);


        $url = "/shop/".$s."/filter";
        return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$s,'category'=>$s]);
    }





    public function showProductDetail($id)
    {

        $qty = ProductColor::where('product_id' , $id)->get();
        $pquantity = $qty->sum('pquantity');
        if($pquantity==0)
        {
            return redirect('/home')->with('error','Out of Stock');
        }

        $details = Product::where('id' , $id)->first();

        /* $colors = ProductColor::where('product_id' , $id)->get() ;*/
        return view('layout_ace.ace_master.product_detail' , ['detail'=>$details , 'pid'=>$id ]);
    }


    public function checkout(Request $request)
    {
        // dd($request->all());
        $ar = Session::get('cart');
        // dd($ar);
        if(count($ar)==0)
        {
            return redirect('/home');
        }
        $order = new Order();
        $order->user_id = \Auth::user()->id;
        $order->total = $total_p ?? 0;
        $order->status = "pending";
        $order->shipping_address = "Name : " .$request->name. "," .
            "\nCell : " .$request->cell. "," .
            "\nAddress : ".$request->address.",".
            "\nCity : " .$request->city. "," .$request->postal_code;

            /*"\nCell:".$request->cell.",".
            "\nAddress:".($request->address.",". $request->city." ," .$request->postal_code);*/
        $order->save();
        $outofstock="Order Placed";
        // dd($ar);
        foreach ($ar as $arr)
        {
            // dd($arr);
            $d = new OrderDetails();
            $d->quantity = $arr["qty"];
            $d->product_id = $arr["id"];
            $d->order_id = $order->id;
            $d->psize = $arr["psize"];
            $d->pcolor = $arr["pcolor"];
            $d->price = $arr["price"];
            $d->save();
        
            Session::forget('cart');
            return back()->with('success','Order Placed Successfully');
        }

            $outofstock="Order not placed.Sorry all items in cart out of stock.";
        Session::put('cart',array());
        return redirect('/home')->with("success",$outofstock);
        
    }

    public function deleteToCart($id)
    {
        try{
            $arr1 = Session::get('cart');
            unset($arr1[$id]);
            Session::put('cart',$arr1);

            /*if($id==-1)
            {
                Session::put('cart',array());
            }
            else
            {
                $arr1 = Session::get('cart');
                unset($arr1[$id]);
                Session::put('cart',$arr1);
            }*/

        }catch (\Exception $ex){

        }
        return redirect()->back();
    }

    public function AddToCart(Request $request )
    {
        // dd($request->all());
        $product = ProductColor::find($request->psize);
        if(!$product || !isset($request->qty))
        {
            return redirect()->back();
        }
        if($product->pquantity >= $request->qty)
        {

            $arr1 = Session::get('cart');
            $found=false;
            if(isset($arr1))
            {
                for($i=0;$i<count($arr1);$i++)
                {
                    try{
                        $ar = $arr1[$request->psize];
                        if($ar["id"] == $request->id && $ar["psize"] == $request->psize)
                        {
                            if($ar["qty"]+$request->qty <= $product->pquantity)
                            {
                                $ar["qty"]+=$request->qty;
                            }
                            $found=true;
                            $arr1[$request->psize] =$ar;
                        }
                    }catch(\Exception $e)
                    {

                    }
                }
            }
            else
            {
                $arr1=array();
            }
            if(!$found)
            {
                $arr1[$request->psize]= array('id'=>$request->id,'qty'=>$request->qty,'psize'=>$request->psize,'pcolor'=>$request->pcolor,'price'=>$request->price ?? 0);
            }
            Session::put('cart',$arr1);
        }
        return redirect()->back()->with('success','Added to  Cart');

/*        return view('layout_ace.ace_master.quick_view' , ['detail'=>$details , 'pid'=>$id ]);*/
    }






    public function home()
    {
        if(Auth::user()->role=="user")
        {
            return redirect('/home');
        }
        return view('layout_dashboard.d_master.d_home');
    }

    public function welcome()
    {

        if(Auth::user()->role=="user")
        {
           return $this->login();
        }
        return redirect('/d_home');
    }
    public function welcome1()
    {
        if(Auth::user()->role=="user")
        {
            return redirect('/home')->with('success' , 'Password Reset Successfully');
        }
        return redirect('/d_home')->with('success' , 'Password Reset Successfully');
    }

    public function signup()
    {
        try{
            if(Auth::check())
            {
                return redirect('/home');
            }
            return view('layout_ace.ace_master.cust_register');
        }catch (\Exception $ex)
        {

        }
    }

    public function login()
{
    try{
        if(Auth::check())
        {
            return redirect('/home');
        }
        return view('layout_ace.ace_master.cust_login');

    }catch (\Exception $ex)
    {

    }
}

    /*public function totalUsers()
    {
        $earnings = \App\Order::where('status' , 'delivered')->get();
        return view('layout_dashboard.d_master.d_home' , ['earning'=>$earnings]);
    }*/

}
