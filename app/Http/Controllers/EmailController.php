<?php

namespace App\Http\Controllers;
use App\Contactus;
use App\Mail\MailNotify;

use App\NewsLetter;
use App\User;
use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function sendEmail(Request $request, $id)
    {
        $user = Contactus::where('id', $id)->first();
        $name = $user->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
//        Mail::to($email)->send(new MailNotify($user));

        $data = array('name' => $name, 'mess' => $message, 'to' => $email, 'subject' => $subject);
        Mail::send(['text' => 'mail'], $data, function ($message) use ($data) {
            $message->from('info@ace.com.pk', 'Query Reply');
            $message->to($data['to'])->subject($data['subject']);
            $message->setBody($data['mess']);
        });
        return back()->with('success', 'Your Reply Email Has been Sent....');


//        if (Mail::failures()) {
//            return response()->Fail('Sorry! Please try again latter');
//        }else{
//            return response()->success('Great! Successfully send in your mail');
//        }
    }


    public function sendNewsletter(Request $request)
    {
        $subject = $request->subject;
        $message = $request->message;

        $emails = NewsLetter::all();
        foreach ($emails as $email) {
            $e[] =$email->newsletter;
        }
            $data = array('mess' => $message, 'to' => $e, 'subject' => $subject);
            Mail::send(['text' => 'newsletter'], $data, function ($message) use ($data) {
                $message->from('info@ace.com.pk', 'New Arrivals');
                $message->to($data['to'])->subject($data['subject']);
                $message->setBody($data['mess']);
            });
            return back()->with('success', 'Successfully Sent....');






//        if (Mail::failures()) {
//            return response()->Fail('Sorry! Please try again latter');
//        }else{
//            return response()->success('Great! Successfully send in your mail');
//        }
    }



}

