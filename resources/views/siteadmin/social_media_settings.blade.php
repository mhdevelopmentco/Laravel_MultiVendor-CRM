<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Social Media Pages</title>
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
	  <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/social-buttons/social-buttons.css" />
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
                            	<li class=""><a  >Home</a></li>
                                <li class="active"><a  >Social Media Pages</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
          @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Social Media Pages</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
             {!! Form::open(array('url'=>'social_media_setting_submit','class'=>'form-horizontal')) !!}
             <?php foreach($social_settings as $social_details) { } 
			  ?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Facebook App ID<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" name="fb_app_id" value="<?php echo $social_details->sm_fb_app_id; ?>" placeholder="" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Facebook Secrect Key<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="fb_secret_key" value="<?php echo $social_details->sm_fb_sec_key; ?>" placeholder="" class="form-control" type="text">
                    </div>
                </div>

                   <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">FaceBook Page URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="fb_page_url" value="<?php echo $social_details->sm_fb_page_url; ?>" placeholder="https://www.facebook.com/UniEcommerce" class="form-control" type="text">
                    </div>
                </div>
				
				    <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">FaceBook Like box URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="fb_like_box_url" value="<?php echo $social_details->sm_fb_like_page_url; ?>" placeholder="https://www.facebook.com/UniEcommerce" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Twitter Page URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="twitter_page_url" value="<?php echo $social_details->sm_twitter_url; ?>" placeholder="https://twitter.com/uni_ecommerce" class="form-control" type="text">
                    </div>
                </div>
				
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Twitter App ID<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="twitter_app_id" value="<?php echo $social_details->sm_twitter_app_id; ?>" placeholder="291719054236926" class="form-control" type="text">
                    </div>
                </div>

               <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Twitter Secrect Key<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="twitter_secret_key"  value="<?php echo $social_details->sm_twitter_sec_key; ?>" placeholder="b24927947a1adc1cff504bd4cbb16968" class="form-control" type="text">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Linkedin Page URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="linkedin_page_url" value="<?php echo $social_details->sm_linkedin_url; ?>"  placeholder="http://www.linkedin.com/company/uniecommerce" class="form-control" type="text">
                    </div>
                </div>
				
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Youtube URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="youtube_page_url" value="<?php echo $social_details->sm_youtube_url; ?>"  placeholder="http://www.youtube.com/watch?v=QhzrdsS5J9w" class="form-control" type="text">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Gmap App Key<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="gmap_app_key" value="<?php echo $social_details->sm_gmap_app_key; ?>" placeholder="b24927947a1adc1cff504bd4cbb16968" class="form-control" type="text">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Android page URL<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="android_page_url" value="<?php echo $social_details->sm_android_page_url; ?>"  placeholder="https://play.google.com/store/apps/details?id=com.uniecommerce.uninew.ecommerce" class="form-control" type="text">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">iPhone page URL<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <input id="text1" name="iphone_page_url"  placeholder="https://itunes.apple.com/us/app/uniecommercenew/id592052500?ls=1&mt=8" value="<?php echo $social_details->sm_iphone_url; ?>" class="form-control" type="text">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Analytics Code<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <textarea id="text4" class="form-control" name="analytics_code"  ><?php echo $social_details->sm_analytics_code; ?></textarea>
                    </div>
                </div>
				          

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Update</a></button>
                    
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
     <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
