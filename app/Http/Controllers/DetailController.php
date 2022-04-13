<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;


class DetailController extends Controller
{
     public function index(Request $request, $id)
    {

     $design = Design::with(['galleries','user','category'])
            ->where('slug', $id)
            ->firstOrFail();

        
        return view('pages.detail',[
            'design' => $design
        ]);
    }
}
