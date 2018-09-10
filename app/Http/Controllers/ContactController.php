<?php

namespace App\Http\Controllers;
use App\Http\Resources\ContactResource;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(0);
        return ContactResource::collection($contacts);
    }
    public function show(Contact $contact)
    {
        $contact = Contact::findOrFail($contact->id);
        return new ContactResource($contact);
    }
    public function store(Request $request)
    {
        $contact = $request->isMethod('put') ? Contact::findOrFail($request->id) : new Contact;
        $contact->id = $request->input('id');
        $contact->contact_name = $request->input('contact_name');
        $contact->contact_web = $request->input('contact_web');
        $contact->contact_email = $request->input('contact_email');
        $contact->contact_message = $request->input('contact_message');
        
        if($contact->save()){
            return new ContactResource($contact);
        }
    }
    public function destroy(Contact $contact)
    {
        $contact = Contact::findOrFail($contact->id);
        if ($contact->delete()){
            return new ContactResource($contact);
        }
    }
}
