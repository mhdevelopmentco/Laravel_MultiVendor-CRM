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
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <link href="<?php echo url(); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php } elseif($gs->gs_themes == 'green') { ?>
    <link href="<?php echo url(); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
    <?php } ?>
<!-- Bootstrap style responsive-->	
	<link href="<?php echo url(); ?>/themes/css/planing.css" rel="stylesheet"/>
	<link href="<?php echo url(); ?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo url(); ?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo url(); ?>/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url(); ?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="">
    <?php foreach($get_image_logoicons_details as $logo) { } ?>
    <a class="brand" href="index"><img src="<?php echo url(); ?>/themes/images/logo2.png" alt="Nexcart"></a>
		<div class="pull-right " style="padding-top:10px; padding-left:25px">
    
        
    </div>
        
    
    
    <br>
    <ul id="topMenu" class="nav pull-right" style="background:#ff8400;width:70%;">
	 <li><a href="index.html"></a></li>
	 <li><a href="products.html"></a></li>
     <li class=""><a href="deals.html"></a></li>
     <li class=""><a href="auction.html"></a></li>
     <li class=""><a href="#"></a></li>     
     <li class=""><a href="#"></a></li>
	 <li class="active"><a href="contact.html"></a></li>
	
    </ul>
    
  </div>
</div>
</div>

</div>
<legend></legend>

<!-- Header End====================================================================== -->

<div class="container">
<?php foreach($get_acution_details as $auction_detail) { } 
		$product_image = explode('/**/',$auction_detail->auc_image);
  $date1 = date('Y-m-d H:i:s');
  $date2 = $auction_detail->auc_end_date;
  $ts1 = strtotime($date1);
  $ts2 = strtotime($date2);
  $seconds_diff = $ts2 - $ts1;
  $countdown_timing =  floor($seconds_diff/3600/24);
		?>
    <div class="row-fluid">
    <div class="span5"><h4 style="color:#ff8400;">Congratulations!<span style="color:#333;">&nbsp;&nbsp;Your bid was placed successfully.!</span></h4></div>
     <div class="span6"> <h3 class="plce_text">You'll receive an email confirmation shortly</h3></div>
    </div>
	<div class="row">
		<div class="span4 thumbnail">
		
        
        <img src="<?php echo url(); ?>/assets/auction/<?php echo $product_image[0]; ?>"></div>
		
		
		<div class="span7">
       
		<div class="span7 thumbnail form_place">
     
       <center> <table>
        <tr>
        <td  width="150" height="30">Your bid amount</td>
        <td  width="100" height="30">:</td>
        <td  width="100" height="30" style="color:#FF9C0E; font-weight:bold" >$<?php echo $price; ?></td>
        </tr>
           <tr>
        <td>Estimated shipping charge </td>
        <td>:</td>
        <td style="color:#FF9C0E;font-weight:bold">$<?php echo $auction_detail->auc_shippingfee; ?></td>
        </tr>
         <tr>
        
        </table>      
           
          <div id="countdown" class="countdownHolder span12" style="padding-left:100px;" ></div><br/><br/><br/>
		
                     <center><h5>Auction time remaining</h5></center>
                     <center><a href="<?php echo $return_url;?>"><button class="btn  btn-warning" id="bid_update">Close window</button></a></center>
       <br>
        </center>
    
       
		
		</div>
	</div>
	
</div><!---->
<br>
<legend></legend>
<ul class="done_text">
<li><label>If no alternative information is provided within 24 hours of the auction closing the winning bidder's default credit card and billing address will be used to ship the winnings.</label></li>
<li><label>Your credit card will NOT be charged until the auction ends and we will only charge the minimum amount needed to win.</label></li>
<li><label>A 3% transaction fee with $1.99 minimum and a $9.99 maximum will be added per order if you win.</label></li>
<li><label>If your order is cancelled due to a credit card decline, a $25 fee will be assessed.</label></li>
<li><label>Applicable sales tax will be added to Illinois ;  Tennessee orders. </label></li>
</ul>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
 <script src="<?php echo url(''); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
   
	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="<?php echo url(); ?>/themes/css/jquery.countdown.css" />
		<script src="<?php echo url(); ?>/themes/js/jquery.countdown.js"></script>
      
       <!-- Count Down Coding -->
		<script>
        $(function(){
		var cnt_tmg = '<?php echo $countdown_timing; ?>';
	var note = $('#note'),
		ts = new Date(2012, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + cnt_tmg*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts
		
	});
	
});
        </script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="<?php echo url(); ?>/themes/css/#" name="bootshop"><img src="<?php echo url(); ?>/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="<?php echo url(); ?>/themes/css/#" name="businessltd"><img src="<?php echo url(); ?>/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="<?php echo url(); ?>/themes/css/#" name="amelia" title="Amelia"><img src="<?php echo url(); ?>/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spruce" title="Spruce"><img src="<?php echo url(); ?>/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="superhero" title="Superhero"><img src="<?php echo url(); ?>/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cyborg"><img src="<?php echo url(); ?>/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="cerulean"><img src="<?php echo url(); ?>/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="journal"><img src="<?php echo url(); ?>/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="readable"><img src="<?php echo url(); ?>/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="<?php echo url(); ?>/themes/css/#" name="simplex"><img src="<?php echo url(); ?>/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="slate"><img src="<?php echo url(); ?>/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="spacelab"><img src="<?php echo url(); ?>/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="united"><img src="<?php echo url(); ?>/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern1"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern2"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern3"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern4"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern5"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern6"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern7"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern8"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern9"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern10"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern11"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern12"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern13"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern14"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern15"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern16"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern17"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern18"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern19"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="<?php echo url(); ?>/themes/css/#" name="pattern20"><img src="<?php echo url(); ?>/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>