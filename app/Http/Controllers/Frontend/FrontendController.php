<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Logo;
use App\Models\Work;
use App\Models\About;
use App\Models\Skill;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\Testimony;
use App\Models\Skillheading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class FrontendController extends Controller
{
    public function index()
    {
        $logo = Logo::latest()->first();
        $banner = Banner::latest()->first();
        $about = About::latest()->first();
        $skillheading = Skillheading::latest()->first();
        $footer = Footer::latest()->first();
        $skills = Skill::latest()->get();
        $services = Service::latest()->get();
        $testimonies = Testimony::latest()->get();
        $wroks = Work::latest()->get();
        $contacts = Contact::latest()->get();
        $blogs = Blog::with('categories')->latest()->get();
        return view('frontend.pages.index', compact(['logo', 'banner', 'about', 'skillheading', 'skills', 'services', 'testimonies', 'wroks', 'footer', 'contacts', 'blogs']));
    }

    public function singleblog($id)
    {
        $logo = Logo::latest()->first();
        $banner = Banner::latest()->first();
        $about = About::latest()->first();
        $skillheading = Skillheading::latest()->first();
        $footer = Footer::latest()->first();
        $skills = Skill::latest()->get();
        $services = Service::latest()->get();
        $testimonies = Testimony::latest()->get();
        $wroks = Work::latest()->get();
        $contacts = Contact::latest()->get();
        $categories = Category::latest()->get();
        $blogs = Blog::with('categories')->latest()->get();
        $recentblogs = Blog::latest()->take(4)->get();
        $singleblog = Blog::findOrFail($id);
        $relatedblogs = Blog::with('categories')->where('category_id', $singleblog->category_id)->where('id', '!=', $singleblog->id)->get();

        return view('frontend.pages.single_blgo', compact(['logo', 'banner', 'about', 'skillheading', 'skills', 'services', 'testimonies', 'wroks', 'footer', 'contacts', 'blogs', 'categories', 'recentblogs', 'singleblog', 'relatedblogs']));
    }

    public function searchblog()
    {
        $logo = Logo::latest()->first();
        $contacts = Contact::latest()->get();
        $footer = Footer::latest()->first();


        $serachresutl = QueryBuilder::for(Blog::class)
            ->allowedFilters(['blog_bigheading'])
            ->get();

            return view('frontend.pages.search',compact(['serachresutl','logo', 'contacts', 'footer']));
    }
}
