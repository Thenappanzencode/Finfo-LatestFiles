<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>404 Error</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSS -->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}
    
    {!! HTML::style('css/client/home-template2.css') !!}
    {!! HTML::style('css/client/mobile-navbar.css') !!}
  
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);
        body {
            @if (Session::has('background_color') && !empty(Session::get('background_color')))
                background : {{Session::get('background_color') }} !important;
            @else
                background : #fff !important;
            @endif
            @if (Session::has('font_family'))
                font-family : {{Session::get('font_family') }} !important;
            @endif
        } 
        body p, li, td, label, span, #sitemap, .return-home {     
            @if (Session::has('font_color') && !empty(Session::get('font_color')))
                color : {{Session::get('font_color') }} !important;
            @else
                color : #fff;
            @endif
        }
        .navbar-collapse a{
            color: #fff !important;
        }
        .navbar-collapse{
             @if (Session::has('theme_color') && !empty(Session::get('theme_color')))
                background : {{Session::get('theme_color') }} !important;
            @endif
        }
        .container {
            @if (Session::has('container_color') && !empty(Session::get('container_color')))
                background : {{Session::get('container_color') }} !important;
            @else
                background : #fff !important;
            @endif
        }
        .content {
            padding: 15px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .headline {
            font-size: 100px;
            font-weight: 300;
            margin-top: -10px;
            float: right;
        }
        .text-yellow {
            color: #f39c12 !important;
        }
        .div-error{
          margin-top: 50px;
        }

        @media (max-width: 767px){
          .headline {
            float: left;
          }
        }
        @media (min-width: 1440px) {
            .container {
                width: 1423px;
            }
        }
        .inner-bg .container {
            overflow: hidden;
        }

        .content-data { padding-top: 20px;}

        ul#sub-menu {
            background: #e1e1e1;
            /*width: 202%;*/
            width: 1388px;
            right: 101%;                   
            position: relative;
            padding-left: 0px;
            list-style: none;
            text-align: left;
            top: 100px; 
            z-index: 9;
            /*margin-bottom: 50px;*/
            padding-left: 8px;
            display: none;    
            border-bottom: 1px solid #ffffff; 
        }

            ul#sub-menu li {
                float: none;
                padding: 10px 10px;              
                /*border-bottom: 1px solid #fff;*/
            }

            ul#sub-menu li:hover {
                background-color: #fff;
            }

            ul#sub-menu li a {
                color: #b82226 !important;
                position: inherit;
                padding-top: 0px; 
                height: inherit;               
            }

            li.dropdown:hover ul#sub-menu {
               /* display: block;*/
                display: inline-flex;
            }
           
            ul#sub-menu1 { 
                display: none;
            }
            a[title="Sitemap"] {text-decoration: none !important;}
            #sitemap {color:#b82226;}
            @media(max-width: 768px) {
                ul#sub-menu {
                    width: 714px;
                }
            }
            
            @media(min-width: 769px) and (max-width: 1024px) {
                ul#sub-menu {
                    width: 934px;
                }
            }
            @media(max-width: 767px) {
                li.menu-active ul#sub-menu {
                   /* display: block;*/
                    display: none;
                }
                li.dropdown:hover ul#sub-menu {
                   /* display: block;*/
                    display: none;
                }
                ul#sub-menu1 { 
                    width: 108%;
                    top: 32px;
                    position: inherit;
                    background: #e1e1e1;
                    padding-left: 0px;
                    list-style: none;
                    text-align: left;
                    margin-top: -27px;
                    margin-left: -15px;
                    margin-bottom: 0px;
                    display: none;
                    border-bottom: 1px solid #ffffff; 

                } 
                ul#sub-menu1 li{ 
                    padding: 8px;
                }
                ul#sub-menu1 li a{ 
                    color: inherit;
                }

                
            }
            .more-margin{
                margin-top: 40px;
            }
            
            @media (min-width: 320px) and (max-width: 767px) {
                ul#sub-menu { 
                    width: 78%;
                    top: 32px;
                } 
                ul#sub-menu li { padding: 5px 0px;}
            }
            @media(max-width: 375px) {
                ul#sub-menu1 { 
                    width: 110%;
                }
            }
            @media(max-width: 320px) {
                ul#sub-menu1 { 
                    width: 112%;
                }
            }
            @media(max-width: 767px){
                .logo {text-align: center;}
                h3.company_name { text-align: center !important;}
                .more-margin{
                    margin-top: 0px !important;
                }    
            }
            
            @media(min-width: 1025px){
                ul.nav li a {font-size: 15px !important;}    
            }
            @media(min-width: 769px) and (max-width:1024){
                ul.nav li a {font-size: 12px !important;}    
            }
            @media(min-width: 768px) and (min-height: 1024px){ 
                ul.nav li a {
                    font-size: 15px !important;
                }
            }
            .navbar-nav #media-access{
                border-right:none;
                }
                .content {
                padding: 15px;
                margin-right: auto;
                margin-left: auto;
                padding-left: 15px;
                padding-right: 15px;
            }

            .headline {
                font-size: 100px;
                font-weight: 300;
                margin-top: -10px;
                float: right;
            }
            .text-yellow {
                color: #f39c12 !important;
            }
            .div-error{
              margin-top: 50px;
            }

            @media (max-width: 767px){
              .headline {
                float: left;
              }
              .error-content h2{
                  font-size: 65px;
              }
              .error-content h3{
                  font-size: 22px;
              }
              .error-content p{
                  margin-bottom: 30px;
              }
            }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        <div class="container container-error" style="min-height: 100vh; position: relative; padding-left: 21px;">
           <div class="top" style="min-height: 100px;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                        @if(Session::get('company_logo'))
                            <img src="/{{Session::get('company_logo')}}" style="max-width: 326px; max-height: 100%; overflow: hidden;" alt="company_logo">
                        @else 
                            <h1>Company Logo</h1>
                        @endif                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="company_name" style="color: #848484; text-align: right;"><b>{{ucfirst(Session::get('company_name'))}}</b> Investor Relations</h3>
                    </div>
                </div>
            </div>
            @include('resources.views.templates.client.template2.includes.header-error')
            <div class="top-content">
                <div class="inner-bg">
                    <div class="container" style="width: auto; min-height: 100%;">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-md-offset-3 div-error">
                              <div class="col-md-6 col-sm-6 col-xs-12" >
                                <h2 class="headline text-yellow" style="text-align:center;"> 404</h2>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="error-content">
                                    <h3><i class="fa fa-warning text-yellow"></i> Oops!</h3>
                                    <h3>Page not found.</h3>
                                    <p>
                                      We could not find the page you were looking for.
                                      Meanwhile, you may <a href='{{URL::to('/')}}' class='return-home'>return to home.</a>
                                    </p>
                                  </div><!-- /.error-content -->
                              </div>
                            </div><!-- /.error-page -->
                          </div>
                    </div>
                </div>
            </div>
             <footer class="main-footer">
                <div class="row visible-xs">
                    <div class="col-xs-12 visible-xs">
                        <span><a href="{{route('finfo.sitemap')}}">Sitemap</a></span>
                    </div>
                    <div class="col-xs-12 visible-xs">
                        <p>Copyright &copy; {{date('Y')}} <br>{{ucfirst(Session::get('company_name'))}}.<br> All rights reserved</p>
                    </div>                    
                </div>
                <div class="pull-right hidden-xs">
                    <span><a href="{{route('finfo.sitemap')}}" title="Sitemap" style="color:#000;"><b id="sitemap">Sitemap</b></a></span>
                </div>
                <span class="hidden-xs" style="color:#272c30;"><strong>Copyright &copy; {{date('Y')}} {{ucfirst(Session::get('company_name'))}}.</strong> All rights reserved.</span>
            </footer>
        </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>  
</html>