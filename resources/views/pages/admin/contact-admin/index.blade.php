@extends('layouts.admin')

@section('title')
    Contact
@endsection

@section('content')
            <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Contact</h2>
                <p class="dashboard-subtitle">
                  List Contact
                </p>
              </div>
              <div class="dashboard-content">
               <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>subject</th>
                                                <th>messege</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').dataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email'},
                { data: 'subject', name: 'subject'},
                { data: 'messege', name: 'messege'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: 'false',
                    searcable: 'false',
                    width: '15%',
                },
            ]
        })
    </script>
@endpush