@extends('layouts.admin')

@section('title')
    Project Gallery
@endsection

@section('content')
            <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Project Gallery</h2>
                <p class="dashboard-subtitle">
                  Create New project Gallery
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
                                <form action="{{route('project-gallery.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">produk</label>
                                                <select name="projects_id" class="form-control">
                                                    @foreach ($projects as $project)
                                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Foto project</label>
                                                <input type="file" name="photos" class="form-control" required>
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
