<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::latest()->get();
        return view('backend.pages.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.footer.create');
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
            'footer_text' => 'required',
        ]);
        Footer::insert([
            'footer_text' => $request->footer_text,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Footer Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('footer.index')->with('create_message', 'Footer Created Success!!');
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
        $footer = Footer::findOrFail($id);
        return view('backend.pages.footer.edit', compact('footer'));
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
            'footer_text' => 'required',
        ]);
        Footer::findOrFail($id)->update([
            'footer_text' => $request->footer_text,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::warning('Footer Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('footer.index')->with('update_message', 'Footer Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::findOrFail($id)->delete();
        Toastr::info('Footer Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('footer.index')->with('destroy_message', 'Footer Deleted Success!!');
    }
}
