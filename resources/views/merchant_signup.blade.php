<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index">Home</a> <span class="divider">/</span></li>
		<li class="active">Merchant Sign up</li>
    </ul>
    
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>
        </div>
		</ul>	
		@endif
         @if (Session::has('mail_exist'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('mail_exist') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
         @if (Session::has('result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
	<h3 style="margin-bottom:0px;">Welcome to merchant sign up!</h3>
    <p style="padding-bottom:20px;">You will now be guided through a few steps to create your own personal online store!</p>
  
    <div class="content">
     
        

	
 {!! Form::open(array('url'=>'merchant_signup','class'=>'testform forms_new','id'=>'testform','enctype'=>'multipart/form-data')) !!}
		
                 
                                
              <fieldset class="personal-data">
                
                <h4 style="padding:10px;background:#eee;">Create your store</h4>
           <div class="row">
		   <div class="span5">
		<label for="text1" >Store Name:<span class="text-sub">*</span></label>
       <input type="text" id="store_name" name="store_name" class="form-control span5" placeholder=" " value="{!! Input::old('store_name') !!}" />
       <label for="text1" >Phone:<span class="text-sub">*</span></label>
     <input type="number" id="store_pho" required="required" name="store_pho" placeholder="" class="form-control span5" value="{!! Input::old('store_pho') !!}">
                 
              
               <label for="text1">Address1:<span class="text-sub">*</span></label>

                    
                        <input type="text" id="store_add_one" name="store_add_one" placeholder="" class="form-control span5" value="{!! Input::old('store_add_one') !!}">
                   
              
               <label for="text1" >Address2:<span class="text-sub">*</span></label>

                   
                        <input type="text" id="store_add_two" name="store_add_two" placeholder="" class="form-control span5" value="{!! Input::old('store_add_two') !!}">
                   
               <label for="text1" >Country:<span class="text-sub">*</span></label>

                  
                      <select class="span5" name="select_country" id="select_country" onChange="select_city_ajax(this.value)" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
                   <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
                     <?php } ?>
                 </select>
                   
                
                
              
               <label for="text1">City:<span class="text-sub">*</span></label>

                 
                      <select class="span5" name="select_city" id="select_city" >
                  <option value="">--Select--</option>
                  </select>
                  
               <label for="text1">zipcode:<span class="text-sub">*</span></label>

                   
                        <input type="text" id="zip_code" name="zip_code"  placeholder="" class="form-control span5" value="{!! Input::old('zip_code') !!}">
                   
				 
				
				
				
				  
               <label for="text1">Meta keywords:<span class="text-sub">*</span></label>

                   
					
					<input type="text" id="meta_keyword" name="meta_keyword" style="height:50px;" placeholder="" class="form-control span5" value="{!! Input::old('meta_keyword') !!}">
                  
                    <label for="text1">Meta description<span class="text-sub">*</span></label>

                   
                       <input type="text" id="meta_description"  name="meta_description" style="height:50px;" class="form-control span5" value="{!! Input::old('meta_description') !!}">
                    
                    <label  for="text1">Website<span class="text-sub">*</span></label>

                   
                        <input type="text" class="form-control span5" placeholder="" id="website" name="website" value="{!! Input::old('website') !!}"  >
                       </div>
				 <div class="span5">
<label for="text1">Commission<span>(%):</span><span class="text-sub">*</span></label>
 <input type="text" class="form-control span5" placeholder="" id="commission" name="commission" value="{!! Input::old('commission') !!}"  >


 <label for="pass1"><span class="text-sub"></span></label>

   <label for="text1">Upload File:<span class="text-sub">*</span></label>
 <input type="file" placeholder="" class="form-control span5"  id="file" name="file">  
 <div class="gllpLatlonPicker">
 

  <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">

   
    <label for="text1">Enter Your Store Location <small class="text-sub">*</small></label>
	  <div class="row">
	<div class="span4">
    <input type="text" name="location" value="{!! Input::old('location') !!}" class="gllpSearchField span5" placeholder="Type Your Location Here" style=" margin-left: 0px;">
    </div>
	<div class="span4">
	<br>
     <input type="button" class="gllpSearchButton form-control" value="Search" style="background: #00B381;
    font-size: 14px;
    color: white;font-family:lato;margin-bottom: 15px;
    margin-top: -22px;
    margin-left: 0px;">
	</div>
    </div>
  
    <div class="gllpMap">Google Maps</div>
    <br/>
      <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
    <label  for="text1">Latitude<span class="text-sub">*</span></label>
      <input type="text" name="latitude" class="gllpLatitude form-control span5" readonly  value="{!! Input::old('latitude') !!}"  id="latitude"/>
      
      
        </div>
           <div class="form-group controls-row" style="margin-top:10px; margin-bottom:10px">
     <label  for="text1">Longtitude<span class="text-sub">*</span></label>
       <input type="text" name="longtitude" class="gllpLongitude form-control span5" value="{!! Input::old('longtitude') !!}"  readonly id="longtitude"/>
       <input type="text" class="gllpZoom"  style="visibility:hidden">
    <input class="gllpUpdateButton" style="visibility:hidden">
       </div>
    

  </div>
 


</div>
               
    </div> 
    </div>  
   
       
        	  <h4 style="padding:10px;background:#eee;">Personal Details</h4>
               
			    <div class="row">
		   <div class="span5">
              <label for="text1">First name:<span class="text-sub">*</span></label>
<input type="text"  id="first_name" name="first_name" placeholder="" class="form-control span5" value="{!! Input::old('first_name') !!}" tabindex="1" >
                   
               <label for="text1">Last name:<span class="text-sub">*</span></label>

                   
                        <input type="text" id="last_name" class="form-control span5" name="last_name" value="{!! Input::old('last_name') !!}" placeholder="" tabindex="2">
                  
               <label for="text1">E-mail:<span class="text-sub">*</span></label>

                  
                        <input type="email" id="email_id" class="form-control span5" name="email_id" value="{!! Input::old('email_id') !!}" placeholder="" tabindex="3">
                  
                     
               <label for="text1">Phone:<span class="text-sub">*</span></label>

                   
                        <input type="number" id="phone_no" class="form-control span5" name="phone_no" value="{!! Input::old('phone_no') !!}" placeholder=""  tabindex="6">
                  
               <label for="text1">Address 1:<span class="text-sub">*</span></label>

                  
                        <input type="text" id="addreess_one" class="form-control span5" name="addreess_one" value="{!! Input::old('addreess_one') !!}" placeholder="" tabindex="7">
                 
				</div>
				 <div class="span5">
                  <label for="text1">Address 2:<span class="text-sub">*</span></label>

                 
                        <input type="text" id="address_two" name="address_two" class="form-control span5" value="{!! Input::old('address_two') !!}" placeholder=""  tabindex="8">
                  
               <label for="text1">Select Country:<span class="text-sub">*</span></label>

                    
                      <select class="form-control span5" name="select_mer_country" id="select_mer_country" onChange="select_mer_city_ajax(this.value)" tabindex="4" >
                        <option value="">-- Select --</option>
                          <?php foreach($country_details as $country_fetch){ ?>
          				 <option value="<?php echo $country_fetch->co_id; ?>"><?php echo $country_fetch->co_name; ?></option>
           				   <?php }?>
       					 </select>
                 
               <label for="text1">Select City:<span class="text-sub">*</span></label>

                    
                        <select class="form-control span5" name="select_mer_city" id="select_mer_city" tabindex="5" >
           				<option value="">--Select--</option>
                  </select>
                  
               <label for="text1">Payment Email:<span class="text-sub"></span></label>
                   
                        <input type="text" class="form-control span5"  id="payment_account" value="{!! Input::old('payment_account') !!}" name="payment_account" placeholder=""  tabindex="9">
                    
                
        </div>       
          </div>   
         
        
</fieldset>
			
             

              

                
                
          
     
    
        </div>	
    
	</form>
	
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
 <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
<script src="<?php //echo url();?>/themes/js/jquery.steps.js"></script>
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
 
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
	  
<!--    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>-->
       
        
    <script>
	$( document ).ready(function() {
		
		
		$('.close').click(function() {
			$('.alert').hide();
		});
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
	
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	
	 <script src="<?php echo url(); ?>/themes/js/simpleform.min.js"></script>
	<script type="text/javascript">
		$(".testform").simpleform({
			speed : 500,
			transition : 'fade',
			progressBar : true,
			showProgressText : true,
			validate: true
		});

		
	
		function validateForm(formID, Obj){

			switch(formID){
				case 'testform' :
					Obj.validate({
						rules: {
							email: {
								required: true,
								email: true
							},
							store_name: {
								required: true
							},
							store_pho: {
								required: true
							},
							store_add_one: {
								required: true
							},
							
							store_add_two: {
								required: true
							},
							
							zip_code: {
								required: true
							},
							meta_keyword: {
								required: true
							},
							meta_description: {
								required: true
							},
							website: {
								required: true
							},
							location: {
								required: true
							},
							commission: {
								required: true
							},
							file: {
								required: true
							},
							select_country: {
								required: true
							},
							select_city: {
								required: true
							},
							email_id: {
								required: true,
								email_id: true
							},
							first_name: {
								required: true
							},
							select_mer_city: {
								required: true,
								
							},
							addreess_one: {
								required: true
							},
							payment_account: {
								required: true
							},
							
							last_name: {
								required: true
							},
							select_mer_country: {
								required: true
							},
							phone_no: {
								required: true
							},
							address_two: {
								required: true
							}
							
							
						},
						messages: {
							email: {
								required: "Please enter an email address",
								email: "Not a valid email address"
							},
							store_name: {
							 	required: "Please enter your store name"
							},
							store_pho: {
							 	required: "Please enter your phone no"
							},
							store_add_one: {
							 	required: "Please enter address1 field"
							},
							
							store_add_two: {
								required: "Please enter address2 field"
							},
							zip_code: {
							 	required: "Please enter zipcode"
							},
							meta_keyword: {
							 	required: "Please enter meta keywords"
							},
							meta_description: {
							 	required: "Please enter meta description"
							},
							website: {
							 	required: "Please enter website"
							},
							location: {
							 	required: "Please enter location"
							},
							
							commission: {
							 	required: "Please enter commission"
							},
							file: {
							 	required: "Please choose your upload file"
							},
							select_country: {
							 	required: "Please select country"
							},
							select_city: {
							 	required: "Please select city"
							},
							
							email_id: {
								required: "Please enter an email address",
								email: "Not a valid email address"
							},
							first_name: {
							 	required: "Please enter your first name"
							},
							select_mer_city: {
								required: "Please enter city",
								
							},
							addreess_one: {
							 	required: "Please enter  addreess1 field"
							},
							payment_account: {
								required: "Please enter payment account"
							},
							
							last_name: {
								required: "Please enter last name"
							},
							select_mer_country: {
								required: "Please select country"
							},
							phone_no: {
								required: "Please enter phone no"
							},
							address_two: {
								required: "Please enter address2 field"
							}
							
						}
					});
				return Obj.valid();
				break;

				case 'testform2' :
					Obj.validate({
						rules: {
							email_id: {
								required: true,
								email_id: true
							},
							first_name: {
								required: true
							},
							select_mer_city: {
								required: true,
								
							},
							addreess_one: {
								required: true
							},
							payment_account: {
								required: true
							},
							
							last_name: {
								required: true
							},
							select_mer_country: {
								required: true
							},
							phone_no: {
								required: true
							},
							address_two: {
								required: true
							}
						},
						messages: {
							email_id: {
								required: "Please enter an email address",
								email: "Not a valid email address"
							},
							first_name: {
							 	required: "Please enter your first name"
							},
							select_mer_city: {
								required: "Please enter city",
								
							},
							addreess_one: {
							 	required: "Please enter  addreess1 field"
							},
							payment_account: {
								required: "Please enter payment account"
							},
							
							last_name: {
								required: "Please enter last name"
							},
							select_mer_country: {
								required: "Please select country"
							},
							phone_no: {
								required: "Please enter phone no"
							},
							address_two: {
								required: "Please enter address2 field"
							}
						}
					});
				return Obj.valid();
				break;
			}
		}
		</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
   <script src="<?php echo url(); ?>/themes/js/jquery-gmaps-latlon-picker.js"></script>
 <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
    
	<!-- Themes switcher section ============================================================================================= -->


</body>
</html>