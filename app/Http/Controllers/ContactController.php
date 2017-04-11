<?php

namespace App\Http\Controllers;

use App\Mail\RequestReceived;
use App\Mail\ContactEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'text' => 'min:10 | max:65536'
        ]);

        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'text' => $request->input('text')
        ];

        Mail::to($request->input('email'))->send(new RequestReceived($data));
        Mail::to('sebi_ederer@web.de')->send(new ContactEmail($data));

        $request->session()->flash('success', 'Request has been successfully sent!');
        return redirect('/contact');
    }
}
