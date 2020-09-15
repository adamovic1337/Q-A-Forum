<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data = [
            'title' => $request->subject,
            'body' => $request->message,
            'email' => $request->contactEmail
        ];
        Mail::send('emails.email', $data, function ($message) {
            $message->to('stefan.adamovic.94.17@ict.edu.rs');
            $message->subject('Message from forum');
        });
        return response(['message' => 'Mail has been sent'], Response::HTTP_OK);
    }

}
