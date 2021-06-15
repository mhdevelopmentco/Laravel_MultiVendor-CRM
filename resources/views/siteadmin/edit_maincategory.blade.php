<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Add Category</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a>Add Main Category</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Category</h5>
            
        </header>
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_main_category_submit','class'=>'form-horizontal')) !!}
				@foreach($edit_main_catg_details as $add_main_catg_det)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Top Category Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="catg_name" placeholder="" name="catg_name" class="form-control" value="{!!$add_main_catg_det->mc_name!!}" type="text">                 <input type="hidden" id="catg_id" name="catg_id" value="{!!$add_main_catg_det->smc_mc_id!!}" />
                        <input type="hidden" id="main_catg_id" name="main_catg_id" value="{!!$add_main_catg_det->smc_id!!}" />
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Main Category Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="main_catg_name" placeholder="" name="main_catg_name" class="form-control" value="{!!$add_main_catg_det->smc_name!!}" type="text">
                    </div>
                </div>
               <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> Category Status
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="radio" value="1" title="Active" checked="checked" name="catg_status"> <label class="sample">Active                  </label>
					<input type="radio" value="0" title="Active"  name="catg_status"> <label class="sample">Deactive                  </label></label>
						<label class="sample"></label></label>
                    </div>
                </div>
				   
				
                

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <a href="<?php echo url('manage_main_category/');?>/{!!$add_main_catg_det->smc_mc_id!!}" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
                    </div>
					  
                </div>
@endforeach
                
         {!! form::close()!!}
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
    <script src="<?php echo url('');?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('');?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('');?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
