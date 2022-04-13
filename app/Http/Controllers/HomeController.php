<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequests;
use App\Models\category;
use App\Models\Design;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = category::all();
        $designs = Design::with(['galleries'])->paginate(10);

        Paginator::useBootstrap();
        
        return view('pages.home',[
            'categories' => $categories,
            'designs' => $designs
        ]);
    }

    
     public function detail(Request $request, $slug)
    {

        $categories = category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $designs = Design::with(['galleries'])->where('categories_id', $category->id)->paginate(10);


        Paginator::useBootstrap();
        
        return view('pages.home',[
            'categories' => $categories,
            'designs' => $designs
        ]);
    }

}
