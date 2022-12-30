<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.banner.create');
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
            'banner_smtittle' => 'required|string|max:40',
            'banner_bigheading' => 'required|string|max:80',
            'banner_btntext' => 'required|string|max:30',
            'banner_description' => 'required',
            'banner_bgimage' => 'required',
        ]);
        $banner_bgimage = $request->file('banner_bgimage');
        $banner_bgimagename = hexdec(uniqid()) . '.' . $banner_bgimage->getClientOriginalExtension();
        $banner_bgimageurl = "upload/BannerImage/" . $banner_bgimagename;
        $request->banner_bgimage->move(public_path("upload/BannerImage"), $banner_bgimagename);
        Banner::insert([
            'banner_smtittle' => $request->banner_smtittle,
            'banner_bigheading' => $request->banner_bigheading,
            'banner_description' => $request->banner_description,
            'banner_btntext' => $request->banner_btntext,
            'banner_bgimage' => $banner_bgimageurl,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Banner Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('banner.index')->with('create_message', 'Banner Created Success!!');
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
        $banner=Banner::findOrFail($id);
        return view('backend.pages.banner.edit',compact('banner'));
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
        if ($request->file('banner_bgimage')) {
            $request->validate([
                'banner_smtittle' => 'required|string|max:40',
                'banner_bigheading' => 'required|string|max:80',
                'banner_btntext' => 'required|string|max:30',
                'banner_description' => 'required',
                'banner_bgimage' => 'required',
            ]);
            $banner_bgimage = $request->file('banner_bgimage');
            $banner_bgimagename = hexdec(uniqid()) . '.' . $banner_bgimage->getClientOriginalExtension();
            $banner_bgimageurl = "upload/BannerImage/" . $banner_bgimagename;
            $request->banner_bgimage->move(public_path("upload/BannerImage"), $banner_bgimagename);
            Banner::findOrFail($id)->update([
                'banner_smtittle' => $request->banner_smtittle,
                'banner_bigheading' => $request->banner_bigheading,
                'banner_description' => $request->banner_description,
                'banner_btntext' => $request->banner_btntext,
                'banner_bgimage' => $banner_bgimageurl,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $request->validate([
                'banner_smtittle' => 'required|string|max:40',
                'banner_bigheading' => 'required|string|max:80',
                'banner_btntext' => 'required|string|max:30',
                'banner_description' => 'required',
            ]);

            Banner::findOrFail($id)->update([
                'banner_smtittle' => $request->banner_smtittle,
                'banner_bigheading' => $request->banner_bigheading,
                'banner_description' => $request->banner_description,
                'banner_btntext' => $request->banner_btntext,
                'created_at' => Carbon::now(),
            ]);
        }

        Toastr::warning('Banner Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('banner.index')->with('update_message', 'Banner Updated Success!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
        Toastr::info('Banner Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('banner.index')->with('destroy_message', 'Banner Deleted Success!!');
    }
}
