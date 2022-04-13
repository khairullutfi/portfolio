<?php

namespace App\Http\Controllers\Admin;

// use model categoryproject
use App\Models\CategoryprojectProject;
// use categoryproject request
use App\Http\Requests\Admin\CategoryProjectRequest;

use App\Http\Controllers\Controller;
use App\Models\categoryProject;
use Illuminate\Http\Request;

// use slug
use Illuminate\Support\Str;

// use storage
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = categoryProject::query();

            return DataTables::of($query)->addColumn('action',function($item){
                return'
                    <div class="btn-group">
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                            type="button"
                            data-toggle="dropdown">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('category-project.edit', $item->id)  . '">
                                Sunting
                            </a>
                            <form action="'.  route('category-project.destroy', $item->id)  .'" method="POST">
                                '. method_field('delete')  .  csrf_field()  .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }

        return view('pages.admin.category-project.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category-project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryProjectRequest $request)
    {
        $data = $request->all();

        $data['slug'] =  Str::slug($request->name);
    
        CategoryProject::create($data);

        return redirect()->route('category-project.index');
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
        $item = CategoryProject::findOrFail($id);

        return view('pages.admin.category-project.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryProjectRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] =  Str::slug($request->name);

        $item = CategoryProject::findOrFail($id);

        $item->update($data);

        return redirect()->route('category-project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CategoryProject::findOrFail($id);
        $item->delete();

        return redirect()->route('category-project.index');
    }
}
