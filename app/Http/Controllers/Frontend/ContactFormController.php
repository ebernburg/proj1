<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {

        $contact_form = new ContactForm();

        $contact_form->name = $request->name;
        $contact_form->email = $request->email;
        $contact_form->message = $request->textarea;
        $contact_form->status = 0;

        $contact_form->save();

        return response()->json($contact_form,200);
    }
}
