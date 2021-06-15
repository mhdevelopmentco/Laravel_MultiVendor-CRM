<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Email-setting</title>
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
    <link rel="stylesheet" href="assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
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
                                <li class="active"><a>Email Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
        
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Email Settings</h5>
            
        </header>
        @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'email_setting_submit','class'=>'form-horizontal')) !!}
					@foreach($email_settings as $email_set)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Contact Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_contactname!!}" name="contact_name" id="contact_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Contact E-Mail<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_contactemail!!}" name="contact_email" id="contact_email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Webmaster E-Mail<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_webmasteremail!!}" name="webmaster_email" id="webmaster_email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Site no-reply E-Mail<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_noreplyemail!!}" name="no_reply_email" id="no_reply_email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Contact Phone 1<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_phone1!!}" name="contact_pno" id="contact_pno">
                    </div>
                </div>

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-2"></label>

                    <div class="col-lg-8">
                       <p>Ex: +91 123-4567-890</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Contact Phone 2<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input type="text" class="form-control" placeholder="" value="{!! $email_set->es_phone2!!}" name="contact_pno2" id="contact_pno2">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Latitude<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <a id="inline" href="#map_canvas"><input type="text" class="form-control" placeholder="" value="{!! $email_set->es_latitude!!}" name="lati" id="lati"></a>
                    </div>
                </div>
                
				 <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Longitude<span  class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input type="text" class="form-control" placeholder="" name="long" value="{!! $email_set->es_longitude!!}" id="long">
                    </div>
                </div>
				<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     
                   <a href="<?php echo url('email_setting');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                    </div>
					  
                      
                      
                </div>

                
         <div id="container" class="col-lg-12" >

        <div id="map_canvas"></div>

    </div>
                </div>
                @endforeach
                 {!! Form::close() !!}
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
     
      <style type="text/css">

        #container

        {

            left: -100000px;

            position: relative !important;

        }

        #map_canvas

        {

            margin: 0;

            padding: 0;

            height: 500px;

            width: 500px;

        }

    </style>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo url('');?>/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="<?php echo url('');?>/assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
    
    <script type="text/javascript">

    var map;
	var lat = $('#lati').val();
	var lng = $('#long').val();	
    function initialize() {
var myLatlng = new google.maps.LatLng(lat,lng);
        var myOptions = {

           zoom: 10,
                center: myLatlng,
                disableDefaultUI: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                streetViewControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP

        };

        map = new google.maps.Map(document.getElementById('map_canvas'),

            myOptions);
	   var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
				draggable:true,    
            });	
		google.maps.event.addListener(marker, 'dragend', function(e) {
   			 
			 var lat = this.getPosition().lat();
  			 var lng = this.getPosition().lng();
			 $('#lati').val(lat);
			 $('#long').val(lng);
			 $("#fancybox-close").click();
			 
			});

    }


    google.maps.event.addDomListener(window, 'load', initialize);

    $("a#inline").fancybox();


    </script>
     
</body>
     <!-- END BODY -->
</html>
