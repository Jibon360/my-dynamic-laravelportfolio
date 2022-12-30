<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::latest()->get();
        return view('backend.pages.work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.work.create');
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
            'work_image' => 'required',
        ]);
        $about_bgimage = $request->file('work_image');
        $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
        $banner_bgimageurl = "upload/WorkImage/" . $banner_bgimagename;
        $request->work_image->move(public_path("upload/WorkImage"), $banner_bgimagename);
        Work::insert([
            'work_image' => $banner_bgimageurl,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Work Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('work.index')->with('create_message', 'Work Created Success!!');
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
        $work = Work::findOrFail($id);
        return view('backend.pages.work.edit', compact('work'));
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
        if ($request->file('work_image')) {
            $request->validate([
                'work_image' => 'required',
            ]);
            $about_bgimage = $request->file('work_image');
            $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
            $banner_bgimageurl = "upload/WorkImage/" . $banner_bgimagename;
            $request->work_image->move(public_path("upload/WorkImage"), $banner_bgimagename);
            Work::findOrFail($id)->update([
                'work_image' => $banner_bgimageurl,
                'updated_at' => Carbon::now(),
            ]);
        }


        Toastr::success('Work Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('work.index')->with('update_message', 'Work Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Work::findOrFail($id)->delete();
        Toastr::info('Work Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('work.index')->with('destroy_message', 'Work Deleted Success!!');
    }
}
