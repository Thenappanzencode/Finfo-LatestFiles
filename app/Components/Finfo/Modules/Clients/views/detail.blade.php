@extends($app_template['backend'])

@section('content')
<section class="content" id="list-user">
    <div class="row head-search">
        <div class="col-sm-6">
            <h2 style="margin:0;">Client Detail</h2>
        </div>
        <div class="col-sm-6">
            <div class="pull-right">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        

            <div class="box">
                <div id="box-user" class="box-body">

                    <div class="table-responsive">
                        <div class="col-lg-12">
                            <h4>Company Information</h4>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th class="col-md-2"></th>
                                <td class="col-md-1"></td>
                                <td>
                                    <div class="thumbnail col-md-5">
                                        <img src="/{{($data->company_logo != '')? $data->company_logo: 'backend/img/nologo.jpg' }}" class="img-responsive">
                                    </div>
                                </td>                                
                            </tr>
                            <tr>
                                <th class="col-md-4">Company Name</th>
                                <td>:</td>
                                <td>{{$data->company_name}}</td>
                            </tr>
                            <tr>
                                <th>Finfo Account Name</th>
                                <td>:</td>
                                <td>{{$data->finfo_account_name}}</td>
                            </tr>
                            <tr>
                                <th>Preferred Account Name 1</th>
                                <td>:</td>
                                <td>{{$data->finfo_account_name1}}</td>
                            </tr>
                            <tr>
                                <th>Preferred Account Name 2</th>
                                <td>:</td>
                                <td>{{$data->finfo_account_name2}}</td>
                            </tr>
                            <tr>
                                <th>Company Phone Number</th>
                                <td>:</td>
                                <td>{{$data->phone}}</td>
                            </tr>
                            <tr>
                                <th>Company Email Address</th>
                                <td>:</td>
                                <td>{{$data->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Company Website</th>
                                <td>:</td>
                                <td>{{$data->website}}</td>
                            </tr>
                            <tr>
                                <th>Company Address</th>
                                <td>:</td>
                                <td>{{$data->address}}</td>
                            </tr>
                            <tr>
                                <th>Company Established on</th>
                                <td>:</td>
                                <td>{{$data->established_at != 0 ?$data->established_at:''}}</td>
                            </tr>
                            <tr>
                                <th>Number of Employee</th>
                                <td>:</td>
                                <td>{{$data->number_of_employee>0?$data->number_of_employee:''}}</td>
                            </tr>
                            <tr>
                                <th>Common Stock</th>
                                <td>:</td>
                                <td>{{$data->common_stock>0?$data->common_stock:''}}</td>
                            </tr>
                            <tr>
                                <th>Main Business Activities</th>
                                <td>:</td>
                                <td>{{$data->main_business_activities}}</td>
                            </tr>
                        </table>
                        <div class="col-lg-12">
                            <h4>User Information</h4>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th class="col-md-4">First Name</th>
                                <td class="col-md-1">:</td>
                                <td>{{$data->first_name}}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>:</td>
                                <td>{{$data->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>:</td>
                                <td>{{$data->user_email}}</td>
                            </tr>
                            <tr>
                                <th>Actived Date</th>
                                <td>:</td>
                                <td>{{($data->active_date != '0000-00-00 00:00:00')? date('M/d/Y', strtotime($data->active_date)) : ''}}</td>
                            </tr>
                        </table>

                        <div class="form-group">
                            @if($data->approved_by==0)
                            <button _id="{{$data->id}}" _option1= "{{$data->finfo_account_name1}}" _option2= "{{$data->finfo_account_name2}}" class="btn btn-success btn-approve" style="padding: 4px 10px;">
                               <i class="fa fa-check"></i> Approve
                            </button>
                            @elseif($data->rejected_by==0 || $data->rejected_by!=0)
                            <button _id="{{$data->id}}" class="btn btn-danger btn-reject" style="padding: 4px 10px;">
                               <i class="fa fa-close"></i> Reject
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div id="box-user" class="box-body">

                    <div class="table-responsive">          
                        <div class="col-lg-12">
                            <h4>Package Information</h4>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th class="col-md-4">Current Package</th>
                                <td class="col-md-1">:</td>
                                <td>{{$data->title}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-4">Start Date</th>
                                <td class="col-md-1">:</td>
                                <td>{{date('M/d/Y', strtotime($data->start_date))}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-4">Expire Date</th>
                                <td class="col-md-1">:</td>
                                <td>{{date('M/d/Y', strtotime($data->expire_date))}}</td>
                            </tr>
                        </table>
                        
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
          <label>
            <input type="radio" name="option" value="" id="other">
            <span>Other</span>
            <input type="text" name="otherText" id="otherText" value="" placeholder="Account Name" style="display:none;">
            <span class="surrfix" name="surrfix" style="display:none;"></span>
          </label>
        </div>
        <label class="error" id="error-other" style="color:red;"> </label>
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

        <textarea class="form-control" name="description" placeholder="Your Message"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
         <input type="hidden" id="h_id" name="h_id" value="{{$data->id}}">
         <input type="hidden" id="market" name="market" >
      </div>
        {!!Form::close()!!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade"  id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
    {!!Form::open(array('route' => 'finfo.admin.clients.reject', 'method' => 'POST', 'id' => 'reject-form'))!!}
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
         <input type="hidden" id="r_id" name="r_id" value="{{$data->id}}">
      </div>
    {!!Form::close()!!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

@stop

@section('style')
  {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
  
  <style>
    .has-error, .error { 
      color: red;
      font-weight: 500;
    }
  </style>
@stop

@section('script')
{!! Html::script('js/jquery.validate.min.js') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}

<script type="text/javascript">
    $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':'{!! csrf_token() !!}'
                }
            });
    var baseUrl = "{{ URL::to('/') }}";

    $('#start_trail').datetimepicker({
        format: 'DD-MM-YYYY',
        minDate: moment().millisecond(0).second(0).minute(0).hour(0),
    });
    $('#end_trail').datetimepicker({
        minDate: moment().millisecond(0).second(0).minute(0).hour(0),
        format: 'DD-MM-YYYY',
    });


    $('.btn-approve').click(function(){
        var arr_market = $(this).attr('_option1').split("-");
        var market = arr_market[arr_market.length - 1];
        $('#market').val(market);
        $('.surrfix').text("-" + market);
        $('.modal-title').text("Company Approval");
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

  $("#approve-form").validate({
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
            option: {
                required: 'Please choose one of account names'
            },
            otherText: {
                required: 'Account name field is required',
                remote: "account name already in use!",
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

</script>

@stop