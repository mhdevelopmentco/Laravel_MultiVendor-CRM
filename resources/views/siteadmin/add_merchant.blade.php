<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |Add Merchant Account</title>
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
                                <li class="active"><a>Add Merchant Account</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Merchant Account</h5>
            
        </header>
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('mail_exist'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('mail_exist') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    {!! Form::open(array('url'=>'add_merchant_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Merchant Account
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">First Name<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="first_name" name="first_name" value="{!! Input::old('first_name') !!}" >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Last Name<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="last_name"  name="last_name" value="{!! Input::old('last_name') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">E-mail<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="email_id" name="email_id" value="{!! Input::old('email_id') !!}" >
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select Country<span class="text-sub">*</span></label>

                    <div class="col-lg-4"> 
                       <select class="form-control" name="select_mer_country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
          				 <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
           				   <?php } ?>
       					 </select>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select City<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <select class="form-control" name="select_mer_city" id="select_mer_city" >
           				<option value="">--Select--</option>
                  </select>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Phone<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="phone_no" name="phone_no" value="{!! Input::old('phone_no') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address1<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="addreess_one" name="addreess_one" value="{!! Input::old('addreess_one') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address2<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="address_two" name="address_two" value="{!! Input::old('address_two') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Payment Account<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="payment_account" name="payment_account" value="{!!Input::old('payment_account') !!}"  >
                    </div>
                </div>
                        </div>
                        
                    </div>
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                      Store Details 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Store Name<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="store_name" name="store_name" value="{!! Input::old('store_name') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Phone <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="store_pho" name="store_pho" value="{!! Input::old('store_pho') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address1<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="store_add_one" name="store_add_one" value="{!! Input::old('store_add_one') !!}"  >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address2<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="store_add_two" name="store_add_two" value="{!! Input::old('store_add_two') !!}"   >
                    </div>
                </div>
                        </div>
                     
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select Country<span class="text-sub">*</span></label>

                    <div class="col-lg-4"> 
                       <select class="form-control" name="select_country" id="select_country" onChange="select_city_ajax(this.value)" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
          				 <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
           				   <?php } ?>
       					 </select>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select City<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <select class="form-control" name="select_city" id="select_city" >
           				<option value="">--Select--</option>
                  </select>
                    </div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Zipcode<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="zip_code" name="zip_code" value="{!! Input::old('zip_code') !!}"  >
                    </div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <textarea  class="form-control" name="meta_keyword" id="meta_keyword" >{!! Input::old('meta_keyword') !!}</textarea>
                    </div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <textarea id="meta_description"  name="meta_description" class="form-control">{!! Input::old('meta_description') !!}</textarea>
                    </div>
                </div>
                        </div>
							<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Website<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="website" name="website" value="{!! Input::old('website') !!}"  >
                    </div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input id="pac-input" class="form-control" type="text" placeholder="Type your location here (Auto-complete)">

                    </div>
					<div class="col-lg-4"></div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Map Search Location<span class="text-sub">*</span><br><span  style="color:#999">(Drag Marker to get latitude & longitude )</span></label>

                    <div class="col-lg-4">
                        <div id="map_canvas" style="width:300px;height:250px;" ></div>
                    </div>
                </div>
                        </div>
							<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Latitude<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="latitude" name="latitude" readonly  value="{!! Input::old('latitude') !!}"  >
                    </div>
                </div>
                        </div>
							<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Longitude<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="longtitude" name="longtitude" value="{!! Input::old('longtitude') !!}"  readonly >
                    </div>
                </div>
                        </div>
							<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Commission<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="commission" name="commission" value="{!! Input::old('commission') !!}"  ><span>%</span>
                    </div>
                </div>
                        </div>
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Stores Image<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       <input type="file" id="file" name="file" placeholder="Fruit ball">Image upload size 455 X 378 
                    </div>
                </div>
                        </div>
                        
                    </div>
					
                    	
				
					<div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad" type="submit" id="submit" ><a style="color:#fff" >Submit</a></button>
                     <button class="btn btn-default btn-sm btn-grad" type="reset" ><a style="color:#000">Reset</a></button>
                   
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
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
    <script>
	$( document ).ready(function() {
	$('#submit').click(function() {
    var file		 	 = $('#file');
	var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if(file.val() == "")
 		{
 		file.focus();
		file.css('border', '1px solid red'); 		
		return false;
		}			
		else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
		file.focus();
		file.css('border', '1px solid red'); 		
		return false;
		}			
		else
		{
		file.css('border', ''); 				
		}
	});
	});
	</script>
     <script>
	
	function select_city_ajax(city_id)
	{
		 var passData = 'city_id='+city_id;
		 //alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('ajax_select_city'); ?>',
				  success: function(responseText){  
				 // alert(responseText);
				   if(responseText)
				   { 
					$('#select_city').html(responseText);					   
				   }
				}		
			});		
	}
	
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
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
    var map;

    function initialize() {


 		var myLatlng = new google.maps.LatLng(11.0195253,76.9195069);
        var mapOptions = {

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
            mapOptions);
	 		 var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
				 visible: false,
				draggable:true,    
            });	
			 
		google.maps.event.addListener(marker, 'dragend', function(e) {
   			 
			 var lat = this.getPosition().lat();
  			 var lng = this.getPosition().lng();
			 $('#latitude').val(lat);
			 $('#longtitude').val(lng);
			});
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
 
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
 
            var place = autocomplete.getPlace();
	
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
				var myLatlng = place.geometry.location;	
				//alert(place.geometry.location);			
				var marker = new google.maps.Marker({
                position: myLatlng,
				 visible: true,
                map: map,
				draggable:true,    
            });	
			google.maps.event.addListener(marker, 'dragend', function(e) {
   			 
			 var lat = this.getPosition().lat();
  			 var lng = this.getPosition().lng();
			 $('#latitude').val(lat);
			 $('#longtitude').val(lng);
			});
            } else {
                map.setCenter(place.geometry.location);	
				
                map.setZoom(17);
            }
        });



    }


    google.maps.event.addDomListener(window, 'load', initialize);
	</script>
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
