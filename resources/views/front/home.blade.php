@extends('front.layouts.index')

@section('content')
    <div id="filterbar" class="collapse">
        <div class="box border-bottom">
            <form>
                <div class="form-group text-center">
                    
                        <button type="button" class="btn btn-success reset-form"> Reset </button> 
                        <button type="button" class="btn btn-success filter-form"> Apply </button> 
                    
                </div>
                <div class="mb-3"> <input type="text" class="form-control keyword" name="keyword" placeholder="Enter search term..."> </div>
                <div> <label class="tick">Title <input type="checkbox" checked="checked" name="atts[]" value="title"> <span class="check"></span> </label> </div>
                <div> <label class="tick">Author <input type="checkbox" name="atts[]" value="author"> <span class="check"></span> </label> </div>
                <div> <label class="tick">ISBN <input type="checkbox" name="atts[]" value="isbn"> <span class="check"></span> </label> </div>
                <div class="mb-3"> <label class="tick">Genre <input type="checkbox" name="atts[]" value="genre"> <span class="check"></span> </label> </div>

                <label for="">Published date</label>
                <div class="input-daterange input-group" id="datepicker">
                    
                    <input type="text" class="input-sm form-control" name="start" placeholder="Start date" />
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" placeholder="End date" />
                </div>
            </form>
        </div>
        
    
        
        
    </div>
    <div id="products">
        <div class="row mx-0">
        
        </div>

        
    </div>

    <div class="load-more-div text-center pt-md-4 pt-3 mb-3" style="display:none; width: 75%;float: right;">
        <a class="load-more btn btn-outline-primary">Load more books</a>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')

<script id="mp_template" type="text/template">
        
    <div class="col-lg-4 col-md-6 pt-md-4 pt-3">
        <a href="{{url('book/')}}/@{{id}}" target="_blank">
        <div class="card d-flex flex-column align-items-center">
            <div class="product-name">@{{title}}</div>
            <div class="card-img"> <img src="@{{image_path}}" alt=""> </div>
            <div class="card-body pt-5">
                <div class="text-muted text-center mt-auto">@{{genre}}</div>
                
                <div class="d-flex align-items-center price">
                    
                    <div class="font-weight-bold">@{{author}}</div>
                </div>
            </div>
        </div>
        </a>  
    </div>
  
</script>

<script>

    var site_url = '{{url('/')}}';

    $('.input-daterange').datepicker({
        format: 'dd/mm/yyyy',
    });

    var filtered = false;

    $('.filter-form').on('click', function(e){
        resetPage();

        filtered = true;

        loadBooks('filter');
    });

    $('.reset-form').on('click', function(e){
        resetPage();

        filtered = false;

        $('form')[0].reset();

        loadBooks('reset');
    });

    function resetPage(){
        current_page = 1;
    }

    var current_page = 1;

    $(document).ready(function(){
        loadBooks();
    });

    $('.load-more').on('click', function(){
        var type = filtered ? 'filter' : '';

        loadBooks(type);
    })

    function loadBooks(type){
        if(type == 'filter'){
            //Send params
            var data = $.extend($('form').serializeObject(), {page:current_page} );
        }else{
            var data = {page:current_page};
        }

        $.ajax({
            url: site_url + '/api/all-books',
            type: 'GET',
            data: data,
            beforeSend:function(){
                
                showWaiting();
            }
        })
        .done(function(response) {
            hideWaiting();

            var insert = false;

            var first_page = false;

            if(current_page == 1){
                insert = true;

                first_page = true;
            }

            if(first_page && response.data.data.length === 0){
                toastr.error('No results found!');

                return;
            }

            if(response.data.next_page_url == null){
                $('.load-more-div').hide();
            }else{
                current_page++;

                $('.load-more-div').show();
            }

            var template = $("#mp_template").html();
            
            var html = '';

            for(book of response.data.data){
                html += Mustache.render(template, book);
            }

            

            if(insert){
                $('#products .row').html(html);
            }else{
                $('#products .row').append(html);
            }

            
            
        })
        .fail(function(response) {
            hideWaiting();
            
            var data = JSON.parse(response.responseText);

            toastr.error('There are some issues with the form');

            
        });
    }



    // For Filters
    $(document).ready(function(){
        $('#filterbar').collapse(false);
    });


</script>
@endsection


            

            
        