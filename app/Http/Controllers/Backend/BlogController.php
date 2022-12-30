<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.blog.create', compact('categories'));
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
            'blog_bigheading' => 'required',
            'blog_description' => 'required',
            'blog_bgimage' => 'required',
            'category_id' => 'required'
        ]);
        $blog_bgimage = $request->file('blog_bgimage');
        $banner_bgimagename = hexdec(uniqid()) . '.' . $blog_bgimage->getClientOriginalExtension();
        $banner_bgimageurl = "upload/BlogImage/" . $banner_bgimagename;
        $request->blog_bgimage->move(public_path("upload/BlogImage"), $banner_bgimagename);
        Blog::insert([
            'blog_bigheading' => $request->blog_bigheading,
            'blog_description' => $request->blog_description,
            'blog_bgimage' => $banner_bgimageurl,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Blog Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('blog.index')->with('create_message', 'Blog Created Success!!');
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
        $blog = Blog::findOrFail($id);
        $categories = Category::latest()->get();

        return view('backend.pages.blog.edit', compact('blog', 'categories'));
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
        if ($request->file("blog_bgimage")) {
            $request->validate([
                'blog_bigheading' => 'required',
                'blog_description' => 'required',
                'blog_bgimage' => 'required',
                'category_id' => 'required',
            ]);
            $blog_bgimage = $request->file('blog_bgimage');
            $banner_bgimagename = hexdec(uniqid()) . '.' . $blog_bgimage->getClientOriginalExtension();
            $banner_bgimageurl = "upload/BlogImage/" . $banner_bgimagename;
            $request->blog_bgimage->move(public_path("upload/BlogImage"), $banner_bgimagename);
            Blog::findOrFail($id)->update([
                'blog_bigheading' => $request->blog_bigheading,
                'blog_description' => $request->blog_description,
                'blog_bgimage' => $banner_bgimageurl,
                'category_id' => $request->category_id,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $request->validate([
                'blog_bigheading' => 'required',
                'blog_description' => 'required',
                'category_id' => 'required',
            ]);


            Blog::findOrFail($id)->update([
                'blog_bigheading' => $request->blog_bigheading,
                'blog_description' => $request->blog_description,
                'category_id' => $request->category_id,
                'updated_at' => Carbon::now(),
            ]);
        }
        Toastr::success('Blog Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('blog.index')->with('create_message', 'Blog Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        Toastr::info('Blog Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('blog.index')->with('destroy_message', 'Blog Deleted Success!!');
    }
}
