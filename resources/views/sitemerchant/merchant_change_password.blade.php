<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Change Password</title>
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
	  <link rel="stylesheet" href="<?php echo url('')?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
<link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
        <!-- MENU SECTION -->
       {!! $merchantleftmenus !!}
		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
                                <li class="active"><a href="#">Change Password</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Change Password</h5>
            
        </header>
	  @if (Session::has('pwd_error'))
		<p style="background-color:green;color:#fff;">{!! Session::get('pwd_error') !!}</p>
		@endif
 @if (Session::has('success'))
		<p style="background-color:green;color:#fff;">{!! Session::get('success') !!}</p>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
  {!! Form::open(array('url'=>'change_password_submit','class'=>'form-horizontal')) !!}   
	<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>        


		<input type="hidden" value="<?php echo $mer_id; ?>" name="merchant_id" id="merchant_id">
 
                <div class="form-group">
                    <label class="control-label col-lg-2">Old Password<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="password" class="form-control" placeholder="" name="oldpwd" id="oldpwd">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"> New Password<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="password" class="form-control" placeholder="" name="pwd" id="pwd">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Confirm Password<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="password" class="form-control" placeholder="" name="confirmpwd" id="confirmpwd">
                    </div>
                </div>
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button id="updatepwd"   class="btn btn-warning btn-sm btn-grad" style="color:#fff"> Update</button>
                     <button  type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000"> Cancel</button>
                   
                    </div>
					  
                </div>

                
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
    <div id="footer">
        <p>&copy; Dip Multivendor&nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>

<script type="text/javascript">
	$( document ).ready(function() {
	var pwd= $('#pwd');
	var confirmpwd= $('#confirmpwd');
var oldpwd=$('#oldpwd');
		
        $('#updatepwd').click(function() {

		if(oldpwd.val()=="")
		{
			oldpwd.css('border', '1px solid red');
			$('#error_msg').html('please provide old password ');
			oldpwd.focus();
			return false;
		}
		 
		else if(pwd.val()=="")
		{
			pwd.css('border', '1px solid red');
			oldpwd.css('border', ''); 
			 confirmpwd.css('border', ''); 
			$('#error_msg').html('please provide new  password');
			pwd.focus();
			return false;
		}
	 

		else if(confirmpwd.val()=="")
		{
			confirmpwd.css('border', '1px solid red');
			oldpwd.css('border', ''); 
			 pwd.css('border', ''); 
			$('#error_msg').html('please provide confirm password');
			confirmpwd.focus();
			return false;
		}
		 
		 
		

});
});
</script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
