@extends('front.layouts.index')

@section('content')
  <div class="detail"></div>
@endsection

@section('styles')
@endsection

@section('scripts')
<script id="mp_template" type="text/template">
  <div class="pt-md-4 pt-3 row">
      <div class="catalog-images col-md-5 col-sm-5">
        <div class="center-aligned-row row">
         
          <div class=" col-md-12 col-sm-12">
            <div id="medium-image-holder" class="clearfix" data-zoom-text="">
              <div class="var-img-slider slick-initialized slick-slider">
                <div class="slick-list draggable" tabindex="0">
                  <div class="slick-track">
                    <div class="var-img-slide slick-slide slick-active">
                      <a class="variant-image zoom-init" href="@{{image_path}}" title="" style="outline-style: none; text-decoration: none;" rel="undefined">
                        <div class="zoomPad">
                          <img alt="@{{title}}" title="@{{title}}" class="" loading="lazy" src="@{{image_path}}" itemprop="image" style="width:100%; padding:30px">
                          
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
            
          </div>
        </div>
      </div>
      <div class=" col-md-7 col-sm-7">
        <div class=" row">
          <div class=" col-md-12 col-sm-12">
            <div id="title" class="mb-3">
              <h1 class="like-h3" itemprop="name">@{{title}}</h1>
              <div class="span-10 contributors"> By <span class="ctbr-name">
                  @{{author}}
                </span>
                <!-- <span class="ctbr-role">(Author)</span> -->
              </div>
            </div>
            <div id="features" class="clearfix">
              <h3 class="section-header">Features</h3>
              <ul>
                    <li class="clearfix">
                      <label>
                        ISBN
                      </label>: @{{isbn}}
                    </li>
                
                    <li class="clearfix">
                      <label>
                        Genre
                      </label>: @{{genre}}
                    </li>

                    <li class="clearfix">
                      <label>
                        Published
                      </label>: @{{published}}
                    </li>

                    <li class="clearfix">
                      <label>
                        Publisher
                      </label>: @{{publisher}}
                    </li>
                
              </ul>
          </div>
          </div>
        </div>
        
        
      </div>
    </div>

    

    <div class=" row mt-3">
      <div class=" col-md-12 col-sm-12">
        <div id="description" class="clearfix">
          <h3 class="section-header">Description</h3>
          
          <p>@{{description}}</p>
          
        </div>              
      </div>
    </div>
  </script>

  <script>
    var site_url = '{{url('/')}}';

      $(document).ready(function(){

      
          $.ajax({
              url: site_url + '/api/book',
              type: 'GET',
              data: {book_id:{{$book_id}}},
              beforeSend:function(){
                  
                  showWaiting();
              }
          })
          .done(function(response) {
              hideWaiting();

            
              var template = $("#mp_template").html();
              
              var html = Mustache.render(template, response.data);
              
              $('.detail').html(html);
              
            document.title = response.data.title;
              
              
          })
          .fail(function(response) {
              hideWaiting();
              
              var data = JSON.parse(response.responseText);

              toastr.error(data.message);

              
          });
        });
  
  </script>
@endsection