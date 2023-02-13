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

    <style>
        

        .section-header {
            color: #454545;
            font-size: 20px;
            font-weight: 900;
            text-transform: none;
            padding-bottom: 12px;
            border-bottom: 1px solid #ccc;
        }

        #product-detail-page #title h1 {
            color: #454545;
            font-size: 21px;
            font-weight: 600;
            margin-top: 0;
        }

        #product-detail-page .catalog-images>.row>div {
    padding: 0 5px;
}

#medium-image-holder {
    border: 1px solid #ccc;
    text-align: center;
}

        #product-detail-page #title .contributors {
            font-size: 12px;
        }

        #medium-image-holder {
            min-height: 414px;
        }

        

        #product-detail-page #medium-image-holder .var-img-slider img {
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class=" row">
            <div class="catalog-images col-md-5 col-sm-5">
              <div class="center-aligned-row row">
                <div class=" col-md-2 col-sm-2">
                  <div id="images" style="display:none">
                    <ul class="thumbnails" style="visibility:hidden">
                      <li class="pdp-thumbnail">
                        <a data-image-id="7900865" data-img-id="img-id-1" href="#" data-medium-url="https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x328x403.jpg" data-zoom-url="https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x600x550.jpg" data-image-title="The Boy, The Mole, The Fox And The Horse" data-image-tag="
                                          <span data-picture data-id=&quot;img-id-1&quot; class=&quot;responsive&quot; data-alt=&quot;The Boy, The Mole, The Fox And The Horse&quot; data-title=&quot;The Boy, The Mole, The Fox And The Horse&quot; data-class=&quot;&quot;>
                                              <span data-media=&quot;&quot; data-src=&quot;https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x225x225.jpg&quot;></span>
                                              <span data-media=&quot;(min-width:768px)&quot; data-src=&quot;https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x200x200.jpg&quot;></span>
                                              <span data-media=&quot;(min-width:992px)&quot; data-src=&quot;https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x328x403.jpg&quot;></span>
                                              <noscript>
                                                  <img alt=&quot;The Boy, The Mole, The Fox And The Horse&quot; title=&quot;The Boy, The Mole, The Fox And The Horse&quot; src=&quot;https://t.infibeam.com/img/book/1341200/82/25/9781529105100.jpg.99daca8225.999x328x403.jpg&quot;>
                                                  </noscript>
                                              </span>" data-variant-id="1341200-82614713174-cat" class="selected">
                          <img src="{{$image_path}}" alt="The Boy, The Mole, The Fox And The Horse">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class=" col-md-10 col-sm-10">
                  <div id="medium-image-holder" class="clearfix" data-zoom-text="">
                    <div class="var-img-slider slick-initialized slick-slider">
                      <div class="slick-list draggable" tabindex="0">
                        <div class="slick-track" style="opacity: 1; width: 336px; transform: translate3d(0px, 0px, 0px);">
                          <div class="var-img-slide slick-slide slick-active" data-image-id="7900865" index="0" style="width: 336px;">
                            <a class="variant-image zoom-init" id="img-id-1" href="{{$image_path}}" title="" style="outline-style: none; text-decoration: none;" rel="undefined">
                              <div class="zoomPad">
                                <img alt="{{$title}}" title="{{$title}}" class="" loading="lazy" src="{{$image_path}}" itemprop="image" style="opacity: 1;">
                                <div class="zoomPup" style="top: -1px; left: -1px; width: 328px; height: 403px; position: absolute; border-width: 1px; display: none;"></div>
                                <div class="zoomPreload" style="visibility: hidden; top: 189px; left: 128px; position: absolute;">Loading zoom</div>
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
                  <div id="title" data-catalog-sku="300134086">
                    <h1 class="like-h3" itemprop="name">{{$title}}</h1>
                    <div class="span-10 contributors"> By <span class="ctbr-name">
                        <a href="/">{{$author}}</a>
                      </span>
                      <span class="ctbr-role">(Author)</span>
                    </div>
                  </div>
                 
                </div>
              </div>
              
              
            </div>
          </div>

          <div class=" row"><div class=" col-md-12 col-sm-12">
            <div id="description" class="clearfix">
              <h3 class="section-header">Description</h3>
              
              <p>{{$description}}</p>
              
            </div>
          
          <div id="static_bundle" class="clearfix">
              
            </div>
        
            <div id="features" class="clearfix">
                <h3 class="section-header">Features</h3>
                <ul>
                  
                      <li class="clearfix">
                        <label>
                          Title
                        </label>: {{$title}}
                      </li>
                  
                      <li class="clearfix">
                        <label>
                          Author
                        </label>: {{$author}}
                      </li>
                  
                      <li class="clearfix">
                        <label>
                          ISBN
                        </label>: {{$isbn}}
                      </li>
                  
                      <li class="clearfix">
                        <label>
                          Genre
                        </label>: {{$genre}}
                      </li>

                      <li class="clearfix">
                        <label>
                          Published
                        </label>: {{$published}}
                      </li>

                      <li class="clearfix">
                        <label>
                          Publisher
                        </label>: {{$publisher}}
                      </li>
                  
                </ul>
            </div>
          
                
            
        
                
                
                
                   
                    
                
            </div></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>


    <script>


    
    </script>
</body>
</html>