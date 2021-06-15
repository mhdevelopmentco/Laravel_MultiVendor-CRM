<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Blog Settings</title>
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
	  <link rel="stylesheet" href="assets/css/plan.css" />
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
                            	<li class=""><a href="#">Home</a></li>
                                <li class="active"><a href="#">Blog Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Blog Settings</h5>
            
        </header>
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'edit_blog_settings','class'=>'form-horizontal')) !!}
				@foreach($blog_settings as $blog_set)
                <div class="form-group">
                    <label class="control-label col-lg-3">Allow Comments Posting In Blog<span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
                       <select class="form-control" name="allow_comments">
           <option value="1" <?php if($blog_set->bs_allowcommt == 1){?> selected <?php } ?>>Yes</option>
            <option value="0" <?php if($blog_set->bs_allowcommt == 0){?> selected <?php } ?>>No</option>
           
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">Require Admin Approval For Every Comment<span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
                     <select class="form-control" name="admin_approval">
           <option value="1" <?php if($blog_set->bs_radminapproval == 1){?> selected <?php } ?>>Yes</option>
            <option value="0" <?php if($blog_set->bs_radminapproval == 0){?> selected <?php } ?>>No</option>
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-3">Posts Per Page<span  class="text-sub">*</span></label>

                    <div class="col-lg-6">
                     <input type="text" id="post_per_page" name="post_per_page"  value="{!! $blog_set->bs_postsppage!!}" class="form-control">
                    </div>
                </div>
              
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button>
                   
                    </div>
					  
                </div>

                @endforeach
         </form>
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
