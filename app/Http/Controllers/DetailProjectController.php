<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DetailProjectController extends Controller
{

     public function index(Request $request, $id)
    {

     $project = Project::with(['galleries','user','category_project'])
            ->where('slug', $id)
            ->firstOrFail();

        
        return view('pages.detail-project',[
            'project' => $project
        ]);
    }
     
}
