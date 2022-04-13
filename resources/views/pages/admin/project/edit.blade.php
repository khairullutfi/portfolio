@extends('layouts.admin')

@section('title')
Category
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">project</h2>
            <p class="dashboard-subtitle">
                Edit project
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
                            <form action="{{route('project.update', $item->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Project</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pemilik Project</label>
                                            <select name="users_id" class="form-control">
                                                <option value="{{$item->users_id}}" selected>{{$item->user->name}}
                                                </option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Kategori project</label>
                                            <select name="category_projects_id" class="form-control">
                                                <option value="{{$item->category_projects_id}}" selected>
                                                    {{$item->category_project->name}}</option>
                                                @foreach ($category_projects as $category_project)
                                                <option value="{{$category_project->id}}">{{$category_project->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">url</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{$item->title}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi Produk</label>
                                            <textarea name="description"
                                                id="editor">{!! $item->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi Produk</label>
                                            <textarea name="fitur"
                                                id="editor2">{!! $item->fitur !!}</textarea>
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