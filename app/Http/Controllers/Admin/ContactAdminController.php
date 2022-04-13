<?php

namespace App\Http\Controllers\Admin;

// use model contact
use App\Models\Contact;
// use contact request
use App\Http\Requests\ContactRequests;

use App\Http\Controllers\Controller;

// use slug
use Illuminate\Support\Str;

// use storage
use Illuminate\Support\Facades\Storage;

// use datatable 
use Yajra\DataTables\Facades\DataTables;

class ContactAdminController extends Controller
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
            $query =   Contact::all();

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
                            <a class="dropdown-item" href="' . route('contact.edit', $item->id)  . '">
                                Sunting
                            </a>
                            <form action="'.  route('contact-admin.destroy', $item->id)  .'" method="POST">
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

        return view('pages.admin.contact-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();

        return redirect()->route('contact-admin.index');
    }
}
