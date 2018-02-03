@extends($app_template['backend'])

@section('content')
	<section class="content" id="dashboard">
    <div class="row">
	    <div class="col-md-6">
	    	<div class="box box-solid">
	            <div class="box-header with-border">
	                <h4 class="box-title">Subcription Overview</h4>
	                <div class="pull-right gear-icon"><h4><i class="fa fa-gear"></i></h4></div>
	            </div><!-- /.box-header -->
	            <div class="box-body">
	                <div id="chartContainer" style="height: 300px; width: 100%;">
	                </div>
	            </div><!-- /.box-body -->
	        </div>
	    </div>
      <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">New Clients</h4>&nbsp;
                  <div class="pull-right gear-icon"><h4><i class="fa fa-gear"></i></h4></div>
                </div><!-- /.box-header -->
                <div class="box-body notification">
                  <div  style="height:300px;overflow:auto;">
                      @if(isset($clients) && !empty($clients))
                        <table width="100%">
                        <tr>
                            <th>
                              <!-- <img src="{{asset('img/label-oran.png')}}" alt=""> -->
                              <strong>Client Name</strong>
                            </th>
                            <th>
                              <strong>Package</strong>                 
                            </th>
                            <th>
                              <strong>Register Date</strong>                 
                            </th>
                            <th>
                              <strong>Status</strong>
                            </th>
                          </tr>
                        @foreach($clients as $client)
                          <tr>
                            <td class="td-id" style="background-image:url(img/label-oran.png);">
                              <!-- <img src="{{asset('img/label-oran.png')}}" alt=""> -->
                              <a href="{{route('finfo.admin.clients.detail', $client['id'])}}">
                                {{$client['first_name'].' '.$client['last_name'] }}
                              </a>
                            </td>
                            <td align="left">
                              {{$client['title']}}                  
                            </td>
                            <td align="left">
                              {{date('d-M-Y', strtotime($client['created_at']))}}                  
                            </td>
                            <td>
                              {!!$clientBackendController->getStatus($client['id'])!!}
                            </td>
                          </tr>
                        @endforeach
                        </table>
                      @else
                        <p>No data</p>
                      @endif
                  </div>
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </div>
        <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Invoice</h4>&nbsp;
                  <div class="pull-right gear-icon"><h4><i class="fa fa-gear"></i></h4></div>
                </div><!-- /.box-header -->
                <div class="box-body notification">
                  <div  style="height:300px;overflow:auto;">
                    @if(isset($invoices) && !empty($invoices))
                        <table width="100%">
                          <tr>
                            <th>Invoice #</th>
                            <th>Company Name</th>
                            <th>Invoice Date</th>
                            <th>Start Date</th>
                            <th>Expired Date</th>
                            <th>Due Date</th>
                            <th>Total Due</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                          @foreach($invoices as $invoice)
                          <tr>
                            <td><a href="{{route('finfo.admin.billing.invoice.detail', $invoice['id'])}}">{{$invoice->invoice_number}}</a></td>
                            <td>{{$invoice->company_name}}</td>
                            <td>{{date('d-M-Y', strtotime($invoice->invoice_date))}}</td>
                            <td>{{date('d-M-Y', strtotime($invoice->start_date))}}</td>
                            <td>{{date('d-M-Y', strtotime($invoice->expire_date))}}</td>
                            <td>{{date('d-M-Y', strtotime($invoice->due_date))}}</td>
                            <td>{{$controller->PriceWithEx($invoice->amount, $invoice->currency_id)}}</td>
                            <td>{!!$invoicecontroller->getInovoiceStatus($invoice->status)!!}</td>
                            <td><a href="{{route('finfo.admin.billing.invoice.form', $invoice['id'])}}"><i class="fa fa-edit fa-lg"></i></a></td>
                          </tr>
                          @endforeach
                        </table>
                    @else
                        <p>No data</p>
                    @endif
                  </div>
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </div>
        <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Client Last Access</h4>&nbsp;
                  <div class="pull-right gear-icon"><h4><i class="fa fa-gear"></i></h4></div>
                </div><!-- /.box-header -->
                <div class="box-body notification">
                  <div  style="height:300px;overflow:auto;">
                      @if(isset($client_access) && !empty($client_access))
                        <table width="100%">
                            <tr>
                              <th>Client</th>
                              <th>Last Access</th>
                            </tr>
                            @foreach($client_access as $client)
                                <tr>
                                  <td>{{$client->company_name}}</td>
                                  <td>{{date('d-M-Y h:i A', strtotime($client->last_login))}}</td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <p>No data</p>
                        @endif
                  </div>
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </div>
    </div>
<!--    <div class="row">
        <div class="col-md-12">
           <div id="embed-api-auth-container"></div>
            <div id="chart-container"></div>
            <div id="view-selector-container"></div>
        </div>
    </div>-->
    </section>
@stop
@section('style')

    <style type="text/css">
        #embed-api-auth-container,
        #view-selector-container
        {
            display:none;
        }
        tr:nth-child(odd) {
          background-color: #FFFFFF;;
        }

        tr:nth-child(even) {
          background-color: #f0f0f0;
        }
        .notification td, .notification th{
          padding: 10px;
          text-align: left;
        }
        .canvasjs-chart-credit{
          display: none;
        }
    </style>
@stop
@section('script')
	{!! Html::script('js/canvasjs.min.js') !!}
    <script type="text/javascript">
       window.onload = function () {
        var data_chart = getDataChart();
        var chart = new CanvasJS.Chart("chartContainer", { 
            data: [
            {
              type: "spline",
              dataPoints: data_chart
            }
            ]
        });
        chart.render(); 
    }

    function getDataChart(){
      var result = [];
      $.ajax({
          url: '/admin/get-client-chart',
          async: false,
          data: {},
          success: function(data) {

                for (var i in data){
                  value_arr = {
                      'x' : new Date(data[i].x),
                      'y' : data[i].y
                      };

                  result[i] = value_arr; 
                }
              //callback(result);
            }
      });
      return result;
    }
</script>
@stop