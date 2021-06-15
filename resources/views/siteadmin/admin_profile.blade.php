<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Admin profile</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
	  <link rel="stylesheet" href="assets/css/plan.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
      

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a>Admin profile</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Admin profile</h5>
            
        </header>
        
        
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <?php foreach($admin_setting_details as $admin) { } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        admine profile
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">First Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $admin->adm_fname; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Last Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $admin->adm_lname; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Password<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $admin->adm_password; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Email-id<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo $admin->adm_email; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Phone Number <span class="text-sub">*</span></label>
                    <div class="col-lg-4"> 
              <?php echo $admin->adm_phone; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address One<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
             <?php echo $admin->adm_address1; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address Two<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
          			<?php echo $admin->adm_address2; ?>
                    </div>
                </div>
                        </div>
                         <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Country<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $admin->co_name; ?>
                    </div>
                </div>
                        </div>
						
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                  <?php echo $admin->ci_name; ?>
                    </div>
                </div>
                        </div>
                       
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                     <a style="color:#fff" class="btn btn-warning btn-sm btn-grad" href="<?php echo url('siteadmin_dashboard'); ?>">Back</a>
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
  {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    <!---Right Click Block Code---->
<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>
</body>
     <!-- END BODY -->
</html>
