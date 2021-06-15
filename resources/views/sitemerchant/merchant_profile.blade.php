<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin | Merchant profile</title>
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
         {!! $merchantheader !!}
        <!-- END HEADER SECTION -->
      

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
                                <li class="active"><a href="#">Merchant profile</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Merchant profile</h5>
            
        </header>
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <?php foreach($merchant_setting_details as $merchant) { } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    Merchant profile
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">First Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $merchant->mer_fname; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Last Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $merchant->mer_lname; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Password<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $merchant->mer_password; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Email-id<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $merchant->mer_email; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Phone Number <span class="text-sub">*</span></label>
                    <div class="col-lg-4"> 
              <?php echo $merchant->mer_phone; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address One<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
             <?php echo $merchant->mer_address1; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address Two<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
          			<?php echo $merchant->mer_address2; ?>
                    </div>
                </div>
                        </div>
                         <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $merchant->ci_name; ?>
                    </div>
                </div>
                        </div>
						
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Country<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $merchant->co_name; ?>
                    </div>
                </div>
                        </div>
                       
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                     <a style="color:#fff" class="btn btn-warning btn-sm btn-grad" href="<?php echo url('sitemerchant_dashboard'); ?>">Back</a>
                    </div>
					  
                </div>
                
                </form>
                </div>
        
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
  {!! $merchantfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
