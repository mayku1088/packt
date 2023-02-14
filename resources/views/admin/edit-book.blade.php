@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    
    <div class="page-title">
        <div class="container">
            <h3>Edit book</h3>
        </div>
    </div>
    <div id="main-wrapper" class="container">
        <div class="row">
            
            
            
            <div class="col-md-12">
                <div class="panel panel-white">
                   
                    <div class="panel-body">
                        <form class="form-horizontal" id="book-form">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control title" value="{{$book->title}}" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" class="form-control author"  value="{{$book->author}}" placeholder="Enter author">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="genre" class="form-control genre"  value="{{$book->genre}}" placeholder="Enter genre">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="isbn" class="form-control isbn"  value="{{$book->isbn}}" placeholder="Enter ISBN">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Published date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="published" class="form-control date-picker published" placeholder="Enter published date" value="{{$book->published}}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Publisher</label>
                                <div class="col-sm-10">
                                    <input type="text" name="publisher" class="form-control publisher"  value="{{$book->publisher}}" placeholder="Enter publisher">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control description" placeholder="Mention about the book">{{$book->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <label for="input-Default" class="col-sm-2 control-label">Cover image</label>
                                <div class="col-sm-10">
                                    <img src="{{$book->image_path}}" width="100px" style="margin-bottom:20px" />
                                    <input type="file" class="form-control image" accept="image/png, image/gif, image/jpeg" />
                                </div>
                            </div>
                            <div class="form-group text-center">
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                            <input type="hidden" value="{{$book->id}}" class="id" />
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
    
</div><!-- Page Inner -->
@endsection

@section('styles')

    <link href="{{asset('/admin/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('scripts')

    <script src="{{asset('/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <script src="{{asset('/admin/plugins/waiting/bootstrap-waitingfor.min.js')}}"></script>    

    <script src="{{asset('/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

<script>
    $('.date-picker').datepicker({
        orientation: "top auto",
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    $('#book-form').validate({
        rules:{
            title:{required:true},
            author:{required:true},
            genre:{required:true},
            isbn:{required:true},
            published:{required:true},
            publisher:{required:true},
            description:{required:true}
        },
        messages:{
            title:{required:"Title is required"},
            author:{required:"Author is required"},
            genre:{required:"Genre is required"},
            isbn:{required:"ISBN is required"},
            published:{required:"Published date is required"},
            publisher:{required:"Publisher is required"},
            description:{required:"Description is required"}
        },
        submitHandler:function(form){
            var formData = new FormData();

            formData.append('_token', "{{ csrf_token() }}");
            
            formData.append('id', $('.id').val());

            formData.append('title', $('.title').val());

            formData.append('author', $('.author').val());

            formData.append('genre', $('.genre').val());

            formData.append('isbn', $('.isbn').val());

            formData.append('published', $('.published').val());

            formData.append('publisher', $('.publisher').val());

            formData.append('description', $('.description').val());

            if($('.image')[0].files.length){
                formData.append('image', $('.image')[0].files[0], $('.image')[0].files[0].name);
            }

            $.ajax({
                url: site_url + '/api/save-book',
                type: 'POST',
                processData: false,
                contentType: false,
                async: true,
                data: formData,
                beforeSend:function(xhr){
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);

                    showWaiting();
                }
            })
            .done(function(response) {
                hideWaiting();
                
                toastr.success(response.message);
                
            })
            .fail(function(response) {
                hideWaiting();
                
                var data = JSON.parse(response.responseText);

                if('errors' in data){
                    var fields = {
                        'title' : '.title',
                        'author' : '.author',
                        'genre':'.genre',
                        'isbn':'.isbn',
                        'published':'.published',
                        'publisher':'.publisher',
                        'description':'.description'
                    };

                    displayErrors($(form), data.errors, fields);
                                        
                 }

                toastr.error('There are some issues with the form');

            });
        }
    });
</script>
@endsection