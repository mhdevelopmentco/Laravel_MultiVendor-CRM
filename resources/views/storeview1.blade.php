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

	  <link href="plug-k/demo/css/bootstrap.css" rel="stylesheet">
    <link href="plug-k/demo/css/demo.css" rel="stylesheet">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo url(); ?>/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo url(); ?>/themes/css/base.css" rel="stylesheet" media="screen"/>
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
    <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/themes/css/slider-store/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/themes/css/slider-store/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/themes/css/slider-store/jquery.jscrollpane.css" media="all" />
	<style type="text/css" id="enject"></style>
	<style type="text/css">
		.carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* Reposition the controls slightly */
.carousel-control {
    left: -12px;
}
.carousel-control.right {
    right: -12px;
}
/* Changes the position of the indicators */
.carousel-indicators {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
}
/* Changes the colour of the indicators */
.carousel-indicators li {
    background: #c0c0c0;
}
.carousel-indicators .active {
background: #333333;
}
	</style>
<script src="<?php echo url(); ?>/themes/js/jquery-1.10.0.min.js"></script>
  </head>
<body>
<div id="header">
	{!! $navbar !!}
<div class="container">

<!-- Navbar ================================================== -->
	{!! $header !!}
</div>
</div>
<!-- Header End====================================================================== -->
<legend></legend>
<?php foreach($get_store_by_id as $get_store_details_id) { } ?>
<div class="container">
<div class="row">
	<div class="span5">
    <img src="<?php echo url(); ?>/assets/storeimage/<?php echo $get_store_details_id->stor_img;  ?>" width="450px;" height="485px">
  
   </div>
   	<div class="span6">
 <label class="og_text" style="font-size:15px;font-weight:bold"><?php echo $get_store_details_id->stor_name;  ?>,</label>
    <label ><?php echo $get_store_details_id->stor_address1;  ?>, </label>
    <label><?php echo $get_store_details_id->stor_address2;  ?>,  </label>
    <label>Zip : <?php echo $get_store_details_id->stor_zipcode;  ?> </label>
    <label>Mobile: <?php echo $get_store_details_id->stor_phone;  ?></label>
 <label>Website: <a class="deal_web_link og_text" target="blank" href="<?php echo $get_store_details_id->stor_website;  ?>"> <?php echo $get_store_details_id->stor_website;  ?></a></label>
 	<?php
								$product_count = $one_count + $two_count + $three_count + $four_count + $five_count;
								
			//echo $product_count;
			$multiple_countone = $one_count *1;
			
			$multiple_counttwo = $two_count *2;
			
			$multiple_countthree = $three_count *3;
			
			$multiple_countfour = $four_count *4;
			
			$multiple_countfive = $five_count *5;
			$product_total_count = $multiple_countone + $multiple_counttwo + $multiple_countthree + $multiple_countfour + $multiple_countfive;
			//echo $product_total_count;
			if($product_count)
			{
				$product_divide_count = $product_total_count / $product_count;
				if($product_divide_count <= '1')
	{
		?>
		
		<img src='<?php echo url('../images/stars-1.png'); ?>' style='margin-bottom:10px;'>Ratings
		<?php
	}
	elseif($product_divide_count >= '2')
	{
		?>
		<img src='<?php echo url('../images/stars-2.png'); ?>' style='margin-bottom:10px;'>Ratings
		<?php
	}
	elseif($product_divide_count >= '3')
	{
		?>
		<img src='<?php echo url('../images/stars-3.png'); ?>' style='margin-bottom:10px;'>Ratings
		<?php
		
	}
	elseif($product_divide_count >= '4')
	{
		?>
		<img src='<?php echo url('../images/stars-4.png'); ?>' style='margin-bottom:10px;'>Ratings
		<?php
	}
	elseif($product_divide_count >= '5')
	{
		?>
		<img src='<?php echo url('../images/stars-5.png'); ?>' style='margin-bottom:10px;'>Ratings
		<?php
	}
	else{
		echo "<br/>No Rating for this Store";
	}
			}
			elseif($product_count)
			{
				$product_divide_count = $product_total_count / $product_count;
			}
			else {echo "<br/>No Rating for this Store";}
			
			
			//echo $product_divide_count;
			
							?>
    
    
<div id="somecomponent" style="width: 500px; height: 300px;"></div>
    </div>
   	
</div>
</div>

<div id="mainBody">
	<div class="container">

<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->

 <center><h4><?php echo ucwords($get_store_details_id->stor_name);  ?>  &nbsp; <span style="color:red;">Products List</span></h4></center>
      <legend></legend>
<div class="row-fluid">
<?php if($get_store_product_by_id) { ?>	
     <?php foreach($get_store_product_by_id as $fetch_most_visit_pro) { 
	  $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;
			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);
			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);
			 $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
                                    $res = base64_encode($fetch_most_visit_pro->pro_id);
	 ?>

        <div class="span3  thumbnail" >
 <img alt="" src="<?php echo url(''); ?>/assets/product/<?php echo $mostproduct_img[0]; ?>" height="250px;">
        <a class="s_detail" href="#"><?php echo substr($fetch_most_visit_pro->pro_title,0,50);  ?>...</a>
        <legend></legend>
        <div class="row-fluid" style="padding-top:10px;">
                    <div class="span4"><b>$ <?php echo $fetch_most_visit_pro->pro_disprice;  ?> </b></div>
                             <?php 
									 
			
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
               <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                 	<center> <h4><a class="btn btn-warning" href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
             
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
			
               <?php } ?>
                    </div>                    
        </div>	
		<?php } } else { ?>	
     <h5 style="color:#933;" >No records found under <?php echo ucwords($get_store_details_id->stor_name);  ?> products.</h5>
        <?php } ?>
	  </div>
     
      
    <br>
 <center><h4><?php echo ucwords($get_store_details_id->stor_name);  ?> &nbsp; <span style="color:red;">Deals List</span></h4></center>
      <legend></legend>
	  <div class="row-fluid">	
        <?php if($get_store_deal_by_id) { ?>
     <?php foreach($get_store_deal_by_id as $store_deal_by_id) { 
	  $dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
			 $deal_img= explode('/**/', $store_deal_by_id->deal_image);
			 $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
             $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
			  $res = base64_encode($store_deal_by_id->deal_id);
	 ?>
        <div class="span3  thumbnail">
     <img src="<?php echo url(''); ?>/assets/deals/<?php echo $deal_img[0]; ?>" alt="">
       
        <h4> <a href="#" class="s_detail"><?php echo substr($store_deal_by_id->deal_title,0,50);  ?></a>	
        <label><?php echo substr($store_deal_by_id->deal_description,0,150);  ?></label>
					 </h4>
                     <legend></legend>
                    <div class="row-fluid">
                    <div class="span4"><b>$ <?php echo $store_deal_by_id->deal_discount_price;  ?></b></div>
                             <?php 
									 
			
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
               <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                 	<center> <h4><a class="btn btn-warning" href="{!! url('dealview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
             
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
               	<center> <h4><a class="btn btn-warning" href="{!! url('dealview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><i class="icon-large icon-shopping-cart icon_me"></i></a>
					 </center>
			
               <?php } ?>
                    </div>
        </div>	
        <?php } } else { ?>
      <h5 style="color:#933;" >No records found under <?php echo ucwords($get_store_details_id->stor_name);  ?> deals.</h5>
          <?php } ?>
	  </div>
      
    	<div class="container">
	<div class="row">

		<div class="span12">
		<h4>Branches</h4>
    	    <div class="well"> 
                <div id="myCarousel" class="carousel slide">
                 
              
                 
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <div class="item active">
                	<div class="row-fluid">
					
					<?php 
					foreach($get_storebranch as $row_store)
					{
						$store_img = $row_store->stor_img;
						$store_name = $row_store->stor_name;
					
					?>
                	  <div class="span3"><a href="#x"><img src="<?php echo url(); ?>/assets/storeimage/<?php echo $store_img;  ?>" alt="Image" style="max-width:100%;height:200px" /></a><br><br><?php echo $store_name; ?><br><br>
                	  <a href=""><button class="sub-but">View Details</button></a>
                	  	  
                	  </div>
					
					<?php } ?>
                	  
                	 
                	  
                	</div><!--/row-fluid-->
                </div><!--/item-->
                 
                </div><!--/carousel-inner-->
                 
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">???</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">???</a>
                </div><!--/myCarousel-->
                 
            </div><!--/well-->   
		</div>
	</div>
</div>
      
      
      
      
     
     <?php
					 
				if(Session::has('customerid'))
		{
			
			?>

                                  
<div style="border-radius:3px; border:1px solid #ccc;">
<h4 style="padding-left:13px;">Write a post comments</h4>
                             	<div class="row"><div class="span5">
								
									 {!! Form::open(array('url'=>'storecomments','class'=>'form-horizontal loginFrm')) !!}
									 <input type="hidden" name="customer_id" value="<?php echo Session::get('customerid');?>">
                                            <input type="hidden" name="store_id" value="{!!$get_store_details_id->stor_id!!}">
       
        <div class="form-group">
          <div class="control-group">
           
              <input type="text" placeholder="Enter Comment Title" name="title" class="input-xlarge" style="width:95%"required/>
           
          </div>
          </div>
       
       
          <div class="control-group">
              <textarea rows="5"  name="comments" class="input-xlarge" style="width:100%" placeholder="Enter Comments Queries" required></textarea>
           
          </div>
		  <div class="control-group">
 <input type="radio" name="ratings" value="1" required>1 Star
                                                            <input type="radio" name="ratings" value="2" required>2 Star
                                                            <input type="radio" name="ratings" value="3" required>3 Star
                                                            <input type="radio" name="ratings" value="4" required>4 Star
                                                            <input type="radio" name="ratings" value="5" required>5 Star<br><br>
															</div>
															<div class="control-group">
    <input type="submit" class="btn btn-large me_btn btnb-success" value="Post Comments" style="background: #2F3234;
    border-radius: 0px;"></div>
	
                 
       
      </form>
	  
	  </div></div></div>
	  <br class="clr">
									<h4>Reviews</h4>
<?php 
if($product_count>=1)
{
											
											foreach($customer_details as $col)
			{
				$customer_name = $col->cus_name;
				$customer_mail = $col->cus_email;
				$customer_img = $col->cus_pic;
				$customer_comments = $col->comments;
				$customer_date = $col->created_date;
				$customer_product = $col->store_id;
				$change_format = date('d/m/Y', strtotime($col->created_date) );
				$customer_title = $col->title;
				$customer_name_arr = str_split($customer_name);
				$start_letter = $customer_name_arr[0];
				$customer_ratings = $col->ratings;
				$date_exp=explode('/',$change_format);
				//$date_exp[0];
				$date_date = $date_exp[0];
				$date_month = $date_exp[1];
				$date_year = $date_exp[2];
				
				                                
			if($customer_product==$get_store_details_id->stor_id)
											{	
			?>
			<div class="commentlist">
			<?php if($start_letter =='a')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='b')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='c')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='d')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='e')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='f')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='g')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='h')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='i')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='j')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='k')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='m')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='n')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='o')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='p')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='q')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='r')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='s')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='t')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='u')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='v')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='w')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='x')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='y')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='z')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			else{
				
			}
			?>
				
                        <center><span class="_reviewUserName" title="Prateek" style="text-transform:capitalize;"><?php echo $customer_name; ?></span></center>
                        
                        </div>
                        <div class="text">
                        <div class="user-review">
						<?php
						if($date_month=='01')
						{
							$month = 'Jan';
						}
						elseif($date_month=='02')
						{
							$month = 'Feb';
						}
						elseif($date_month=='03')
						{
							$month = 'March';
						}
						elseif($date_month=='04')
						{
							$month = 'April';
						}
						elseif($date_month=='05')
						{
							$month = 'May';
						}
						elseif($date_month=='06')
						{
							$month = 'June';
						}
						elseif($date_month=='07')
						{
							$month = 'July';
						}
						elseif($date_month=='08')
						{
							$month = 'Agu';
						}
						elseif($date_month=='09')
						{
							$month = 'Sep';
						}
						elseif($date_month=='10')
						{
							$month = 'Oct';
						}
						elseif($date_month=='11')
						{
							$month = 'Nov';
						}
						elseif($date_month=='12')
						{
							$month = 'Dec';
						}
						else{
							
						}
						
						?>
                            <div class="date LTgray"><b><?php echo $month; ?> - <?php echo $date_date; ?> - <?php echo $date_year; ?></b></div>
							<?php
							if($customer_ratings=='1')
							{
								?>
								<img src='<?php echo url('../images/stars-1.png'); ?>' style='margin-bottom:10px;'>Ratings
								
								
								<?php
							}
							elseif($customer_ratings=='2')
							{
								?>
								<img src='<?php echo url('../images/stars-2.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='3')
							{
								?>
								<img src='<?php echo url('../images/stars-3.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='4')
							{
								?>
								<img src='<?php echo url('../images/stars-4.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='5')
							{
								?>
								<img src='<?php echo url('../images/stars-5.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							else {}
							?>
                            
                            <div class="head"><?php echo $customer_title; ?></div>
                           
<span style="font-weight:bold"><?php echo $customer_comments; ?></span></p>
                        </div>
                        
                    </div>
			</div>
<?php !!} }else{?>No Review Ratings.<br>
<?php
				 if(Session::has('customerid'))
		{?>
	
				<div style="display:none;"><a class="btn btn-orange  btn-line rippleWhite js-userReviewed" href="#login" role="button" data-toggle="modal" style="padding-right:0;height: 137px; width: 137px; top: -35.5px; left: 16.375px;" id="login_a_click"  value="Login">Write a Review</a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" class="btn btn-orange  btn-line rippleWhite js-userReviewed" role="button" data-toggle="modal" style="padding-right:0; float:left;" id="login_a_click"  value="Login">Write a Review</a>
			<?php
		}
		?>
<?php }?>
<br>
                                    <?php } else {
			?>
		<h4>Reviews</h4><h4><span style="margin-top:-33px; float:right;"><a class="btn btn-orange  btn-line rippleWhite js-userReviewed" href="#login" role="button" data-toggle="modal" id="login_a_click"  value="Login">Write a Review</a></span></h4>
<?php 
if($product_count>=1)
{
											
											foreach($customer_details as $col)
			{
				$customer_name = $col->cus_name;
				$customer_mail = $col->cus_email;
				$customer_img = $col->cus_pic;
				$customer_comments = $col->comments;
				$customer_date = $col->created_date;
				$customer_product = $col->store_id;
				$change_format = date('d/m/Y', strtotime($col->created_date) );
				$customer_title = $col->title;
				$customer_name_arr = str_split($customer_name);
				$start_letter = $customer_name_arr[0];
				$customer_ratings = $col->ratings;
				$date_exp=explode('/',$change_format);
				//$date_exp[0];
				$date_date = $date_exp[0];
				$date_month = $date_exp[1];
				$date_year = $date_exp[2];
			if($customer_product==$get_store_details_id->stor_id)
											{	
			?>
			<div class="commentlist">
			<?php if($start_letter =='a')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='b')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='c')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#fba565; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='d')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='e')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='f')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='g')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='h')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='i')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='j')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='k')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='m')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='n')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='o')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='p')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='q')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='r')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='s')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='t')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='u')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='v')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='w')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='x')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='y')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			elseif($start_letter=='z')
			{
				echo "<div class='userimg'><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</span>";
			}
			else{
				
			}
			?>
				
                        <center><span class="_reviewUserName" title="Prateek" style="text-transform:capitalize;"><?php echo $customer_name; ?></span></center>
                        
                        </div>
                        <div class="text">
                        <div class="user-review">
						<?php
						if($date_month=='01')
						{
							$month = 'Jan';
						}
						elseif($date_month=='02')
						{
							$month = 'Feb';
						}
						elseif($date_month=='03')
						{
							$month = 'March';
						}
						elseif($date_month=='04')
						{
							$month = 'April';
						}
						elseif($date_month=='05')
						{
							$month = 'May';
						}
						elseif($date_month=='06')
						{
							$month = 'June';
						}
						elseif($date_month=='07')
						{
							$month = 'July';
						}
						elseif($date_month=='08')
						{
							$month = 'Agu';
						}
						elseif($date_month=='09')
						{
							$month = 'Sep';
						}
						elseif($date_month=='10')
						{
							$month = 'Oct';
						}
						elseif($date_month=='11')
						{
							$month = 'Nov';
						}
						elseif($date_month=='12')
						{
							$month = 'Dec';
						}
						else{
							
						}
						
						?>
                            <div class="date LTgray"><b><?php echo $month; ?> - <?php echo $date_date; ?> - <?php echo $date_year; ?></b></div>
							<?php
							if($customer_ratings=='1')
							{
								?>
								<img src='<?php echo url('../images/stars-1.png'); ?>' style='margin-bottom:10px;'>Ratings
								
								
								<?php
							}
							elseif($customer_ratings=='2')
							{
								?>
								<img src='<?php echo url('../images/stars-2.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='3')
							{
								?>
								<img src='<?php echo url('../images/stars-3.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='4')
							{
								?>
								<img src='<?php echo url('../images/stars-4.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							elseif($customer_ratings=='5')
							{
								?>
								<img src='<?php echo url('../images/stars-5.png'); ?>' style='margin-bottom:10px;'>Ratings
								<?php
							}
							else {}
							?>
                            
                            <div class="head"><?php echo $customer_title; ?></div>
                           
<span style="font-weight:bold"><?php echo $customer_comments; ?></span></p>
                        </div>
                        
                    </div>
			</div>
<?php !!} }else{?>No Review Ratings.<br>
<?php
				 if(Session::has('customerid'))
		{?>
				<div style="display:none;"><a class="btn btn-orange  btn-line rippleWhite js-userReviewed" href="#login" role="button" data-toggle="modal" style="padding-right:0;" id="login_a_click"  value="Login">Write a Review</a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" class="btn btn-orange  btn-line rippleWhite js-userReviewed" role="button" data-toggle="modal" style="padding-right:0; float:left;" id="login_a_click"  value="Login">Write a Review</a>
			<?php
		}
		?>
<?php }?>
<br>
									<?php } ?>
      
    
</div>
<!-- Footer ================================================================== -->

	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	 <script src="plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script> 
    
    
    <script src="plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="plug-k/demo/js/demo.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo url(); ?>/themes/js/slider-store/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript">
			$(document).ready(function() {
    $('#myCarousel').carousel({
	    interval: 10000
	})
});
		</script>
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
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
<script type="text/javascript" src="<?php echo url(); ?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url(); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">
    
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:false,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
    });
    
    </script>
 <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="<?php echo url(); ?>/assets/js/locationpicker.jquery.js"></script>
    <script>
	$('#somecomponent').locationpicker({
	location: {latitude: <?php echo  $get_store_details_id->stor_latitude;?>, longitude: <?php echo  $get_store_details_id->stor_longitude;?>},
	radius: 300,
	zoom: 12,
	});
	</script>
</body>
</html>
