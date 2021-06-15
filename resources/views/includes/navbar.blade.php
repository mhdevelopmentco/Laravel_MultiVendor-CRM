<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    
    <?php 
    if($metadetails){
       foreach($metadetails as $metainfo) {
           $metaname=$metainfo->gs_metatitle;
           $metakeywords=$metainfo->gs_metakeywords;
           $metadesc=$metainfo->gs_metadesc;
        }
    }
    else
    {
         $metaname="Living Lectionary";
         $metakeywords="Living Lectionary";
         $metadesc="Living Lectionary";
    }
    ?>

     <!--title><?php echo $metaname  ;?></title-->
     <meta charset="utf-8">
     <title>Living Lectionary</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?php echo $metadesc  ;?>">
     <meta name="keywords" content="<?php echo  $metakeywords ;?>">
     <meta name="author" content="<?php echo  $metaname ;?>">
     <meta name="_token" content="{!! csrf_token() !!}"/>
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php //foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <link href="<?php //echo url(); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php //} elseif($gs->gs_themes == 'green') { ?>
    <link href="<?php echo url(); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
    <?php //} ?>
<link href="<?php echo url(); ?>/themes/css/jquery.colorpanel.css" rel="stylesheet" media="screen"/>
<!-- validation (Register Page)(newsletter)-->
   <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="<?php echo url(); ?>/themes/css/simpleform.css">
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Bootstrap style responsive-->  
    <link href="<?php echo url(); ?>/themes/css/planing.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo url(); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- Google-code-prettify (Register Page)-->    
    <link href="<?php echo url(); ?>/themes/css/jquery-gmaps-latlon-picker.css" rel="stylesheet"/>  
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo url(); ?>/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
    
     <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
     <link rel="stylesheet" href="<?php echo url(); ?>/themes/css/normalize.css" />
     <link rel="stylesheet" href="<?php echo url(); ?>/themes/css/styles.min.css" />
     <link href="<?php echo url(); ?>/themes/css/jplist.min.css" rel="stylesheet" type="text/css" />    
     <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>

  <!-- CSS for this demo, don't use in your project -->
  <link rel="stylesheet" href="{{URL::to('/')}}/finaltilesgallery/css/main.css">
  <!-- FontAwesome CSS for cool icons -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">        
  
  <!-- Final Tiles Grid Gallery CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/finaltilesgallery/css/finaltilesgallery.css">

  <!-- Include jQuery only if it is not already present in your code -->
  <script src="{{URL::to('/')}}/finaltilesgallery/js/jquery-1.11.1.min.js"></script>
  
  <!-- Final Tiles Grid Gallery script --> 
        <script src="{{URL::to('/')}}/finaltilesgallery/js/jquery.finaltilesgallery.js"></script>
        
        <script>
         $(function () {
          
          //we call Final Tiles Grid Gallery without parameters,
          //see reference for customisations: http://final-tiles-gallery.com/index.html#get-started
          $(".final-tiles-gallery").finalTilesGallery();
         });         
     </script>
    <link href="elements.css" rel="stylesheet" type="text/css">
    
     <style type="text/css" id="enject"></style>
    
    
        <script src="<?php echo url(); ?>/themes/js/jquery-1.10.0.min.js"></script>
        <script src="<?php echo url(); ?>/themes/js/modernizr.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/themes/css/compare-products/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/themes/css/compare-products/component.css" />
        <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
        <style type="text/css" id="enject"></style>
        <link href="<?php echo url(''); ?>/themes/css/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
 
        <script src="<?php echo url(); ?>/themes/js/jquery-1.10.0.min.js"></script>
        <style type="text/css">
        .out-of-stock {
            background: #ad0d0d;
            color: white;
            font-family: lato !important;
            border: none;
            padding-top: 11px;
            border-radius: 3px;
            padding-bottom: 11px;
            /* padding-left: 21px; */
            font-size: 16px;
            padding-left: 11px;
            padding-right: 13px;
            float: right;
            margin-top: -42px;
        }   
        .gllpMap  { height: 228px; }

      input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
        }
        </style>
  </head>

<div id="header">
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<div id="welcomeLine" >
<div class="container">
	<div class="header-right" >
    	<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;"><a style="font-size:14px; color:#fff; float:left;font-family: lato !important;" href="#login" role="button" data-toggle="modal">Login</a> &nbsp;&nbsp;|&nbsp;&nbsp;</label>
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login</h3>
		  </div>
		  <div class="modal-body">
<div id="logerror_msg"  style="color:#F00;font-weight:300"> </div>
			<div style="float:left">
            	 
  			
			  <div class="control-group">								
				<input type="text" id="loginemail" placeholder="Enter Your Login Email" autofocus >
			  </div>
			  <div class="control-group">
				<input type="password" id="loginpassword" placeholder="Enter Your Password">
			  </div>
			  <div class="control-group">
				<a href="#login2" role="button" id="forgot_a_click" onclick="$('.close').click();" data-toggle="modal" style="padding-right:0">Forgot Password</a>
				<a href="#login45" role="button"   data-toggle="modal" style="padding-right:0"><button class="btn btn-mini" style="display:none;" id="reset_pass_click" value="Login"></button></a>
				
			  </div>
			 <input type="hidden" id="return_url" value="<?php echo url();?>" />
            
            <input type="button" id="login_submit" class="btn btn-warning " value="Sign in" />
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>	
            
            <div class="clearfix" style="margin-top:8px; text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px">Sign in with your facebook account: Connect your facebook account to sign in to laravelecommerce Multivendor.</span><br>
            	<a  onclick="fb_login()" class="facebook_login" style="margin-top:5px; margin-bottom:5px" >&nbsp;</a><br><br><!--<i class="icon-facebook"></i>Log in with Facebook</a>-->
                Don't have an account yet? <a href="/registers">Sign up</a>
            </div>
		  </div>
	</div>
   <!--  <a  onclick="fb_login()"><span class="btn btn-mini btn-primary"><i class=" icon-facebook icon-white"></i> Facebook Login </span> </a>  -->
    
    <!--newly added-->

 <div id="login2" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login2" aria-hidden="false" style="height:220px;display:none;" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Forgot Password</h3>
		  </div>
		<div id="uimsg" style="color:#F00;font-weight:400" ></div>
		  <div class="modal-body">
			<div style="float:left">
		 

                <label>E-mail&nbsp;*</label>
                <div clas="clearfix"></div>
                
			  <div class="control-group" style="padding-left:0px;">								
				<input type="text" id="passwordemail" placeholder="Enter Your Email" >
			  </div>
			  <div class="control-group">
				
			  </div>
              <input type="hidden" id="return_url" value="<?php echo url();?>" />
 <input type="button" style="color:#fff"  id="reset_password" value="Submit" class="btn btn-success"\>  
  <input type="reset"  style="color:#000"  id="cancel_password" value="cancel" class="btn btn-default btn-sm btn-grad" \>              

			 
  
            
            </div>	
            
            <div class="clearfix" style="margin-top:8px; text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px">
           Sign in with your Facebook account: Connect your Facebook account to sign in to laravelecommerce Multivendor.</span><br>
            	<a href="#" class="btn btn-primary btn-large" style="margin-top:5px; margin-bottom:5px" ><i class="icon-facebook"></i>Sign up with Facebook</a><br>
                Already a member? <a href="#"  >Sign in</a>
            </div>
		  </div>
	</div>
    
    <div id="login45" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login45" aria-hidden="false" style="height:280px;display:none;" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Reset Password</h3>
		  </div>
		<div id="passmsg" style="color:#F00;font-weight:400" ></div>
		  <div class="modal-body">
			<div style="">
		 

                <label style="text-align:left;">New Password&nbsp;*</label>
                
                
			  <div class="control-group" style="padding-left:0px;">								
				<input type="password" id="passwordnew" placeholder="Enter Your New Password" >
			  </div>
              
              <label style="text-align:left;">Confirm Password&nbsp;*</label>
                
              <div class="control-group" style="padding-left:0px;">								
				<input type="password" id="passwordconfirmnew" placeholder="Confirm Your New Password" >
                <input type="hidden" id="passsworduserid" value="<?php echo Session::get('reset_userid');?>"/>
			  </div>
			  <div class="control-group">
				
			  </div>
              <input type="hidden" id="return_url" value="<?php echo url();?>>" />
 <input type="button" style="color:#fff"  id="reset_new_password" value="Submit" class="btn btn-success"\>  
  <input type="reset"  style="color:#000"  id="cancel_password" value="cancel" class="btn btn-default btn-sm btn-grad" \>              

            </div>	
<div class="clearfix" style="margin-top:8px; text-align:center"> 
            
            <br>
            	
            </div>            
            
		  </div>
	</div>
    <!--ended here-->

    <!--<a href="<?php //echo url('registers'); ?>" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-mini btn-warning" target="_self"> Register </span> </a>-->
    <a href="<?php echo url('registers'); ?>" style="font-size:14px; color:#fff;float:left;font-family: lato !important;">Register</a>
    <div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Register</h3>
		  </div>
		<div id="error_msg"  style="color:#F00;font-weight:400"  > </div>
		  <div class="modal-body">
			<div class="" style="float:left">
   
	 {!! Form::open(array('url'=>'register_submit','class'=>'form-horizontal loginFrm')) !!}

			  <div class="control-group">
              	<label>Name<span  style="color:#F00">*</span></label>								
				<input type="text" name="customername" id="inputregisterName" placeholder="Enter your name here">
			  </div>
			   <div class="control-group">
              	<label>Email<span  style="color:#F00">*</span></label>								
				<input type="text" name="email"  id="inputregisterEmail" placeholder="Enter your Email here" onchange="check_email_ajax(this.value);">
			  </div>
			  <div class="control-group">
			  <label>Password<span  style="color:#F00">*</span></label>	
				<input type="password" name="pwd"  id="inputregisterPassword" placeholder="Password">
			  </div>
			 
				 <div class="control-group">
              	<label>Select Country<span  style="color:#F00">*</span></label>								
	<select class="form-control" name="selectcountry" id="selectcountry" onChange="get_city_list(this.value);">
           <option value="0">--select country--</option>
			@foreach ($country_details as $country)
           		 <option  value="<?php echo $country->co_id;?>">{!!$country->co_name!!}</option>
          		 @endforeach 
           
        </select>
			  </div>
  <div class="control-group">
              	<label>Select City<span  style="color:#F00">*</span></label>								
				<select class="form-control" name="selectcity" id="selectcity"  >
           <option value="0">--select city--</option>
			 
			
        </select>
			  </div>
              <input type="hidden" id="return_url" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
			  <p>By clicking Sign Up you agree to <br>Laravelecommerce Multivendor									
                                <a href="<?php echo url('termsandconditons'); ?>" title="Terms and conditions" class="forget_link" style="color:#ff8400;" target="_blank" >Terms and conditions</a>									
                                </p>
								
			  <input type="submit" id="register_submit" class="btn btn-warning" value="Sign Up" />
			</form>
            
            
			
            </div>	
                      
            
            <div class="clearfix" style="margin-top:68px; text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px">Sign in with your facebook account: Connect your facebook account to sign in to  Living Lectionary.</span><br>
            	<a onclick="fb_login()" class="btn btn-primary btn-large" style="margin-top:5px; margin-bottom:5px" ><i class="icon-facebook"></i>Log in with Facebook</a><br>
                Already a member? <a href="#login" onclick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;">Sign in</a>
            </div>
		  </div>
	</div> 
    </div>
    
	
	<div class="header-left" style="padding-top: 5px;color:white">
	<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><a href="<?php echo url('help'); ?>"><span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;">Help</span></a>&nbsp;&nbsp;<span style="color:white">|</span>&nbsp;&nbsp;</label>		<span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;">Customer Support ( 24x7 ) +91 979 015 3222</span>&nbsp;&nbsp;&nbsp;&nbsp;
		
		
	
	</div>
</div>
</div>

<script>
	$( document ).ready(function() {
		<?php if(Session::has('reset_userid')){ ?>
			$('#reset_pass_click').click();
			
			<?php } ?>
			var cname		 = $('#inputregisterName');
			var cemail		 = $('#inputregisterEmail');
			var cpwd	 	 = $('#inputregisterPassword');
			var loginemail		=$('#loginemail');
			var loginpassword	=$('#loginpassword');
			var selectcity = $('#selectcity');
			var selectcountry = $('#selectcountry');
			var return_url = $('#return_url');

		 $('#login_submit').click(function() {

		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(loginemail.val() == "")
		{
			loginemail.css('border', '1px solid red'); 
			 
			loginemail.focus();
			return false;
		}
		else
		{
			loginemail.css('border', ''); 
			 
		}

		 if(!emailReg.test(loginemail.val()))
				{
					loginemail.css('border', '1px solid red'); 
					 
					loginemail.focus();
					return false;
					
				}

		else
		  {
			loginemail.css('border', ''); 
			 

		   }
		if(loginpassword.val() == "")
		{
			loginpassword.css('border', '1px solid red'); 
			 
			loginpassword.focus();
			return false;
		}
		else
		{
			
			loginpassword.css('border', ''); 
			$('#logerror_msg').html('');

			var logemail=loginemail.val();
			var logpassword=loginpassword.val();
			var returl = return_url.val()
			
					var passemail = 'email='+logemail+"&pwd="+logpassword;
				 
		  			 $.ajax( {
			     		 type: 'post',
					  data: passemail,
					    url: '<?php echo url('user_login_submit');?>',
					 
					  success: function(responseText){  
				   	if(responseText)
				 	  {  if(responseText=="success")
						{
						window.location=returl;
						}
						else
						{
						$('#logerror_msg').html('Invalid Login Credentials ');
						}
					 				   
				   	}
				}		
			});		





		}
		
		

		});




		 $('#register_submit').click(function() {
 
		if(cname.val() == "")
		{
			cname.css('border', '1px solid red'); 
			cname.focus();
			return false;
		}
		else
		{
			cname.css('border', ''); 
			 
		}
		
		if(cemail.val() == "")
		{
			cemail.css('border', '1px solid red'); 
			cemail.focus();
			return false;
		}
		
		else
		{
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

				 if(!emailReg.test(cemail.val()))
				{
					cemail.css('border', '1px solid red'); 
					 
					cemail.focus();
					return false;
					
				}


				else
				{
					cpwd.css('border', ''); 
					var email=cemail.val();
					var passemail = 'email='+email;
		  			 $.ajax( {
			     		 type: 'get',
					  data: passemail,
					  url: 'register_emailcheck_ajax',
					  success: function(responseText){  
				   	if(responseText)
				 	  {    
						if(responseText==1)
						{
						$('#error_msg').html('Already email exists');
						cemail.css('border', '1px solid red'); 
						return false;
						}
						else
						{
						cemail.css('border', ''); 
						$('#error_msg').html('');
						
			

						}
					 				   
				   	}
				}		
			});		

				

				}
		 	
		}
		if(cpwd.val() == "")
		{
			//cpwd.css('border', '1px solid red'); 
			cpwd.focus();
			return false;
		}
		else
		{

		    cpwd.css('border', ' '); 
			 
			cpwd.focus();
			 
		}
		if(selectcity.val() == 0)
		{
			selectcity.css('border', '1px solid red'); 
			 
			selectcity.focus();
			return false;
		}
		else
		{
			selectcity.css('border', ''); 
			$('#error_msg').html('');
		}
		if(selectcountry.val() == 0)
		{
			selectcountry.css('border', '1px solid red'); 
			 
			selectcountry.focus();
			return false;
		}
		else
		{
			selectcountry.css('border', ''); 
			$('#error_msg').html('');
		}
			 
});


			  $('#reset_password').click(function() {
		var emailpwd = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if($('#passwordemail').val() == "")
		{
			$('#passwordemail').css('border', '1px solid red'); 
			 
			$('#passwordemail').focus();
			return false;
		}
		else
		{
			$('#passwordemail').css('border', ''); 
			$('#ui').html('');
		}

		 if(!emailpwd.test($('#passwordemail').val()))
			{
					$('#passwordemail').css('border', '1px solid red'); 
					 
					$('#passwordemail').focus();
					return false;
					
			}

		  else
		      {

			$('#passwordemail').css('border',''); 
					var pwdemail=$('#passwordemail').val();
					var passpwdemail = 'pwdemail='+pwdemail;
					 //alert(passpwdemail);
			 		 $.ajax({
					 type: 'get',
					  data: passpwdemail,
					  url: '<?php echo url('user_forgot_submit');?>',

					  success: function(responseText){  
						 
						if(responseText=="success")
						{ 

						$('#uimsg').html('Please check your email for further instructions ');
						}
						else if(responseText=="fail")
						{
						$('#uimsg').html('Email id does not exist');

						}
						
					}

				});
				 
			} 
});

 $('#reset_new_password').click(function() {
		var emailpwd = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if($('#passwordnew').val() == "")
		{
			$('#passwordnew').css('border', '1px solid red'); 
			 
			$('#passwordnew').focus();
			return false;
		}
		else
		{
			$('#passwordnew').css('border', ''); 
			$('#passmsg').html('');
		}
		if($('#passwordconfirmnew').val() == "")
		{
			$('#passwordconfirmnew').css('border', '1px solid red'); 
			 
			$('#passwordconfirmnew').focus();
			return false;
		}
		else if($('#passwordconfirmnew').val()!= $('#passwordnew').val())
		{
			$('#passwordconfirmnew').css('border', '1px solid red'); 
			 
			$('#passwordconfirmnew').focus();
			return false;
		}
		else
		{
			$('#passwordconfirmnew').css('border',''); 
					var newpwd=$('#passwordnew').val();
					var userid = $('#passsworduserid').val();
					var passnewpwd = 'newpwd='+newpwd+'&userid='+userid;
					
			 		 $.ajax({
					 type: 'get',
					  data: passnewpwd,
					  url: '<?php echo url('user_reset_password_submit');?>',
					  success: function(responseText){  
						 //alert(responseText);
						if(responseText=="success")
						{
						$('#passmsg').html('Password Changed Success');
						$('.close').click();
						$('#login_a_click').click();
						}
						else if(responseText=="fail")
						{
						$('#passmsg').html('Invalid User');

						}
						
					}

				});
		}
		

			
				 
			 
});

});
function check_email_ajax(email)
{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		 if(!emailReg.test(cemail.val()))
			{
			cemail.css('border', '1px solid red'); 
			 
			cemail.focus();
			return false;
			}

		else
			{
			var passemail = 'email='+email;
		   $.ajax( {
			      type: 'get',
				  data: passemail,
				  url: 'register_emailcheck',
				  success: function(responseText){  
				   if(responseText)
				   {    
					if(responseText==1)
					{
					$('#error_msg').html('Already email exists');

					}
					else
					{
					cemail.css('border', ''); 
					$('#error_msg').html('');

					}
					 				   
				   }
				}		
			});		




			}
			 
}



function get_city_list(id)
	{
 
		 var passcityid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passcityid,
				  url: 'register_getcountry',
				  success: function(responseText){  
		 
				   if(responseText)
				   { 	 
					$('#selectcity').html(responseText);					   
				   }
				}		
			});		
	}
</script>

<script src="//connect.facebook.net/en_US/sdk.js"" type="text/javascript"></script> 
<script type="text/javascript">
FB.init({ 
       appId:'', 
      cookie: true,
          xfbml: true,
            version: 'v2.5',
          oauth: true
     });
function fb_login()
{ 
  console.log( 'fb_login function initiated' );
	  FB.login(function(response) {

      console.log( 'login response' );
      console.log( response );
      console.log( 'Response Status' + response.status );
		//top.location.href=http://demo.laravelecommerce.com/;
      if (response.authResponse) {

        console.log( 'Auth success' );

    		FB.api("/me",'GET',{'fields':'id,email,verified,name'}, function(me){

      		if (me.id) {


            //console.log( 'Retrived user details from FB.api', me );

             var id = me.id; 
		var email = me.email;
            	var name = me.name;
                var live ='';
				if (me.hometown!= null)
				{			
					var live = me.hometown.name;
				}        
            	
    var passData = 'fid='+ id + '&email='+ email + '&name='+ name + '&live='+ live ;
 //alert(passData);
            //console.log('data', passData);
          
            $.ajax({
             type: 'GET',
            data: passData,
             //data: $.param(passData),
             global: false,
             url: '<?php echo url('facebooklogin'); ?>',
             success: function(responseText){ 
              console.log( responseText ); 
              window.location.href = 'http://demo.laravelecommerce.com/';
             },
             error: function(xhr,status,error){
               console.log(status, status.responseText);
             }
           }); 

        }else{

          console.log('There was a problem with FB.api', me);

        }
      });

    }else{
      console.log( 'Auth Failed' );
    }

  }, {scope: 'email'});
}
 
 </script>
	 <script type="text/javascript">
	 $( "#regForm" ).submit(function( event ) {    
  event.preventDefault();
  var $form = $( this ),
    data = $form.serialize(),
    url = $form.attr( "action" );
  var posting = $.post( url, { formData: data } );
  posting.done(function( data ) {
    if(data.fail) {
      $.each(data.errors, function( index, value ) {
        var errorDiv = '#'+index+'_error';
        $(errorDiv).addClass('required');
        $(errorDiv).empty().append(value);
      });
      $('#successMessage').empty();          
    } 
    if(data.success) {
        $('.register').fadeOut(); //hiding Reg form
        var successContent = '<div class="message"><h3>Registration Completed Successfully</h3><h4>Please Login With the Following Details</h4><div class="userDetails"><p><span>Email:</span>'+data.email+'</p><p><span>Password:********</span></p></div></div>';
      $('#successMessage').html(successContent);
    } //success
  }); //done
});
	 </script>
  
  