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
		<li><a href="<?php echo url('/'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">User Register</li>
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
		@if (Session::has('success'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
	<h3 style="margin-bottom:0px;">Welcome to Register sign up!</h3>
      
<div class="content">
   
 {!! Form::open(array('url'=>'register_submit','class'=>'form-horizontal loginFrm')) !!}

			  <fieldset class="personal-data">
                <br />
                <!-- <h4 style="padding:10px;background:#eee;">Create your store</h4> -->
           <div class="row">
		   <div class="span5">
		<label for="text1" >Name:<span class="text-sub">*</span></label>
       <input type="text" id="cus_name" name="customername" class="form-control span5" placeholder=" " value="{!! Input::old('cus_name') !!}" />
       <label for="text1" >Phone:<span class="text-sub">*</span></label>
    <!--  <input type="number" id="cus_phone" required="required" name="cus_phone" placeholder="" class="form-control span5" value="{!! Input::old('cus_phone') !!}" onchange="numb();" onKeyDown="limitTextmobile(this.form.mobile,this.form.countdown,10);"  
              onKeyUp="limitTextmobile(this.form.mobile,this.form.countdown,10);"> -->

      <input type="number" class="form-control span5" id="inputName" placeholder="" name="mobile" value="{!! Input::old('cus_phone') !!}" required onchange="numb();" onKeyDown="limitTextmobile(this.form.mobile,this.form.countdown,10);"  
              onKeyUp="limitTextmobile(this.form.mobile,this.form.countdown,10);"
              data-minlength="10" data-maxlength="10" data-error="Less Number">        
                 
              
               <label for="text1">Email:<span class="text-sub">*</span></label>

                    
                        <input type="text" id="cus_email" name="email" placeholder="" class="form-control span5" value="{!! Input::old('cus_email') !!}">
                   
              
               <label for="text1" >Password:<span class="text-sub">*</span></label>

                   
                        <input type="password" id="cus_pwd" name="pwd" placeholder="" class="form-control span5" value="{!! Input::old('cus_pwd') !!}">
                   
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
                               <input type="hidden" id="return_url" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
			  <p><input type="checkbox" required/> By clicking Sign Up you agree to <br>Laravelecommerce Multivendor<a href="<?php echo url('termsandconditons'); ?>" title="Terms and conditions" class="forget_link" style="color:#ff8400;" target="_blank" > Terms and conditions</a>		
			  					
                                </p>
								
			  <input type="submit" id="register_submit" class="btn btn-warning" value="Sign Up" />          
                       </div>
                       <div class="span6" style="margin-top: 10%;">
                       <div class="clearfix fb-log" style="text-align:center"> 
            
            <span style="font-size:11px; color:#666; text-align:center; line-height:10px">Sign in with your facebook account: Connect your facebook account to sign in to  Living Lectionary.</span><br>
            	<!--<a onClick="fb_login()" class="btn btn-primary btn-large" style="margin-top:5px; margin-bottom:5px" ><i class="icon-facebook"></i>Log in with Facebook</a><br>
                Already a member? <a href="#login" onClick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;">Sign in</a>-->
   <a  onclick="fb_login()" class="facebook_login" style="margin-top:5px; margin-bottom:5px" >&nbsp;</a><br><!--<i class="icon-facebook"></i>Log in with Facebook</a>-->
                 Already a member? <a href="#login" onClick="$('.close').click();" role="button" data-toggle="modal" style="color:#ff8400;">Sign in</a>
            </div>
            </div>
			</form>
				
               
    </div>        
               
                
</fieldset>
			  
			
	
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
							cus_email: {
								required: true,
								email: true
							},
							cus_name: {
								required: true
							},
							cus_pwd: {
								required: true
							},
							cus_phone: {
								required: true
							},
							select_country: {
								required: true
							},
							select_city: {
								required: true
							}
							
					
							
							
						},
						messages: {
							cus_email: {
								required: "Please enter an email address",
								cus_email: "Not a valid email address"
							},
							cus_name: {
							 	required: "Please enter your store name"
							},
							cus_pwd: {
							 	required: "Please enter your phone no"
							},
							cus_phone: {
							 	required: "Please enter address1 field"
							},
							select_country: {
							 	required: "Please select country"
							},
							select_city: {
							 	required: "Please select city"
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
    <!--Validation-->
	<script type="text/javascript">
	function numb() {
	  var a=document.getElementById("mobile_1").value;
	  var value = a.length;
	  if (value < 10) {
	    document.getElementById("valu").innerHTML = "lesser MOBILE_NO";//"Watching.. Everything is Alphabet now"; 
	    //document.write("Watching.. Everything is Alphabet now"); 
	    return true; alert("ok");
	  }
	   else {
	    document.getElementById("valu").innerHTML = "correct mob_no";  //alert("numerics not accepted");
	    return false; 
	    }
	}
	</script>
    <!--digit less than 10 - MOBILE_NO-->
	<script type="text/javascript">
	  function limitval(){
	    var d=document.getElementById("mobile_1").value;
	    var e=d.length;
	    if (e < 10) {
	      document.getElementById("valu").innerHTML="Enter 10 - digits of MOBILE_NO";
	      return false;
	    }
	    else {  
	      document.getElementById("valu").innerHTML="correct mobile no";   
	      return true;
	    }
	  }
	</script>
	<script type="text/javascript">
	function IsMobileNumber(txtMobId) {
	    var mob = /^[1-9]{1}[0-9]{9}$/;
	    var txtMobile = document.getElementById(mobile_1);
	    if (mob.test(txtMobile.value) == false) {
	        alert("Please enter valid mobile number.");
	        txtMobile.focus();
	        return false;
	    }
	    return true;
	}
	</script>
	<!--limit text-MOBILE_NO-->
	<script language="javascript" type="text/javascript">
	function limitTextmobile(limitField, limitCount, limitNum) {
	  if (limitField.value.length > limitNum) {
	    limitField.value = limitField.value.substring(0, limitNum);
	  } else {
	    limitCount.value = limitNum - limitField.value.length;
	  }
	}
	</script>
	<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
	<!-- Themes switcher section ============================================================================================= -->


</body>
</html>