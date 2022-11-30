<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Major;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $maJor = Major::all();
        return view('client.contact', compact('maJor'));
    }
    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->content = $request->content;
        $contact->save();
        return back();
    }
}
