@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
       <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Project</h2>
                <p class="dashboard-subtitle">
                  Create New Project
                </p>
              </div>
              <div class="dashboard-content">
               <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error}} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Project</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                           <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Pemilik produk</label>
                                                <select name="users_id" class="form-control">
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kategori Project</label>
                                                <select name="category_projects_id" class="form-control">
                                                    @foreach ($category_projects as $category_project)
                                                        <option value="{{$category_project->id}}">{{$category_project->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">url</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Deskripsi Project</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">fitur</label>
                                                <textarea name="fitur" id="editor2"></textarea>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                           </div>
                    </div>
               </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor2' );
    </script>
@endpush

