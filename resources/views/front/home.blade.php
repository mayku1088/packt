<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" type="text/css">

    <link href="{{asset('/front/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/front/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header">
            <button class="btn btn-hide text-uppercase" type="button" data-toggle="collapse" data-target="#filterbar" aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()"> <span class="fas fa-angle-left" id="filter-angle"></span> <span id="btn-txt">Hide filters</span> </button> 
            <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation" onclick="chnageIcon()" id="icon"> <span class="navbar-toggler-icon"></span> </button> 
                <div class="collapse navbar-collapse" id="mynav">
                    <!-- <ul class="navbar-nav d-lg-flex align-items-lg-center">
                        <li class="nav-item active">
                            <select name="sort" id="sort">
                                <option value="" hidden selected>Sort by</option>
                                <option value="price">Price</option>
                                <option value="popularity">Popularity</option>
                                <option value="rating">Rating</option>
                            </select>
                        </li>
                        <li class="nav-item d-inline-flex align-items-center justify-content-between mb-lg-0 mb-3">
                            <div class="d-inline-flex align-items-center mx-lg-2" id="select2">
                                <div class="pl-2">Products:</div>
                                <select name="pro" id="pro">
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="font-weight-bold mx-2 result">18 from 200</div>
                        </li>
                        <li class="nav-item d-lg-none d-inline-flex"> </li>
                    </ul> -->
                </div>
            </nav>
            <!-- <div class="ml-auto mt-3 mr-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true" class="font-weight-bold">&lt;</span> <span class="sr-only">Previous</span> </a> </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">..</a></li>
                        <li class="page-item"><a class="page-link" href="#">24</a></li>
                        <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true" class="font-weight-bold">&gt;</span> <span class="sr-only">Next</span> </a> </li>
                    </ul>
                </nav>
            </div> -->
        </div>
        <div id="content" class="my-5">
            <div id="filterbar" class="collapse">
                <div class="box border-bottom">
                    <form>
                        <div class="form-group text-center">
                            <div class="btn-group" data-toggle="buttons"> 
                                <button class="btn btn-success form-check-label reset-form"> Reset </button> 
                                <button class="btn btn-success form-check-label filter-form"> Apply </button> 
                            </div>
                        </div>
                        <div> <input type="text" class="keyword" name="keyword" placeholder="Enter search term..."> </div>
                        <div> <label class="tick">Title <input type="checkbox" checked="checked" name="atts[]" value="title"> <span class="check"></span> </label> </div>
                        <div> <label class="tick">Author <input type="checkbox" name="atts[]" value="author"> <span class="check"></span> </label> </div>
                        <div> <label class="tick">ISBN <input type="checkbox" name="atts[]" value="isbn"> <span class="check"></span> </label> </div>
                        <div> <label class="tick">Genre <input type="checkbox" name="atts[]" value="genre"> <span class="check"></span> </label> </div>

                        <label for="">Published date</label>
                        <div class="input-daterange input-group" id="datepicker">
                            
                            <input type="text" class="input-sm form-control" name="start" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="end" />
                        </div>
                    </form>
                </div>
                
               
                
                
            </div>
            <div id="products">
                <div class="row mx-0">
                   
                </div>

                <div class="load-more-div text-center pt-md-4 pt-3" style="display:none">
                    <a class="load-more btn btn-primary">Load more</a>
                </div>
            </div>

            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>

    <script src="{{asset('front/js/bootstrap-datepicker.min.js')}}"></script>

    <script id="mp_template" type="text/template">
        <div class="col-lg-4 col-md-6 pt-md-4 pt-3" onclick="redirect(@{{id}})">
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

        function redirect(book_id){
            
            
            window.location.assign('{{url('/book')}}/' + book_id);
        }

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
                    
                    //showWaiting();
                }
            })
            .done(function(response) {
                //hideWaiting();
                
                //toastr.success(response.message);

                var insert = false;

                var first_page = false;

                if(current_page == 1){
                    insert = true;

                    first_page = true;
                }

                if(response.next_page_url == null){
                    $('.load-more-div').hide();
                }else{
                    current_page++;

                    $('.load-more-div').show();
                }

                var template = $("#mp_template").html();
                
                var html = '';

                for(book of response.data){
                    html += Mustache.render(template, book);
                }

                if(insert){
                    $('#products .row').html(html);
                }else{
                    $('#products .row').append(html);
                }

                if(first_page && html === ''){
                    $('#products .row').html('<p>No results found!</p>');
                }
                
            })
            .fail(function(response) {
                //hideWaiting();
                
                var data = JSON.parse(response.responseText);

                //toastr.error('There are some issues with the form');

                
            });
        }

        (function ($, undefined) {
            '$:nomunge'; // Used by YUI compressor.

            $.fn.serializeObject = function () {
                var obj = {};

                $.each(this.serializeArray(), function (i, o) {
                    var n = o.name,
                        v = o.value;

                    obj[n] = obj[n] === undefined ? v
                        : $.isArray(obj[n]) ? obj[n].concat(v)
                            : [obj[n], v];
                });

                return obj;
            };

        })(jQuery);


        // For Filters
    document.addEventListener("DOMContentLoaded", function() {
        var filterBtn = document.getElementById('filter-btn');
        var btnTxt = document.getElementById('btn-txt');
        var filterAngle = document.getElementById('filter-angle');

        $('#filterbar').collapse(false);

        var count = 0, count2 = 0;

        function changeBtnTxt() {
            $('#filterbar').collapse(true);

            count++;

            if (count % 2 != 0) {

                filterAngle.classList.add("fa-angle-right");

                btnTxt.innerText = "show filters"
                filterBtn.style.backgroundColor = "#36a31b";
            } else {
                filterAngle.classList.remove("fa-angle-right")

                btnTxt.innerText = "hide filters"

                filterBtn.style.backgroundColor = "#ff935d";
            }

        }

        // For Applying Filters
        $('#inner-box').collapse(false);
        $('#inner-box2').collapse(false);

// For changing NavBar-Toggler-Icon
var icon = document.getElementById('icon');

function chnageIcon() {
    count2++;
    if (count2 % 2 != 0) {
        icon.innerText = "";
        icon.innerHTML = '<span class="far fa-times-circle" style="width:100%"></span>';
        icon.style.paddingTop = "5px";
        icon.style.paddingBottom = "5px";
        icon.style.fontSize = "1.8rem";


    } else {
        icon.innerText = "";
        icon.innerHTML = '<span class="navbar-toggler-icon"></span>';
        icon.style.paddingTop = "5px";
        icon.style.paddingBottom = "5px";
        icon.style.fontSize = "1.2rem";
    }
}
});

    
    </script>
</body>
</html>