@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Donor Categories</h1>
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
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($donorCategories as $cat)
                            <tr>
                                <td>{{$cat->title}}</td>
                                <td>@if($cat->image) <img src="{{asset('assets/'.$cat->image)}}" width="100px"/> @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.donors.editcategory', ['id' => $cat->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.donors.deletecategory', ['id' => $cat->id])}}" class="btn btn-danger btn-circle">
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