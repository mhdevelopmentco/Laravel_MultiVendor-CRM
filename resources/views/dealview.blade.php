<body>
{!! $navbar !!}

<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3 pull-right">
		<div class="well well-small btn-warning"><strong>Related Deals</strong></div>
		<div class="row">
		<ul class="thumbnails">
					
					<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
	$product_image = explode('/**/',$product_det->deal_image);
	
	
	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
                $res = base64_encode($product_det->deal_id);
	?>
			<li class="span3">
			  <div class="thumbnail" style="width:100%;">
				 <!-- <i class="tag"><?php //echo round($product_det->deal_discount_percentage);?>%</i>-->
				  
	
				  
					<a href="<?php echo url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><img alt="" src="<?php echo url('assets/deals/').'/'.$product_image[0];?>" style="height:215px;" ></a>
					<div class="caption product_show">
					<h3 class="prev_text"><?php echo $product_det->deal_title;?></h3>
				<h4 class="top_text dolor_text">$<?php echo $product_det->deal_discount_price;?></h4>
					  
					  <h4><a href="<?php echo url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>" class="btn align_brn btnb-success"><i class="icon-large icon-shopping-cart icon_me"></i></a></h4>
					</div>
				  </div>
			</li>
            <?php } }else{ ?>
         <li class="span3">
			  <div class="thumbnail">
					No Deal's Available
					
				  </div>
			</li>
             <?php } ?>
					
					
					
					
				  </ul>
				  </div>
		<br>
		  <div class="clearfix"></div>
		<br/>
         
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9 pull-left tab-land-wid">
 <div class="clearfix"></div>
    <ul class="breadcrumb">
    <?php foreach($product_details_by_id as $pro_details_by_id) { }
  $product_img= explode('/**/',trim($pro_details_by_id->deal_image,"/**/"));	
  $img_count = count($product_img);
  $date2 = $pro_details_by_id->deal_end_date;
  $deal_end_year = date('Y',strtotime($date2));
  $deal_end_month = date('m',strtotime($date2));
  $deal_end_date = date('d',strtotime($date2));
  $deal_end_hours = date('H',strtotime($date2));  
  $deal_end_minutes = date('i',strtotime($date2));    
  $deal_end_seconds = date('s',strtotime($date2));      
 ?>
    <li><a href="<?php echo url('index');?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo url('deals');?>">Deals</a> <span class="divider">/</span></li>
    <?php foreach($breadcrumb as $fetch_main_cat) { //print_r($fetch_main_cat); exit; 
	$pass_cat_id1 = "1,".$fetch_main_cat->deal_category; 
	$pass_cat_id2 = "2,".$fetch_main_cat->deal_main_category;
	$pass_cat_id3 = "3,".$fetch_main_cat->deal_sub_category;
	$pass_cat_id4 = "4,".$fetch_main_cat->deal_second_sub_category;//echo $pass_cat_id1; exit;?>
     <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name != '' && $pro_details_by_id->ssb_name != '') { ?>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id3).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->sb_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id4).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->ssb_name)); ?></a> <span class="divider">/</span></li>
 <?php } ?>
 <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name != '' && $pro_details_by_id->ssb_name == '') { ?>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id3).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->sb_name)); ?></a> <span class="divider">/</span></li>
 <?php } ?>
 <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name == '' && $pro_details_by_id->ssb_name == '') { ?>
  <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catdeals/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
    
  <?php } } ?>
    <li class="active"><?php echo  $pro_details_by_id->deal_title; ?></li>
    </ul>		  

	<div class="row">		
    
      <div class="span3 tabland-deal-img">
            	<a id="Zoomer3"  href="{!! url('assets/deals/').'/'.$product_img[0]!!}" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="<?php echo  $pro_details_by_id->deal_title; ?>"><img src="{!! url('assets/deals/').'/'.$product_img[0]!!}"/></a> <br/>
 <?php for($i=0;$i < $img_count;$i++) { ?>
        <a href="{!! url('assets/deals/').'/'.$product_img[$i]!!}" rel="zoom-id: Zoomer3" rev="{!! url('assets/deals/').'/'.$product_img[$i]!!}"><img src="{!! url('assets/deals/').'/'.$product_img[$i]!!}" style="width:85px; height:auto"/></a>
 <?php } ?>
            </div>
            
            
			<div class="deal-wid left_bor">
				<h3 style="padding: 10px 0 0 10px;"><?php echo $pro_details_by_id->deal_title; ?></h3>
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
					<img src='<?php echo url('../images/stars-1.png'); ?>' style='margin-bottom:10px;style="padding: 10px 0 0 10px;"'>Ratings
				<?php }
				elseif($product_divide_count >= '1')
	{
		?>
		
		<img src='<?php echo url('../images/stars-1.png'); ?>' style='margin-bottom:10px;style="padding: 10px 0 0 10px;"'>Ratings
		<?php
	}
	elseif($product_divide_count >= '2')
	{
		?>
		<img src='<?php echo url('../images/stars-2.png'); ?>' style='margin-bottom:10px;padding: 10px 0 0 10px;'>Ratings
		<?php
	}
	elseif($product_divide_count >= '3')
	{
		?>
		<img src='<?php echo url('../images/stars-3.png'); ?>' style='margin-bottom:10px;padding: 10px 0 0 10px;"'>Ratings
		<?php
		
	}
	elseif($product_divide_count >= '4')
	{
		?>
		<img src='<?php echo url('../images/stars-4.png'); ?>' style='margin-bottom:10px;padding: 10px 0 0 10px;'>Ratings
		<?php
	}
	elseif($product_divide_count >= '5')
	{
		?>
		<img src='<?php echo url('../images/stars-5.png'); ?>' style='margin-bottom:10px;padding: 10px 0 0 10px;'>Ratings
		<?php
	}
	else{
		echo "<br/><span style='padding: 10px 0 0 10px;'>No Rating for Product</span>";
	}
			}
			elseif($product_count)
			{
				$product_divide_count = $product_total_count / $product_count;
			}
			else {echo "<br/><span style='padding: 10px 0 0 10px;'>No Rating for this Deal Product</span>";}
			
			
			//echo $product_divide_count;
			
							?>
							<?php $date = date('Y-m-d H:i:s');
                             //echo $date;
							foreach ($product_details_by_id as $row) {}
								//echo $row->deal_end_date;
                
             if($row->deal_end_date < $date){?>
              </h1>
                
                <div class="row-fluid" style="border-bottom:1px solid #ddd;">
                <div class="span7">
               <br>
                <p><strike class="srt">$ <?php echo $pro_details_by_id->deal_original_price; ?></strike>  <span class="bold" style="#026EA5 !important">$  <?php echo $pro_details_by_id->deal_discount_price; ?></span></p>
                </div>

                {!! Form :: open(array('url' => 'addtocart_deal','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
                <input type="hidden" name="addtocart_deal_id" value="<?php echo $pro_details_by_id->deal_id; ?>" />
                <input type="hidden" name="addtocart_type" value="deals" />
                <input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->deal_category))); ?>" />
                <div class="span8 rank" style="margin-bottom:10px">

                <span class="out-of-stock"> Out Of Stock</span>
                
                </div>
                </form>

<?php } else{ ?>
                <!-- ///////////////////////////////////// -->

                <label><h4 style="padding: 10px 0 0 10px;"><span style="color:red;"><?php echo  $pro_details_by_id->deal_no_of_purchase; ?> Sold / 
                </span><span style="color:green;"><?php echo  $pro_details_by_id->deal_max_limit; ?></span><a href="#" class="gift_text"></a></h4></label></h1>
                 <span class="ang_text">(<?php echo $pro_details_by_id->deal_discount_percentage; ?>% Offer)</span>
                <div class="row-fluid" style="border-bottom:1px solid #ddd;">
                <div class="span7">
               <br>
                <p><strike class="srt">$ <?php echo $pro_details_by_id->deal_original_price; ?></strike>  <span class="bold" style="#026EA5 !important">$  <?php echo $pro_details_by_id->deal_discount_price; ?></span></p>
                </div>

                {!! Form :: open(array('url' => 'addtocart_deal','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
                <input type="hidden" name="addtocart_deal_id" value="<?php echo $pro_details_by_id->deal_id; ?>" />
                <input type="hidden" name="addtocart_type" value="deals" />
                <input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->deal_category))); ?>" />
                <div class="span8 rank" style="margin-bottom:10px">
                <label class="control-label" style="font-size:18px;">Quantity: </label> 
              	<select class="form-control span3 res-qty" name="addtocart_qty" id="addtocart_qty" style="margin-left: -42px;
    margin-right: 18px;
    margin-bottom: 10px;">

                <?php 
				$cont_qty1 = $pro_details_by_id->deal_max_limit - $pro_details_by_id->deal_no_of_purchase;
				if($cont_qty1 > 10 ) { $cont_qty = 10; } else { $cont_qty = $cont_qty1; }
				for($k=1; $k <= $cont_qty; $k++)
				{
				?>
                	<option value="<?php echo $k; ?>" ><?php echo $k; ?></option>
                  <?php } ?>
                </select>              <span id="addtocart_qty_error" style="color:red;" ></span>
                <button class="btn btn-large btn-primary  me_btn btnb-success" type="submit" id="add_to_cart_session"> Add to cart <i class=" icon-shopping-cart"></i></button>
                
              
           
                </div>
                </form>
                </div>
<?php }?>
                <div class="span12 disc_box">
                <ul>
               <li><div class="box1">
               <p>Value</p>
               <span>$ <?php echo $pro_details_by_id->deal_original_price; ?></span>
               </div>
               </li>
                 <li><div class="box1">
               <p>Dicount</p>
               <br>
               <span>$ <?php echo $pro_details_by_id->deal_discount_price; ?></span>
               </div>
               </li>
                 <li><div class="box1">
               <p>Save you</p>
               <span>$ <?php echo $pro_details_by_id->deal_original_price - $pro_details_by_id->deal_discount_price; ?></span>
               </div>
               </li>
               <div class="row-fluid">
               <div class="span6 pull-right res-flo">
               <div id="countdown" class="countdownHolder span12"></div>
               </ul>
              </div>
                
              </div>
                </div>
              
              
                    <span class="dolor_text"></span>
                    
			</div>
           
            
			
			
          <div class="span9 pull-left tab-land-wid" style="margin-top:20px;">
<div class="table-responsive">
            <table class="table table-bordered">
				<tbody>

					<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Product Information</th></tr>
    	<tr><td><?php echo $pro_details_by_id->deal_description; ?></td>
				
				</tr>
    </tbody>
				</table>
         <table class="table table-bordered">
				<tbody>
					<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Store Details</th></tr>
    	<tr><td><div class="span3">
    	<h4></h4>
    <div id="us3" style="width: 100% !important; height: 240px;margin-bottom:10px;"></div>
    </div></td>
<td><div class="span4">
    	<?php
foreach($get_store as $storerow)
{
	
	$store_name = $storerow->stor_name;
	$store_address = $storerow->stor_address1;
	$store_address2 = $storerow->stor_address2;
	$store_zip = $storerow->stor_zipcode;
	$store_phone = $storerow->stor_phone;
	$store_web = $storerow->stor_website;
	$store_lat = $storerow->stor_latitude;
	$store_lan = $storerow->stor_longitude;
?>
<a title="View Store" target="_blank" href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($storerow->stor_id)))); ?>"> 
<h4><?php echo $store_name; ?></h4></a>
<?php echo $store_address; ?>.,<br>
<?php echo $store_address2; ?>.,<br>
<?php echo $store_zip; ?>,<br>
Mobile: <?php echo $store_phone; ?><br>
Website: <a href="<?php echo $store_web; ?>"><?php echo $store_web; ?></a>
<?php }

?>
    </div></td>				
				</tr>
    </tbody>
				</table>
</div>
				<?php
					 
				if(Session::has('customerid'))
		{
			
			?>

                                  
<div style="border-radius:3px; border:1px solid #ccc;">
<h4 style="padding-left:13px;">Write a post comments</h4>
                             	<div class="row"><div class="span5">
								
									 {!! Form::open(array('url'=>'dealcomments','class'=>'form-horizontal loginFrm')) !!}
									 <input type="hidden" name="customer_id" value="<?php echo Session::get('customerid');?>">
                                            <input type="hidden" name="deal_id" value="{!!$pro_details_by_id->deal_id!!}">
       
        <div class="form-group">
          <div class="control-group">
           
              <input type="text" placeholder="Enter Comment Title" name="title" class="input-xlarge" style="width:100%"required/>
           
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
				$customer_product = $col->deal_id;
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
				
				                                
			if($customer_product==$pro_details_by_id->deal_id)
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
<?php } } }else{?>No Review Ratings.<br>
<?php
				 if(Session::has('customerid'))
		{?>
				<div style="display:none;"><a href="#login" class="btn btn-orange  btn-line rippleWhite js-userReviewed" role="button" data-toggle="modal" style="padding-right:0;" id="login_a_click"  value="Login">Write a Review</a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a class="btn btn-orange  btn-line rippleWhite js-userReviewed" href="#login" role="button" data-toggle="modal" style="padding-right:0; float:left;" id="login_a_click"  value="Login">Write a Review</a>
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
				$customer_product = $col->deal_id;
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
			if($customer_product==$pro_details_by_id->deal_id)
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
<?php } } }else{?>No Review Ratings.<br>

<?php }?>
<br>
									<?php } ?>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	  <script src="themes/js/jquery-1.10.0.min.js"></script>
	{!! $footer !!}

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>
	
      <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/jquery.js"></script>
<script src="<?php echo url(''); ?>/themes/js/magiczoomplus.js" type="text/javascript"></script>
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="<?php echo url(); ?>/themes/css/jquery.countdown.css" />
		<script src="<?php echo url(); ?>/themes/js/jquery.countdown.js"></script>
      
       <!-- Count Down Coding -->
		<script type="text/javascript">

year = <?php echo $deal_end_year;?>; month = <?php echo $deal_end_month;?>; day = <?php echo $deal_end_date;?>;hour= <?php echo $deal_end_hours;?>; min= <?php echo $deal_end_minutes;?>; sec= <?php echo $deal_end_seconds;?>;

     <?php $date = date('Y-m-d H:i:s');
	  foreach($product_details_by_id as $store_deal_by_id) { 
		
		 if($date > $store_deal_by_id->deal_end_date) {
		 $sold_deal_error = 1;
	  	 //$dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
		 //$deal_img= explode('/**/', $store_deal_by_id->deal_image);
             $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
             $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
	     $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
	     $res = base64_encode($store_deal_by_id->deal_id);
	 ?>

        



     
       <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<h4> <a href="{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" class="s_detail"><?php echo substr($store_deal_by_id->deal_title,0,20);  ?></a></h4>
       <?php } ?>


        
                    
       	
        <?php } }?>

$(function(){
    countProcess();
});


var timezone = new Date()
month        = --month;
dateFuture   = new Date(year,month,day,hour,min,sec);

function countProcess(){

        dateNow = new Date();                                                            
        amount  = dateFuture.getTime() - dateNow.getTime()+5;               
        delete dateNow;

        /* time is already past */
        if(amount < 0){
                output ="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span></span>" ;
                $('#countdown').html(output);
                 <?php $date = date('Y-m-d H:i:s');
	  foreach($product_details_by_id as $store_deal_by_id) { 
		
		 if($date > $store_deal_by_id->deal_end_date) {
		 $sold_deal_error = 1;
	  	 //$dealdiscount_percentage = $store_deal_by_id->deal_discount_percentage;
		 //$deal_img= explode('/**/', $store_deal_by_id->deal_image);
             $mcat = strtolower(str_replace(' ','-',$store_deal_by_id->mc_name));
             $smcat = strtolower(str_replace(' ','-',$store_deal_by_id->smc_name));
	     $sbcat = strtolower(str_replace(' ','-',$store_deal_by_id->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$store_deal_by_id->ssb_name)); 
	     $res = base64_encode($store_deal_by_id->deal_id);
	 ?>
                <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>  
				window.location='{!! url('dealview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}';
				<?php } ?> 
				<?php } }?> 
        }
        /* date is still good */
        else{
                days=0; hours=0; mins=0; secs=0; output="";

                amount = Math.floor(amount/1000); /* kill the milliseconds */

                days   = Math.floor(amount/86400); /* days */
                amount = amount%86400;

                hours  = Math.floor(amount/3600); /* hours */
                amount = amount%3600;

                mins   = Math.floor(amount/60); /* minutes */
                amount = amount%60;

                
                secs   = Math.floor(amount); /* seconds */

				fdays = parseInt(days/10);	
				sdays = days%10;
				fhours = parseInt(hours/10);	
				shours = hours%10;
				fmins = parseInt(mins/10);	
				smins = mins%10;
				fsecs = parseInt(secs/10);	
				ssecs = secs%10;
                output="<span class='countDays'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + fdays +"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>" + sdays +"</span></span><span class='countDiv countDiv0'></span><span class='countHours'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fhours+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+shours+"</span></span></span><span class='countDiv countDiv1'></span><span class='countMinutes'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fmins+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+smins+"</span></span></span><span class='countDiv countDiv2'></span><span class='countSeconds'><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+fsecs+"</span></span><span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>"+ssecs+"</span></span></span>" ;
                        
                $('#countdown').html(output);
            

                setTimeout("countProcess()", 1000);
        }
        
}
</script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="<?php echo url(); ?>/assets/js/locationpicker.jquery.js"></script>
        <script>$('#us3').locationpicker({
        location: {latitude: <?php echo $store_lat; ?>, longitude: <?php echo $store_lan; ?>},
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
		

</div>
<span id="themesBtn"></span>
</body>
</html>
