<?php

namespace App\Http\Controllers\Admin;

// use model project
use App\Models\Project;
use App\Models\ProjectGallery;
// use project request


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectGalleryRequest;
use App\Models\User;
use App\Models\CategoryProject;

// use slug
use Illuminate\Support\Str;

// use storage
use Illuminate\Support\Facades\Storage;

// use datatable 
use Yajra\DataTables\Facades\DataTables;

class ProjectGalleryController extends Controller
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
            // membuat relasinya
            $query = ProjectGallery::with(['project']);

            return Datatables::of($query)->addColumn('action',function($item){
                return'
                    <div class="btn-group">
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                            type="button"
                            data-toggle="dropdown">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <form action="'.  route('project-gallery.destroy', $item->id)  .'" method="POST">
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
            ->editColumn('photos', function($item){
                return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 40px;" />' : '';
            })
            ->rawColumns(['action', 'photos'])
            ->make();
        }

        return view('pages.admin.project-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();

        return view('pages.admin.project-gallery.create',[
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/project','public');

        ProjectGallery::create($data);

        return redirect()->route('project-gallery.index');
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
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectGalleryRequest $request, $id)
    {
    //  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProjectGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('project-gallery.index');
    }
}
