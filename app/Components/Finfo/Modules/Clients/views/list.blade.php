@extends($app_template['backend'])

@section('content')
  <section class="content" id="list-user">
    <div class="row head-search">
      <div class="col-sm-6">
        <h2 style="margin:0;">Client List</h2>
      </div>
      <div class="col-sm-6">
        <div class="pull-right">
<!--
          <a href="#" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                      <i class="fa fa-plus"></i> New User
                  </a>
                  <a href="#" class="btn btn-danger btn-flat" style="padding: 4px 10px;">
                      <i class="fa fa-trash"></i> Deleted
                  </a>
                  <a href="#" class="btn btn-success btn-flat" style="padding: 4px 10px;">
                      <i class="fa fa-eye"></i> Publish
                  </a>
                  <a href="#" class="btn btn-warning btn-flat" style="padding: 4px 10px;">
                      <i class="fa fa-eye-slash"></i> Unpublish
                  </a>
-->
        </div>
      </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('global'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('global') }}
                </div>
                @endif

              <div class="box">
                <div id="box-user" class="box-body">
<!--                    <div class='row'  style='padding-bottom: 20px;'>
                        <div class='col-md-12 pull-right' >
                            <table>
                                <tr>
                                    <td><label style='font-weight:normal; color: #000; padding-right:5px;'>Status</label></td>
                                    <td>
                                        <select name='statusFilter' id='statusFilter' class='form-control'>
                                            <option value='pending'>Pending</option>
                                            <option value='rejected'>Rejected</option>
                                            <option value='expired'>Expired</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>  
                        </div>
                    </div>-->
                    <table id="table-user" class="table table-bordered table-striped">
                          <thead>
                          <tr class="table-header">
                            <th class="hid">Nº</th>
                              <th>Client Name</th>                              
                              <th>Company Phone Number</th>                              
                              <th>Email</th>
                              <th>Company Account Name</th>
                                <th>Package</th>
                              <th>Status</th>
                              <th>Registration Date</th>
                              <th>Expired Date</th>
                              <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $i= 1; ?>
                          @foreach($data['client'] as $client)    
							
                              <tr>
                                <td width="15px" class="text-center">{{ $i }}</td>
                                  <td>
                                        <a href="{{route('finfo.admin.clients.detail', $client['id'])}}">
                                        {{$client['first_name'].' '.$client['last_name'] }}
                                        </a>
                                    </td>
                                  <td>{{$client['phone']}}</td>
                                  <td>{{$client['email_address']}}</td>
                                  <td><ol>
                                            <li>{{$client['finfo_account_name1']}}</li>
                                            <li>{{$client['finfo_account_name2']}}</li>
                                        </ol></td>
                                    <td>{{$client['title']}}</td>
                                    <td><h4>{!!$controller->getClientStatus($client['id'], $client['expire_date'] )!!}</h4></td>
                                <td>{{date('d-M-Y', strtotime($client['created_at']))}}</td>
                                <td>{{date('d-M-Y', strtotime($client['expire_date']))}}</td>
                                  <td>
                                        @if($client['approved_by']==0)
                                        <button _id="{{$client['id']}}" _option1= "{{$client['finfo_account_name1']}}" _option2= "{{$client['finfo_account_name2']}}" class="btn btn-success btn-approve" style="padding: 4px 10px;">
                                            <i class="fa fa-check"></i> Approve
                                        </button>
                                        @endif
                                        <button _id="{{$client['id']}}" class="btn btn-danger btn-reject" style="padding: 4px 10px;">
                                         <i class="fa fa-close"></i> Reject
                                      </button>
                                        <a href="{{ URL::to('admin/clients', $client['id']) }}" class="btn btn-default" style="padding: 4px 10px;">
                                         <i class="fa fa-pencil"></i> Edit
                                      </a>
									  
									    <button _id="{{$client['id']}}" class="btn btn-warning btn-clone" style="padding: 4px 10px;">
                                         <i class="fa fa-copy"></i> Clone
                                      </button>
                                    </td>
                              </tr>
                              <?php $i++; ?>
                          @endforeach
                          </tbody>
                      </table>
                    <div class="paginate pull-right">
                        <?php //echo $data['client']->render(); ?>
                    </div>
                </div>
              </div>
            </div>
        </div>

    </section>

<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      {!!Form::open(array('url' => route('finfo.admin.clients.approve'), 'method' => 'POST', 'id' => 'approve-form'))!!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
          <p>Which company account's name will be use for this account?</p>
          
        <div class="radio">
          <label class="option1">
            <input type="radio" name="option" value="">
            <span></span>
          </label>
          <p class=""></p>
</div>
{{--         <div class="radio">
          <label class="option2">
            <input type="radio" name="option" value="">
            <span></span>
          </label>
        </div> --}}
        <div class="radio">
          <label class="otherField">
            <input type="radio" name="option" value="" id="other">
            <span>Other</span>
            <input type="text" name="otherText" id="otherText" value="" placeholder="Account Name" style="display:none;">
            <span class="surrfix" name="surrfix" style="display:none;"></span>
            <span style="color: red" class="errorOtherText"></span>
          </label>
        </div>
        <label id="option-error" class="error" for="option"></label>
        <label id="otherText-error" class="error" for="otherText"></label>
        <p class="text-danger error-app" style="color:red;"></p>

        <div class="trail" id="trail-dev">
          {{--<div class="checkbox">
             <label>
                <input type="checkbox" name="trail" value="1" id="trail-enable">  Trial period
             </label>
          </div>--}}
          <P style="font-weight: 600;">Trial Date:</P>
          <div class="content-trail-date">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" style="font-weight: 500;">Start date</label>
                      <input type="text" class="form-control" id="start_trail" name="start_trail"  >
                </div>
                <p id="start_trail-error" class="has-error"></p>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" style="font-weight: 500;">End date</label>
                      <input type="text" class="form-control" id="end_trail" name="end_trail"  >
                </div>
                <p id="end_trail-error" class="has-error"></p>
              </div>
            </div>
          </div>
        </div>

        <textarea class="form-control" placeholder="Your Message" name="description"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
        <input type="hidden" id="h_id" name="h_id" value="">
        <input type="hidden" id="market" name="market" >
      </div>
        {!!Form::close()!!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade"  id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
     {!!Form::open(array('url' => route('finfo.admin.clients.reject'), 'method' => 'POST', 'id' => 'reject-form'))!!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reject Company</h4>
      </div>
      <div class="modal-body">
        <p>Give them a reason why you reject them?</p>
        <textarea name="message" class="form-control {{ $errors->has('company_name') ? ' has-error' : '' }}" placeholder="Your Message"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Reject</button>
        <input type="hidden" id="r_id" name="r_id" value="">
      </div>
    {!!Form::close()!!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<div id="clone_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Clone User Details</h4>  
                </div>  
                <div class="modal-body">  
                     {!!Form::open(array('url' => route('finfo.admin.clients.clone'), 'method' => 'POST', 'id' => 'clone-form'))!!}
                          <label>Preferred URL</label>  
                          <input type="text" name="prefered_url" id="prefered_url" class="form-control" />  
						    <span style="color: red" class="cloneerror"></span>
                          <br />  
                          <label>First Name</label>  
                           <input type="text" name="fname" id="fname" class="form-control" />  
						   <span style="color: red" class="cloneerror"></span>
                          <br />  
						  <label>Last Name</label>  
                           <input type="text" name="lname" id="lname" class="form-control" />  
						   <span style="color: red" class="cloneerror"></span>
                          <br />  
						 
						  <label>Phone Number</label>  
                           <input type="text" name="pnumber" id="pnumber" class="form-control" />  
						   <span style="color: red" class="cloneerror"></span>
                          <br /> 
						  
						  <label>Email</label>  
                           <input type="email" name="uemail" id="uemail" class="form-control" />  
						   <span style="color: red" class="cloneerror"></span>
						   
                          <br />
						  
						  <label>Password</label>  
                           <input type="password" name="upword" id="upword" class="form-control" />  
						   <span style="color: red" class="cloneerror"></span>
                          <br />
						  
						  <label>Confirm Password</label>  
                           <input type="password" name="upword2" id="upword2" class="form-control" />  
						    <span style="color: red" class="cloneerror"></span>
                          <br />
                         
							<input type="hidden" id="oldcid" name="oldcid" />
							<input type="hidden" id="cname" name="cname" />
							<input type="hidden" id="phone" name="phone"/>
							<input type="hidden" id="email" name="email" />
							<input type="hidden" id="address" name="address" />
							<input type="hidden" id="website" name="website" />
							<input type="hidden" id="country" name="country" />
							<input type="hidden" id="cmarket" name="cmarket" />
							<input type="hidden" id="package" name="package" />
							<input type="hidden" id="currency" name="currency" />
                          
                          <input type="submit" value="Clone" class="btn btn-success" />  
                     {!!Form::close()!!} 
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

@stop
@section('style')
  {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
  {!! Html::style('css/finfo/list-user.css') !!}
  {!! Html::style('css/dataTables.bootstrap.min.css') !!}
  
  <style>
    .has-error, .error { 
      color: red;
      font-weight: 500;
    }
  </style>
@stop

@section('script')

{!! Html::script('js/jquery.dataTables.min.js') !!}
{!! Html::script('js/dataTables.bootstrap.min.js') !!}
{!! Html::script('js/jquery.validate.min.js') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}

<script type="text/javascript">
    var baseUrl = "{{ URL::to('/') }}";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':'{!! csrf_token() !!}'
        }
    });

    $('#start_trail').datetimepicker({
        format: 'DD-MM-YYYY',
        minDate: moment().millisecond(0).second(0).minute(0).hour(0),
    });
    $('#end_trail').datetimepicker({
        minDate: moment().millisecond(0).second(0).minute(0).hour(0),
        format: 'DD-MM-YYYY',
    });



    $('.btn-approve').click(function(){
        $('.modal-title').text("Company Approval");

        var surrfix = $(this).attr('_option1').split("-");
        $('#market').val(surrfix[surrfix.length-1]);
        $('.surrfix').text("-" + surrfix[surrfix.length-1]);
        $('.option1').find('span').text($(this).attr('_option1'));
        $('.option1').find('input').val($(this).attr('_option1'));
        // $('.option2').find('span').text($(this).attr('_option2'));
        // $('.option2').find('input').val($(this).attr('_option2'));
        $('#h_id').val($(this).attr('_id'));
        var client_id = $(this).attr('_id');
        
        $.ajax({
            url: baseUrl + '/admin/clients/check/client_payment',
            type: "post",
            data: {'client_id': client_id} ,
            success: function(data) {
              if(data == 0){
                $('#trail-dev').show();
              }else{
                $('#trail-dev').hide();
              }
              
              $('#myModal').modal('show');
            },
        });
    });

    $('.btn-reject').click(function(){        
        $('#r_id').val($(this).attr('_id'));
        $('#myModal2').modal('show');
    });

    $('#otherText').keyup(function(){
        $('#other').val($(this).val());
    });

    $('input:radio[name="option"]').change(
        function(){
            if ($(this).is(':checked') && $(this).attr('id')=="other"){
                $('#otherText').show();
                $('.surrfix').show();
            }else{
                $('#otherText-error').text('');
                $('#otherText').val('');
                $('#other').val('');
                $('#otherText').hide();
                $('.surrfix').hide();
            }
    });
  
  $( window ).resize(function() {
    var screen = $(window).width();
    if(screen < 770){
      $('#box-user').addClass('table-responsive');
    }else{
      $('#box-user').removeClass('table-responsive');
    }
  });
  $("#table-user").dataTable();
//    $.fn.dataTable.ext.search.push(
//        function( settings, data, dataIndex ) {
//            var status = $('#statusFilter').val();
//            alert( data[6]);
//            var age = parseFloat( data[6] ) || 0; // use data for the age column
//            alert( )
//            if ( age == status ) {
//                return true;
//            }
//            return false;
//        }
//    );
//  $(function () {
//        var table = $("#table-user").dataTable();
//        $('#statusFilter').change( function() {
//            table.draw();
//        });
//    });

  $("#table-user").on("click",".check-all:checked",function(){
    $(".check-user:checkbox:not(:checked)").click(); 
  });

  $('.check-all:not(:checked)').click(function(){
    
    $(".check-user:checkbox:checked").click(); 
  });

  jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value.indexOf(" ") < 0 || value.indexOf(/([!,%,&,@,#,$,^,*,?,_,~])/) < 0 ; 
    }, "Cannot use space in this field.");


    $.validator.addMethod("regex", function(value, element, regexp) {
        if (value.indexOf(".") !== -1) {
            return false;
        }
        var check = false;
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },"No special Characters allowed here.");


    $.validator.addMethod('lowercase', function(value) {
        return value.match(/^[^A-Z]+$/);
    }, 'No Capital letter allowed here.');

  $("#reject-form").validate({
        rules: {
            message: {
                required: true
            },
        },
        messages: {            
            message: {
                required: "<p style='color: red;' class='error-reject'>Please provide your reason</p>"
            },
        }
  });

  $("#approve-form").validate({        
        // errorClass: 'has-error',
        // highlight: function (element, errorClass) { 
        //     $(element).closest("label.otherField").addClass(errorClass);
        // },
        // unhighlight: function (element, errorClass) { 
        //     $(element).closest("label.otherField").removeClass(errorClass); 
        // },
        rules: {
            option: {
                required: true
            },
            otherText: {
                required: true,
                maxlength: 20,
                minlength: 6,
                noSpace: true,
                lowercase: true,
                regex: /^[A-Za-z0-9\.-]+$/,
                remote: {
                            url: '/register/check/domain_name',
                            type: "post",
                            data:   {
                                        name: function()
                                            {
                                                return $('#approve-form :input[name="otherText"]').val() + '-' + $('#market').val();
                                            }
                                    }
                        }
            },
            end_trail: 'required',
            start_trail: 'required',
        },
        messages: {
          otherText: {
            remote: "account name already in use!",
            required: 'Account name field is required',
          },
          option: {
            required: 'Please choose one of account names'
          }
        },
        //errorElement : 'p',
        //errorLabelContainer: '.text-danger',
        submitHandler: function(form) {
          form.submit();
        }
  });

  $('#myModal2').on('hidden.bs.modal', function() {
      $('.error-reject').remove();
  });

   $('#myModal').on('hidden.bs.modal', function() {
      $('.error-app').html('');
      $('.error').text('');
      $('#start_trail').val('');
      $('#end_trail').val('');
  });

  $("body").on("click","#trail-enable:checked",function(){
      $('.content-trail-date').show();
  });

  $("body").on("click","#trail-enable:not(:checked)",function(){
      $('.content-trail-date').hide();
  });
  
  
  $('#table-user tbody').on('click', '.btn-clone', function () {
  
  //$('.btn-clone').click(function(){
	 
		$('.cloneerror').html('');
		$('#upword').val('');
		$('#upword2').val('');
		var client_id = $(this).attr('_id');
        
        $.ajax({
            url: baseUrl + '/admin/clients/check/clone_details',
            type: "post",
            data: {'client_id': client_id} ,
            success: function(data) {
				
				var res = JSON.parse(data);
             
				$('#fname').val(res.first_name);
				$('#lname').val(res.last_name);
				$('#uemail').val(res.uemail);
				$('#prefered_url').val(res.finfo_account_name1);
				$('#pnumber').val(res.uphone);
				
				$('#cname').val(res.company_name);
				$('#email').val(res.email_address);
				$('#phone').val(res.phone);
				$('#address').val(res.address);
				$('#website').val(res.website);
				$('#cmarket').val(res.market);
				$('#country').val(res.country);
				$('#package').val(res.package_id);
				$('#currecny').val(res.currency_id);
				
				$('#oldcid').val(res.id);
		
				$('#clone_Modal').modal('show');
				
            },
        });
	 
	 
		
	  
  });
  
  
   $("#clone-form").validate({        
     
        rules: {
           
            prefered_url: {
                required: true,
                maxlength: 20,
                minlength: 6,
                noSpace: true,
                lowercase: true,
                regex: /^[A-Za-z0-9\.-]+$/,
                remote: {
                            url: '/register/check/domain_name',
                            type: "post",
                            data:   {
                                        name: function()
                                            {
                                                return $('#prefered_url').val();
                                            }
                                    }
                        }
            },
            fname: 'required',
            lname: 'required',
			uemail:{
				required: true,
				maxlength: 50,
                minlength: 5,
				email: true,
				
			},
			pnumber: 'required',
			upword:  {
				required: true,
				minlength: 6,
				maxlength: 12,
			},
			upword2: {
				required: true,
				
				equalTo: "#upword",
			}
        },
        messages: {
          prefered_url: {
            remote: "Account name already in use!",
            required: 'Account name field is required',
          },
          fname: {
            required: 'Please Enter the First Name'
          },
		  lname: {
            required: 'Please Enter the Last Name'
          },
		  uemail: {
            required: 'Please Enter the User Email'
          },
		  upword: {
            required: 'Please Enter the Password'
          },
		  upword2:{
			 
			  required:'Please Enter the Same Password'
		  },
		  pnumber:{
			  required: 'Please Enter the Phone Number'
		  }
		  
        },
        //errorElement : 'p',
        //errorLabelContainer: '.text-danger',
        submitHandler: function(form) {
          form.submit();
        }
  });
  
</script>

@stop
