<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequests;

use App\Models\Contact;


class ContactController extends Controller
{
   
    public function store(ContactRequests $request)
    {
        $data = $request->all();
    
        Contact::create($data);

        return redirect()->route('home');
    }
}
