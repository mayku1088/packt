@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    
    <div class="page-title">
        <div class="container">
            <h3>Add book</h3>
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
                                    <input type="text" name="title" class="form-control title" id="input-Default" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" class="form-control author" id="input-Default" placeholder="Enter author">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="genre" class="form-control genre" id="input-Default" placeholder="Enter genre">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="isbn" class="form-control isbn" id="input-Default" placeholder="Enter ISBN">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Published date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="published" class="form-control date-picker published">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Publisher</label>
                                <div class="col-sm-10">
                                    <input type="text" name="publisher" class="form-control publisher" id="input-Default" placeholder="Enter publisher">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary col-sm-2">Submit</button>
                            </div>
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
        autoclose: true
    });

    $('#book-form').validate({
        rules:{
            title:{required:true}
        },
        messages:{
            title:{required:"Title is required"}
        },
        submitHandler:function(form){
            var formData = new FormData();

    
            formData.append('title', $('.title').val());

            formData.append('author', $('.author').val());

            formData.append('genre', $('.genre').val());

            formData.append('isbn', $('.isbn').val());

            formData.append('published', $('.published').val());

            formData.append('publisher', $('.publisher').val());

            formData.append('description', $('.description').val());
    

            $.ajax({
                url: site_url + '/api/add-book',
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
                
                //toastr.success(response.message);

                //Redirect to dashboard
                //var token = response.data.token;
                
                //setLocalStorage('token', token);
                
                //window.location.assign(response.data.redirect_url);
                
            })
            .fail(function(response) {
                

                //var data = JSON.parse(response.responseText);

                //toastr.error(data.message);

                //hideWaiting();
            });
        }
    });
</script>
@endsection