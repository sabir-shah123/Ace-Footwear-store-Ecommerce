<?php

namespace App\Http\Controllers;

use App\PBrand;
use App\Product;
use App\ProductColor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\If_;
use Auth;

class AdminUserController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }
    public function index1()
    {
        return view('layout_dashboard.d_master.d_admin_update');
    }
    public function index2()
    {
        return view('layout_dashboard.d_master.d_change_pssword');
    }
    public function index3()
    {
        return view('layout_ace.ace_master.cust_account');
    }
    public function index4()
    {
        return view('layout_ace.ace_master.cust_change_password');
    }
    public function index5()
    {
        return view('layout_ace.ace_master.cust_order_history');
    }


    public function Adminstore(Request $request)
    {
            Validator::make($request->all(), [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6','same:password'],
            'gender' => ['required'],
            'cell' => ['required'],
            'address' => ['required', 'string'],
            'cnic' => ['required', 'string'],
            'uphoto' => ['required', 'image|mimes:png,jpg,jpeg'],

        ]);
                $email = User::where('email' , $request->email)->first();
                if($email != '')
                {
                    return redirect()->back()->with('error', 'Email Already Exist! Try signup with different Email')->withInput();
                }
                else
                    {
                        $filename = '';
                        $files = $request->uphoto;

                        $filename = rand(). '.' . $files->getClientOriginalName();
                        $extension = $files->getClientOriginalExtension();
                        $files->move('images/admin', $filename);

                        User::create([
                            'role' => $request->role,
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => \Hash::make($request->password),
                            'gender' => $request->gender,
                            'cell' => $request->cell,
                            'address' => $request->address,
                            'cnic' => $request->cnic,
                            'uphoto' => $filename,

                        ]);

                        return redirect('admin/login')->with('success', 'Admin added Successfully! Now Login with your credentials');

                    }
    }



    public function customerStore(Request $request)
    {


            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
                'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
                'cell' => ['required'],
                'country' => ['required', 'string'],
                'address' => ['required', 'string'],
                'city' => ['required', 'string'],
                'postal_code' => ['required', 'string'],
            ]);

            $email = User::where('email' , $request->email)->first();
            if($email != ''){
                return redirect()->back()->with('error', 'Email Already Exist! Try signup with different Email')->withInput();
            }
            else {


                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => \Hash::make($request->password),
                    'cell' => $request->cell,
                    'country' => $request->country,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,

                ]);

                return redirect('/customer/login')->with('success', 'You have Successfully signup! Now Login with your credentials');
            }

        }
    public function custAccount(Request $request, $id)
    {
        Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'cell' => ['required'],
            'country' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string'],

        ])->validate();

            User::where('id', $id)->update([
                'name' => $request->name,
                'password' => \Hash::make($request->password),
                'cell' => $request->cell,
                'country' => $request->country,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
            ]);


        return redirect('/home')->with('success','Account Updated Successfully');

    }
    public function chkStock1(Request $request)
    {
        /*$p = Product::all();
        $b = PBrand::all();
        $c = ProductColor::all();*/

/*        $pid=$request->title;
        $t=Product::where('id',$pid)->first();
        $tit=$t->title;
        $pri=$t->price;
        $qty = ProductColor::where('product_id' , $pid)->get();
        $pquantity = $qty->sum('pquantity');
        $tot=$pquantity*$pri;

        return view('layout_dashboard.d_master.d_check_stock' , ['total'=>$tot  , 'price'=>$pri, 'title'=>$tit , 'pquantity'=>$pquantity]);*/


        if($request->title > 0 && $request->catalog =='' && $request->brand=='' && $request->color=='' && $request->size==''){
            $rr = ProductColor::where('product_id' , $request->title)->get();
            $r = $rr->sum('pquantity');

            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog!='' && $request->brand=='' && $request->color=='' && $request->size==''){
            $r1 = Product::where('catalog' , $request->catalog)->select('id')->get();
            /*$dd = $r1->id;*/
            $r=0;
            /*dd($r1);*/
            foreach ($r1 as $r2){
                /*$rrrr = $r1->id;*/
                $rr = ProductColor::where('product_id' , $r2->id)->get();
                $r += $rr->sum('pquantity');
            }

            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand!='' && $request->color=='' && $request->size==''){
            $r1 = Product::where('brand' , $request->brand)->select('id')->get();
            /*$dd = $r1->id;*/
            $r=0;
            /*dd($r1);*/
            foreach ($r1 as $r2){
                /*$rrrr = $r1->id;*/
                $rr = ProductColor::where('product_id' , $r2->id)->get();
                $r += $rr->sum('pquantity');
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand=='' && $request->color!='' && $request->size==''){

            $rr = ProductColor::where('pcolor' , $request->color)->get();
            $r = $rr->sum('pquantity');
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand=='' && $request->color=='' && $request->size!=''){
            $rr = ProductColor::where('psize' , $request->size)->get();
            $r = $rr->sum('pquantity');
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
        }


        elseif($request->title > 0 && $request->catalog !='' && $request->brand=='' && $request->color=='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
                foreach ($r1 as $r3){
                    $rr = ProductColor::where('product_id' , $r3->id)->get();
                    $r2 += $rr->sum('pquantity');
                }
                return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand!='' && $request->color=='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->get();
                $r2 += $rr->sum('pquantity');
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand=='' && $request->color!='' && $request->size=='') {
            $rr = ProductColor::where('product_id' , $request->title)->where('pcolor' , $request->color)->get();
            if(count($rr)>0){
                $r = $rr->sum('pquantity');
                return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand=='' && $request->color=='' && $request->size!='') {
            $rr = ProductColor::where('product_id' , $request->title)->where('psize' , $request->size)->get();
            if(count($rr)>0){
            $r = $rr->sum('pquantity');
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }


        elseif($request->title==0 && $request->catalog!='' && $request->brand!='' && $request->color=='' && $request->size==''){
            $r1 = Product::where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->get();
                $r2 += $rr->sum('pquantity');
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title==0 && $request->catalog!='' && $request->brand=='' && $request->color!='' && $request->size==''){
            $r1 = Product::where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;

            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog!='' && $request->brand=='' && $request->color=='' && $request->size!=''){
            $r1 = Product::where('catalog' , $request->catalog)->select('id')->get();
            /*$ss= ProductColor::where('color' , $request->color);*/
            $r2=0;
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
        }


        elseif($request->title==0 && $request->catalog=='' && $request->brand!='' && $request->color!='' && $request->size==''){
            $r1 = Product::where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand!='' && $request->color=='' && $request->size!=''){
            $r1 = Product::where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand=='' && $request->color!='' && $request->size!=''){
            $rr = ProductColor::where('pcolor' , $request->color)->where('psize' , $request->size)->get();
            if(count($rr)>0){
            $r = $rr->sum('pquantity');
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }


        elseif($request->title > 0 && $request->catalog !='' && $request->brand!='' && $request->color=='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->get();
                $r2 += $rr->sum('pquantity');
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog !='' && $request->brand=='' && $request->color!='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog !='' && $request->brand=='' && $request->color=='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand!='' && $request->color!='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand!='' && $request->color=='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand=='' && $request->color!='' && $request->size!='') {
            $rr = ProductColor::where('product_id' , $request->title)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
            if(count($rr)>0){
            $r = $rr->sum('pquantity');
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }



        elseif($request->title==0 && $request->catalog!='' && $request->brand!='' && $request->color!='' && $request->size==''){
            $r1 = Product::where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title==0 && $request->catalog!='' && $request->brand!='' && $request->color=='' && $request->size!=''){
            $r1 = Product::where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title==0 && $request->catalog!='' && $request->brand=='' && $request->color!='' && $request->size!=''){
            $r1 = Product::where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);

        }
        elseif($request->title==0 && $request->catalog=='' && $request->brand!='' && $request->color!='' && $request->size!=''){
            $r1 = Product::where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
        }



        elseif($request->title > 0 && $request->catalog !='' && $request->brand!='' && $request->color!='' && $request->size=='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog !='' && $request->brand!='' && $request->color=='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog =='' && $request->brand!='' && $request->color!='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }
        elseif($request->title > 0 && $request->catalog !='' && $request->brand=='' && $request->color!='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }


        elseif($request->title == 0 && $request->catalog !='' && $request->brand!='' && $request->color!='' && $request->size!='') {
            $r1 = Product::where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes21212');
            }
        }
        elseif($request->title > 0 && $request->catalog !='' && $request->brand!='' && $request->color!='' && $request->size!='') {
            $r1 = Product::where('id' , $request->title)->where('catalog' , $request->catalog)->where('brand' , $request->brand)->select('id')->get();
            $r2=0;
            if(count($r1)>0){
            foreach ($r1 as $r3){
                $rr = ProductColor::where('product_id' , $r3->id)->where('pcolor' , $request->color)->where('psize' , $request->size)->get();
                if(count($rr)>0){
                $r2 += $rr->sum('pquantity');
                }
                else{
                    return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
                }
            }
            return view('layout_dashboard.d_master.d_check_stock' , ['result'=>$r2 /* , 'title'=>$ti */]);
            }
            else{
                return redirect()->back()->with('error' , 'Data does not exist for your Selected Attributes');
            }
        }



        else{
            return redirect('/remaining/stock')->with('error' , 'Please Select atleast one Input');
        }

    }

    public function adminChangePass(Request $request)
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
                return \Redirect::back()->with('success', 'Password Changed Successfully');


            } else {
                return \Redirect::back()->withErrors(['o_pass' => 'Old Password not matched'])->withInput();
            }
        }
        //  return view('layout_ace.ace_master.display' , ['url'=>$url,'mens'=>$men,'title'=>$catalog,'category'=>$category]);
    }





}
