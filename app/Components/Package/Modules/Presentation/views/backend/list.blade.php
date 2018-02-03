@extends($app_template['client.backend'])
@section('title')
Presentations
@stop
@section('content')
    <section class="content" id="press-release">
        @if(Session::has('global'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('global') }}
            </div>
        @endif
        @if(Session::has('global-danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('global-danger') }}
            </div>
        @endif
        <div class="row head-search">
            <div class="col-sm-6 title-mobile">
                <lable class="label-title">List of Presentations</lable>
            </div>
            <div class="col-sm-6"> 
                <div class="pull-right">
                    <a href="{{route('package.admin.presentation.form')}}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
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
        {!! Form::open(array('id' => 'form', 'method' => 'post')) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div id="box-page" class="box-body">
                        <table id="table-user" class="table table-bordered table-striped">
                            <thead>
                            <tr class="table-header">
                                <th class="hid"><input class="check-all" type="checkbox"></th>
                                <th>Quarter</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Publish date</th>
                                <th>Quick Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $pre)
                                <tr>
                                    <td width="15px" class="text-center"><input class="check-user" name="check[]" value="{{$pre['id']}}" type="checkbox"></td>
                                    <td>{{$controller->getQuarterMonthById($pre->quarter)}}</td>
                                    <td>{{$pre->year}}</td>
                                    <td>{!!$controller->getStatus($pre->is_active)!!}</td>
                                    <td>{{ isset($pre->publish_date)?  date('d F, Y', strtotime($pre->publish_date)) : "-"}}</td>
                                    <td class="text-center">
                                        <a href="{{route('package.admin.presentation.form', $pre->id)}}" title="edit"><i class="fa fa-edit fa-lg"></i></a> | 
                                        <a class="btn-delete-overide" style="background-color: transparent;" _url="{{route('package.admin.presentation.soft-delete', $pre->id)}}"><i class="fa fa-trash-o fa-lg" style="color:red;cursor: pointer;"></i></a> |
                                        <a href="/{{$pre->upload}}" target="_brank" title="download"><i class="fa fa-download fa-lg" style="color:#5cb85c;"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="url" value="{{route('package.admin.presentation')}}">
        </form>
    </section>
@stop
@section('style')
    {!! Html::style('css/package/press-release.css') !!}
    {!! Html::style('css/dataTables.bootstrap.min.css') !!}

@stop

@section('script')

{!! Html::script('js/jquery.dataTables.min.js') !!}
{!! Html::script('js/dataTables.bootstrap.min.js') !!}

<script type="text/javascript">

    $('.active').removeClass('active');
    $('.presentation').addClass('active');
    $('.presentation_list').addClass('active');





    $(document).ready(function(){
        $("#table-user").dataTable({
            aoColumnDefs: [
                  {
                     bSortable: false,
                     aTargets: [ 0, 3 ]
                  }
                ]
        });

        addResponsive();
    
        $( window ).resize(function() {
            addResponsive();
        });
    });


    $("#table-user").on("click",".check-all:checked",function(){
        $(".check-user:checkbox:not(:checked)").click(); 
    });

    $('.check-all:not(:checked)').click(function(){
        
        $(".check-user:checkbox:checked").click(); 
    });

    $('.btn-delete-overide').click(function(){
        if(confirm('Are you sure you want to delete this one?')){
            window.location = $(this).attr('_url');
        }
    });
    function addResponsive()
    {
        var screen = $(window).width();
        if(screen < 770){
            $('#box-page').addClass('table-responsive');
        }else{
            $('#box-page').removeClass('table-responsive');
        }
    }

</script>

@stop
