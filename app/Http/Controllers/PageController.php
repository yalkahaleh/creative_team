<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'required|string|max:30',
            'service' => 'nullable|string|max:100',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to('info@creativeteamdigital.com')
            ->send(new ContactFormMail(
                senderName:  $validated['name'],
                phone:       $validated['phone'],
                service:     $validated['service'] ?? '',
                userMessage: $validated['message'],
            ));

        return response()->json(['success' => true]);
    }
}
