<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Admin Settings</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/theme.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
       
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >Admin Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Admin Settings</h5>
          
        </header>
         @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'admin_settings_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
			  <?php foreach($admin_setting_details as $admin_get) { }?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">First Name<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="first_name" class="form-control" value="<?php echo $admin_get->adm_fname; ?>" type="text">
                    </div>
                </div>

                 <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Last Name<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="last_name" class="form-control" value="<?php echo $admin_get->adm_lname; ?>" type="text">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Old Password<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="password" placeholder="" name="old_password" class="form-control" value="<?php echo $admin_get->adm_password; ?>" type="password">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">New Password<span class="text-sub"></span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="new_password" class="form-control" value="" type="password">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Email<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="email" class="form-control" value="<?php echo $admin_get->adm_email; ?>" type="text">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Phone<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="phone" class="form-control" value="<?php echo $admin_get->adm_phone; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Address one<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="address_one" class="form-control" value="<?php echo $admin_get->adm_address1; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Address two<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                        <input id="text1" placeholder="" name="address_two" class="form-control" value="<?php echo $admin_get->adm_address2 ?>" type="text">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Country<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
                      <select class="form-control" name="country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
          				 <option value="<?php echo $country_fetch->co_id; ?>"  <?php if($country_fetch->co_id == $admin_get->adm_co_id){ echo 'selected'; } ?> ><?php echo $country_fetch->co_name; ?></option>
           				   <?php } ?>
       					 </select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">City<span class="text-sub">*</span></label>

                    <div class="col-lg-7">
           <select class="form-control" name="city" id="select_mer_city" >
           				<option value="">--Select--</option>
                  </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-7">
                     <button class="btn btn-warning btn-sm btn-grad" type="submit" ><a style="color:#fff" >Update</a></button>
                     <a href="<?php echo url('siteadmin_dashboard'); ?>" style="color:#000" class="btn btn-default btn-sm btn-grad" >Back</a>
                   
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
     {!! $adminfooter !!}
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url(); ?>/assets/plugins/jquery-2.0.3.min.js"></script>
    <script>
	$( document ).ready(function() {
			 var passData = 'city_id_ajax=<?php echo $admin_get->adm_ci_id; ?>';
		 //alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('ajax_select_city_edit'); ?>',
				  success: function(responseText){  
				 // alert(responseText);
				   if(responseText)
				   { 
					$('#select_mer_city').html(responseText);					   
				   }
				}		
			});
	});
	function select_mer_city_ajax(city_id)
	{
		 var passData = 'city_id='+city_id;
		// alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('ajax_select_city'); ?>',
				  success: function(responseText){  
				 // alert(responseText);
				   if(responseText)
				   { 
					$('#select_mer_city').html(responseText);					   
				   }
				}		
			});	
	}
	</script>
     <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
