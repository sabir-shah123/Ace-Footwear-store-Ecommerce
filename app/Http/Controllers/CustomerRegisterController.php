<?php

namespace App\Http\Controllers;

use App\CustomerRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\If_;

class CustomerRegisterController extends Controller
{


    public function store(Request $request){
        Validator::make($request->all() , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customer_register'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6','confirm:password'],
            'cell' => ['required', 'numeric'],
            'country' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required'],
            'postal_code' => ['required', 'numeric'],
        ]);
        

        CustomerRegister::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'cell' => $request->cell,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        return redirect('/home')->with('alert-success', 'Registered Successfully');


    }





}
