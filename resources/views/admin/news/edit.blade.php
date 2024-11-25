@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit News</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">Edit Record</h3>
        </div>
        <form method="POST" action="{{route('admin.news.update.save')}}" class="form" id="edit-news-form" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="id" value="{{$news->id}}" />
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
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title" value="{{$news->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" rows="3" id="txtcontent" name="txtcontent" placeholder="Enter Your Content">{{$news->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Select Image (allowed only JPG,JPEG &amp; PNG files)</label>
                    <div class="input-group image_div">
                        <div class="custom-file">             
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>              
                    </div>
                    @if($news->image)
                        <img src="{{asset('assets/'.$news->image)}}" width="100px" class="mt-4 d-block" /> 
                    @endif
                </div>
                <div class="form-group">
                    <label for="pdf">Select PDF (allowed only PDF files)</label>
                    <div class="input-group pdf_div">
                        <div class="custom-file">             
                            <input type="file" class="custom-file-input" id="pdf" name="pdf">
                            <label class="custom-file-label" for="pdf">Choose file</label>
                        </div>              
                    </div>
                    @if($news->pdf)
                        <a href="{{asset('assets/'.$news->pdf)}}" class="download mt-4" target="_blank">
                            <i class="fas fa-file-pdf"></i>
                        </a>
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace('txtcontent',{
            width: "100%",
            height: "200px"   
        });
        $('#edit-news-form').validate({
            rules:{
                title:{
                    required: true
                },
                image: {
                    extension: "png|jpg|jpeg",
                    maxsize: 2000000,
                },
                pdf: {
                    extension: "pdf",
                    maxsize: 2000000,
                }
            },
            messages:{
                title:{
                    required: "Please enter title."
                },
                image: {
                    extension: "Please select valid image.",
                    maxsize: "File size must be less than 2MB."
                },
                pdf: {
                    extension: "Please select valid pdf.",
                    maxsize: "File size must be less than 2MB."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "image" ) {
                    $(".image_div").after(error);
                } else if (element.attr("name") == "pdf" ) {
                    $(".pdf_div").after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection