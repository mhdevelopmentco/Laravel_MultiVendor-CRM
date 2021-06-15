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
		<div class="well well-small btn-warning"><strong>Related Products</strong></div>
		<div class="row">
		<ul class="thumbnails">
					
					<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
					$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
                $res = base64_encode($product_det->pro_id);
	$product_image = explode('/**/',$product_det->pro_Img);
	$product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
	$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2);
	  if($product_det->pro_no_of_purchase < $product_det->pro_qty) {
	?>
			<li class="span3">
			  <div class="thumbnail" style="width:95%;">
				  <?php if($product_discount_percentage!='')
				  { ?>
				  <i class="tag"><?php
				 
				  echo round($product_discount_percentage);?>%</i>
				  <?php
				  }
				  ?>
				  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
					<a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><img alt="" src="<?php echo url('assets/product/').'/'.$product_image[0];?>" style="height:215px;" ></a>
					 <?php } ?>
					 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
 <a href="<?php echo url('productview1/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><img alt="" src="<?php echo url('assets/product/').'/'.$product_image[0];?>" style="height:215px;" ></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
 <a href="<?php echo url('productview2/'.$mcat.'/'.$smcat.'/'.$res); ?>"><img alt="" src="<?php echo url('assets/product/').'/'.$product_image[0];?>" style="height:215px;" ></a>
 <?php } ?>
					<div class="caption product_show">
					<h3 class="prev_text"><?php echo substr ($product_det->pro_title,0,20);?></h3>
				<h4 class="top_text dolor_text">$<?php echo $product_det->pro_disprice;?></h4>
					  
                      <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty) { ?>
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">Sold</a> 
                                    <?php } else { ?>
					  <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview1/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview2/'.$mcat.'/'.$smcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
                      <?php } ?>
					</div>
				  </div>
			</li>
            <?php } } } else{ ?>
         <li class="span3">
			  <div class="thumbnail">
					No Product's Available
					
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
<?php foreach($product_details_by_id as $pro_details_by_id) { }
  $product_img= explode('/**/',trim($pro_details_by_id->pro_Img,"/**/"));	
	$img_count = count($product_img);
 ?>
	<div class="span9 tab-land-wid">
<div class="clearfix"></div>
    <ul class="breadcrumb">
    <li><a href="<?php echo url('index');?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo url('products');?>">Products</a> <span class="divider">/</span></li>
	<?php foreach($breadcrumb as $fetch_main_cat) { //print_r($fetch_main_cat); exit; 
	$pass_cat_id1 = "1,".$fetch_main_cat->pro_mc_id; 
	$pass_cat_id2 = "2,".$fetch_main_cat->pro_smc_id;
	$pass_cat_id3 = "3,".$fetch_main_cat->pro_sb_id;
	$pass_cat_id4 = "4,".$fetch_main_cat->pro_ssb_id;//echo $pass_cat_id1; exit;?>
     <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name != '' && $pro_details_by_id->ssb_name != '') { ?>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id3).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->sb_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id4).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->ssb_name)); ?></a> <span class="divider">/</span></li>
 <?php } ?>
 <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name != '' && $pro_details_by_id->ssb_name == '') { ?>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id3).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->sb_name)); ?></a> <span class="divider">/</span></li>
 <?php } ?>
 <?php if($pro_details_by_id->mc_name != '' && $pro_details_by_id->smc_name != '' && $pro_details_by_id->sb_name == '' && $pro_details_by_id->ssb_name == '') { ?>
  <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id1).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->mc_name)); ?></a> <span class="divider">/</span></li>
     <li><a href="<?php echo url('catproducts/viewcategorylist/'.base64_encode($pass_cat_id2).'');?>"><?php echo ucwords(strtolower($pro_details_by_id->smc_name)); ?></a> <span class="divider">/</span></li>
    
  <?php } } ?>
    <li class="active"><?php echo  $pro_details_by_id->pro_title; ?></li>
    </ul>	
    <div class="row">	  
    <div class="span3">
            	<a id="Zoomer3"  href="{!! url('assets/product/').'/'.$product_img[0]!!}" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="<?php echo  $pro_details_by_id->pro_title; ?>"><img src="{!! url('assets/product/').'/'.$product_img[0]!!}"/></a> <br/>
 <?php for($i=0;$i < $img_count;$i++) { ?>
        <a href="{!! url('assets/product/').'/'.$product_img[$i]!!}" rel="zoom-id: Zoomer3" rev="{!! url('assets/product/').'/'.$product_img[$i]!!}"><img src="{!! url('assets/product/').'/'.$product_img[$i]!!}" style="width:87px; height:auto"/></a>
 <?php } ?>
            </div>
			
			<div class="span6 tab-produ-view">
				<h3><?php echo  $pro_details_by_id->pro_title; ?> </h3>
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
					<img src='<?php echo url('images/stars-1.png'); ?>' style='margin-bottom:10px;'>Ratings
					<?php
				}
				elseif($product_divide_count >= '1')
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
		echo "<br/>No Rating for this Product";
	}
			}
			elseif($product_count)
			{
				$product_divide_count = $product_total_count / $product_count;
			}
			else {echo "<br/>No Rating for this Product";}
			
			
			//echo $product_divide_count;
			
							?>
<br>
				<hr class="soft"/>

	<?php foreach ($product_details_by_id as $row) {

	}	
     //echo $row->sold_status;

	?>		

	<?php if ($row->sold_status == 0) { ?>

				
				{!! Form :: open(array('url' => 'addtocart','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
				
				  <div class="control-group">
					<label class="control-label" style="font-size:18px;width:106px;"><strike class="srt" style="padding-left:0px;font-size:18px;">$ <?php echo  $pro_details_by_id->pro_price; ?></strike>  <span class="bold"></span></label><label class="control-label"><span style="color:#00b381;"><b>$<?php echo  $pro_details_by_id->pro_disprice; ?></b></span></label>
				<p style="font-size:18px;font-family:lato;margin-top:7px;">Delivery within: <strong>{!!$pro_details_by_id->pro_delivery!!} days</strong></p>
				  </div>

				  
				 <p
                <h4> </h4> <div id="size_color_error" style="color:#F00;font-weight:800;" ></div>
				  
                 <input type="hidden" name="addtocart_type" value="product" />
                 </form>
				 <?php
				 if(Session::has('customerid'))
		{?>
				<div style="display:none;"><a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:right;margin-top:-15px;"><button class="wish-but" id="login_a_click"  value="Login"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i> Add to Wishlist</button></a>

				</div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:right;margin-top:-15px;"><button class="wish-but" id="login_a_click"  value="Login"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i> Add to Wishlist</button></a>
			<span style="padding-right:15px;margin-top:-37px;" class="out-of-stock">Out Of Stock</span>
			<?php
		}
		?>
				<p style="float:left;">
				<?php
				if(Session::has('customerid'))
		{
			?>
				{!! Form :: open(array('url' => 'addtowish','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
				<input type="hidden" name="pro_id" value="<?php echo  $pro_details_by_id->pro_id; ?>">
				<input type="hidden" name="cus_id" value="<?php echo Session::get('customerid');?>">
				<!-- <input type="submit" style="padding-right:0; float:right;margin-top:-82px;" name="submit" class="wish-but"> -->
				<span style="padding-right:0; float:right;margin-top:-15px;"><button type="submit" class="wish-but" id="login_a_click" name="submit"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i>Add to Wishlist</button></span>
				<span style="padding-right:15px;margin-top:-37px;" class="out-of-stock">Out Of Stock</span>
				</form>
		<?php } ?>

<?php } elseif ($row->sold_status > 0) {?>
		<!-- //////////////////////////////////////////////////////////////// -->

		{!! Form :: open(array('url' => 'addtocart','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
				
				  <div class="control-group">
					<label class="control-label" style="font-size:18px;width:106px;"><strike class="srt" style="padding-left:0px;font-size:18px;">$ <?php echo  $pro_details_by_id->pro_price; ?></strike>  <span class="bold"></span></label><label class="control-label"><span style="color:#00b381;"><b>$<?php echo  $pro_details_by_id->pro_disprice; ?></b></span></label>
				<p style="font-size:18px;font-family:lato;margin-top:7px;">Delivery within: <strong>{!!$pro_details_by_id->pro_delivery!!} days</strong></p>
				  </div>

				  
				 <p
                <h4><span style="color:red;"><?php echo  $pro_details_by_id->pro_no_of_purchase; ?> Sold </span>/ <span style="color:green;"><?php echo  $pro_details_by_id->pro_qty; ?> In Stock</span> </h4> <div id="size_color_error" style="color:#F00;font-weight:800;" ></div><hr class="soft"/>

				
				 	<div class="controls">
					<label class="control-label" style="font-size:18px;">Quantity: </label><input type="number" name="addtocart_qty" id="addtocart_qty" style="width:18%" class="span1" placeholder="Qty." value="1" min="1" max="<?php echo  ($pro_details_by_id->pro_qty - $pro_details_by_id->pro_no_of_purchase); ?>"/>
                    
                    <span id="addtocart_qty_error" style="color:red;" ></span>
                     <input type="hidden" name="addtocart_pro_id" value="<?php echo $pro_details_by_id->pro_id; ?>" />
                    <input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->pro_mc_id))); ?>" />
					  <button type="submit" class="btn btn-large btn-primary pull-right me_btn cart-res" style="padding-left: 20px;
    padding-right: 26px;" id="add_to_cart_session"><i class=" icon-shopping-cart"></i> Add to cart</button>
                      
                
                      
                     
                        
                      <div class="basic" data-average="<?php // echo round($get_pro_rating_avg[$pro_details_by_id->pro_id]); ?>" data-id="1" style="padding-top:10px;" ></div>
    <input type="hidden" name="rate_myproduct" id="tate" />
					</div>
					 <?php if($product_color_details) { ?>
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2" name="addtocart_color" id="addtocart_color">
                      <option value="0">--Select--</option>
                      <?php foreach($product_color_details as $product_color_det) { ?>
						  <option value="<?php echo $product_color_det->co_id;?>"><?php echo $product_color_det->co_name;?></option>
						  <?php } ?>
						</select>
					</div>
				  </div>
                  <?php  } ?>
                  
                   <?php if($product_size_details) { ?>
                  <div class="control-group">
					<label class="control-label"><span>Size</span></label>
					<div class="controls">
					  <select class="span2" name="addtocart_size" id="addtocart_size">
                      <option value="0">--Select--</option>
                      <?php foreach($product_size_details as $product_size_det) { ?>
						  <option value="<?php echo $product_size_det->ps_si_id;?>"><?php echo $product_size_det->si_name;?></option>
						  <?php } ?>
						</select>
					</div>
				  </div>
                  <?php } ?>
				  
                 <input type="hidden" name="addtocart_type" value="product" />
                 </form>
				 <?php
				 if(Session::has('customerid'))
		{?>
				<div style="display:none;"><a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:right;margin-top:-82px;"><button class="wish-but" id="login_a_click"  value="Login"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i> Add to Wishlist</button></a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:right;margin-top:-82px;"><button class="wish-but" id="login_a_click"  value="Login"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i> Add to Wishlist</button></a>
			<?php
		}
		?>
				<p style="float:left;">
				<?php
				if(Session::has('customerid'))
		{
			?>
				{!! Form :: open(array('url' => 'addtowish','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
				<input type="hidden" name="pro_id" value="<?php echo  $pro_details_by_id->pro_id; ?>">
				<input type="hidden" name="cus_id" value="<?php echo Session::get('customerid');?>">
				<!-- <input type="submit" style="padding-right:0; float:right;margin-top:-82px;" name="submit" class="wish-but"> -->
				<span style="padding-right:0; float:right;margin-top:-82px;"><button type="submit" class="wish-but" id="login_a_click" name="submit"><i class="icon-heart" aria-hidden="true" style="padding-top: 3px;"></i> Add to Wishlist</button></span>
				</form>
		<?php } }?>
				
				</p>
				
                
				
                 
                
				<hr class="soft clr"/>
			
			</div>
		
		
			
			
			
			
			<?php if($product_spec_details)  {  ?>
			<div class="span9">
				<table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Specification</th>
	</tr>
			<?php foreach($product_spec_details as $product_spec) { ?>
		<tr>
			<td><?php echo $product_spec->sp_name; ?></td>
			<td><?php echo $product_spec->spc_value; ?></td>
		</tr>
				<?php }  ?>
    </tbody>
				</table>
			
			
			</div>
				<?php } ?>
			<div class="span9 pull-left table-responsive tab-land-wid"><br>
			
              
				<table class="table table-bordered">
				<tbody>
					<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Product Information</th></tr>
    	<tr><td><?php echo  $pro_details_by_id->pro_desc; ?></td>
				
				</tr>
    </tbody>
				</table>
			
<table class="table table-bordered">
				<tbody>
					<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Store Details</th></tr>
    	<tr><td class="hide-mob"><div class="span3">
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
<h4>
<?php echo $store_name; ?></h4></a>
<?php echo $store_address; ?>.,<br>
<?php echo $store_address2; ?>.,<br>
<?php echo $store_zip; ?>,<br>
Mobile: <?php echo $store_phone; ?><br>

Website:<?php echo $store_web; ?>
<?php }

?>
    </div></td>				
				</tr>
    </tbody>
				</table>
    	
    
 
				<!-- <h4>Reviews & Ratings</h4>
				<div class="row">
				<div class="span6">
					<main>
  <section>
    <ul class="style-1">
      <li>
        <em>5 Star</em>
        <span>127</span>
      </li>
      <li>
        <em>4 Star</em>
        <span>98</span>
      </li>
      <li>
        <em>3 Star</em>
        <span>34</span>
      </li>
      <li>
        <em>2 Star</em>
        <span>148</span>
      </li>
      <li>
        <em>1 Star</em>
        <span>10</span>
      </li>
    </ul>
  </section>
  
</main>
				</div>
						
				</div> -->
				<?php
					 
				if(Session::has('customerid'))
		{
			
			?>

                                  
<div style="border-radius:3px; border:1px solid #ccc;">
<h4 style="padding-left:13px;">Write a post comments</h4>
                             	<div class="row"><div class="span5">
								
									 {!! Form::open(array('url'=>'productcomments','class'=>'form-horizontal loginFrm')) !!}
									 <input type="hidden" name="customer_id" value="<?php echo Session::get('customerid');?>">
                                            <input type="hidden" name="product_id" value="{!!$pro_details_by_id->pro_id!!}">
       
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
				$customer_product = $col->product_id;
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
			}
				                                
			if($customer_product==$pro_details_by_id->pro_id)
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
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='e')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='f')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='g')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='h')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='i')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='j')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='k')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='m')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='n')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='o')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='p')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='q')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='r')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='s')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='t')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='u')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='v')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='w')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='x')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='y')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='z')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
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
                           
<span><?php echo $customer_comments; ?></span></p>
                        </div>
                        
                    </div>
			</div>
<?php } }else{?>No Review Ratings.<br>
<?php
				 if(Session::has('customerid'))
		{?>
				<div style="display:none;"><a href="#login" class="btn btn-orange  btn-line rippleWhite js-userReviewed" role="button" data-toggle="modal" style="padding-right:0;" id="login_a_click"  value="Login">Write a Review Post</a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:left;" id="login_a_click"  class="btn btn-orange  btn-line rippleWhite js-userReviewed" value="Login">Write a Review Post</a>
			<?php
		}
		?>
<?php }?>
<br>
                                    <?php } else {
			?>
		<h4>Reviews</h4><h4><span style="margin-top:-33px; float:right;"><a href="#login" role="button" data-toggle="modal" id="login_a_click"  value="Login" class="btn btn-orange  btn-line rippleWhite js-userReviewed">Write a Review Post</a></span></h4>
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
				$customer_product = $col->product_id;
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
			if($customer_product==$pro_details_by_id->pro_id)
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
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='e')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='f')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='g')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='h')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='i')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='j')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='k')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='m')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='n')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='o')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='p')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='q')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='r')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='s')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='t')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='u')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='v')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='w')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='x')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='y')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
			}
			elseif($start_letter=='z')
			{
				echo "<div class='userimg'><center><span class='reviewer-imgName' style='background:#191d86; text-transform:capitalize;'>$customer_name_arr[0]</center></span>";
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
                           
<span><?php echo $customer_comments; ?></span></p>
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
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>
    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>
<!--	<script src="<?php //echo url(); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>-->
     <script type="text/javascript">
$(document).ready(function(){

$('#add_to_cart_session').click(function(){
	var pro_purchase1 = '<?php echo $pro_details_by_id->pro_no_of_purchase; ?>' ;
	var pro_purchase = parseInt($('#addtocart_qty').val()) + parseInt(pro_purchase1);
	var pro_qty = '<?php echo $pro_details_by_id->pro_qty; ?>';
	if(pro_purchase > parseInt(pro_qty))
	{
		$('#addtocart_qty').focus();
		$('#addtocart_qty').css('border-color', 'red');
		$('#addtocart_qty_error').html('Limited Quantity Available');
		return false;
	}
	else
	{
		$('#addtocart_qty').css('border-color', '');
		$('#addtocart_qty_error').html('');
	}
	if($('#addtocart_color').val() ==0) 
	{
		$('#addtocart_color').focus();
		$('#addtocart_color').css('border-color', 'red');
		$('#size_color_error').html('Select Color');
		return false;
	}
	else
	{
		$('#addtocart_color').css('border-color', '');
		$('#size_color_error').html('');
	}
	if($('#addtocart_size').val() ==0)
	{
		$('#addtocart_size').focus();
		$('#addtocart_size').css('border-color', 'red');
		$('#size_color_error').html('Select Size');
		return false;
	}
	else
	{
		$('#addtocart_size').css('border-color', '');
		$('#size_color_error').html('');
	}
});
$("#searchbox").keyup(function(e) 
{

var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{
$("#display").html("").hide();	
}
else
{
	var passData = 'searchword='+ searchbox;
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


</script>
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>

   <script type="text/javascript" src="<?php echo url(''); ?>/themes/js/jquery.js"></script>

<script src="<?php echo url(''); ?>/themes/js/magiczoomplus.js" type="text/javascript"></script>	
<script type="text/javascript">
	function setBarWidth(dataElement, barElement, cssProperty, barPercent) {
  var listData = [];
  $(dataElement).each(function() {
    listData.push($(this).html());
  });
  var listMax = Math.max.apply(Math, listData);
  $(barElement).each(function(index) {
    $(this).css(cssProperty, (listData[index] / listMax) * barPercent + "%");
  });
}
setBarWidth(".style-1 span", ".style-1 em", "width", 100);
setBarWidth(".style-2 span", ".style-2 span", "width", 55);

   
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
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>

</div>
<span id="themesBtn"></span>
</body>
</html>
