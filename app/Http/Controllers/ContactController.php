<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\ContactEmailJob;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contacts.contact_form');
    }

    public function ContactForm(ContactFormRequest $request)
    {
        dispatch(new ContactEmailJob($request->validated()));

        return redirect(route('contacts'));
    }
}
