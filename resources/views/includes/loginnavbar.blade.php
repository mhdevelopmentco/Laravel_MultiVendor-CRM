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
         $metaname="Nex eMerchant";
         $metakeywords="Nex eMerchant";
          $metadesc="Nex eMerchant";
    }
    ?>
     <title><?php echo $metaname  ;?></title>
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
<script src="<?php echo url('')?>/assets/js/facebook_sdk.js" type="text/javascript"></script>
<div id="fb-root"></div>
        <script>
        window.fbAsyncInit = function() {
                FB.init({
                appId: '1159985624035786',
                status: true,
                cookie: true,
                xfbml: true
            });
        };

        // Load the SDK asynchronously
        (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
        }(document));

        function login() {
            FB.login(function(response) {

            // handle the response
            console.log(response);

            }, {scope: 'read_stream,publish_stream,publish_actions,read_friendlists'});            
        }

        function logout() {
            FB.logout(function(response) {
                
                FB.getAuthResponse(null, 'unknown');
                //FB.Auth.getAuthResponse(null, 'unknown');
              window.location = "<?php echo url('facebook_logout'); ?>";
              //FB.logout();
               console.log(response);
            });
        }

        

        //var status = FB.getLoginStatus();

        //console.log(status);

        </script>

<div id="welcomeLine">
<div class="container">
	<div class="header-lefts animated wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;padding-top:5px;">
					<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><a href="<?php echo url('help'); ?>"><span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;">Help</span></a>&nbsp;&nbsp;<span style="color:white">|</span>&nbsp;&nbsp;</label>		<span class="para" style="font-size:14px; color:#fff;float:left;font-family: lato !important;">Customer Support ( 24x7 ) +91 979 015 3222</span>&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
    
	
	<div class="header-rights">
		<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><span class=""> Welcome</span>&nbsp;<a href="<?php echo url('user_profile');?>" class=
        "username-head" style="color: #ffc064;"><?php echo Session::get('username');?></a>&nbsp;&nbsp;|&nbsp;&nbsp;</label>
		
		<label style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#"><a style="font-size:14px; color:#fff; float:left;font-family: lato !important;" href="<?php echo url('my_wishlist');?>#five"><span> My wishlist</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;</label>
        
		
		<?php $id = Session::get('customerid');
		$connect=DB::table('nm_customer')->where('cus_id','=',$id)->first();
	        $status=$connect->cus_logintype;
	    	if($status == '3')
		{
		?>
		<a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="#" onclick="logout();"><span>Log Out</span></a>
		<?php } elseif($status == '2'){?>
		 <a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="<?php echo url('user_logout');?>"><span>Log Out</span></a>
		<?php } elseif($status == '1'){ ?>
		 <a style="font-size:14px; color:#fff;float:left;font-family: lato !important;" href="<?php echo url('user_logout');?>"><span>Log Out</span></a>
		<?php } ?>
		 
	</div>
	
	</div>
</div>


  

