@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Photo</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">Edit Record</h3>
        </div>
        <form method="POST" action="{{route('admin.photos.update.save')}}" class="form" id="edit-photo-form" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="id" value="{{$photo->id}}" />
                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="album">Album</label>
                    <select id="album" name="album" class="form-control">
                        <option value="">Select Album</option>
                        @foreach($albums as $album)
                            <option value="{{$album->id}}" @if($photo->album_id == $album->id) selected @endif>{{$album->title}}</option>
                        @endforeach     
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title" value="{{$photo->title}}">
                </div>
                <div class="form-group">
                    <label for="image">Select Image (allowed only JPG,JPEG &amp; PNG files)</label>
                    <div class="input-group">
                        <div class="custom-file">             
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>              
                    </div>
                    @if($photo->image)
                        <img src="{{asset('assets/'.$photo->image)}}" width="100px" class="mt-4 d-block" /> 
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit-photo-form').validate({
            rules:{
                album:{
                    required: true
                },
                image: {
                    extension: "png|jpg|jpeg",
                    maxsize: 2000000,
                },

            },
            messages:{
                album:{
                    required: "Please select album."
                },
                image: {
                    extension: "Please select valid image.",
                    maxsize: "File size must be less than 2MB."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "image" ) {
                    $(".input-group").after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection