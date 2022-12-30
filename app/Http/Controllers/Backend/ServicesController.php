<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.pages.services.create');
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
            'services_icon' => 'required',
            'services_heading' => 'required|string|max:80',
            'services_description' => 'required',
        ]);

        Service::insert([
            'services_icon' => $request->services_icon,
            'services_heading' => $request->services_heading,
            'services_description' => $request->services_description,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('services Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('services.index')->with('create_message', 'services Created Success!!');
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
        $service = Service::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
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
            'services_icon' => 'required',
            'services_heading' => 'required|string|max:80',
            'services_description' => 'required',
        ]);

        Service::findOrFail($id)->update([
            'services_icon' => $request->services_icon,
            'services_heading' => $request->services_heading,
            'services_description' => $request->services_description,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Services Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('services.index')->with('create_message', 'Services Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        Toastr::info('services Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('services.index')->with('destroy_message', 'services Deleted Success!!');
    }
}
