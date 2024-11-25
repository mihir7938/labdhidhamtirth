@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News</h1>
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
                            <th>PDF</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>PDF</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($news as $n)
                            <tr>
                                <td>{{$n->title}}</td>
                                <td>@if($n->image) <img src="{{asset('assets/'.$n->image)}}" width="100px"/> @endif</td>
                                <td>
                                    @if($n->pdf)
                                        <a href="{{asset('assets/'.$n->pdf)}}" class="download" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>@if($n->content) {!! $n->content !!} @endif</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.news.edit', ['id' => $n->id])}}" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.news.delete', ['id' => $n->id])}}" class="btn btn-danger btn-circle">
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