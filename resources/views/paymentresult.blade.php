<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
     <?php
	
	if($get_meta_details){
	 foreach($get_meta_details as $meta_details) { } 
	 
	$mtitle= $meta_details->gs_metatitle;
	 $mdetails=$meta_details->gs_metadesc;
	 $mkey=$meta_details->gs_metakeywords;
	}
	else
	{
		$mtitle="";
	 $mdetails="";
	 $mkey="";
		
	}
	 ?>
     <title><?php echo $mtitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $mdetails; ?>">
    <meta name="keywords" content="<?php echo $mkey;  ?>">
    <meta name="author" content="">
	  <link href="<?php echo url('');?>/plug-k/demo/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo url('');?>/plug-k/demo/css/demo.css" rel="stylesheet">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url('');?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <?php foreach($general as $gs) {} if($gs->gs_themes == 'blue') { ?>
    <link href="<?php echo url(); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
    <?php } elseif($gs->gs_themes == 'green') { ?>
    <link href="<?php echo url(); ?>/themes/css/green-theme.css" rel="stylesheet" media="screen"/>
    <?php } ?>
<!-- Bootstrap style responsive-->	
	<link href="<?php echo url('');?>/themes/css/planing.css" rel="stylesheet"/>
	<link href="<?php echo url('');?>/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo url('');?>/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo url('');?>/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
<?php 
/*if($get_image_favicons_details)
{

foreach($get_image_favicons_details as $favicon_images) { 

$favimgpath="/assets/favicon/".$favicon_images->imgs_name;

} 

}
else
{*/
$favimgpath="/assets/favicon/ecartfavicon.ico";
//}
?>
    <link rel="shortcut icon" href="<?php echo url().$favimgpath; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo url('');?>/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <link href="<?php echo url(''); ?>/themes/css/leftmenu.css" rel="stylesheet" media="screen"/>
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div class="se-pre-con"></div>
<div id="header">
{!! $navbar !!}

<!-- Navbar ================================================== -->
{!! $header !!}

</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div class="span3" id="sidebar">
		<div class="well well-small btn-warning"><strong>Categories </strong></div>
				<ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>
<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>

<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
	<ul>    
    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
    <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?></a>
		
		<ul>
                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>                  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
					<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?></a>
                   
                    <ul>
                    <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>                        
                        <li class="subthird"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id4); ?>"><?php echo $fetch_secsub_cat->ssb_name ?></a></li>                                        
                     <?php } ?>
                      </ul>
                      <?php } ?>
                    </li>
				<?php } ?>
				</ul>
                <?php } ?>
        </li>
        <?php } ?>
	</ul>
    <?php } ?>
    </li>
      <?php } ?>
</ul><br/>
		  <div class="clearfix"></div>
		<br/>
         <div class="well well-small btn-warning"><strong>Specials</strong></div>
          <?php foreach($most_visited_product as $fetch_most_visit_pro) {
			  if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty){
			   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
			  ?>
          <div class="thumbnail" style="width:95%" >
			<img  src="<?php echo url(''); ?>/assets/product/<?php echo $mostproduct_img[0]; ?>" alt="<?php echo $fetch_most_visit_pro->pro_title; ?>"/>
			<div class="caption product_show">
				<h4 class="top_text dolor_text">$<?php echo $fetch_most_visit_pro->pro_disprice;  ?></h4>
					  <h5 class="prev_text"><?php echo substr($fetch_most_visit_pro->pro_title,0,50);  ?>...</h5>
					 <h4><a class="btn btn-warning" href="{!! url('product_list').'/'.$fetch_most_visit_pro->pro_id!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </h4>
					</div>
		  </div><br/>
			<?php } }?>
			
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?php echo url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Payment Result </li>
    </ul>
	<div class="span4" style="margin:0px">
    
    @if (Session::has('result'))
    <h4>  Your Payment Process Successfully completed ..Please Note the Transaction Details</h5>	
    @endif
       @if (Session::has('fail'))
    <h4>  Your Payment Process failed..</h5>	
    @endif
	 @if (Session::has('error'))
    <h4>  Your Payment Process  has been stopped Due to Some error...</h5>	
    @endif
    
    </div>

    
    <div class="clearfix"></div>
	<hr class="soft"/>
		 <h5> Transaction Details</h5>	
			<h6>Thank You For Shopping with Laravel Ecommerce.</h6>
	<table class="table table-bordered">
              <thead>
                <tr>
                <th>Payer_Name</th>
                  <th>TransactionId</th>
                  <th>TokenId</th>
                  <th>Payer_Email</th>
                  <th>Payer_Id</th>
                  <th>Acknowledgement</th>
                   <th>PayerStatus</th>
				</tr>
              </thead>
              <tbody>
           
			 <?php  
			  if($orderdetails)
				{ 
				foreach($orderdetails as $orderdet) {?>
				 
                 <tr>
                <td><?php echo $orderdet->payer_name;?></td>
                  <td><?php echo $orderdet->transaction_id;?> </td>
                  <td><?php echo $orderdet->token_id;?></td>
                  <td><?php echo $orderdet->payer_email;?></td>
                  
                   <td><?php echo $orderdet->payer_id;?></td>
                  <td><?php echo $orderdet->payment_ack; ?></td>
                   <td><?php echo $orderdet->payer_status; ?></td>
           
                </tr>
		  <?php  } }?>
				</tbody>
            </table>
		
        
        
        
  <h5> Product Details for Current Transaction </h5>	
                
                <table class="table table-bordered">
              <thead>
                <tr>
                <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Amount</th>
                
				</tr>
              </thead>
              <tbody>
		
				
				<?php  if($orderdetails)
				{ 
				foreach($orderdetails as $orderdet) {
					
					
					
					//$taxamount=($orderdet->order_amt*$orderdet->pro_tax_percentage)/100;
					if($orderdet->order_type == 1)
					{
						$shipamt = $orderdet->pro_shippamt;
						$taxamount=($orderdet->order_amt*$orderdet->pro_inctax)/100;
					}
					else
					{
						$shipamt = 0;
						$taxamount=0;
					}
					 ?>
				
				  <tr>
               	  <td><?php if($orderdet->order_type == 1){ echo $orderdet->pro_title; } else { echo $orderdet->deal_title;}?></td>
                  <td><?php echo $orderdet->order_qty  ;?> </td>
                  <td><?php echo $orderdet->order_amt + $shipamt + $taxamount ;?></td>
      			 </tr>
				<?php }
				
				 
				} ?>
                	</tbody>
            </table>
         
	<h4>		
	 
	</h4>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	
    	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
		<script src="<?php echo url('');?>/themes/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo url('');?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url('');?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url('');?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url('');?>/themes/js/jquery.lightbox-0.5.js"></script> 
    
    <script src="<?php echo url('');?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
    <script src="<?php echo url('');?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo url('');?>/plug-k/demo/js/demo.js" type="text/javascript"></script>
	

<script type="text/javascript" src="<?php echo url('');?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url('');?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">
    
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
    });
    
    </script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</body>
</html>