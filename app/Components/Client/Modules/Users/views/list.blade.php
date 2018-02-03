@extends($app_template['client.backend'])
@section('title')
Users Manager
@stop
@section('content')
	<section class="content" id="list-user">
		@if(Session::has('global'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('global') }}
                    </div>
                @elseif(Session::has('global-deleted'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('global-deleted') }}
                </div>
                @endif
            
		{!! Form::open(array('id' => 'form', 'method' => 'post')) !!}
		<div class="row head-search">
			<div class="col-sm-6">
				<lable class="label-title">List of Users</lable>
			</div>
			<div class="col-sm-6"> 
				<div class="pull-right">
					<a href="{{route('client.user.backend.create')}}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
	                 	<i class="fa fa-plus"></i> Add New
	             	</a>
	             	<button class="btn btn-danger btn-flat btn-delete-all" style="padding: 4px 10px;">
	                 	<i class="fa fa-trash"></i> Deleted
	             	</button>
	             	<button class="btn btn-success btn-flat btn-publish-all" style="padding: 4px 10px;">
	                 	<i class="fa fa-eye"></i> Publish
	             	</button>
	             	<button class="btn btn-warning btn-flat btn-unpublish-all" style="padding: 4px 10px;">
	                 	<i class="fa fa-eye-slash"></i> Unpublish
	             	</button>
				</div>
			</div>
      	</div>
        <div class="row">
            <div class="col-md-12">
	            <div class="box">
	            	<div id="box-user" class="box-body">
	            		<table id="table-user" class="table table-bordered table-striped">
	                        <thead>
	                        <tr class="table-header">
	                        	<th class="hid"><input class="check-all" type="checkbox"></th>
	                            <th>First Name</th>
	                            <th>Last Name</th>
	                            <th>Email</th>
	                            <th>Type</th>
								<th>Last Login</th>
								<th>Status</th>
								<th>Created By</th>
								<th>Created At</th>
								<th>Updated By</th>
								<th>Updated At</th>
								<th>Actions</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        @foreach($data['user'] as $user)
	                            <tr>
	                            	<td width="15px" class="text-center"><input class="check-user" name="check[]" value="{{$user['id']}}" type="checkbox"></td>
									<td>{{ ucfirst($user['first_name'])}}</td>
									<td>{{ ucfirst($user['last_name'])}}</td>
									<td>{{ $user['email_address']}}</td>
									<td>{{ $controller->getUserType($user['user_type_id'])}}</td>
									<td>{{ ($user['last_login'] != "0000-00-00 00:00:00") ? date("d F, Y", strtotime($user['last_login'])) : ""}}</td>
									<td>{{ $controller->getStatus($user['id'])}}</td>
									<td>{{ $controller->getUser($user['created_by'])}}</td>
									<td>{{ ($user['created_at'] != "0000-00-00 00:00:00") ? date("d F, Y", strtotime($user['created_at'])) : ""}}</td>
									<td>{{ $controller->getUser($user['id'])}}</td>
									<td>{{ ($user['updated_at'] != "0000-00-00 00:00:00") ? date("d F, Y", strtotime($user['updated_at'])) : ""}}</td>
									<td class="text-center"><a href="{{route('client.user.backend.edit', $user['id'])}}"><i class="fa fa-edit fa-lg"></i></a> 
                                                                        @if ($user['id'] != \Auth::user()->id)
                                                                        | <a class="btn-delete-overide" style="background-color: transparent;" _url="{{route('client.user.backend.soft.delete', $user['id'])}}"><i class="fa fa-trash-o fa-lg" style="color:red;cursor: pointer;"></i></a></td>
                                                                        @endif
	                            </tr>
	                        @endforeach
	                        </tbody>
	                    </table>
		                <div class="paginate pull-right">
		                    <?php //echo $data['user']->render(); ?>
		                </div>
	            	</div>
	            </div>
            </div>
        </div>
        <input type="hidden" id="url" value="{{route('client.user.backend.list')}}">
        </form>
    </section>
@stop
@section('style')
	{!! Html::style('css/client/list-user.css') !!}
	{!! Html::style('css/dataTables.bootstrap.min.css') !!}
@stop

@section('script')

{!! Html::script('js/jquery.dataTables.min.js') !!}
{!! Html::script('js/dataTables.bootstrap.min.js') !!}

<script type="text/javascript">
    $('.active').removeClass('active');
    $('.user').addClass('active');
    $('.user_list').addClass('active');

	$( window ).resize(function() {
		var screen = $(window).width();
		if(screen < 770){
			$('#box-user').addClass('table-responsive');
		}else{
			$('#box-user').removeClass('table-responsive');
		}
	});

	$(document).ready(function(){
		var screen = $(window).width();
		if(screen < 770){
			$('#box-user').addClass('table-responsive');
		}else{
			$('#box-user').removeClass('table-responsive');
		}
		
		$("#table-user").dataTable({
        	aoColumnDefs: [
				  {
				     bSortable: false,
				     aTargets: [ 0, 11]
				  }
				]
        });
	});


	$("#table-user").on("click",".check-all:checked",function(){
		$(".check-user:checkbox:not(:checked)").click(); 
	});

	$('.check-all:not(:checked)').click(function(){
		
		$(".check-user:checkbox:checked").click(); 
	});

	$("#table-user").on("click",".check-user:not(:checked)",function(){
		if($(".check-user:checkbox:checked").length <= 0){
			$('.check-all').prop('checked', false);
		}
		
	});

	$('.btn-delete-overide').click(function(){
        if(confirm('Are you sure you want to delete this one?')){
            window.location = $(this).attr('_url');
        }
    });
</script>

@stop