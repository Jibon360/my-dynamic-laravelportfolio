<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Availabble;
use Brian2694\Toastr\Facades\Toastr;

class Available extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availabbles = Availabble::latest()->get();
        return view('backend.pages.available.index', compact('availabbles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.available.create');
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
            'available_tittle' => 'required',
            'available_btntext' => 'required',
        ]);

        Availabble::insert([
            'available_tittle' => $request->available_tittle,
            'available_btntext' => $request->available_btntext,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Available Creted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('availabble.index')->with('create_message', 'Available Creted Success!!');
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
        $availabble = Availabble::findOrFail($id);
        return view('backend.pages.available.edit', compact('availabble'));
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
            'available_tittle' => 'required',
            'available_btntext' => 'required',
        ]);

        Availabble::findOrFail($id)->update([
            'available_tittle' => $request->available_tittle,
            'available_btntext' => $request->available_btntext,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::warning('Available Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('availabble.index')->with('update_message', 'Available Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Availabble::findOrFail($id)->delete();
        Toastr::info('Availabble Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('availabble.index')->with('destroy_message', 'Availabble Deleted Success!!');
    }
}
