<body>
{!! $navbar !!}


<!-- Navbar ================================================== -->
{!! $header !!}

<!-- Header End====================================================================== -->


<div class="container">
<div class="row">
<div class="span3 side-men">
	<div class="side-menu-head"><strong>Categories</strong></div>
		<ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onClick="" class="switch" for="css3menu-switcher"></label>
<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>

	<ul>    
    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
    		<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?> </a>

		<ul>
                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>  <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
					<li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?> </a>
                  
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
</ul>
		<br>
		  <div class="clearfix"></div>
		<br/>
</div>
<div class="span9">
	<div id="carouselBlk">


                 


	<div id="myCarousel" class="carousel slide">



		<div class="carousel-inner">





 

 <?php 

 if($bannerimagedetails)

 {

 	$i=1;

 foreach($bannerimagedetails as $banner){

	 

	 $bannerimagepath="assets/bannerimage/".$banner->bn_img;

	 

	 ?>

 

		  <div <?php if($i==1){ ?>class="item active" <?php } else { ?> class="item" <?php } ?>>



	



			<a ><img src="<?php echo url('').'/'.$bannerimagepath; ?>"  alt=""/></a>

		



		  </div>

 

 <?php $i++;} } else {?>

  <div class="item active">



 <a ><img style="width:100%" src="<?php echo url(''); ?>/themes/images/carousel/6.png" alt="special offers"/></a>



 </div>

  <div class="item">

 <div class="container">

 <a ><img style="width:100%" src="<?php echo url(''); ?>/themes/images/carousel/3.png" alt="special offers"/></a>

  </div>

 </div>











<?php } ?>







		</div>



		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>



		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>



	  </div> 



</div>
</div>
</div>
</div>

<div class="container">



	<div style="height:25px"></div>



</div>







<div class="container hide-mob hid-tab">



<div class="row">



<?php

if($noimagedetails)

{

foreach($noimagedetails as $noimage)

{

	$noimgpath="assets/noimage/".$noimage->imgs_name;

}

}

else

{

	$noimgpath="assets/noimage/nonamewbHfhyPG.jpg";	

}

$count=1;

 foreach($addetails as $adinfo) { 





$imgpath="assets/adimage/".$adinfo->ad_img;

$adurl=$adinfo->ad_redirecturl; 



?>

	 	

        

        <div class="span4"><a href="<?php echo $adurl;?>" target="_blank" ><img src="<?php echo url('').'/'.$imgpath; ?>" width="381px" height="215px" class="tab-add"></a></div>

        

        

        <?php  $count++;} if($count>3){ } else {

			

			for($i=$count;$i<=3;$i++){

			?>

        

        <div class="span4"><a href="<?php echo url(''); ?>" target="_blank"><img src="<?php echo url('').'/'.$noimgpath; ?>" width="381px" height="215px"></a></div>



   <?php } } ?>



</div>



</div>

<div id="mainBody">
	<div class="container home-pro" >
	@if(Session::has('wish'))
	<p class="alert {!! Session::get('alert-class', 'alert-success') !!}">{!! Session::get('wish') !!}</p>
	@endif
	<div class="row">
<!-- Sidebar ================================================== -->
	

<!-- Sidebar end=============================================== -->
<center><h3 class="home-heading">New Products</h3></center>
	<div id="demo" class="span12 tab-land-wid" style="margin-left:20px;">
					
						
						
						<!-- panel -->
						
						<!-- Compare basket -->
		<div class="compare-basket">
			<button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">Compare</span></button>
		</div>
		<div class="view">
		<section class="grid">

												<?php  if(count($product_details) != 0){ foreach($product_details as $product_det){ 
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
							
						<!-- item 1 -->
						<div class="product" style="margin-right:5px!important;width:204px;">		
						
							<!-- img -->
							<div class="product__info">
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
							<div class="img">
								<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img class="product__image" src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" title=""/></a>
							
							<?php } ?>
							<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" ><img class="product__image" alt="" src="<?php echo url('assets/product/').'/'.$product_image[0];?>"></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" ><img class="product__image" alt="" src="<?php echo url('assets/product/').'/'.$product_image[0];?>"></a>

 <?php } ?>
 </div>
							<!-- data -->
							<div class="">
								
								<p class="title product__title tab-title"><?php echo substr($product_det->pro_title,0,25); ?></p>
								<p class="like product__price">$<?php echo $product_det->pro_disprice;?></p>
								<?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty) { ?>
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">Sold</a> 
                                    <?php } else { ?></h4>
								
							</div>
<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
<a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><button class="action action--button action--buy font-tab"><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button></a>

 <?php } ?>		
						</div>
						<label class="action action--compare-add"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Add to compare</span></label>
						<?php } ?>							

						</div>
						

							<?php 
								}
							 }
			}
			elseif(count($product_details) == 0)
			{
				?>
				<div class="box jplist-no-results text-shadow align-center jplist-hidden">
								<p style="margin-top:20px;color: rgb(54, 160, 222);
margin-top: 20px;
font-weight: bold;
padding-left: 8px;">No products available</p>						</div>
				<?php
			}
							?>
						
					
						
					
					</section>
</div>
<section class="compare">
			<button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span></button>
		</section>

		<!--//////////////////////////////////////////////////  -->
		<!-- Main view -->
		
			<!-- Product grid -->
			
		
		<!-- data -->   
          
						
						
						
						
						<!-- ios button: show/hide panel -->
						
					</div>
</div>

</div>
<div class="container">
<div class="row">
	<div class="span6">
		<img src="images/ad1.jpg">
	</div>
	<div class="span6">
		<img src="images/ad2.jpg">
	</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer !!}
</body>
</html>