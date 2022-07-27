<?php

namespace App\Http\Controllers;

use App\Contactus;
use App\NewsLetter;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $carts = array();
    public function NewsLetter(Request $request)
    {
        Validator::make($request->all(), [
            'newsletter' => ['required', 'string', 'email', 'max:255', 'unique:news-letters'],

        ]);

        $newsletter = NewsLetter::where('newsletter' , $request->newsletter)->first();
        if($newsletter != ''){
            return redirect()->back()->with('error', 'Email Already Exist! Try Subscribe with different Email');
        }
        else {


            NewsLetter::create([
                'newsletter' => $request->newsletter,

            ]);


            return redirect()->back()->with('success', 'You have Successfully Subscribed for Newsletters');
        }

    }

    public function Contactus(Request $request)
    {

        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],

        ]);

        Contactus::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
            return redirect()->back()->with('success', 'Message successfully sent');
    }
    /*public function messages(Request $request)
    {
        $messages = Contactus::orderBy('created_at','desc')->get();
        dd($messages);
        return view('layout_dashboard.d_master.messages' , ["message"=>$messages]);

    }*/










}
