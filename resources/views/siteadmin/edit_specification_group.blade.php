<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary| Add specification</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >Add specification</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add specification group</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
         @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('message'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('message') !!}</div>
		@endif
        @foreach ($specificationresult as $info) 
             {!! Form::open(array('url'=>'edit_specification_group_submit','class'=>'form-horizontal')) !!}

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Specification group name<span class="text-sub">*</span></label>

                    <div class="col-lg-5">
                        <input type="hidden" name="spg_id" value="{!! $info->spg_id !!}">
                        <input id="text1" name="group_name" placeholder="Specification group name"  value="{!! $info->spg_name !!}" class="form-control" type="text">
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Sort order<span class="text-sub">*</span></label>

                    <div class="col-lg-1">
                        <input id="text1" placeholder="Sort order" name="sort_order"  value="{!! $info->spg_order !!}" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>
                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Update</a></button>
                     <a href="<?php echo url('manage_specification_group'); ?>"  class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                    </div>
					  
                </div>

                
         </form>
         @endforeach
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
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
