  
   <style type="text/css">
   .footer-color {
                 background: {{ $setting->footer_color }}
            }
            
    .footer-text {
                 color: {{ $setting->footer_text }}
            }        
            
     #result{
     
     padding-left: 95px;
     color: red;
     
 } 
 
 
  .loading{
  font-size:0;
  width:30px;
  height:30px;
  margin-top:5px;
  border-radius:15px;
  padding:0;
  border:3px solid #FFFFFF;
  border-bottom:3px solid rgba(255,255,255,0.0);
  border-left:3px solid rgba(255,255,255,0.0);
  background-color:transparent !important;
  animation-name: rotateAnimation;
  -webkit-animation-name: wk-rotateAnimation;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-delay: 0.2s;
  -webkit-animation-delay: 0.2s;
  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
}

@keyframes rotateAnimation {
    0%   {transform: rotate(0deg);}
    100% {transform: rotate(360deg);}
}
@-webkit-keyframes wk-rotateAnimation {
    0%   {-webkit-transform: rotate(0deg);}
    100% {-webkit-transform: rotate(360deg);}
}

.done{
  color:#ffffff;
  font-size:18px !important;
  position:absolute;
  left:65%;
  top:50%;
  margin-left:-9px;
  margin-top:-9px;
  -webkit-transform:scaleX(0) !important;
  transform:scaleX(0) !important;
}


.failed{
  color:#ffffff;
  font-size:18px !important;
  position:absolute;
  left:50%;
  top:50%;
  margin-left:-9px;
  margin-top:-9px;
  -webkit-transform:scaleX(0) !important;
  transform:scaleX(0) !important;
}
.finish{
  -webkit-transform:scaleX(1) !important;
  transform:scaleX(1) !important;
}
.hide-loading{
  opacity:0;
  -webkit-transform: rotate(0deg) !important;
  transform: rotate(0deg) !important;
  -webkit-transform:scale(0) !important;
  transform:scale(0) !important;
}
 
 
 
 
   </style>
   
   <footer class="thm-bdrclr footer-color fxd-ftr">
      <div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-6 res-cpy">
				<p class="cpy-txt footer-text res-form-copy">Copyright &copy; 2017 {{$setting->company_name}} (SINGAPORE) PTE LTD. All rights reserved.</p>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-6">
			<div class="form-inline">
			  <?php $col = ''; $sit = ''; $right = ''; ?>
			       @if (isset($menuPermissions) && !empty($menuPermissions))
             	    	@foreach($menuPermissions as $menuPer)
                     	  	@if ($menuPer->name == 'Newsletter')
                     	  	
                     	  <?php 
                     	  $sit='stemap-normal'; 
                     	  $col = 'col-12 col-sm-2 col-md-2 col-lg-2 res-site';
                     	  $right = ''; 
                     	  ?>
                     	  @else
                     	  <?php
                     	  $sit='cpy-txt-stemap';
                     	  $col = 'col-12 col-sm-12 col-md-12 col-lg-12';
                     	  $right = 'text-align: right';
                     	  ?>
                     	  
                	@endif
                    @endforeach
                    @endif     	  	
			  <div class="form-group {{$col}}">				
				<p>	<a href="{{ route('client.sitemap') }}" class="sit-map-txt hme-anc-itm-lnk footer-text {{$sit}} res-form-site" style="{{$right}}">Sitemap</a></p>
			  </div>
			  
	     	@if (isset($menuPermissions) && !empty($menuPermissions))
 	    	@foreach($menuPermissions as $menuPer)
           	@if ($menuPer->name == 'Newsletter')
		      <div class="form-group col-8 col-sm-8 col-md-8 col-lg-8 nws-subs-sec res-form-per">				
				<input type="email" class="form-control subemail" id="email" placeholder="Enter email to subscribe to newsletter">
			  </div>
			  <div class="form-group col-2 col-sm-1 col-md-1 col-lg-1">	
		    	<div class="row">
				    <div class="fa fa-check done"></div>
                     <div class="fa fa-close failed"></div>
				    <button type="submit" class="btn thme-clr subs-btn submit1" onclick="validation()"><i class="material-icons submit">send</i></button>
				 </div>
			</div>
		
    	   	@endif
            @endforeach
            @endif
			  

			
			
			
			
			<span id ="result">
			</span>				
			</div>
		</div>
      </div>
      <!-- /.container -->
    </footer>
    <a href="#" class="scrollToTop"><i class="material-icons">keyboard_arrow_up</i></a>
    
@section('script')

<script type="text/javascript">

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


function validation(){ 
 
 
 $("#result").html("");
  var email = $("#email").val();
  if (validateEmail(email)) {
      
      var formData = email;
      $.ajax({
            url: '/email',
            type: "POST",
            data: {"formData": formData,"_token":"{{csrf_token()}}"},
            success: function(data) {
               
               if(data == 1){
             // $('.submit1').hide();
                 $(".submit").addClass("loading");
                setTimeout(function() {
                  $(".submit").addClass("hide-loading");
                  // For failed icon just replace ".done" with ".failed"
                  $(".done").addClass("finish");
                }, 2000);
                setTimeout(function() {
                  $(".submit").removeClass("loading");
                  $(".submit").removeClass("hide-loading");
                  $(".done").removeClass("finish");
                  $(".failed").removeClass("finish");
               //      $('.submit1').show();   
                }, 3000);
                     
                 setTimeout(function() {          
              $("#result").html("Subscribe to Newsletter Email send successfully"); } , 3000);
              
               $("#result").css("color", "green");
               $('#email').attr('style','border:2px solid #o27e28');
               $('#email').focus();
               document.getElementById("email").value = "";
                   
               }else{
                   
                    $("#result").html("Sorry , Given Email ID is already exist");
                     $("#result").css("color", "red");
                      $('#email').attr('style','border:2px solid #ed1717');
                     return false;
                   
               }
               
               
            
            }
        });
      
   } else {
    $("#result").html(" Please enter the correct email");
    $("#result").css("color", "red");
     $('#email').attr('style','border:2px solid #ed1717');
    return false;
  }
  return false;
}    

</script>
