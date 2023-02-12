<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" type="text/css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');*{padding: 0;margin: 0;box-sizing: border-box;font-family: 'Poppins', sans-serif}body{background-color: #f4f4f4}.container{margin: 40px auto}#header{width: 100%;height: 60px;box-shadow: 5px 5px 15px #e8e8e8}.col-lg-4, .col-md-6{padding-right: 0}button.btn.btn-hide{height: inherit;background-color: #ff935d;color: #fff;font-size: 0.82rem;padding-left: 40px;padding-right: 40px;border-top-right-radius: 0px;border-bottom-right-radius: 0px}.btn:focus{box-shadow: none}.box-label .btn{background-color: #fff;padding: 0;font-size: 0.8rem}.btn-red{background-color: #e00000ce}.btn-orange{background-color: #ffa500}.btn-pink{background-color: #e0009dce}.btn-green{background-color: #00811c}.btn-blue{background-color: #026bc2}.btn-brown{background-color: #994a00}.navbar{display: inline-flex}.pagination .page-item .page-link{color: #333;border: none;width: 40px;text-align: center}.pagination .page-item.active .page-link{background-color: #fff;border: 1px solid #333}select{outline: none;padding: 6px 12px;margin: 0px 4px;color: #999;font-size: 0.85rem;width: 140px}#select2{border: 1px solid #777;color: #999}#pro{border: none;color: #333;font-weight: 700;padding-left: 0px;width: initial}#filterbar{width: 30%;background-color: #fff;border: 1px solid #ddd;border-radius: 15px;float: left}#filterbar input[type="radio"]{visibility: hidden}#filterbar input[type='radio']:checked{background-color: #16c79a;border: none}#filterbar .btn.btn-success{background-color: #ddd;color: #333;border: none;width: 115px}#filterbar .btn.btn-success:hover{background-color: #aff1e1;color: #444}#filterbar .btn-success:not(:disabled):not(.disabled).active, #filterbar .btn-success:not(:disabled):not(.disabled):active{background-color: #16c79a;color: #fff}label{cursor: pointer}.tick{display: block;position: relative;padding-left: 23px;cursor: pointer;font-size: 0.9rem;margin: 0}.tick input{position: absolute;opacity: 0;cursor: pointer;height: 0;width: 0}.check{position: absolute;top: 1px;left: 0;height: 18px;width: 18px;background-color: #fff;border: 1px solid #ddd;border-radius: 3px}.tick:hover input~.check{background-color: #f3f3f3}.tick input:checked~.check{background-color: #ffffff}.check:after{content: "";position: absolute;display: none}.tick input:checked~.check:after{display: block;transform: rotate(45deg) scale(1)}.tick .check:after{left: 6px;top: 2px;width: 5px;height: 10px;border: solid rgb(0, 0, 0);border-width: 0 3px 3px 0;transform: rotate(45deg) scale(2)}.box{padding: 10px}.box-label{color: #11698e;font-size: 0.9rem;font-weight: 800}#inner-box, #inner-box2{height: 150px;overflow-y: scroll}#inner-box2{height: 132px}#inner-box::-webkit-scrollbar, #inner-box2::-webkit-scrollbar{width: 6px}#inner-box::-webkit-scrollbar-track, #inner-box2::-webkit-scrollbar-track{background-color: #ddd;border-radius: 2px}#inner-box::-webkit-scrollbar-thumb, #inner-box2::-webkit-scrollbar-thumb{background-color: #333;border-radius: 2px}#price{height: 45px}#size input[type="checkbox"]{visibility: hidden}#size input[type='checkbox']:checked{background-color: #16c79a;border: none}#size .btn.btn-success{background-color: #ddd;color: #333;border: none;width: 40px;font-size: 0.8rem;border-radius: 0}#size .btn.btn-success:hover{background-color: #aff1e1;color: #444}#size .btn-success:not(:disabled):not(.disabled).active, #size .btn-success:not(:disabled):not(.disabled):active{background-color: #16c79a;color: #fff}#size label{margin: 10px;margin-left: 0px}.card{padding: 10px;cursor: pointer;transition: .3s all ease-in-out;height: 350px}.card:hover{box-shadow: 2px 2px 15px #fd9a6ce5;transform: scale(1.02)}.card .product-name{font-weight: 600}.card-body{padding-bottom: 0}.card .text-muted{font-size: 0.82rem}.card-img img{padding-top: 10px;width: inherit;height: 180px;object-fit: contain;display: block}.card-body .btn-group .btn{padding: 0;width: 20px;height: 20px;margin-right: 5px;border-radius: 50%;position: relative}.card-body .btn-group>.btn-group:not(:last-child)>.btn, .card-body .btn-group>.btn:not(:last-child):not(.dropdown-toggle){border-radius: 50%;transition: ease-in all .4s}.card-body input[type="radio"]{visibility: hidden}.card-body .btn:not(:disabled):not(.disabled).active::after, .card-body .btn:not(:disabled):not(.disabled):active::after{content: "";width: 10px;height: 10px;border-radius: 50%;top: 4px;left: 4.2px;background-color: #fff;position: absolute;transition: ease-in all .4s}.card-body .btn.btn-light:not(:disabled):not(.disabled).active::after, .card-body .btn.btn-light:not(:disabled):not(.disabled):active::after{background-color: #000}#avail-size input[type="checkbox"]{visibility: hidden}#avail-size input[type='checkbox']:checked{background-color: #16c79a;border: none}#avail-size .btn.btn-success{background-color: #ddd;color: #333;border: none;width: 20px;font-size: 0.7rem;border-radius: 0;padding: 0}#avail-size .btn.btn-success:hover{background-color: #aff1e1;color: #444}#avail-size .btn-success:not(:disabled):not(.disabled).active, #avail-size .btn-success:not(:disabled):not(.disabled):active{background-color: #16c79a;color: #fff}#avail-size label{margin: 10px;margin-left: 0px}#shirt{height: 170px}.middle{position: relative;width: 100%;margin-top: 25px}.slider{position: relative;z-index: 1;height: 5px;margin: 0 15px}.slider>.track{position: absolute;z-index: 1;left: 0;right: 0;top: 0;bottom: 0;border-radius: 5px;background-color: #ddd}.slider>.range{position: absolute;z-index: 2;left: 25%;right: 25%;top: 0;bottom: 0;border-radius: 5px;background-color: #36a31b}.slider>.thumb{position: absolute;top: 2px;z-index: 3;width: 20px;height: 20px;background-color: #36a31b;border-radius: 50%;box-shadow: 0 0 0 0 rgba(63, 204, 75, 0.705);transition: box-shadow .3s ease-in-out}.slider>.thumb::after{position: absolute;width: 8px;height: 8px;left: 28%;top: 30%;border-radius: 50%;content: '';background-color: #fff}.slider>.thumb.left{left: 25%;transform: translate(-15px, -10px)}.slider>.thumb.right{right: 25%;transform: translate(15px, -10px)}.slider>.thumb.hover{box-shadow: 0 0 0 10px rgba(125, 230, 134, 0.507)}.slider>.thumb.active{box-shadow: 0 0 0 10px rgba(63, 204, 75, 0.623)}input[type=range]{position: absolute;pointer-events: none;-webkit-appearance: none;z-index: 2;height: 10px;width: 100%;opacity: 0}input[type=range]::-webkit-slider-thumb{pointer-events: all;width: 30px;height: 30px;border-radius: 0;border: 0 none;background-color: red;-webkit-appearance: none}.del{text-decoration: line-through;color: red}@media(min-width:1199.6px){#filterbar{width: 25%}}@media(max-width:1199.5px){#filterbar{width: 28%}.card{height: 350px}.price{font-size: 0.9rem}.product-name{font-size: 0.8rem}}@media(max-width: 991.5px){.navbar-nav{min-width: 290px;position: absolute;left: -168px;bottom: -146px;padding: 20px 10px;display: block;background-image: none;z-index: 2;background-color: #1d1c1cb2}#filterbar{width: 36%}#sort{background-color: inherit;color: #fff;margin: 0;margin-bottom: 20px;width: 100%}#sort option, #pro option{color: #000}#pro, #select2, .result{background-color: inherit;color: #fff}.card{height: 345px}.price{font-size: 0.85rem}}@media(max-width: 767.5px){#filterbar{width: 50%}}@media(max-width: 525.5px){#filterbar{float: none;width: 100%;margin-bottom: 20px;border-radius: 5px}#content.my-5{margin-top: 20px !important;margin-bottom: 20px !important}.col-lg-4, .col-md-6{padding-left: 0}}@media(max-width: 500.5px){.pagination{display: none}}
    </style>
</head>
<body>
    <div class="container">
        <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header">
            <button class="btn btn-hide text-uppercase" type="button" data-toggle="collapse" data-target="#filterbar" aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()"> <span class="fas fa-angle-left" id="filter-angle"></span> <span id="btn-txt">Hide filters</span> </button> 
            <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation" onclick="chnageIcon()" id="icon"> <span class="navbar-toggler-icon"></span> </button> 
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="navbar-nav d-lg-flex align-items-lg-center">
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
                    </ul>
                </div>
            </nav>
            <div class="ml-auto mt-3 mr-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true" class="font-weight-bold">&lt;</span> <span class="sr-only">Previous</span> </a> </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">..</a></li>
                        <li class="page-item"><a class="page-link" href="#">24</a></li>
                        <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true" class="font-weight-bold">&gt;</span> <span class="sr-only">Next</span> </a> </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="content" class="my-5">
            <div id="filterbar" class="collapse">
                <div class="box border-bottom">
                    <div class="form-group text-center">
                        <div class="btn-group" data-toggle="buttons"> <label class="btn btn-success form-check-label"> <input class="form-check-input" type="radio"> Reset </label> <label class="btn btn-success form-check-label active"> <input class="form-check-input" type="radio" checked> Apply </label> </div>
                    </div>
                    <div> <label class="tick">Title <input type="checkbox" checked="checked" name="atts" value="title"> <span class="check"></span> </label> </div>
                    <div> <label class="tick">Author <input type="checkbox" name="atts" value="author"> <span class="check"></span> </label> </div>
                    <div> <label class="tick">ISBN <input type="checkbox" name="atts" value="isbn"> <span class="check"></span> </label> </div>
                    <div> <label class="tick">Genre <input type="checkbox" name="atts" value="genre"> <span class="check"></span> </label> </div>
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

    <script id="mp_template" type="text/template">
        <div class="col-lg-4 col-md-6 pt-md-4 pt-3">
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

        var current_page = 1;

        $(document).ready(function(){
            loadBooks();
        });

        $('.load-more').on('click', function(){
            loadBooks();
        })

        function loadBooks(){
            $.ajax({
                url: site_url + '/api/all-books',
                type: 'GET',
                data: {page:current_page},
                beforeSend:function(){
                    
                    //showWaiting();
                }
            })
            .done(function(response) {
                //hideWaiting();
                
                //toastr.success(response.message);

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

                $('#products .row').append(html);
                
            })
            .fail(function(response) {
                //hideWaiting();
                
                var data = JSON.parse(response.responseText);

                //toastr.error('There are some issues with the form');

                
            });
        }


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