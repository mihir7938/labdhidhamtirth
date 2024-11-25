@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Donors</h1>
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
                            <th>Content</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($donors as $donor)
                            <tr>
                                <td>{{$donor->title}}</td>
                                <td>@if($donor->image) <img src="{{asset('assets/'.$donor->image)}}" width="100px"/> @endif</td>
                                <td>@if($donor->content) {!! $donor->content !!} @endif</td>
                                <td>@if(isset($donor->donor_category->title)) {{$donor->donor_category->title}} @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.donors.edit', ['id' => $donor->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.donors.delete', ['id' => $donor->id])}}" class="btn btn-danger btn-circle">
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