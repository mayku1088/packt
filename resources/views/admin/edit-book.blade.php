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
                        <form class="form-horizontal" id="book-form" style="display:none">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control title" value="" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" class="form-control author"  value="" placeholder="Enter author">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-10">
                                    
                                    <select name="genre_id" class="form-control genre-id" placeholder="Enter genre">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="isbn" class="form-control isbn"  value="" placeholder="Enter ISBN">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Published date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="published" class="form-control date-picker published" placeholder="Enter published date" value="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Publisher</label>
                                <div class="col-sm-10">
                                    
                                    <select name="publisher_id" class="form-control publisher-id"  placeholder="Enter publisher">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control description" placeholder="Mention about the book"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <label for="input-Default" class="col-sm-2 control-label">Cover image</label>
                                <div class="col-sm-10">
                                    <img src="" width="100px" style="margin-bottom:20px" class="image-path" />
                                    <input type="file" class="form-control image" accept="image/png, image/gif, image/jpeg" />
                                </div>
                            </div>
                            <div class="form-group text-center">
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                            <input type="hidden" value="" class="id" />
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>

    <script id="mp_template" type="text/template">
        <option value="@{{id}}">@{{name}}</option>
    </script>
<script>
    $('.date-picker').datepicker({
        orientation: "top auto",
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    $(document).ready(function(){

        

        loadGenre();

    });

    window.postPublisherLoad = function loadBook(){
        $.ajax({
            url: site_url + '/api/book/single',
            type: 'GET',
            data: {book_id:{{$book_id}}},
            beforeSend:function(){
                
                showWaiting();
            }
        })
        .done(function(response) {
            hideWaiting();

            
            var book = response.data;

            $('.id').val(book.id);

            $('.title').val(book.title);

            $('.author').val(book.author);

            $('.genre-id').val(book.genre_id);

            $('.isbn').val(book.isbn);

            $('.published').val(book.published);

            $('.date-picker').datepicker('update', book.published);

            $('.publisher-id').val(book.publisher_id);

            $('.description').val(book.description);

            $('.image-path').attr('src', book.image_path);
            
            document.title = 'Packt | Edit ' + response.data.title;

            $('#book-form').show();
            
            
        })
        .fail(function(response) {
            hideWaiting();
            
            var data = JSON.parse(response.responseText);

            toastr.error(data.message);

            
        });
    }

    $('#book-form').validate({
        rules:{
            title:{required:true},
            author:{required:true},
            genre_id:{required:true},
            isbn:{required:true},
            published:{required:true},
            publisher_id:{required:true},
            description:{required:true}
        },
        messages:{
            title:{required:"Title is required"},
            author:{required:"Author is required"},
            genre_id:{required:"Genre is required"},
            isbn:{required:"ISBN is required"},
            published:{required:"Published date is required"},
            publisher_id:{required:"Publisher is required"},
            description:{required:"Description is required"}
        },
        submitHandler:function(form){
            var formData = new FormData();

            formData.append('_token', "{{ csrf_token() }}");
            
            formData.append('id', $('.id').val());

            formData.append('title', $('.title').val());

            formData.append('author', $('.author').val());

            formData.append('genre_id', $('.genre-id').val());

            formData.append('isbn', $('.isbn').val());

            formData.append('published', $('.published').val());

            formData.append('publisher_id', $('.publisher-id').val());

            formData.append('description', $('.description').val());

            if($('.image')[0].files.length){
                formData.append('image', $('.image')[0].files[0], $('.image')[0].files[0].name);
            }

            $.ajax({
                url: site_url + '/api/book/save',
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
                        'genre_id':'.genre-id',
                        'isbn':'.isbn',
                        'published':'.published',
                        'publisher_id':'.publisher-id',
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