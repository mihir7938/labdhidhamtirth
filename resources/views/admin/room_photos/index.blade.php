@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Room Photos</h1>
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
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($room_photos as $room_photo)
                            <tr>
                                <td>@if($room_photo->image) <img src="{{asset('assets/'.$room_photo->image)}}" width="100px"/> @endif</td>
                                <td>@if(isset($room_photo->room_photo_category->title)) {{$room_photo->room_photo_category->title}} @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.room.photos.edit', ['id' => $room_photo->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.room.photos.delete', ['id' => $room_photo->id])}}" class="btn btn-danger btn-circle">
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