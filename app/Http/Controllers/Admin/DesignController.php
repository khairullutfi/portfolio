<?php

namespace App\Http\Controllers\Admin;

// use model design
use App\Models\Design;
// use design request
use App\Http\Requests\Admin\DesignRequest;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Category;
// use slug
use Illuminate\Support\Str;

// use storage
use Illuminate\Support\Facades\Storage;

// use datatable 
use Yajra\DataTables\Facades\DataTables;

class DesignController extends Controller
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
            $query = Design::with(['user', 'category']);

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
                            <a class="dropdown-item" href="' . route('design.edit', $item->id)  . '">
                                Sunting
                            </a>
                            <form action="'.  route('design.destroy', $item->id)  .'" method="POST">
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

        return view('pages.admin.design.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::all();
        $categories = category::all();

        return view('pages.admin.design.create',[
            'users' => $users ,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Design::create($data);

        return redirect()->route('design.index');
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
        $item = Design::findOrFail($id);
        $users = user::all();
        $categories = category::all();

        return view('pages.admin.design.edit',[
            'item' => $item,
            'users' => $users ,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignRequest $request, $id)
    {
        $data = $request->all();

        $item = Design::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('design.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Design::findOrFail($id);
        $item->delete();

        return redirect()->route('design.index');
    }
}
