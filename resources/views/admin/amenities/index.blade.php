@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Amenities</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">All Records</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($amenities as $amenity)
                            <tr>
                                <td>{{$amenity->title}}</td>
                                <td>@if($amenity->active == 1) Yes @else No @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.amenities.edit', ['id' => $amenity->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.amenities.delete', ['id' => $amenity->id])}}" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection