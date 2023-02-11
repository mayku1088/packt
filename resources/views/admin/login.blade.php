<!DOCTYPE html>
<html>
    <head>

    
        <title>Packt | Admin</title>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Packt Admin Dashboard" />

    
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        
        
        <link href="{{asset('/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('/admin/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('/admin/plugins/line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"/> 

        <link href="{{asset('/admin/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/> 
        
        <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet" type="text/css"/>

    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner height-vh">
                <div id="main-wrapper"  class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-10 center">
                            <div class="login-box">
                                
                                    <a href="javascript:void(0)" class="logo-name"><img src="{{asset('/admin/images/logo.png')}}" class="img-resposnive" alt="packt" /></a>
                                
                                    <form method="POST" action="" accept-charset="UTF-8" id="user-login" novalidate="novalidate"><input name="_token" type="hidden" value="XlMNsc3JmY4ipOtAsNSkcV3Fz36dpNo1n7aTDtPU">
                                        <div class="form-group float">
                                        <input class="form-control email" placeholder="Indiquez l'adresse e-mail" autocomplete="off" name="email" type="email">
                                        </div>
                                        <div class="form-group float">
                                            <input class="form-control password" placeholder="Indiquez le mot de passe" autocomplete="off" name="password" type="password" value="">
                                        </div>

                                        <div class="form-group float">
                                            
                                        
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block round-button fill-btn">Connexion</button>
                                    </form>

                                    <div class="floating"></div>
                            
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


            
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            
        <script src="{{asset('/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        
        
        <script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>    
        <script src="{{asset('/admin/plugins/waiting/bootstrap-waitingfor.min.js')}}"></script>    
        
        <script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>    

        <script src="{{asset('/admin/js/custom.js')}}"></script>    
    
        <script>
            var site_url = '{{url('/')}}';

            $('#user-login').validate({
                rules:{
                    email:{required:true, email:true},
                    password:{required:true} 
                },
                messages:{
                    email:{required:"Email is required", email:"Email is not valid"},
                    password:{required:"Password is required"}
                },
                submitHandler:function(form){

                    $.ajax({
                    url: site_url + '/api/login',
                    type: 'POST',
                    dataType: 'json',
                    data: { 
                        "email" : $('.email').val(),
                        "password" : $('.password').val()
                    },
                    beforeSend:function(){
                        showWaiting();
                    }
                    })
                    .done(function(response) {
                        hideWaiting();
                        
                        toastr.success(response.message);

                        //Redirect to dashboard
                        var token = response.data.token;
                        
                        setLocalStorage('token', token);
                        
                        window.location.assign(response.data.redirect_url);
                        
                    })
                    .fail(function(response) {
                        

                        var data = JSON.parse(response.responseText);

                        toastr.error(data.message);

                        hideWaiting();
                    });
                }
            });
        </script>
    </body>
</html>