<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
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
            'category_name' => 'required|unique:categories,category_name',
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Category Created Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index')->with('create_message', 'Category Created Success!!');
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
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
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
        $categoryeditid = $request->categoryeditid;
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $categoryeditid,
        ]);
        Category::findOrFail($id)->update([
            'footer_text' => $request->footer_text,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::warning('Category Updated Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index')->with('update_message', 'Category Updated Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Toastr::info('Category Deleted Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index')->with('destroy_message', 'Category Deleted Success!!');
    }
}
