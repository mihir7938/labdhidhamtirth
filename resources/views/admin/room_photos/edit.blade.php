@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Room Photo</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">Edit Record</h3>
        </div>
        <form method="POST" action="{{route('admin.room.photos.update.save')}}" class="form" id="edit-room-photo-form" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="id" value="{{$room_photo->id}}" />
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
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($roomPhotoCategories as $cat)
                            <option value="{{$cat->id}}" @if($room_photo->category_id == $cat->id) selected @endif>{{$cat->title}}</option>
                        @endforeach     
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Select Image (allowed only JPG,JPEG &amp; PNG files)</label>
                    <div class="input-group">
                        <div class="custom-file">             
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>              
                    </div>
                    @if($room_photo->image)
                        <img src="{{asset('assets/'.$room_photo->image)}}" width="100px" class="mt-4 d-block" /> 
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
        $('#edit-room-photo-form').validate({
            rules:{
                category:{
                    required: true
                },
                image: {
                    extension: "png|jpg|jpeg",
                    maxsize: 2000000,
                },

            },
            messages:{
                category:{
                    required: "Please select category."
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