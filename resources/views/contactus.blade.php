<body id="contact">
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody_contactus">
<?php /* <img src="<?php echo url(''); ?>/assets/themes/images/contact-laravel-ecommerce-multivendor.jpg"> */ ?>
<div class="container">
<div class="row"><br>
<div class="span4">
  <div class="panel panel-primary">
               <div class="panel-heading"><h4 style="    margin-bottom: 0px;
    margin-top: 0px;">Contact Details</h4></div>
                 <div class="panel-body">
                   <?php foreach($get_contact_det as $enquiry_det){
				   
				   }?>
                   <ul class="fo">
                      <li><?php echo $enquiry_det->es_contactemail; ?></li>
                      <li>Skype: <?php echo $enquiry_det->es_contactname; ?></li>
                      <li>Phone: <?php echo $enquiry_det->es_phone1; ?></li>
                      <li>US #: <?php echo $enquiry_det->es_phone2; ?></li>
                      <li><a target="_blank" href="http://www.laravelecommerce.com">Web : wwww.laravelecommerce.com</a></li>
                    </ul>
                 </div>            
               </div>
                 <h4>Email Us</h4>
<div id="error_name"  style="color:#F00;font-weight:400"  > </div>
    @if (Session::has('success'))
    <div class="alert alert-warning alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
    @endif
    {!! Form::open(array('url'=>'enquiry_submit','class'=>'form-horizontal')) !!}
       
        <div class="form-group">
          <div class="control-group">
           
              <input type="text" placeholder="Enter your name" name="name" id="inquiry_name"  class="input-xlarge" style="width:95%"required/>
           
          </div>
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="Enter Valid Email Id"  name="email" id="inquiry_email"  style="width:95%" class="input-xlarge" required/>
           
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="Enter using phonenumber" name="phone" id="inquiry_phone"  style="width:95%" class="input-xlarge" required/>
          
          </div>
          <div class="control-group">
              <textarea rows="3"  name="message" id="inquiry_desc"  class="input-xlarge" style="width:95%" placeholder="Enter Queries" required></textarea>
           
          </div>

    <input type="submit" class="btn me_btn btnb-success" value="Send Message" id="send_msg" style="background: #2F3234;
    border-radius: 0px;">
                 
       
      </form>
      </div>
      <div class="span8">
  
      
  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124354.5533488139!2d80.23144114029584!3d13.094129449169666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C+Tamil+Nadu!5e0!3m2!1sen!2sin!4v1430140983100" width="100%" height="518" style="border:1px solid #337ab7"></iframe>-->
  <div id="us3" style="width: 100%; height: 518px;margin-bottom:10px;"></div>
  <br><br>
  

  </div>
    </div>

</div>
	
	</div>	
  
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

 $(document).ready(function(){
$('#inquiry_phone').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
$('#send_msg').click(function(){
	 //alert(123);
		
		if($('#inquiry_email').val()=='')
		 {	 
			 $('#inquiry_email').css('border', '1px solid red');	
			 $('#inquiry_email').focus();
			return false;
		 }
		else
		{
			$('#inquiry_email').css('border', '');
			 
		}
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!emailReg.test($('#inquiry_email').val()))
				{
			      $('#inquiry_email').css('border', '1px solid red');
			         return false;
				}
		if($('#inquiry_phone').val()=='')
		 {
			$('#inquiry_phone').css('border', '1px solid red');
			 $('#inquiry_phone').focus();
			return false;
		}
		else
		{
			$('#inquiry_phone').css('border', '');
			 
		}
		
		

	});//function

});//ready
</script>
<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#my-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    emailConfirm: {
                      required: true,
                      equalTo: '#email'
                     },
                    password: {
                        required: true,
                        minlength: 5
                    },
                     passwordConfirm: {
                      equalTomobile: '#password'
                     },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: "Please enter the valid Email address",
                    //passwordConfirm: "Please enter the same Mobile Number again",
                    agree: "Please accept our policy"
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>

	<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="<?php echo url(); ?>/assets/js/locationpicker.jquery.js"></script>
        <script>$('#us3').locationpicker({
			
        location: {latitude: <?php echo $enquiry_det->es_latitude; ?>, longitude: <?php echo $enquiry_det->es_longitude; ?>},
			
        radius: 200,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
        </script>
	
</body>
</html>
