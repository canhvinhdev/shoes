<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;
class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.list', compact('contact'));
    }
    public function store(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->status = $request->status;
        $contact->save();
        Session::flash('message_table', ' Cập nhật trạng thái thành công !');
        return redirect()->route('admin.contact.list');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }
}
