<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::latest()->get();
        return view('backend.pages.testimony.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.testimony.create');
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
            'testimony_name' => 'required',
            'testimony_description' => 'required',
            'testimony_image' => 'required',
        ]);
        $about_bgimage = $request->file('testimony_image');
        $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
        $banner_bgimageurl = "upload/TestimonyImage/" . $banner_bgimagename;
        $request->testimony_image->move(public_path("upload/TestimonyImage"), $banner_bgimagename);
        Testimony::insert([
            'testimony_name' => $request->testimony_name,
            'testimony_description' => $request->testimony_description,
            'testimony_image' => $banner_bgimageurl,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Testimony Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimony.index')->with('create_message', 'Testimony Created Success!!');
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
        $testimony = Testimony::findOrFail($id);
        return view('backend.pages.testimony.edit', compact('testimony'));
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
        if ($request->file('testimony_image')) {
            $request->validate([
                'testimony_name' => 'required',
                'testimony_description' => 'required',
                'testimony_image' => 'required',
            ]);
            $about_bgimage = $request->file('testimony_image');
            $banner_bgimagename = hexdec(uniqid()) . '.' . $about_bgimage->getClientOriginalExtension();
            $banner_bgimageurl = "upload/TestimonyImage/" . $banner_bgimagename;
            $request->testimony_image->move(public_path("upload/TestimonyImage"), $banner_bgimagename);
            Testimony::findOrFail($id)->update([
                'testimony_name' => $request->testimony_name,
                'testimony_description' => $request->testimony_description,
                'testimony_image' => $banner_bgimageurl,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $request->validate([
                'testimony_name' => 'required',
                'testimony_description' => 'required',

            ]);

            Testimony::findOrFail($id)->update([
                'testimony_name' => $request->testimony_name,
                'testimony_description' => $request->testimony_description,
                'updated_at' => Carbon::now(),
            ]);
        }

        Toastr::warning('Testimony Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimony.index')->with('update_message', 'Testimony Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimony::findOrFail($id)->delete();
        Toastr::info('Testimony Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimony.index')->with('destroy_message', 'Testimony Deleted Success!!');
    }
}
