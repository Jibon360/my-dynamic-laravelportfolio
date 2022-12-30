<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('backend.pages.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.skills.create');
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
            'skill_tittle' => 'required',
            'skill_percent' => 'required',
        ]);
        Skill::insert([
            'skill_tittle' => $request->skill_tittle,
            'skill_percent' => $request->skill_percent,
            'created_at' => Carbon::now(),

        ]);

        Toastr::success('Skill Creted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skill.index')->with('create_message', 'Skill Creted Success!!');
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
        $skill = Skill::findOrFail($id);
        return view('backend.pages.skills.edit', compact('skill'));
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
            'skill_tittle' => 'required',
            'skill_percent' => 'required',
        ]);
        Skill::findOrFail($id)->update([
            'skill_tittle' => $request->skill_tittle,
            'skill_percent' => $request->skill_percent,
            'updated_at' => Carbon::now(),

        ]);

        Toastr::success('Skill Update Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skill.index')->with('update_message', 'Skill Update Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();
        Toastr::info('skill Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('skill.index')->with('destroy_message', 'skill Deleted Success!!');
    }
}
