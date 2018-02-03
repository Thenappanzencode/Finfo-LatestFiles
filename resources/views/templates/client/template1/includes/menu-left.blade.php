
<style>
    
    #social{
      
        background-color:#fff59d;
     
    }
    
    #social a:hover
    {
        background-color: #fff284 !important;
        color:#000;
    }
    
    
    
    
</style>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

            <div class="user-panel">
              <div class="row">
                <div class="col-md-12">
                  <div class="image">
                  @if($company_logo != '')
                    <img src="/{{$company_logo}}" class="img-responsive" alt="logo" style="max-height: 100px;" />
                  @else
                    <h4 style="color: #fff">Company Logo</h4>
                  @endif
                  </div>
                 </div>
              </div>
            </div>

            <ul class="sidebar-menu">
              <li class="active treeview">
                <a href="{{route('client.admin.dashboard')}}" id="dash-border-left">
                    <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                </a>
              </li>


               <li class="treeview user" id='menu-account-info'>
                <a href="#" id="dash-border-leftt">
                 <i class="glyphicon glyphicon-edit"></i>
                  <span>Account Information</span>
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
                  <ul class="treeview-menu">
                     <!--  <li class="treeview" id="package-info1">
                          <a href="{{route('client.admin.package')}}" id="package-border-left">Package info</a>
                      </li> -->
                      <li class="treeview" id="m-company">
                          <a href="{{route('client.admin.company')}}" id="com-border-left">
                              <span>Company Profile</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="treeview" id="my-invoice">
                <a href="#" id="billing-border-left" >
                   <i class="fa fa-fw fa-credit-card"></i>
                  <span>Billing</span>
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li id="m-upcoming"><a href="{{route('client.invoices.backend', 0)}}">Upcoming Invoices</a></li>
                  <li id="m-invoice-past"><a href="{{route('client.invoices.backend', 1)}}">Past Invoices</a></li>
                </ul>
              </li>
               <li class="header">Package Info({{Session::get('package_name')}})</li> 
           
              @if (Session::get('package_id') != 1)
                    <li class="treeview company_info">
                      <a href="{{route('client.webpage.backend.list')}}" id="theme-border-left">
                          <i class="fa fa-fw fa-info-circle"></i>
                        <span>Company Info</span>
                      </a>
                    </li>
                                    
                @endif

           
              

              @if(count($modules) > 0)

                @foreach($modules as $module)
                
                
               <?php if($module->name == "Financials"){
                
                  $demo = "fa fa-bar-chart";
                
               }elseif($module->name == "Events") {
                   
                    $demo = "fa fa-calendar-o";
               }elseif($module->name == "Stock Info") {
                   
                    $demo = "fa fa-line-chart";
               }elseif($module->name == "Annual Reports") {
                   
                     $demo = "fa fa-pie-chart";
               }elseif($module->name == "Press Releases") {
                   
                     $demo = "fa fa-newspaper-o";
               }elseif($module->name == "Announcements") {
                   
                     $demo = "fa fa-bullhorn";
               }elseif($module->name == "URL Manager - Webcast") {
                   
                     $demo = "fa fa-wifi";
               }elseif($module->name == "Newsletter") {
                   
                     $demo = "fa fa-envelope";
               }elseif($module->name == "Presentations") {
                    
                     $demo = "fa fa-file-image-o";
               }else{
                   
                    $demo = "";
               }      
               
               ?>
 
          
              @if (in_array($module->id,$menu_pers))
                  @if($module->name != 'Financial Results')
                  <li class="treeview {{$module->css_class}}">
                    <a href="#" id="border-left-{{$module->id}}">
                        <i class="{{$demo}}"></i>
                      <span title="{{$module->name}}">
                        
                        {{substr($module->name, 0,25)}} 
                        @if(strlen($module->name) > 25)
                            ..
                        @endif
                      </span>
                      <i class="fa fa-angle-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      @if ($module->name == 'Media Access') 
                          <li class="media-form"><a href="{{ $module->route_name != "" ? route($module->route_name.'.form') : '' }}">Add Media</a></li>
                          <li class="media-list"><a href="{{ $module->route_name != "" ? route($module->route_name) : '' }}">List Media</a></li>
                          <li class="media-list-user"><a href="{{ $module->route_name != "" ? route($module->route_name.'.list-user') : '' }}">List User</a></li>
                          <li class="media-category"><a href="{{ $module->route_name != "" ? route($module->route_name.'.list-category') : '' }}">Category</a></li>
                          <li class="media-setting"><a href="{{ $module->route_name != "" ? route($module->route_name.'.settings') : '' }}">Settings</a></li>
                      @else
                          <li class="{{$module->css_class}}_list"><a href="{{ $module->route_name != "" ? route($module->route_name) : '' }}" >List</a></li>
                          @if($module->route_name != 'package.admin.stock')
                          <li class="{{$module->css_class}}_form"><a href="{{ $module->route_name != "" ? route($module->route_name.".form") : '' }}" >{{($module->route_name == 'package.admin.stock')? "Edit": "Add New"}}</a></li>
                          @endif
                      @endif
                      @if ($module->name == 'Latest Financial Highlight') 
                          <li class="{{$module->css_class}}_list_archive"><a href="{{ $module->route_name != "" ? route($module->route_name.".archive") : '' }}">Financial Results (Archived)</a></li>
                      @endif

                      @if ($module->route_name == 'package.admin.newsletter-broadcast') 
                          <li class="{{$module->css_class}}_email_seed_list"><a href="{{ $module->route_name != "" ? route('package.admin.newsletter-broadcast.email-seed-list.form') : '' }}">Settings</a></li>
                      @endif
                     
                    </ul>
                  </li>
                  @endif
                  @endif
                @endforeach
              @endif
              
                 <li class="treeview" id="social">
                        <a href="{{route('client.admin.social.view1')}}" id="setting-border-left" style="color:#000">
                   <i class="fa fa-sliders"></i>    
                   <span>Grapevine</span>
                </a>
              </li>
                <!-- @if (Session::get('package_id') != 1)
                    <li class="treeview company_info">
                      <a href="{{route('client.webpage.backend.list')}}" id="theme-border-left">
                        <span>Company Info</span>
                      </a>
                    </li>
                @endif -->
              <li class="header" id="configuration">Configuration</li>
              @if(Auth::check() && Auth::user()->user_type_id == 5)
              <li class="treeview user" >
                <a href="#" id="user-border-left">
                 <i class="fa fa-user"></i>
                   <span>User Manager</span>
                  
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="user_list"><a href="{{route('client.user.backend.list')}}">List</a></li>
                  <li class="user_form"><a href="{{route('client.user.backend.create')}}"> Add New</a></li>
                </ul>
              </li>
              @endif
              <li class="treeview" id="setting">
                <a href="{{route('client.admin.setting')}}" id="setting-border-left">
                   <i class="fa fa-sliders"></i>    
                   <span>Customize</span>
                </a>
              </li>
              
               <li class="treeview company_info">
                    <a href="{{route('client.webpage.backend.pages')}}" id="theme-border-left">
                        <i class="fa fa-bars"></i> 
                        <span>Menu</span>
                    </a>
              </li>
              
              <!--
                 <li class="treeview" id="social">
                        <a href="{{route('client.admin.social')}}" id="setting-border-left">
                   <i class="fa fa-sliders"></i>    
                   <span>Social Media</span>
                </a>
              </li>-->
              
          
               
              <li class="treeview company_info">
                   
              </li> 
                  
            </ul>
            <div class="power">
            <span>Powered by  </span> <img src="/img/finfo-logo-no-tag-retina-w.png" class="power-img">
            </div>
          

        </section>
        
        <!-- /.sidebar -->
      </aside>