<?php

namespace App\Http\Controllers\Backend;


use Carbon\Carbon;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::latest()->get();
        return view('backend.pages.logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.logo.create');
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
            'logo_name' => 'required|string|max:10|unique:logos,logo_name',
        ]);
        Logo::insert([
            'logo_name' => $request->logo_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Logo Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('logo.index')->with('create_message', 'Logo Created Success!!');
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
        $logo = Logo::findOrFail($id);
        return view('backend.pages.logo.edit', compact('logo'));
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
        $logoeditid = $request->logoeditid;
        $request->validate([
            'logo_name' => 'required|string|max:10|unique:logos,logo_name,' . $logoeditid,
        ]);
        Logo::findOrFail($id)->update([
            'logo_name' => $request->logo_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::warning('Logo Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('logo.index')->with('update_message', 'Logo Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logo::findOrFail($id)->delete();
        Toastr::info('Logo Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('logo.index')->with('destroy_message', 'Logo Deleted Success!!');
    }
}
