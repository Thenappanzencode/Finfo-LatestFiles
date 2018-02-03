<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FINFO - Invoice #{{$data['invoice']['invoice_number']}}</title>


    <style type="text/css">
    	.content-wrapper{background-color:#414950}#view-invoice{margin:15px auto;padding:70px;max-width:850px;background-color:#fff;border:1px solid #ccc;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;border-radius:6px}#view-invoice .invoice-status{margin:20px 0 0 0;text-transform:uppercase;font-size:24px;font-weight:bold}#view-invoice .unpaid{color:#cc0000}#view-invoice .payment-btn-container{margin-top:5px;text-align:center}#view-invoice .select-inline{display:inline-block;width:auto}#view-invoice td.total-row{background-color:#f8f8f8}@media (min-width: 768px){#view-invoice .text-right-sm{text-align:right}#view-invoice .pull-sm-right{float:right}}
/*# sourceMappingURL=view-invoice.css.map */
	.row {
	    margin-right: -15px;
	    margin-left: -15px;
	}
	.col-sm-7 {
	    width: 58.33333333%;
	}
	.col-sm-5 {
	    width: 41.66666667%;
	}
	.col-sm-6 {
	    width: 50%;
	}
	.panel {
	    margin-bottom: 20px;
	    background-color: #fff;
	    border: 1px solid transparent;
	    border-radius: 4px;
	    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
	    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	}
	.panel-default {
	    border-color: #ddd;
	}
	.panel-default>.panel-heading {
	    color: #333;
	    background-color: #f5f5f5;
	    border-color: #ddd;
    }
    .panel-title {
	    margin-top: 0;
	    margin-bottom: 0;
	    font-size: 16px;
	    color: inherit;
	}
	.panel-body {
	    padding: 15px;
	}
	.table-responsive {
	    min-height: .01%;
	    overflow-x: auto;
	}
	.item{
		padding: 10px;
	}
	.table{
		width: 100%;
	}
	.text-right{
		text-align: right;
	}
	.text-center{
		text-align: center;
	}
	.text-left{
		text-align: left;
	}
	.paid{
		color: #28FA83;
	}
	.cancelled{
		color: #888888;
	}
    </style>

    <style type="text/css">
    	.table-h, .table-price{
    		border: 1px solid;
    		margin-top: 30px;
    		border-spacing: 0px;
    	}
    	.th-h th, .table-price th{
    		background-color: #ccc;
    		border: 1px solid !important;
    	}
    	.table-h td, .table-price td{
    		border: 1px solid !important;
    	}
    	.table-date{
    		margin-top: 30px;
    	}
    	.table-date td{
    		padding: 0px !important;
    	}
    	.table-price th{
    		border: 1px solid black !important;
    		color: #ffffff;
    		font-weight: 600;
    	}
    	.price-foot{
    		background-color: #ccc;
    		text-align: right;
    	}
    	.table-price .content-price{
    		min-height: 230px;
    		padding-left: 30px;
    	}


    </style>
</head>
<body>
	<div class="container-fluid invoice-container" id="view-invoice">
		<div class="row">
			<img src="https://wizwerx.info/img/finfo/imgs/finfo-logo-normal.png">

			<table class="table table-h">
				<tr class="th-h">
					<th>Invoiced To:</th>
					<th>Pay To:</th>
				</tr>
				<tr class="th-h">
					<td width="50%">
						<p><strong>{{$data['company']['company_name']}}</strong></p>
						<p>{{@$data['company']['address']}}</p>
					</td>
					<td width="50%">
						<p><strong>Finfo Pte Ltd</strong></p>
						<p>648A Geylang Roads</p>
						<p>Singapore 389578</p>
					</td>
				</tr>
			</table>

			<table class="table table-date">
				<tr>
					<td>
						<p><strong>Invoice #{{$data['invoice']['invoice_number']}}</strong></p>
						<p>Invoice Date: {{\Carbon\Carbon::parse($data['invoice']['invoice_date'])->format('d/M/Y')}}</p>
						<p>Due Date: {{\Carbon\Carbon::parse($data['invoice']['due_date'])->format('d/M/Y')}}</p>
					</td>
				</tr>
			</table>
		</div>

		<div class="row">

			<table class="table table-price">
				<tr class="th">
					<th style="padding-left: 38px;">Description</th>
					<th style="text-align: right;">Total ({{@$data['currency']['code']}})</th>
				</tr>
				<tr class="th">
					<td width="80%">
						<div class="content-price">
							<p>{{ucfirst($data['package']['package_name'])}} Plan</p>
							<p>One month subscription:</p>
							<p>{{\Carbon\Carbon::parse($data['csp']['start_date'])->format('d/M/Y')}} till {{\Carbon\Carbon::parse($data['csp']['expire_date'])->format('d/M/Y')}}</p>
						</div>
					</td>
					<td width="20%" style="text-align: right;">
						<p>
						@if(isset($data['currency']['symbol']))
							{{$data['currency']['symbol']}} {{number_format(round($data['package']['package_price'] * $data['currency']['exchange_rate']), 2 , ".", ",")}}
						@else
							{{$data['package']['package_price']}}
						@endif
						</p>
					</td>
				</tr>
				<tr class="price-foot">
					<td>
						<p>Total({{@$data['currency']['code']}})</p>
					</td>
					<td>
						@if(isset($data['currency']['symbol']))
							{{$data['currency']['symbol']}} {{number_format(round($data['package']['package_price'] * $data['currency']['exchange_rate']), 2 , ".", ",")}}
						@else
							{{$data['package']['package_price']}}
						@endif
					</td>
				</tr>
			</table>
			<br>
			<p>For billings enquiries please email Finfo at billings@finfo.com</p>

		</div>

	</div>
</body>
</html>
