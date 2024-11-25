@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Photos</h1>
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
                            <th>Album</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Album</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($photos as $photo)
                            <tr>
                                <td>{{$photo->title}}</td>
                                <td>@if($photo->image) <img src="{{asset('assets/'.$photo->image)}}" width="100px"/> @endif</td>
                                <td>@if(isset($photo->album->title)) {{$photo->album->title}} @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.photos.edit', ['id' => $photo->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.photos.delete', ['id' => $photo->id])}}" class="btn btn-danger btn-circle">
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