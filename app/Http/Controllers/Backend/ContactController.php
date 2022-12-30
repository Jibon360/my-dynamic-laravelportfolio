<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.pages.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_icon' => 'required',
            'contact_heading' => 'required|string|max:80',
            'contact_name' => 'required',
        ]);

        Contact::insert([
            'contact_icon' => $request->contact_icon,
            'contact_heading' => $request->contact_heading,
            'contact_name' => $request->contact_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('contact Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index')->with('create_message', 'contact Created Success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.pages.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_icon' => 'required',
            'contact_heading' => 'required|string|max:80',
            'contact_name' => 'required',
        ]);

        Contact::findOrFail($id)->update([
            'contact_icon' => $request->contact_icon,
            'contact_heading' => $request->contact_heading,
            'contact_name' => $request->contact_name,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('contact Update Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index')->with('update_message', 'contact Update Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        Toastr::info('contact Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index')->with('destroy_message', 'contact Deleted Success!!');
    }
}
