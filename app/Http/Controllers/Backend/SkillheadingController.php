<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Skillheading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SkillheadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillheadings = Skillheading::latest()->get();
        return view('backend.pages.skill-heading.index', compact('skillheadings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.skill-heading.create');
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
            'skill_heading_name' => 'required',
        ]);
        Skillheading::insert([
            'skill_heading_name' => $request->skill_heading_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Skill-heading Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skillheading.index')->with('create_message', 'Skill-heading Created Success!!');
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
        $skillheading = Skillheading::findOrFail($id);
        return view('backend.pages.skill-heading.edit', compact('skillheading'));
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
            'skill_heading_name' => 'required',
        ]);
      $data=  Skillheading::where('id',$id)->update([
            'skill_heading_name' => $request->skill_heading_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Skill-heading Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skillheading.index')->with('Update_message', 'Skill-heading Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skillheading::findOrFail($id)->delete();
        Toastr::info('skill-heading Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skillheading.index')->with('destroy_message', 'skill-heading Deleted Success!!');
    }
}
