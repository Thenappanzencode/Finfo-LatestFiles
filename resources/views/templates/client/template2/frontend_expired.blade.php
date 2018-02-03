<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('seo')
        <link rel="icon" type="image/png" href="/{{$favicon}}">
        <!-- CSS -->
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
        {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}

        {{-- my style --}}
        {!! HTML::style('css/client/home-template2.min.css') !!}

        @if(count($setting) >=1 )
        <style type="text/css">

            @if($setting->font_family == "Verdana" || $setting->font_family == "Arial Black")              
                {!! "ul.nav li a {font-size: 12px !important;}" !!}
            @elseif($setting->font_family == "Lucida Console")
                {!! "ul.nav li a {font-size: 10px !important;}"  !!}
            @endif
            
            body {
                background: {{ $setting->background_color }} !important; 
                font-family: {{ $setting->font_family }} !important;
            } 
            p, li, td, label, span {                 
                color: {{ $setting->font_color }}
            }

            .container {
                background: {{ $setting->container_color }}
            }

            .navbar-inverse,
            .btn-download,
            .btn-customize {
                background-color: {{ $setting->theme_color }}
            }
            ul#sub-menu {
                background: #e1e1e1;
                width: 202%;                          
                position: absolute;
                padding-left: 0px;
                list-style: none;
                text-align: left;
                top: 100px; 
                z-index: 9;
                display: none;     
            }

            ul#sub-menu li {
                float: none;
                padding: 5px 10px;              
                border-bottom: 1px solid #fff;
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
                display: block;
            }
            @media (min-width: 320px) and (max-width: 767px) {
                ul#sub-menu { 
                    width: 78%;
                    top: 32px;
                } 
                ul#sub-menu li { padding: 5px 0px;}
            }

        </style>
        @endif

        @yield('style')

        <script type="text/javascript">
            var baseUrl = "{{ URL::to('/') }}";
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <!-- Google Analytic Script-->
        @if(isset($setting->google_analytic))
            <script type="text/javascript">
                {!! $setting->google_analytic !!}
            </script> 
        @endif
       
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <div class="container" style="min-height: 100vh; position: relative;">
            <div class="top" style="min-height: 100px;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                        @if($company_logo != '')
                            <img src="/{{$company_logo}}" style="max-width: 326px; max-height: 100%; overflow: hidden;" alt="company_logo">
                        @else 
                            <h1>Company Logo</h1>
                        @endif                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3 style="color: #848484; text-align: right;"><b>{{ucfirst(Session::get('company_name'))}}</b> Investor Relations</h3>
                    </div>
                </div>
            </div>
            @include('resources.views.templates.client.template2.includes.header')
            <div class="top-content">
                <div class="inner-bg">
                    <div class="container" style="width: auto; min-height: 100%;">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  <b>Sitemap</b>
                </div>
                <strong>Copyright &copy; 2016 {{ucfirst(Session::get('company_name'))}}.</strong> All rights reserved.
            </footer>
        </div>


        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/jquery-ui.min.js') !!}

        <!-- bootstrap-->
        {!! Html::script('js/bootstrap.min.js') !!}

        <script type="text/javascript">
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':'{!! csrf_token() !!}'
                }
            });
            
        </script>

        @yield('script')

    </body>



</html>