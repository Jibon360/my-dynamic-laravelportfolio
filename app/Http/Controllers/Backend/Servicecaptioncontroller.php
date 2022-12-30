<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Servicecaption;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;

class Servicecaptioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecaptions = Servicecaption::latest()->get();
        return view('backend.pages.service-captions.index', compact('servicecaptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.service-captions.create');
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
            'services_bigcaptions' => 'required',
            'services_smallcaption' => 'required',
        ]);
        Servicecaption::insert([
            'services_bigcaptions' => $request->services_bigcaptions,
            'services_smallcaption' => $request->services_smallcaption,
            'created_at' => Carbon::now(),


        ]);
        Toastr::success('servicecpation Creted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('servicecaption.index')->with('create_message', 'servicecpation Creted Success!!');
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
        $servicecaption = Servicecaption::findOrFail($id);
        return view('backend.pages.service-captions.edit', compact('servicecaption'));
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
            'services_bigcaptions' => 'required',
            'services_smallcaption' => 'required',
        ]);
        Servicecaption::findOrFail($id)->update([
            'services_bigcaptions' => $request->services_bigcaptions,
            'services_smallcaption' => $request->services_smallcaption,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::warning('servicescaption Update Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('servicecaption.index')->with('update_message', 'servicescaption Update Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicecaption::findOrFail($id)->delete();
        Toastr::info('servicecaption Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('servicecaption.index')->with('destroy_message', 'servicecaption Deleted Success!!');
    }
}
