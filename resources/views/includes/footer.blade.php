<?php foreach($get_contact_det as $enquiry_det){}?>
<div id="login4" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display:none;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Request For Advertisement</h3>
		  </div>
        <div id="error_name"  style="color:#F00;font-weight:400"  > </div>
		  <div class="modal-body">
			
      
  {!! Form::open(array('url'=>'user_ad_ajax','id'=>'uploadform','enctype'=>'multipart/form-data')) !!}
            	<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Ad Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control span5" placeholder="Enter Ad Title" id="ad_title" name="ad_title" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Ads position<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     <select class="form-control span5" id="ad_pos" name="ad_pos">
           <option value="0">select position</option>
            <option value="1">Header right</option>
            <option value="2">Left side bar</option>
            <option value="3">Bottom footer</option>
        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Pages<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control span5" id="ad_pages" name="ad_pages">
          <option value="0">select any page</option>
            <option value="1">Home</option>
            <option value="2">Sports</option>
            <option value="3">Electronics</option>
            <option value="4">Flower pot</option>
		  <option value="5">Health</option>
			  <option value="6">Beauty</option>
	
        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Redirect url<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control span5" placeholder="Enter Valid URL" id="ad_url" name="ad_url">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Upload images <span class="text-sub">*</span></label>

                   <div class="col-lg-8">
		 <input type="file" name="file" id="file"  ><label> </label>
                    </div>
                </div>
            <br>
            <button type="button" id="upload_add" class="btn btn-success">Upload</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>	

            </form>
		  </div>
	</div>
<div  id="footerSection">
	<div class="container">
		<div class="row">
			
			<div class="span3 mob-contact" style="width:240px !important;">
				<h5>CONTACT</h5>
				<a href="mailto:contact@livinglectionary.com"><i class="icon-envelope"></i>&nbsp;&nbsp;<?php echo $enquiry_det->es_contactemail; ?></a>  
				
				<a><i class="icon-phone-sign"></i><?php echo $enquiry_det->es_phone1; ?></a> 
				<a><i class="icon-phone"></i><?php echo $enquiry_det->es_phone2; ?></a>
                <a href="<?php echo url('contactus'); ?>"><i class="icon-map-marker"></i>Contact Us</a> 
<a href="<?php //echo url(''); ?>"><?php 
				foreach($getanl as $getal)
				{
					echo $getal->sm_analytics_code;
					
				}
				?></a>				
				
			 </div>
			 <div class="span2" id="socialMedia" style="width:200px !important;">
			 	<ul class="fot">
			 	<h5>COMPANY</h5>
					<li><a href="<?php echo url('index'); ?>">Home</a></li>
			 		<li><a href="<?php echo url('blog'); ?>">Blog</a></li> 
					<li><a href="<?php echo url('aboutus'); ?>">About us</a></li> 
			 		<!--<li><a href="<?php echo url('products'); ?>">Products</a></li>
			 		<li><a href="<?php echo url('deals'); ?>">Deals</a></li>
			 		<li><a href="<?php echo url('stores'); ?>">Stores</a></li>
			 		<li><a href="<?php echo url('sold'); ?>">Sold</a></li>
					<li><a href="<?php echo url('blog'); ?>">Blog</a></li> 
			 		<li><a href="<?php echo url('contactus'); ?>">Contact Us</a></li>-->
					<?php if(isset($cms_page_title)) { foreach($cms_page_title as $cms){ if($cms->cp_title !="Help") { ?>
					<li><a href="<?php echo url('cms/'.$cms->cp_id); ?>"><?php  echo $cms->cp_title; ?></a></li>
					<?php } } } ?>
					
				<?php 
				   /* foreach($gt as $list) 
					{ 
						?>
						<li><a href="<?php echo url("pageview")."/".$list->cp_id; ?>"> <?php echo $list->cp_title; ?></a></li> <br />
						<?php 
						#echo $list->cp_description; 
				    }   */ 
				?>
					
			 	</ul>
			 </div>
			<div class="span4" id="socialMedia">
			<h5>MERCHANT LOGIN</h5>
            <a href="<?php echo url('merchant_signup'); ?>"  >Register</a>/  <a href="<?php echo url('sitemerchant'); ?>" target="_blank" >  Login</a><br />
            
            
            <h5>SOCIAL MEDIA </h5>
                <?php if($get_social_media_url){ foreach($get_social_media_url as $social_sttings_url) { } ?>
				<a href="<?php echo $social_sttings_url->sm_fb_page_url; ?>" target="_blank" ><img width="24" height="24" src="<?php echo url(''); ?>/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="<?php echo $social_sttings_url->sm_twitter_url; ?>" target="_blank"><img width="24" height="24" src="<?php echo url(''); ?>/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="<?php echo $social_sttings_url->sm_youtube_url; ?>" target="_blank"><img width="24" height="24" src="<?php echo url(''); ?>/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
                <a href="<?php echo $social_sttings_url->sm_linkedin_url; ?>" target="_blank"><img width="24" height="24" src="<?php echo url(''); ?>/themes/images/in.png" title="linkedin" alt="linkedin"/></a>
                <?php } ?>
			 </div>
			 <div class="span1 mob-news" style="margin-left:-163px; width:15%;">
				<h5>LIVING LECTIONARY</h5>
				<p>Subscribe to Living Lectionary to receive the latest news straight to your inbox. By subscribing you will be able to:</p>
				<a href="<?php echo url('newsletter'); ?>"><button class="sub-but">Subscribe Here</button></a>
				<br/>
				
			 </div>
			<div id="socialMedia" class="span2 mob-payment" >
				
                <h5>PAYMENT METHOD</h5>
				<img src="<?php echo url(''); ?>/themes/images/paypal-payment-logo.png" >
				<h5>OUR SERVICES</h5>
				<ul>
					<li><a href="<?php echo url('termsandconditons'); ?>">Terms & Conditions</a></li>
					<li><a href="<?php echo url('help'); ?>">Help</a></li>
				</ul>
			 </div> 
             
             
		 </div><br>
		<div class="container">
		
     
         <p class="alignR">© <?php echo date("Y"); ?> <?php echo $enquiry_det->es_contactname; ?>, All Rights Reserved.</p>
     
     

          
      </div>
    
	</div><!-- Container End -->
	</div>


    <script type="text/javascript">
   
   
	$(window).load(function(){

$('#upload_add').click(function() {

var position=$("#ad_pos option:selected").val();
var page=$("#ad_pages option:selected").val();
 
	if($('#ad_title').val() == "")
	{
		$('#ad_title').css('border', '1px solid red'); 
		$('#ad_title').focus();
		return false;
	}
	else
	{
		$('#ad_title').css('border', ''); 
	}
	if(position==0)
	{
		$('#ad_pos').css('border', '1px solid red'); 
		$('#ad_pos').focus();
		return false;
	}
	else
	{
		$('#ad_pos').css('border', ''); 
	}
	if(page == 0)
	{
		$('#ad_pages').css('border', '1px solid red'); 
		$('#ad_pages').focus();
		return false;
	}
	else
	{
		$('#ad_pages').css('border', ''); 
	}
	if($('#ad_url').val() == "")
	{
		$('#ad_url').css('border', '1px solid red'); 
		$('#ad_url').focus();
		return false;
	}
	else
	{
		var txt = $('#ad_url').val();
		var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
		if (re.test(txt)) 
		{
			 $('#ad_url').css('border', ''); 
		}
		else {
		 $('#ad_url').css('border', '1px solid red'); 
		$('#ad_url').focus();
		return false;
		}
		
	}
	if($('#file').val()=='')
	{
		 alert('Image field required!');
                 return false;
         }
	else
	 {
		
		var title=$('#ad_title').val();
		var pass="title="+title;
 			$.ajax( {
				type: 'get',
				 data: pass,
				 url: '<?php echo url('check_title'); ?>',
				 success: function(responseText){  
				 
					if(responseText=="success")
					{
				        $('#error_name').html('Thank You ,Your request should be processed soon');
						$("#uploadform").submit();	 
					}
					else
					{
						$('#ad_title').css('border', '1px solid red'); 
						$('#ad_title').focus();
						$('#error_name').html('Ad title already exists');
					}
					}	
				});

		

		
         }


});
    $('#news_result').hide();
	$('#newsletter').click(function()
      {
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var sname4 = $('#sname4');
      if(sname4.val() == "" )
      {
       $(sname4).focus();
      $(sname4).css("border","red solid 1px");
      return false;
      }
      else if($.trim(sname4.val()) == "")
      {
      $(sname4).focus();
      $(sname4).css("border","red solid 1px");
      return false;
      }
       else if(!emailReg.test(sname4.val())) 
		 { 
		         $(sname4).focus();
     			 $(sname4).css("border","red solid 1px");
      return false;
      }
       
      else
      {
	   $('#newsletter').hide();
      $(sname4).css("border","#CCCCCC solid 1px");
      var passData = 'semail='+sname4.val();
		   $.ajax( {
			      type: 'GET',
				  data: passData,
				  url: '<?php echo url('front_newsletter_submit'); ?>',
				  success: function(responseText){  		 		
				 		//alert(responseText);
						  $('#news_result').show();
				 		 setTimeout(function() {  
        				 window.location.reload();
							},3000);
				 		
					   
				  						}		
			});
			return false;
    
      }
      });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".search").keyup(function(e) 
{

var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{
$("#display").html("").hide();	
}
else
{
	var passData = 'searchword='+ searchbox+'&url=<?php echo Route::getCurrentRoute()->getPath(); ?>';
	//alert(passData);
	 $.ajax( {
			      type: 'GET',
				  data: passData,
				  url: '<?php echo url('autosearch'); ?>',
				  success: function(responseText){  
				  $("#display").html(responseText).show();	
}
});
}
return false;    

});
});


var __lc = {};
__lc.license = 4302571;

(function() {
 var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
 lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();

</script>

<script type="text/javascript">
var __lc = {};
__lc.license = 6132091;

(function() {
	var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
	lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62671250-1', 'auto');
  ga('send', 'pageview');

</script>


<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>

<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(); ?>/themes/js/jquery-1.10.0.min.js"></script>
	<!-- sold page -->

	<script src="plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	<script src="<?php echo url(); ?>/themes/js/compare-products/classie.js"></script>
	<script src="<?php echo url(); ?>/themes/js/compare-products/main.js"></script>
	
	<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
	</script>
	<!-- Product page -->
	 <script src="<?php echo url('');?>/themes/js/modernizr.min.js"></script>
	<script src="<?php echo url(); ?>/themes/js/jplist.min.js"></script>
	<script>
			$('document').ready(function(){
				$('#demo').jplist({
				
					itemsBox: '.list' 
					,itemPath: '.list-item' 
					,panelPath: '.jplist-panel'
					
					//save plugin state
					,storage: 'localstorage' //'', 'cookies', 'localstorage'			
					,storageName: 'jplist-div-layout'
				});
			});
	</script>
	<!-- productview page -->

	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
</div>
<span id="themesBtn"></span>
