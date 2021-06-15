<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Add City</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/theme.css" />
	  <link rel="stylesheet" href="<?php echo url('');?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/MoneAdmin.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
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
                                <li class="active"><a >Add City</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add City</h5>
            
        </header>
        
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    {!! Form::open(array('url'=>'edit_city_submit','class'=>'form-horizontal')) !!}
                   
					@foreach($cityresult as $cityres)
				
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                       Add City
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Country<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <select class="validate[required] form-control" id="country_name" name="country_name">
                        <option value="0">Choose a Country</option>
                        	  	@foreach($country_details as $country_det)
			  <option value="{!! $country_det->co_id!!}" <?php if($country_det->co_id == $cityres->ci_con_id){?> selected <?php } ?>>{!! $country_det->co_name!!}</option>
                                            @endforeach        
                                                 </select>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City Name <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" value="{!!$cityres->ci_name!!}" name="city_name" id="city_name" >
                        <input type="hidden" class="form-control" placeholder="" value="{!!$cityres->ci_id!!}" name="city_id" id="city_id" >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City Latitude  <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <a id="inline" href="#map_canvas">  <input type="text" class="form-control" placeholder="" value="{!!$cityres->ci_lati!!}" name="city_lat" id="city_lat"></a>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">City Longitude <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" value="{!!$cityres->ci_long!!}" name="city_lng" id="city_lng"  />
                    </div>
                </div>
                        </div>
                        
                    </div>
					
					
					<div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <a href="<?php echo url('manage_city');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
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
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
     {!! $adminfooter !!}
    <!--END FOOTER -->
<div class="col-lg-12" >
                        <div class="modal fade" id="buttonedModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            
                                        </div>
                                       
                                            <div id="MyGmaps" style="width:575px;height:400px;border:1px solid #CECECE;"></div>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                    </div>

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

    function initialize() {
		var lat = $('#city_lat').val();
		var lng = $('#city_lng').val();	
		
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
			 $('#city_lat').val(lat);
			 $('#city_lng').val(lng);
			 $("#fancybox-close").click();
			 
			});

    }


    google.maps.event.addDomListener(window, 'load', initialize);

    $("a#inline").fancybox();


    </script>
    
</body>
     <!-- END BODY -->
</html>
