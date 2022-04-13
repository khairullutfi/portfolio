<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Design;
use App\Models\Project;

class DashboardController extends Controller
{
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $design = Design::count();
        $project = Project::count();
        $customer = User::count();
        return view('pages.admin.dashboard',[
            'customer' => $customer,
            'design' => $design,
            'project' => $project
        ]);
    }
}
