@extends($app_template['client.backend'])
@section('title')
Customize
@stop
@section('content')

<style>
	.set-box-body
	{
		border-bottom: 1px solid #c6c6c6;
		padding: 30px;
		border-radius: 0;
	}
	.set-box-body h5
	{
		margin: 0 0 10px;
		font-weight: bold;
	}
	.gry-txt
	{
		color:#999;
	}
	
	.all-scroll
	{ cursor: move; }

.imageThumb {
 max-height: 75px;
 border: 2px solid;
 margin: 10px 10px 0 0;
 padding: 1px;
 }
</style>

<section class="content" id="setting">

    <div id="loader_img"></div>
	<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Theme Setting</lable>
	    </div>	    
	</div>
	

	 @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('success')}}
    </div>
    @endif
	{!! Form::open(['url'=>'admin/setting/change/', 'method' => 'post', 'files' => true, 'id' => 'frmsetting' ]) !!}

	<div class="box">
		
		<div class="box-body set-box-body">	
			<h5>Font Family</h5>
			<div class="col-md-3">	
				<div class="row">
					<div class="input-group ">									
						<select name="font_family" id="" class="form-control">
							<option value="Open Sans, sans-serif" {{$setting->font_family == 'Open Sans, sans-serif'? "selected":""}}>Default (Open Sans, sans-serif)</option>
							<option value="Lato, sans-serif" {{$setting->font_family == 'Lato, sans-serif'? "selected":""}}>Lato, sans-serif</option>
							<option value="Source Sans Pro, sans-serif" {{$setting->font_family == 'Source Sans Pro, sans-serif'? "selected":""}}>Source Sans Pro, sans-serif</option>
						</select>
					</div>
				</div>
			</div>			
		</div>
		
		<div class="box-body set-box-body">	
			<h5>Logos</h5>
			<div class="col-md-5 col-sm-5">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="row">
							<p>Favicon</p>
							<p class="gry-txt">Recommended dimensions (16px X 16px )</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="form-group{{ $errors->has('favicon') ? ' has-error' : '' }}">							 
							 <a class='text-right text-red remove-company-favicon remove-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>							
							<div class="favicon"><i class="fa fa-plus"></i></div>							
							<input type="file"  class="hidden" id="file_favicon" name="file_favicon">
							<input type="hidden" id="favicon" name="favicon" value="{{isset($data['favicon']) ? $data['favicon'] : ""}}">
							{!! $errors->first('favicon', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-5">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="row">
							<p>Header Logo</p>
							<p class="gry-txt">Recommended dimensions (150px X 80px )</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="form-group{{ $errors->has('company_logo') ? ' has-error' : '' }}">
							<a class='text-right text-red remove-company-logo remove-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
							<div class="company-logo"></div>
							<input type="file"  class="hidden" id="file_company_logo" name="company_logo">
							<input type="hidden" id="company_logo" name="data_company_logo" value="{{isset($data['company_logo']) ? $data['company_logo'] : ""}}">
							<div></div>
							{!! $errors->first('company_logo', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
				</div>
			</div>
		   <!-- <div class="col-md-4 col-sm-4">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="row">
							<p>Company Logo</p>
							<p class="gry-txt">Recommended dimensions (470px X 330px )</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						  <a class='text-right text-red remove-company-info remove-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
                            <div class="company-info"></div>
                            <input type="file"  class="hidden" id="file_company_info" name="file_company_info">
                            <input type="hidden" id="data_company_info" name="data_company_info" value="{{isset($settings->company_info_img) ? $settings->company_info_img : ""}}"> 
                						</div>
                					</div>
				</div>-->
		
		</div>
		
		<div class="box-body set-box-body">				
			
			<div class="col-md-3">
				<div class="row"><h5 style="padding-top:10px;">Background Colors</h5></div>
				<div class="clearfix" style="padding:12px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Primary Background</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group bgcolor">						
							<input name="bgcolor" type="text" class="form-control" value="{{ isset($settings->background_color) ? $settings->background_color : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>			
					</div>
				</div>
				<div class="clearfix" style="padding:10px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Secondary Background</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group theme_color">									
							<input name="theme_color" type="text" class="form-control" value="{{ isset($settings->theme_color) ? $settings->theme_color : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>			
					</div>
				</div>				
				
				<div class="clearfix" style="padding:12px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Footer Background</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group theme_color">									
							<input name="footer_color" type="text" class="form-control" value="{{ isset($settings->footer_color) ? $settings->footer_color : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>			
					</div>
				</div>				
			</div>	

			<div class="col-md-3 col-md-offset-1">
				<div class="row"><h5 style="padding-top:10px;">Font Colors</h5></div>
				<div class="clearfix" style="padding:12px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Text on Primary Background</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group cnt_color">								
							<input name="cnt_color" type="text" class="form-control" value="{{ isset($settings->container_color) ? $settings->container_color : "" }}" />
							<span class="input-group-addon"><i></i></span>				
						</div>		
					</div>
				</div>
				<div class="clearfix" style="padding:10px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Text on Secondary Background</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group font_color">									
							<input name="font_color" type="text" class="form-control" value="{{ isset($settings->font_color) ? $settings->font_color : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>		
					</div>
				</div>		
				
				<div class="clearfix" style="padding:10px;"></div>
				<div class="row">	
					<div class="col-md-5">
						<div class="row"><p>Footer Text</p></div>
					</div>
					<div class="col-md-7">
						<div class="input-group font_color">									
							<input name="footer_text" type="text" class="form-control" value="{{ isset($settings->footer_text) ? $settings->footer_text : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>		
					</div>
				</div>		
				
			</div>				
			<div class="row"><div class="clearfix" style="padding:10px;"></div></div>
			
		</div>		
		
	</div>
	
	
	<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Slider Setting</lable>
	    </div>	    
	</div>
	
	<div class="box">		
		
		<div class="box-body set-box-body">
			<div class="row"><div class="clearfix" style="padding:5px;"></div></div>
			<div class="row">
				<div class="col-md-7">
					<h5>Slider Description</h5>          
					<input type="text" id="slider_description" name="slider_description" class="form-control" value='{{ isset($setting->slider_description) ? $setting->slider_description : "" }}'>        
				</div>
			</div>
			<div class="row"><div class="clearfix" style="padding:17px;"></div></div>
			<div class="row">
				<div class="col-md-4">
					<div class="col-md-6">
						<div class="row"><h5>Description Color</h5></div>
					</div>
					<div class="col-md-6">
						<div class="input-group description_color">									
							<input name="description_color" type="text" class="form-control" value="{{ isset($settings->description_color) ? $settings->description_color : "" }}" />
							<span class="input-group-addon"><i></i></span>
						</div>
					</div>					
				</div>
			</div>
			<div class="row"><div class="clearfix" style="padding:15px;"></div></div>
		</div>
		
		<div class="box-body set-box-body">
			<div class="row">
				<div class="col-md-12">
					<h5>Images</h5>   
					<p class="gry-txt">Recommended image dimension (1920px X 1080px). Move the boxes around to change the order</p>
					
					<input type="hidden" id="token" name="token" value=" {{ csrf_token() }}" />
				</div>
			</div>
			
			<div class="row"><div class="clearfix" style="padding:15px;"></div>
			
				<div class="col-md-12 col-sm-12">
						<div class="form-group{{ $errors->has('banner_imag') ? ' has-error' : '' }}">
						    
						 
						    <ul id="sortable">
						        
						         
						        
						        
						    </ul>
						    
						    
						    <div class="slid-image">
						         <i class="fa fa-plus"></i>
						         <span>Add Slide</span>
						    </div>
						    
						    
						    <input type="file" class="hidden" id="file_banner_imag" name="banner_imag">
						    
						
							
							<!--input type="hidden" id="company_logo" name="data_company_logo" value="{{isset($data['company_logo']) ? $data['company_logo'] : ""}}"-->
							<div></div>
							{!! $errors->first('company_logo', '<span class="help-block">:message</span>') !!}
						</div>
					</div>
			
			<div class="clearfix" style="padding:15px;"></div>
			</div>
		</div>
		
	</div>
	
	
		<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Company Info Summary </lable>
	    </div>	    
	</div>
	
	<div class="box">
    <div class="box-body set-box-body">
	

	<div class="row">
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Title</label>
				<input type="text" id="company_title" name="company_title" class="form-control" value="{{ isset($cmp_info->title) ? $cmp_info->title : "" }}">
			</div>
				<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Description</label>
				<textarea class="form-control" name="company_description" cols="50" rows="10" id="company_description" value="">{{ isset($cmp_info->content_description) ? $cmp_info->content_description : "" }}</textarea>
			</div>
			
		</div>
		
		<div class="col-md-4 col-sm-4">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Featured Image</label>
				<p class="gry-txt">Recommended dimensions (470px X 330px )</p>
						  <a class='text-right text-red remove-company-info remove-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
                            <div class="company-info"></div>
                            <input type="file"  class="hidden" id="file_company_info" name="file_company_info">
                            <input type="hidden" id="data_company_info" name="data_company_info" value="{{isset($settings->company_info_img) ? $settings->company_info_img : ""}}"> 
			</div>
			
		</div>
        </div>
        
    </div>
</div>


	
	<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Google Analytic</lable>
	    </div>	    
	</div>
	
	<div class="box">
    <div class="box-body set-box-body">
	

	<div class="row">
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Google Analytic ID:</label>
				<input type="text" id="google_analytic" name="google_analytic" class="form-control" value='{{ isset($setting->google_analytic) ? $setting->google_analytic : "" }}'>
			</div>
			
		</div>
	
	
  <!--  <div class="col-md-6">
        <div class="form-group">
            <div id="filediv">
            <label for="comment">Image Banner </label> (Home Page) <a class='text-right text-red remove-banner-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
            <div class="img-content"></div>
            <input type="file"  class="hidden" id="file_logo" name="logo">
            <input type="hidden" id="img_banner" name="img_banner" value="{{ isset($settings->banner_img) ? $settings->banner_img : "" }}">
            <div>Recommended Dimension (690px by 340px) </div>
            
            
            </div> -->
            
<!--input type="button" id="add_more" class="upload" value="Add More Files"/>
            
            <div id="clonesec">                 
                
            </div-->
			
			
        </div>
    </div>
</div>

<!--
<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Social Media Settings</lable> <a href="../../files/Guide.pdf" target="_blank">Guidelines for Social Media Application Creation</a>
	        <br /><br />
	        <br />
	        <lable class="label-title">Twitter Settings</lable>
	    </div>	    
	</div>
	
	<div class="box">
    <div class="box-body set-box-body">
	

	<div class="row">
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Oauth Access Token:</label>
				<input type="text" id="oauth_token" name="oauth_token" class="form-control" value='{{ isset($social_data->tw_oauth_token) ? $social_data->tw_oauth_token : "" }}'>
			</div>
			
		</div>
		
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Oauth Access Token Secret:</label>
				<input type="text" id="oauth_secret" name="oauth_secret" class="form-control" value='{{ isset($social_data->tw_oauth_secret) ? $social_data->tw_oauth_secret : "" }}'>
			</div>
			
		</div>
		
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Consumer Key :</label>
				<input type="text" id="consumer_key" name="consumer_key" class="form-control" value='{{ isset($social_data->tw_consumer_key) ? $social_data->tw_consumer_key : "" }}'>
			</div>
			
		</div>
		
			<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Consumer Secret :</label>
				<input type="text" id="consumer_secret" name="consumer_secret" class="form-control" value='{{ isset($social_data->tw_consumer_secret) ? $social_data->tw_consumer_secret : "" }}'>
			</div>
			
		</div>
		
			<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Twitter Id:</label>
				<input type="text" id="twitter_id" name="twitter_id" class="form-control" value='{{ isset($social_data->twitter_id) ? $social_data->twitter_id : "" }}'>
			</div>
			
		</div>
	
	
        </div>
    </div>
</div>


<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Facebook Settings</lable>
	    </div>	    
	</div>
	
	<div class="box">
    <div class="box-body set-box-body">
	

	<div class="row">
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;"> Application Id:</label>
				<input type="text" id="fb_app_id" name="fb_app_id" class="form-control" value='{{ isset($social_data->fb_app_id) ? $social_data->fb_app_id : "" }}'>
			</div>
			
		</div>
		
			<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Application Secret:</label>
				<input type="text" id="fb_app_secret" name="fb_app_secret" class="form-control" value='{{ isset($social_data->fb_app_secret) ? $social_data->fb_app_secret : "" }}'>
			</div>
			
		</div>
		
			<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Page ID :</label>
				<input type="text" id="fb_page_id" name="fb_page_id" class="form-control" value='{{ isset($social_data->fb_page_id) ? $social_data->fb_page_id : "" }}'>
			</div>
			
		</div>
		
        </div>
    </div>
</div>


<div class="row head-search" style="margin-bottom:20px;">
	    <div class="col-sm-12">
	        <lable class="label-title">Linkedin Settings</lable>
	    </div>	    
	</div>
	
	<div class="box">
    <div class="box-body set-box-body">
	

	<div class="row">
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Client Id:</label>
				<input type="text" id="lnk_client_id" name="lnk_client_id" class="form-control" value='{{ isset($social_data->lnk_client_id) ? $social_data->lnk_client_id : "" }}'>
			</div>
			
		</div>
		
			<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Client Secret:</label>
				<input type="text" id="lnk_client_secret" name="lnk_client_secret" class="form-control" value='{{ isset($social_data->lnk_client_secret) ? $social_data->lnk_client_secret : "" }}'>
			</div>
			
		</div>
		
	
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Redirect URL :</label>
				<input type="text" id="lnk_redirect_url" name="lnk_redirect_url" class="form-control" value='{{ isset($social_data->lnk_redirect_url) ? $social_data->lnk_redirect_url : "" }}' onblur="store_linked_detail()">
			
				
			</div>
			
		</div>
		
		<?php 
		
		 if(!empty($social_data->lnk_client_id) && !empty($social_data->lnk_redirect_url)) {
		     
		  $url =  "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=". $social_data->lnk_client_id ."&redirect_uri=". $social_data->lnk_redirect_url ."&scope=rw_company_admin"; 
		  
		 }else{
		     
		     $url='';
		 }
		  
		  ?>
		
		<input type="hidden" value="{{ $url }}" id="request_code_url" />
		
		<div class="col-md-7">
		  <div class="form-group">
		    	<button type="button" class="btn btn-sm btn-primary" id="get_access_token">Get Access Token</button>
		    	
		    
		    	
		  </div>
		</div>

		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Access Token Secret :</label>
				<input type="text" id="lnk_access_token" name="lnk_access_token" class="form-control" value='{{ !empty($social_data->lnk_access_token) ? $social_data->lnk_access_token : "" }}' readonly>
			</div>
			
		</div>
		
		
		<div class="col-md-7">			
			<div class="form-group">
				<label for="comment" style="margin-bottom:10px;">Company ID :</label>
				<input type="text" id="lnk_company_id" name="lnk_company_id" class="form-control" value='{{ !empty($social_data->lnk_company_id) ? $social_data->lnk_company_id : "" }}'>
			</div>
			
		</div>
		
		
	
	
        </div>
    </div>
</div>

-->

<!--<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="form-group">
            {!! Form::label('company_info', 'Company Info') !!} <a class='text-right text-red remove-company-info remove-img' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
            <div class="company-info"></div>
            <input type="file"  class="hidden" id="file_company_info" name="file_company_info">
            <input type="hidden" id="data_company_info" name="data_company_info" value="{{isset($settings->company_info_img) ? $settings->company_info_img : ""}}">    
            <div>Recommended Dimension (341px by 285px) </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="form-group">
            {!! Form::label('financials', 'Financials') !!} <a class='text-right text-red remove-company-financial' href='#' title="Remove"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
            <div class="financials"></div>
            <input type="file"  class="hidden" id="file_financials" name="file_financials">
            <input type="hidden" id="financials" name="financials" value="{{isset($settings->financial_img) ? $settings->financial_img : ""}}">
            <div>Recommended Dimension (341px by 285px) </div>
        </div>
    </div>
</div> -->

<input type="hidden" name="setting_id" value="{{  isset($settings->id) ? $settings->id : ""  }}">
		
	<!--<div class="row">
		<div class="col-md-2">
			<button type="submit" class="btn btn-flat btn-save">Save</button>
		</div>	
		<div class="col-md-2">
			<button type="submit" class="btn btn-flat btn-danger">Cancel</button>
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-flat btn-primary">Cancel</button>
		</div>
	</div> -->
	
	<div class="form-group" style="margin-top:30px;">
		<button type="submit" class="btn btn-flat btn-save">Save</button>                             
		<a href="#" class="btn btn-danger btn-overwrite-cancel">Cancel</a>
		<input class="btn btn-primary btn-overwrite-cancel" id="button" value="Preview" type="button">  
     </div>
	
	
		</div>
	</div>
	
	
</form>
</section>
@stop
@section('style')
{!! Html::style('css/finfo/summernote.css') !!}
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/color_picker/css/bootstrap-colorpicker.min.css') }}">
  <style type="text/css">
	
	.form-control {
     	border-radius: none !important; 
	}
	.input-group-addon{
     padding: 0;
	}
	.colorpicker-element .input-group-addon i, .colorpicker-element .add-on i {
	    width: 41px;
	    height: 32px;
	}
	.img-content{
		min-width: 200px;
	    max-width: 250px;
	    min-height: 115px;
	    background-color: #F0F0F0;
	    cursor: pointer;
	    background-image: url("/img/uploader_text.png");
	    background-size: 50%;
	    background-repeat: no-repeat;
	    border-radius: 15px;
	    position: relative;
	    background-position: center -10px;
	}
        .company-info,
        .financials,
	.company-logo,
	.slid-image,
	.favicon {
		width: 120px;	   
	    height: 120px;
	    background-color: #F0F0F0;
	    cursor: pointer;
	   /* background-image: url("/img/uploader_text.png");*/
	    background-size: 50%;
	    background-repeat: no-repeat;
	    border-radius: 0px;
	    position: relative;
	    background-position: center 6px;
		border: 1px dashed #c8c8c8;
	}
    .img-logo, .img-company-logo, .img-favicon,
    .img-file-financials
    {
       /* height: 115px;
        object-fit: cover;*/
		padding:10px;
    }
	.favicon i{
		color: #00367c;
		font-size: 21px;
		vertical-align: middle;
		display: table-cell;
		padding: 50px 50px;
	}

  </style>
@stop

@section('script')
  {!! Html::script('js/finfo/summernote.min.js') !!}
	<script src="{{ asset('plugins/color_picker/js/bootstrap-colorpicker.min.js') }}"></script>
	
	
	<script src="{{ asset('plugins/sortable/jquery-ui-1.10.4.custom.min.js')}}"></script>
	
	<script>
                $('.active').removeClass('active');
                $('#setting').addClass('active');
		$(function(){
		    $('.color').colorpicker();
		    
		    var bodyStyle = '';
		    $('.bgcolor').colorpicker().on('changeColor.colorpicker', function(event){		    	
		  		bodyStyle.backgroundColor = event.color.toHex();// equal to $('body').css("background-color", event.color.toHex());
		  		
			});

			var themeColor = '';
		    $('.theme_color').colorpicker().on('changeColor.colorpicker', function(event){		    	
		  		themeColor.backgroundColor = event.color.toHex();		  		
			});

			var fontStyle = '';
		    $('.font_color').colorpicker().on('changeColor.colorpicker', function(event){		    	
		  		fontStyle.color = event.color.toHex();		  		
			});
			
			var descriptionColor = '';
			  $('.description_color').colorpicker().on('changeColor.colorpicker', function(event){		    	
		  		descriptionColor.color = event.color.toHex();		  		
			});
			
			

			var containerColor = '';
		    $('.cnt_color').colorpicker().on('changeColor.colorpicker', function(event){		    	
		  		containerColor.backgroundColor = event.color.toHex();		  		
			});
			
			
		 $('#company_description').summernote({

           onImageUpload: function(files, editor, $editable) {
               sendFile(files[0],editor,$editable);
           },      
           height: 200
        });	
			
			
			
// REMOVE IMAGES
   $(function(){
        $('.remove-banner-img').click(function(){
            $('#img_banner').val('');
            $('.img-content img').remove();
        });
        $('.remove-company-financial').click(function(){
           $('#financials').val('');
           $('.financials img').remove();
        });
        $('.remove-company-favicon').click(function(){
           $('#favicon').val('');
           $('.favicon img').remove();
        });
        $('.remove-company-info ').click(function(){
           $('#data_company_info').val('');
           $('.company-info img').remove();
        });
        $('.remove-company-logo ').click(function(){
           $('#company_logo').val('');
           $('.company-logo img').remove();
        });
   });              
// IMAGE COMPANY INFORMATION
    $('.company-info').click(function(){
        $('#file_company_info').click();
    });
    $("#file_company_info").on('change', function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        // validate file extension
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            alert('Please select image file.');
            $('#file_financials').val('');
            return false;
        } else {
            var formData = new FormData($('#frmsetting')[0]);
            $.ajax({
                url: baseUrl + '/admin/setting/upload/company-logo',
                processData: false,
                contentType: false,
                type: "POST",
                data: formData,
                success: function(data) {
                    console.log(data);
                    $('#data_company_info').val(data);
                    $('.company-info').html('<img src="/'+data+'" class="img-file-financials" style="width:100%;border-radius: 15px;" >');
                }
            });
        }
    });
    var img = $('#data_company_info').val();
    if(img != ""){
        $('.company-info').html('<img src="/'+img+'" class="img-logo" style="width:100%;border-radius: 15px;height: 100%;" >');
    }
// IMAGE FINANCIAL INFORMATION
    $('.financials').click(function(){
        $('#file_financials').click();
    });   
    $("#file_financials").on('change', function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        // validate file extension
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            alert('Please select image file.');
            $('#file_financials').val('');
            return false;
        } else {
            var formData = new FormData($('#frmsetting')[0]);
            $.ajax({
                url: baseUrl + '/admin/setting/upload/company-logo',
                processData: false,
                contentType: false,
                type: "POST",
                data: formData,
                success: function(data) {
                    console.log(data);
                    $('#financials').val(data);
                    $('.financials').html('<img src="/'+data+'" class="img-file-financials" style="width:100%;border-radius: 15px;" >');
                }
            });
        }
    });
    var img = $('#financials').val();
    if(img != ""){
        $('.financials').html('<img src="/'+img+'" class="img-logo" style="width:100%;border-radius: 15px;" >');
    }
// IMAGE BANNER ============================================>
		    $('.img-content').click(function(){
		    	$('#file_logo').click();
		    });

			$("#file_logo").on('change', function() {
			    var file = this.files[0];
			    var imagefile = file.type;

			    var match = ["image/jpeg", "image/png", "image/jpg"];
			    // validate file extension
			    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
			        alert('Please select image file.');
			        $('#file_logo').val('');
			        return false;
			    } else {
			        var formData = new FormData($('#frmsetting')[0]);
			        $.ajax({
			            url: baseUrl + '/admin/company/upload/logo',
			            processData: false,
			            contentType: false,
			            type: "POST",
			            data: formData,
			            success: function(data) {
			                console.log(data);
			                $('#img_banner').val(data);
			                $('.img-content').html('<img src="/'+data+'" class="img-logo" style="width:100%;border-radius: 15px;" >');
			            },
			        });
			    }
			});

			var img = $('#img_banner').val();

		    if(img != ""){
		        $('.img-content').html('<img src="/'+img+'" class="img-logo" style="width:100%;border-radius: 15px;" >');
		    }
// COMPANY LOGO ==========================================>
		    $('.company-logo').click(function(){
		    	$('#file_company_logo').click();
		    });
		    $("#file_company_logo").on('change', function() {
		    	var file = this.files[0];
			    var imagefile = file.type;
			    var match = ["image/jpeg", "image/png", "image/jpg"];
			    // validate file extension
			    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
			        alert('Please select image file.');
			        $('#file_company_logo').val('');
			        return false;
			    } else {
			    	var formData = new FormData($('#frmsetting')[0]);
			    	$.ajax({
			            url: baseUrl + '/admin/setting/upload/logo',
			            processData: false,
			            contentType: false,
			            type: "POST",
			            data: formData,
			            success: function(data) {
			                console.log(data);
			                $('#company_logo').val(data);
			                $('.company-logo').html('<img src="/'+data+'" class="img-company-logo" style="width:100%;border-radius: 15px;" >');
			            },error: function(data){
						    alert("Fail" + imagefile+data);
						}
			        });
			    }
		    });
		    var logo = $('#company_logo').val();
		    if(logo != ""){
	            $('.company-logo').html('<img src="/'+logo+'" class="img-company-logo" style="width:100%;position: absolute; margin: auto;top: 0;left: 0;right: 0;bottom: 0;" >');
	        }
// FAVERITE ICON =========================================>
			$('.favicon').click(function(){
		    	$('#file_favicon').click();
		    });
		    $("#file_favicon").on('change', function() {
			    var file = this.files[0];
			    var imagefile = file.type;
			    //var match = ["image/jpeg", "image/png", "image/jpg", "image/x-icon"]; UNCOMMAN WHEN ALL JPG/PNG
			    var match = ["image/x-icon"];

			    // validate file extension
			    //if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]) || (imagefile == match[3]) )) { //UNCOMMAN WHEN ALL JPG/PNG
		    	if (imagefile != match[0]) {
			        alert('Please select ico extension file image .');
			        $('#file_favicon').val('');
			        return false;
			    } else {
			        var formData = new FormData($('#frmsetting')[0]);
			        $.ajax({
			            url: baseUrl + '/admin/setting/upload/favicon',
			            processData: false,
			            contentType: false,
			            type: "POST",
			            data: formData,
			            success: function(data) {
			                $('#favicon').val(data);
			                $('.favicon').html('<img src="/'+data+'" class="img-favicon" style="width:100%;position: absolute; margin: auto;top: 0;left: 0;right: 0;bottom: 0;" >');
			            },
			            error:function($data){
			                console.log(imagefile+ "error ");
			            }
			        });
			    }
			});
			var favicon = $('#favicon').val();
			if(favicon != ""){
	            $('.favicon').html('<img src="/'+favicon+'" class="img-favicon" style="width:100%;position: absolute; margin: auto;top: 0;left: 0;right: 0;bottom: 0;" >');
	        }
		});
		
		

 $('.slid-image').click(function(){
        $('#file_banner_imag').click();
});		


$("#file_banner_imag").on('change', function() {
			    
			    var file = this.files[0];
			    var imagefile = file.type;

			    var match = ["image/jpeg", "image/png", "image/jpg"];
			    // validate file extension
			    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
			        alert('Please select image file.');
			        $('#file_logo').val('');
			        return false;
			    } else {
			        var formData = new FormData($('#frmsetting')[0]);
			        
			       
			        $.ajax({
			            url: baseUrl + '/admin/setting/upload/banners',
			            processData: false,
			            contentType: false,
			            type: "POST",
			            data: formData,
			            success: function(data) {
			                
			                
			                
			               $('#sortable').html(data.split('^')[0]);
			                
			                var scount = data.split('^')[1];
			                
			                if(scount == 5){
			                    
			                    
			                    $('.slid-image').hide();
			                    
			                    
			                }else{
			                    
			                    
			                    $('.slid-image').show();
			                    
			                    
			                }
			            
			            
			            },
			        });
			    }
			});



$(function(){
    
            $.ajax({
			            url: baseUrl + '/admin/setting/load/banners',
			            type: "GET",
			            success: function(data) {
			            
			                    $('#sortable').html(data.split('^')[0]);
			                
    			                var scount = data.split('^')[1];
    			              
    			                if(scount == 5 ){
    			                    
    			                      $('.slid-image').hide();
    			                    
    			                    
    			                }else{
    			                    
    			                    $('.slid-image').show();
    			                    
    			                }
			            
			      
			            },
			        });
    
    
});


$('#sortable').sortable({
    
      
        //handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
			var token = $('#token').val();
			
		
		     $.ajax({
                 url: baseUrl + '/admin/setting/order/banners',
                type: 'POST',
                data: {"list_order":list_sortable,"_token":"{{csrf_token()}}"},
                success: function(data) {
        
                }
            });
        }
    });
    

$("#sortable").disableSelection();
		
		
		
function remove_slides(slide_id){
    
    var banner_id = slide_id;
    
    var token = $('#token').val();
			
	
     $.ajax({
		
		    url: baseUrl + '/admin/setting/banner/delete',
            type: 'POST',
            data: {"banner_id":banner_id,"_token":"{{csrf_token()}}"},
            success: function(data) {
			            
			    $('#sortable').html(data.split('^')[0]);
			          
    		    var scount = data.split('^')[1];
    			              
    		    if(scount == 5 ){
    			                    
    		           $('.slid-image').hide();
    			                    
    			                    
    			}else{
    			                    
    			       $('.slid-image').show();
    			                 
    			}
			            
      
            },
    });

    
}


function store_linked_detail(){
    
   var client_id = $('#lnk_client_id').val();
   var client_secret = $('#lnk_client_secret').val();
   var redirect_url = $('#lnk_redirect_url').val();
   
   var current_url = window.location.href; 
   
   var form_data = $('#frmsetting').serialize();
   
  /* if(client_id == '' || client_secret == ''){
       
       alert("Please Enter Client Id and Client Secret");
       return false;
       
   }
   
   if(redirect_url == current_url){*/
       
       
        $.ajax({
		
		    url: baseUrl + '/admin/setting/linked/details',
            type: 'POST',
            data: {"client_id":client_id,"client_secret":client_secret,"redirect_url":redirect_url,"form_data":form_data,"_token":"{{csrf_token()}}"},
            success: function(res) {
			    
			       
			            var url = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=" + client_id +"&redirect_uri="+ redirect_url +"&scope=rw_company_admin";
			            
			            $("#request_code_url").val(url);
			            
			         
			      
			  
            },
    });
       
       
       
       
       
  /* }else{
       
       alert("Please Check your redirect URL in your Linkedin Application.");
       
        //$('#lnk_client_id').val('');
        //$('#lnk_client_secret').val('');
        $('#lnk_redirect_url').val('');
       return false;
       
   }*/
    
    
    
    
}


$('#get_access_token').click(function(){
   
   var request_url  = $('#request_code_url').val();
   
   window.location = request_url;
   
 
    
});

 var code = getParameterByName('code');
 
 if(code !== null){
     
    // $('#loader_img').html("<img src='../../img/social/setloader.gif' width='100' height='100' align='center' style='display:block' />");
     
     var client_id = $('#lnk_client_id').val();
     var client_secret = $('#lnk_client_secret').val();
     var redirect_url = $('#lnk_redirect_url').val();
     
 
       $.ajax({
		
		    url: baseUrl + '/admin/setting/linked/token',
            type: 'POST',
            data: {"code":code,"client_id":client_id,"client_secret":client_secret,"redirect_url":redirect_url,"_token":"{{csrf_token()}}"},
            
            success: function(res) {
                
              
			       var load_page = window.location.href;
			        var load_page = load_page.split('?')[0];
			        
			        window.location.assign(load_page); 
			 // $('#loader_img').hide();
            },
    });
     
 }
 

 function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


	</script>
@stop