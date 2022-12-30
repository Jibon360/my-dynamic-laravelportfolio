<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.pages.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // id	about_bigheading	about_smtittle	about_description	about_bgimage	created_at	updated_at

        $request->validate([
            'about_bigheading' => 'required',
            'about_smtittle' => 'required|string|max:80',
            'about_description' => 'required',
            'about_bgimage' => 'required',
        ]);
        $about_bgimage = $request->file('about_bgimage');
        $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
        $banner_bgimageurl = "upload/AboutImage/" . $banner_bgimagename;
        $request->about_bgimage->move(public_path("upload/AboutImage"), $banner_bgimagename);
        About::insert([
            'about_bigheading' => $request->about_bigheading,
            'about_smtittle' => $request->about_smtittle,
            'about_description' => $request->about_description,
            'about_bgimage' => $banner_bgimageurl,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('About Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('about.index')->with('create_message', 'About Created Success!!');
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
        $about = About::findOrFail($id);
        return view('backend.pages.about.edit', compact('about'));
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
        if ($request->file('')) {
            $request->validate([
                'about_bigheading' => 'required',
                'about_smtittle' => 'required|string|max:80',
                'about_description' => 'required',
                'about_bgimage' => 'required',
            ]);
            $about_bgimage = $request->file('about_bgimage');
            $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
            $banner_bgimageurl = "upload/AboutImage/" . $banner_bgimagename;
            $request->about_bgimage->move(public_path("upload/AboutImage"), $banner_bgimagename);
            About::findOrFail($id)->update([
                'about_bigheading' => $request->about_bigheading,
                'about_smtittle' => $request->about_smtittle,
                'about_description' => $request->about_description,
                'about_bgimage' => $banner_bgimageurl,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $request->validate([
                'about_bigheading' => 'required',
                'about_smtittle' => 'required|string|max:80',
                'about_description' => 'required',
            ]);

            About::findOrFail($id)->update([
                'about_bigheading' => $request->about_bigheading,
                'about_smtittle' => $request->about_smtittle,
                'about_description' => $request->about_description,
                'created_at' => Carbon::now(),
            ]);
        }
        Toastr::success('About Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('about.index')->with('create_message', 'About Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::findOrFail($id)->delete();
        Toastr::info('About Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('about.index')->with('destroy_message', 'About Deleted Success!!');
    }
}
