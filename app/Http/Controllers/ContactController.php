<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contacts.contact_form');
    }

    public function ContactForm(ContactFormRequest $request)
    {
        Mail::to('nikolaynigorodov@gmail.com')->send(new ContactForm($request->validated()));

        return redirect(route('contacts'));
    }
}
