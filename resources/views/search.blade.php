<body>
{!! $navbar !!}



















<!-- Navbar ================================================== -->








{!! $header !!}















  @if (Session::has('error'))







		<div  >{!! Session::get('error') !!}







        </div>







		@endif







          @if (Session::has('result_success'))







		<div  >{!! Session::get('result_success') !!}







        </div>







		@endif







          @if (Session::has('result_cancel'))







		<div  >{!! Session::get('result_cancel') !!}







        </div>







		@endif







<!-- Header End====================================================================== -->







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















<div class="container">







	<div style="height:25px"></div>







</div>















<div class="container">







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



	 	



        



        <div class="span4"><a href="<?php echo $adurl;?>" target="_blank" ><img src="<?php echo url('').'/'.$imgpath; ?>" width="381px" height="215px"></a></div>



        



        



        <?php  $count++;} if($count>3){ } else {



			



			for($i=$count;$i<=3;$i++){



			?>



        



        <div class="span4"><a href="<?php echo url(''); ?>" target="_blank"><img src="<?php echo url('').'/'.$noimgpath; ?>" width="381px" height="215px"></a></div>







   <?php } } ?>







</div>







</div>















<div id="mainBody">







	<div class="container">







	<div class="row">







<!-- Sidebar ================================================== -->







	<div id="sidebar" class="span3"><br>







		<div class="well well-small btn-warning"><strong>Categories</strong></div>







			<ul id="css3menu1" class="topmenu">







<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>







<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>



<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>



<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>



	<ul>    







    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>



			<?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>



			 <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?> </a>



		<ul>







                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>   <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>







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







		<br/>







        <div class="clearfix"></div>







		<br/>







		  







          <div class="well well-small btn-warning"><strong>Most Visited Product</strong></div>







          <?php foreach($most_visited_product as $fetch_most_visit_pro) {



				if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty)



				{



			   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;







			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);







			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);


$mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name)); 
			  $res = base64_encode($fetch_most_visit_pro->pro_id);




			  ?>







          <div class="thumbnail">







			<img  src="<?php echo url(''); ?>/assets/product/<?php echo $mostproduct_img[0]; ?>" style="height:200px;" alt="panasonic New camera"/>







			<div class="caption product_show">







				<h4 class="top_text dolor_text">$<?php echo $fetch_most_visit_pro->pro_disprice;  ?></h4>







					  <h5 class="prev_text"><?php echo substr($fetch_most_visit_pro->pro_title,0,50);  ?>...</h5>







				<div class="product-info">



								<div class="product-info-cust">



									<?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>">Add To Cart</a>
						<?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
			  <a href="<?php echo url('productview1/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>">Add To Cart</a>
			  <?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			  <a href="<?php echo url('productview2/'.$mcat.'/'.$smcat.'/'.$res); ?>">Add To Cart</a>
			   <?php } ?>



								</div>



<div class="product-info-price">



					 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
<a class="btn align_brn" href="<?php echo url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview1/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>
 <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
 <a class="btn align_brn" href="<?php echo url('productview2/'.$mcat.'/'.$smcat.'/'.$res); ?>"><i class="icon-large icon-shopping-cart icon_me"></i></a>
 <?php } ?>



	</div>



					







								







							</div>



					</div>







		  </div><br/>







          <?php } } ?>







	</div><br>







<!-- Sidebar end=============================================== -->







		<div class="span9">







        <?php if($searchTerms) { ?>		







			<div class=" well-small" style="margin-top:-19px;">  







			<div class="row">



					<center>



					<span class="sale-title">Search for Products</span>



					</center>



			</div>



<br>



			<div class="row-fluid">







			<div id="featured" class="carousel slide">







			<div class="carousel-inner">			

                                        





			<?php







			   echo '<div class="item active" ><ul class="thumbnails">';







    $i = 2;







    foreach($searchTerms as $fetch_product) { 



			if($fetch_product->pro_no_of_purchase < $fetch_product->pro_qty)



			{



			 $product_saving_price = $fetch_product->pro_price - $fetch_product->pro_disprice;







			 $product_discount_percentage = round(($product_saving_price/ $fetch_product->pro_price)*100,2);







             $product_img = explode('/**/', $fetch_product->pro_Img);


$mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
			  $res = base64_encode($fetch_product->pro_id);




            echo '<li class="span3"><div class="thumbnail"><i class="tag">'.substr($product_discount_percentage,0,2).'%</i><img src="'.url('').'/assets/product/'.$product_img[0].'" alt="" style="height:150px; width:auto;"><div class="caption product_show"><h4 class="top_text dolor_text">$'. $fetch_product->pro_disprice .'</h4><h5 class="prev_text">'. substr($fetch_product->pro_title,0,25).'...</h5><div class="product-info">



								<div class="product-info-cust">



									<a href="'. url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res).'">Add To Cart</a>



								</div>



<div class="product-info-price">



					 <a class="btn align_brn" href="'.url('productview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res).'"><i class="fa fa-shopping-cart"></i></a>



	</div>



					







								







							</div></div></div></li> '; 











   if( $i % 5 == 0 )







      {







           echo '</ul></div><div class="item" ><ul class="thumbnails">';







      }







   



			



             $i++;



			}



          } 







            echo '</ul></div>'; ?> 







			  </div>







			  







			  </div>







			  </div>







		</div>







        <?php } ?>



	

<?php if($searchTermss) { ?>





			<div class=" well-small" style="margin-top:-19px;">  







			<div class="row">



					<center>


	
					<span class="sale-title">Search for Deals</span>



					</center>



			</div>



<br>



			<div class="row-fluid">







			<div id="featured" class="carousel slide">







			<div class="carousel-inner">			







			<?php







			   echo '<div class="item active" ><ul class="thumbnails">';







    $i = 2;







    foreach($searchTermss as $fetch_product) { 



			//if($fetch_product->pro_no_of_purchase < $fetch_product->pro_qty)



			//{



			 $product_saving_price = $fetch_product->deal_original_price - $fetch_product->deal_original_price;







			 $product_discount_percentage = round(($product_saving_price/ $fetch_product->deal_discount_price)*100,2);







             $product_img = explode('/**/', $fetch_product->deal_image);


$mcat = strtolower(str_replace(' ','-',$fetch_product->mc_name));
             $smcat = strtolower(str_replace(' ','-',$fetch_product->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$fetch_product->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$fetch_product->ssb_name)); 
			  $res = base64_encode($fetch_product->deal_id);




            echo '<li class="span3"><div class="thumbnail"><i class="tag">'.substr($fetch_product->deal_discount_percentage,0,2).'%</i><img src="'.url('').'/assets/deals/'.$product_img[0].'" alt="" style="height:150px; width:auto;"><div class="caption product_show"><h4 class="top_text dolor_text">$'. $fetch_product->deal_discount_price .'</h4><h5 class="prev_text">'. substr($fetch_product->deal_title,0,25).'...</h5><div class="product-info">



								<div class="product-info-cust">



									<a href="'. url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res).'">Add To Cart</a>



								</div>



<div class="product-info-price">



					 <a class="btn align_brn" href="'.url('dealview/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res).'"><i class="fa fa-shopping-cart"></i></a>



	</div>



					







								







							</div></div></div></li> '; 











   if( $i % 5 == 0 )







      {







           echo '</ul></div><div class="item" ><ul class="thumbnails">';







      }







   



			



             $i++;



			//}



          } 







            echo '</ul></div>'; ?> 







			  </div>







			  







			  </div>







			  </div>







		</div>







        <?php }?>

		</div>








		</div>







	</div>







</div>















   







           







<!-- Footer ================================================================== -->







 <script src="<?php echo url(''); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script> 







	{!! $footer !!}
</body>
</html>