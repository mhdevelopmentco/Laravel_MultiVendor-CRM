<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | General Settings</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        
       {!! $adminheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $adminleftmenus !!}
       
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >General Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>General Settings</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'general_setting_submit','class'=>'form-horizontal')) !!}
				@foreach($general_settings as $gen_set)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Site Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="site_name" name="site_name" placeholder="" class="form-control" value="{!!$gen_set->gs_sitename!!}" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Meta title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="meta_title" name="meta_title" placeholder="" class="form-control" value="{!!$gen_set->gs_metatitle!!}" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" name="meta_key"  id="meta_key">{!!$gen_set->gs_metakeywords!!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <textarea class="form-control" name="meta_desc"  id="meta_desc">{!!$gen_set->gs_metadesc!!}</textarea>
                    </div>
                </div>
                        <div class="form-group">
                    <label class="control-label col-lg-2">Enable / Disable COD</label>

                    <div class="col-lg-8">
                          <input type="checkbox" value="COD" name="payment_status" <?php if($gen_set->gs_payment_status == 'COD'){ ?> checked <?php } ?>> <label class="sample">COD</label>
                   </div>
                    
                </div>
                   <!--div class="form-group">
                    <label class="control-label col-lg-2">Themes</label>

                    <div class="col-lg-8">
                          <select class="validate[required] form-control"  name="themes">
                          <option value="blue" <?php //if($gen_set->gs_themes == 'blue'){ ?> selected <?php //} ?>>Blue</option>
                          <option value="green" <?php //if($gen_set->gs_themes == 'green'){ ?> selected <?php //} ?>>Green</option>
                        
                        </select>
                   </div>
                    
                </div-->

               <?php /*?> <div class="form-group">
                    <label for="text2"  class="control-label col-lg-2">Default Theme<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="theme_select">
                       @foreach($theme_list as $theme)
              			<option value="{!!$theme->the_id!!}" <?php if($gen_set->gs_defaulttheme ==$theme->the_id){?> selected <?php } ?>>{!!$theme->the_Name!!}</option>
		            @endforeach
              		</select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-2">Default Language<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="lang_select">
         	  @foreach($language_list as $lng)
              			<option value="{!!$lng->la_id!!}" <?php if($gen_set->gs_defaultlanguage ==$lng->la_id){?> selected <?php } ?>>{!!$lng->la_name!!}</option>
		            @endforeach
       		 </select>
                    </div>
                </div><?php */?>

              

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button>
                   
                    </div>
					  
                </div>
			@endforeach
                
         {!!Form::close()!!}
        </div>
    </div>
</div>
   
    </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
