<?php

namespace App\Http\Controllers;

use App\Models\categoryProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AboutController extends Controller
{
       public function index()
    {
        $category_projects = categoryProject::all();
        $projects = Project::with(['galleries'])->paginate(10);

        Paginator::useBootstrap();
        
        return view('pages.about',[
            'category_projects' => $category_projects,
            'projects' => $projects
        ]);
        
    }

}
