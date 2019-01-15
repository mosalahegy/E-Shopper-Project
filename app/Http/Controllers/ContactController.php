<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        $contact->seen = 1;
        $contact->save();
        return view('admin.contacts.single',compact('contact'));
    }
    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        
        $contact->fill($request->all())->save();
        return redirect()->back()->with('flash','We receive your message,we are going to reply you soon');
    }
    public function showAll()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }
    public function reply(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->fill($request->all())->save();
        return redirect()->back()->with('flash','Your reply is sent successfully');
    }
    public function approve($id)
    {
        $contact = Contact::find($id);
        if($contact->approve == 1)
        {
            return redirect()->back()->with('error','Message Is Already Approved!');
        }
        $contact->approve = 1;
        $contact->seen = 1;
        $contact->save();
        return redirect()->back()->with('flash','Message Approved Successfully');
    }
    public function disable($id)
    {
       
        $contact = Contact::find($id);
        if($contact->approve == 0)
        {
            return redirect()->back()->with('error','Message Is Already Disable!');
        }
        $contact->approve = 0;
        $contact->save();
        return redirect()->back()->with('flash','Message Disabled Successfully');
    }
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->back()->with('flash','Message Deleted Successfully');        
    }
    
}
