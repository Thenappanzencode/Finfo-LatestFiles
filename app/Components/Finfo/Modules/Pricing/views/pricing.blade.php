@extends('resources.views.templates.finfo.frontend-temp')
@section('seo')
<title>FINFO &#8211; Investor Engagement Matters</title>
<meta name="description" content="">
<meta name="keywords" content="">
@stop

@section('content')




<div id="rowCustom-599290a6d70d7" class="no-bg-image vc_row wpb_row mBuilder-element vc_row wpb_row mBuilder-element    sectionOverlay vc_general vc_parallax vc_parallax- full_size "  data-mBuilder-id="8" data-col-layout="12/12" data-bgcolor=" rgba(255,255,255,1)" >
    <div id="pricing-section" class="one-page-anchor"></div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script
        type="text/javascript">"use strict";
            var
                    $ = jQuery;
            $(document).ready(function () {
                if (typeof
                        $ != 'function') {
                    $ = jQuery;
                }
                var
                        isChrome = window.chrome, $rowCustom_599290a6d70d7 = $("#rowCustom-599290a6d70d7");
                $rowCustom_599290a6d70d7.find('.row-image').remove();
                $rowCustom_599290a6d70d7.append('<div class="row-image row-image-normal "> </div>');
                if (!("")) {
                    $rowCustom_599290a6d70d7.find('.row-image').remove();
                }
                if (typeof
                        pixflow_fitRowToHeight == 'function') {
                    pixflow_fitRowToHeight();
                }
                if (isChrome) {
                    $rowCustom_599290a6d70d7.find(".row-image-fixed").append('<Style> .row-image-fixed:after{position:fixed; background-attachment:inherit;}</style>');
                }
            });</script>


    <!-- Set background image -->
    <style >    #rowCustom-599290a6d70d7 .row-image{    background-position:center center;}    </style>

    <script
        type="text/javascript">"use strict";
            var
                    $ = jQuery;
            var
                    $rowCustom_599290a6d70d7 = $('#rowCustom-599290a6d70d7');
            if ($rowCustom_599290a6d70d7.find('.sloped-edge').length) {
                $rowCustom_599290a6d70d7.find('.sloped-edge').remove();
            }</script>

    <script>
        function myFunction() {
            var x = document.getElementById("mySelect").value;
			
			var url = window.location.href;
			
			var main_url = url.split("pricing");
			
					
			var original_essen_link = "{{ URL::to('register/Essentials/2') }}";
			
			var original_prof_link = "{{ URL::to('register/Professional/2') }}";

			var new_esse_href = main_url[0] + "register/Essentials/" + x ; 
			
			var new_prof_href = main_url[0] + "register/Professional/" + x ;


            if (x == 2) {

				$('#essen').attr('href', original_essen_link);
				$('#prof').attr('href', original_prof_link);
				
                document.getElementById("demo").innerHTML = "500";
                document.getElementById("demo1").innerHTML = "S$";

                document.getElementById("demop").innerHTML = "1000";
                document.getElementById("demop1").innerHTML = "S$";
            }
            if (x == 11) {
				
				
				$('#essen').attr('href', new_esse_href);
				$('#prof').attr('href', new_prof_href);

                document.getElementById("demo").innerHTML = "500";
                document.getElementById("demo1").innerHTML = "A$";

                document.getElementById("demop").innerHTML = "1000";
                document.getElementById("demop1").innerHTML = "A$";
            }
            if (x == 14) {

				
				$('#essen').attr('href', new_esse_href);
				$('#prof').attr('href', new_prof_href);
				
                document.getElementById("demo").innerHTML = "1500";
                document.getElementById("demo1").innerHTML = "RM";

                document.getElementById("demop").innerHTML = "3000";
                document.getElementById("demop1").innerHTML = "RM";
            }
        }
        function myFunction1() {
            var a = document.getElementById("cou").value;
            console.log(a);
            if (a === "SG") {
                //alert("india");
                document.getElementById("demo").innerHTML = "500";
                document.getElementById("demo1").innerHTML = "S$";

                document.getElementById("demop").innerHTML = "1000";
                document.getElementById("demop1").innerHTML = "S$";
            }

            if (a === "AU")
            {
                document.getElementById("demo").innerHTML = "500";
                document.getElementById("demo1").innerHTML = "A$";

                document.getElementById("demop").innerHTML = "1000";
                document.getElementById("demop1").innerHTML = "A$";
            }

            if (a === "MY")
            {
                document.getElementById("demo").innerHTML = "1500";
                document.getElementById("demo1").innerHTML = "RM";

                document.getElementById("demop").innerHTML = "3000";
                document.getElementById("demop1").innerHTML = "RM";
            }

        }
    </script>

    <script>
        $(document).ready(function () {
            $("#cou1").load(function () {
                var a = $("#cou").val();
                console.log(a);
                if (a === "IN") {
                    alert("india");
                }
            });
        });
    </script>


<!--    <script>
    $(document).ready(function () {
        $("span").load(function () {
            //alert("Image loaded.");
            $("#demo").html("500");
        });
    });
</script>-->

    <div class="wrap clearfix">

        <div id="cou1">
            <input type="hidden" value="<?php echo $currentCountry; ?>" id="cou" >
        </div>

        <select name="parentProj" id="mySelect" onchange="myFunction()">
            <?php
            foreach ($currencyData as $va => $project) {
                ?>
                <option value="<?php echo $va; ?>"><?php echo $project; ?></option>
                <?php
            }
            ?>
        </select>

        <div class='wpb_column vc_column_container    col-sm-12'>
            <div class='vc_column-inner md_col-599290a6d73b6'>
                <div class='wpb_wrapper'>
                    <style data-type="mBuilderInternal"> div.vc_column_container>.vc_column-inner.md_col-599290a6d73b6{}</style>
                    <style > .md_text_style-599290a6d77a1 .md-text-title{color:rgb(58, 82, 106);}.md_text_style-599290a6d77a1{text-align:center;}.md_text_style-599290a6d77a1 .md-text-title *{line-height:40px; font-family:Poppins; font-style:bold; font-weight:600;}.md_text_style-599290a6d77a1 .md-text-title{font-size:35px; line-height:40px; letter-spacing:0px; margin-bottom:15px; transition:all .3s cubic-bezier(0.215, 0.61, 0.355, 1) ; font-family:Poppins; font-style:bold; font-weight:600;}.md_text_style-599290a6d77a1 .md-text-title:not(.title-slider):hover{letter-spacing:0px;}.md_text_style-599290a6d77a1 .md-text-title-separator{margin-bottom:10px ; width:110px; border-top:5px solid rgb(0, 255, 153); margin-left:auto; margin-right:auto;}.md_text_style-599290a6d77a1 .md-text-content{margin-bottom:25px;}.md_text_style-599290a6d77a1 .md-text-content p{color:rgb(255, 255, 255); font-size:18px; line-height:21px; font-family:Poppins; font-style:light; font-weight:300;}.md_text_style-599290a6d77a1 .md-text-content p{margin:0 auto;}</style>
                    <div class="md-text-container md_text_style-599290a6d77a1 has-animation md-align-center wpb_wrapper wpb_md_text_wrapper ui-md_text" data-animation-speed=400 data-animation-delay=0.3 data-animation-position=bottom data-animation-show=once data-animation-easing=Quart.easeInOut>
                        <div class="md-text gizmo-container">

                            <div class="md-text-title inline-editor-title "><div>PRICING</div></div>


                            <div class="md-text-content inline-editor  without-content" ><p></p></div>


                        </div>

                    </div>
                    <script
                        type="text/javascript">if (typeof
                                    pixflow_title_slider == 'function') {
                                pixflow_title_slider();
                            }
                            if (document.readyState === 'complete') {
                                if (typeof
                                        pixflow_shortcodeAnimation == 'function') {
                                    pixflow_shortcodeAnimation();
                                }
                                if (typeof
                                        pixflow_shortcodeAnimationScroll == 'function') {
                                    pixflow_shortcodeAnimationScroll();
                                }
                            }</script>
                </div>
            </div>
        </div>

        <script>var
                    $ = jQuery;
            var
                    $rowCustom_599290a6d70d7 = $('#rowCustom-599290a6d70d7');
            if ("1") {
                $rowCustom_599290a6d70d7.find('> .wrap').addClass('box_size_container');
                $rowCustom_599290a6d70d7.find('> .wrap').addClass('box_size_container');
            } else {
                $rowCustom_599290a6d70d7.find('> .wrap').removeClass('box_size_container');
                $rowCustom_599290a6d70d7.find('> .wrap').removeClass('box_size_container');
            }
            $('#rowCustom-599290a6d70d7').find('.row-videobg').not('.row-videobg[data-row-id="rowCustom-599290a6d70d7"]').remove();</script>

    </div> <!-- End wrap -->

    <style >    #rowCustom-599290a6d70d7{  margin-top:0px;margin-bottom:0px;} #rowCustom-599290a6d70d7{  padding-top:100px;padding-bottom:0px;padding-right:0px;padding-left:0px;} .sectionOverlay.box_size{ width:65%} .sectionOverlay .box_size_container{ width:65%} #rowCustom-599290a6d70d7:after{  background-color:rgba(255,255,255,1)}   </style>
</div> <!-- End main row -->

<div id="rowCustom-599290a6d9271" class="no-bg-image vc_row wpb_row mBuilder-element vc_row wpb_row mBuilder-element  price-table-fix-height row-equal-column-height  sectionOverlay vc_general vc_parallax vc_parallax- full_size "  data-mBuilder-id="9" data-col-layout="12/12" data-bgcolor=" rgba(255,255,255,1)" >

    <script
        type="text/javascript">"use strict";
            var
                    $ = jQuery;
            $(document).ready(function () {
                if (typeof
                        $ != 'function') {
                    $ = jQuery;
                }
                var
                        isChrome = window.chrome, $rowCustom_599290a6d9271 = $("#rowCustom-599290a6d9271");
                $rowCustom_599290a6d9271.find('.row-image').remove();
                $rowCustom_599290a6d9271.append('<div class="row-image row-image-normal "> </div>');
                if (!("")) {
                    $rowCustom_599290a6d9271.find('.row-image').remove();
                }
                if (typeof
                        pixflow_fitRowToHeight == 'function') {
                    pixflow_fitRowToHeight();
                }
                if (isChrome) {
                    $rowCustom_599290a6d9271.find(".row-image-fixed").append('<Style> .row-image-fixed:after{position:fixed; background-attachment:inherit;}</style>');
                }
            });</script>


    <!-- Set background image -->
    <style >    #rowCustom-599290a6d9271 .row-image{    background-position:center center;}    </style>

    <script
        type="text/javascript">"use strict";
            var
                    $ = jQuery;
            var
                    $rowCustom_599290a6d9271 = $('#rowCustom-599290a6d9271');
            if ($rowCustom_599290a6d9271.find('.sloped-edge').length) {
                $rowCustom_599290a6d9271.find('.sloped-edge').remove();
            }</script>



<!--    <select name="parentProj">
        @foreach($currencyData as $va => $project)
        <option value="{{ $va }}">{{$project}}</option>
        @endforeach
    </select>-->


    <div class="wrap clearfix">

        <div class='wpb_column vc_column_container    col-sm-6'>
            <div class='vc_column-inner md_col-599290a6d961a'>
                <div class='wpb_wrapper'>
                    <style data-type="mBuilderInternal"> div.vc_column_container>.vc_column-inner.md_col-599290a6d961a{padding-right:20px !important;}</style>
                    <div class="pixflow-price-table clearfix md_price_table-599290a6d9990  md-align-center" >
                        <style > .md_price_table-599290a6d9990 .price-table-container{background-color:rgb(239, 239, 239);}.md_price_table-599290a6d9990 .price-container, .md_price_table-599290a6d9990 .description{color:rgb(58, 82, 106);}.md_price_table-599290a6d9990 .title, .md_price_table-599290a6d9990 .separator{color:rgb(226, 88, 43);}</style>
                        <div class="price-table-container">
                            <div class="price-container">
                                <span class="currency" id="demo1">S$</span>
                                <span class="price" id="demo">500</span>
                                <div style="font-size: 16px; margin-top: -10px; font-style: italic; color: grey">per month</div>
                            </div>
                            <div class="title">The Essentials Solution</div>
                            <div class="separator"><span class="icon-zigzag"></span></div>
                            <p class="description">
Latest Financial Highlight
Annual Report
Announcements
Presentations
Past Financial Results
Press Releases
Investor Relations Event</p>
                            <div class="price-table-button">
                                <style> #button-599290a6d9b48.shortcode-btn .button-standard.come-in, #button-599290a6d9b48.shortcode-btn .button-standard.fill-rectangle{padding:18px 62px;}#button-599290a6d9b48.shortcode-btn .button-small.come-in, #button-599290a6d9b48.shortcode-btn .button-small.fill-rectangle{padding:18px 59px;}.button-599290a6d9b48.come-in, .button-599290a6d9b48.fill-rectangle{color:rgb(3, 169, 244);}.button-599290a6d9b48.fill-rectangle{background-color:rgb(3, 169, 244); color:rgb(255, 255, 255); border:none;}.button-599290a6d9b48.fill-rectangle:hover{background-color:rgb(0, 82, 147); color:rgb(255, 255, 255); border:none;}</style>

                                <div id="button-599290a6d9b48" class="shortcode-btn  " >
                                    <a class="button fill-rectangle button-standard button-599290a6d9b48" href="{{ URL::to('register/Essentials/2') }}" target="_self" id="essen">
                                        <span>
                                            SIGN UP                </span>
                                    </a>


                                </div> <!-- End wrap button -->
                                <div class="clearfix"></div>
                                <script>"use strict";
                                    var
                                            $ = (jQuery), $button = $('#button-599290a6d9b48');
                                    $button.parents('.wpb_wrapper').css({'text-align': 'center'});</script>



                            </div>
                        </div>
                    </div>

                    <div class='vc_empty_space gizmo-container small-gizmo clearfix column599290a6da24a' style='height:40px'></div>
                </div>
            </div>
        </div>

        <div class='wpb_column vc_column_container    col-sm-6'>
            <div class='vc_column-inner md_col-599290a6da6c6'>
                <div class='wpb_wrapper'>
                    <style data-type="mBuilderInternal"> div.vc_column_container>.vc_column-inner.md_col-599290a6da6c6{padding-right:10px !important;}</style>
                    <div class="pixflow-price-table clearfix md_price_table-599290a6daa7b  md-align-center" >
                        <style > .md_price_table-599290a6daa7b .price-table-container{background-color:rgb(239, 239, 239);}.md_price_table-599290a6daa7b .price-container, .md_price_table-599290a6daa7b .description{color:rgb(58, 82, 106);}.md_price_table-599290a6daa7b .title, .md_price_table-599290a6daa7b .separator{color:rgb(226, 88, 43);}</style>
                        <div class="price-table-container">
                            <div class="price-container">
                                <span class="currency" id="demop1">S$</span>
                                <span class="price" id="demop">1000</span>
                                <div style="font-size: 16px; margin-top: -10px; font-style: italic; color: grey">per month</div>
                            </div>
                            <div class="title">The Professional Solution</div>
                            <div class="separator"><span class="icon-zigzag"></span></div>
                            <p class="description">
Latest Financial Highlight
Annual Report
Announcements
Presentations
Past Financial Results
Press Releases
Investor Relations Event
URL Manager - Webcast 
Stock Pricing &amp; charts live - API link
Newsletter &amp; Broadcast</p>
                            <div class="price-table-button">
                                <style> #button-599290a6dac29.shortcode-btn .button-standard.come-in, #button-599290a6dac29.shortcode-btn .button-standard.fill-rectangle{padding:18px 62px;}#button-599290a6dac29.shortcode-btn .button-small.come-in, #button-599290a6dac29.shortcode-btn .button-small.fill-rectangle{padding:18px 59px;}.button-599290a6dac29.come-in, .button-599290a6dac29.fill-rectangle{color:rgb(3, 169, 244);}.button-599290a6dac29.fill-rectangle{background-color:rgb(3, 169, 244); color:rgb(255, 255, 255); border:none;}.button-599290a6dac29.fill-rectangle:hover{background-color:rgb(0, 82, 147); color:rgb(255, 255, 255); border:none;}</style>

                                <div id="button-599290a6dac29" class="shortcode-btn  " >
                                    <a class="button fill-rectangle button-standard button-599290a6dac29" href="{{ URL::to('register/Professional/2') }}" id="prof" target="_self" >
                                        <span>
                                            SIGN UP                </span>
                                    </a>


                                </div> <!-- End wrap button -->
                                <div class="clearfix"></div>
                                <script>"use strict";
                                    var
                                            $ = (jQuery), $button = $('#button-599290a6dac29');
                                    $button.parents('.wpb_wrapper').css({'text-align': 'center'});</script>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>var
                    $ = jQuery;
            var
                    $rowCustom_599290a6d9271 = $('#rowCustom-599290a6d9271');
            if ("1") {
                $rowCustom_599290a6d9271.find('> .wrap').addClass('box_size_container');
                $rowCustom_599290a6d9271.find('> .wrap').addClass('box_size_container');
            } else {
                $rowCustom_599290a6d9271.find('> .wrap').removeClass('box_size_container');
                $rowCustom_599290a6d9271.find('> .wrap').removeClass('box_size_container');
            }
            $('#rowCustom-599290a6d9271').find('.row-videobg').not('.row-videobg[data-row-id="rowCustom-599290a6d9271"]').remove();</script>

    </div> <!-- End wrap -->

    <style >    #rowCustom-599290a6d9271{  margin-top:0px;margin-bottom:0px;} #rowCustom-599290a6d9271{  padding-top:45px;padding-bottom:85px;padding-right:0px;padding-left:0px;} .sectionOverlay.box_size{ width:65%} .sectionOverlay .box_size_container{ width:65%} #rowCustom-599290a6d9271:after{  background-color:rgba(255,255,255,1)}   </style>
</div> <!-- End main row -->

@stop