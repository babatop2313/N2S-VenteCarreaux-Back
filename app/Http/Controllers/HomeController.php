<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Dep;
use App\Models\BlogImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function create(){
        $deps = Dep::get();
        return view('pages.create',compact('deps'));
    }

    public function signIn(){
        return view('pages.login');
    }
    





    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::with('blog_images')->orderBy('created_at','desc')->get();
        return view('pages.accueil',['blogs'=>$blogs]);
    }
}
