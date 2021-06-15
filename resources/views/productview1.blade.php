<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}


<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small btn-warning"><strong>Categories</strong></div>
		<ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onClick="" class="switch" for="css3menu-switcher"></label>
<?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$pro_details_by_id_meta->pro_mc_id; ?>
<?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
<li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>

	<ul>    
    <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
    <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
			 <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')."/".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?> </a>
		
		<ul>
                <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?> <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
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
          <div class="well well-small btn-warning"><strong>Most Visited Product</strong></div>
          <?php foreach($most_visited_product as $fetch_most_visit_pro) {
			  
			    $mcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->mc_name));
                $smcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$fetch_most_visit_pro->ssb_name));
                $res = base64_encode($fetch_most_visit_pro->pro_id);
				if($fetch_most_visit_pro->pro_no_of_purchase < $fetch_most_visit_pro->pro_qty)

				{

			   $mostproduct_saving_price = $fetch_most_visit_pro->pro_price - $fetch_most_visit_pro->pro_disprice;



			 $mostproduct_discount_percentage = round(($mostproduct_saving_price/ $fetch_most_visit_pro->pro_price)*100,2);



			 $mostproduct_img = explode('/**/', $fetch_most_visit_pro->pro_Img);



			  ?>
          <div class="thumbnail">



			<img  src="<?php echo url(''); ?>/assets/product/<?php echo $mostproduct_img[0]; ?>" alt="panasonic New camera"/>



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
          <?php } }?>
	</div>
<!-- Sidebar end=============================================== -->
<?php foreach($product_details_by_id as $pro_details_by_id) { }
  $product_img= explode('/**/',trim($pro_details_by_id->pro_Img,"/**/"));	
	$img_count = count($product_img);
 ?>
	<div class="span9">
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
    
  <?php !!} ?>
   
    <li class="active"><?php echo  $pro_details_by_id->pro_title; ?></li>
    </ul>	
    <div class="row">	  
    <div class="span3">
            	<a id="Zoomer3"  href="{!! url('assets/product/').'/'.$product_img[0]!!}" class="MagicZoomPlus" rel="selectors-effect: fade; selectors-change: mouseover; " title="<?php echo  $pro_details_by_id->pro_title; ?>"><img src="{!! url('assets/product/').'/'.$product_img[0]!!}"/></a> <br/>
 <?php for($i=0;$i < $img_count;$i++) { ?>
        <a href="{!! url('assets/product/').'/'.$product_img[$i]!!}" rel="zoom-id: Zoomer3" rev="{!! url('assets/product/').'/'.$product_img[$i]!!}"><img src="{!! url('assets/product/').'/'.$product_img[$i]!!}" style="width:87px; height:auto"/></a>
 <?php } ?>
            </div>
			
			<div class="span6">
				<h3><?php echo  $pro_details_by_id->pro_title; ?> </h3>
				<small>- <?php echo  substr($pro_details_by_id->pro_desc,0,150); ?>...</small>
				<hr class="soft"/>
				{!! Form :: open(array('url' => 'addtocart','class'=>'form-horizontal qtyFrm','enctype'=>'multipart/form-data')) !!}
				  <div class="control-group">
					<label class="control-label" style="font-size:18px;">Product Price: </label><label class="control-label"><span>$<?php echo  $pro_details_by_id->pro_disprice; ?></span></label>
				
				  </div>
				 
                <h4><span style="color:red;"><?php echo  $pro_details_by_id->pro_no_of_purchase; ?> Sold </span>/ <span style="color:green;"><?php //echo  $pro_details_by_id->pro_qty; ?> In Stock</span> </h4> <div id="size_color_error" style="color:#F00;font-weight:800;" ></div><hr class="soft"/>
				 <?php if($product_color_details) { ?>
				 	<div class="controls">
					<label class="control-label" style="font-size:18px;">Quantity: </label><input type="number" name="addtocart_qty" id="addtocart_qty" class="span1" placeholder="Qty." value="1" min="1" max="<?php echo  ($pro_details_by_id->pro_qty - $pro_details_by_id->pro_no_of_purchase); ?>"/>
                    
                    <span id="addtocart_qty_error" style="color:red;" ></span>
                     <input type="hidden" name="addtocart_pro_id" value="<?php echo $pro_details_by_id->pro_id; ?>" />
                    <input type="hidden" name="return_url" value="<?php echo $pro_details_by_id->mc_name.'/'.base64_encode(base64_encode(base64_encode($pro_details_by_id->pro_mc_id))); ?>" />
					  <button type="submit" class="btn btn-large btn-primary pull-right me_btn" id="add_to_cart_session"> Add to carts <i class=" icon-shopping-cart"></i></button>
                      
                
                      
                     
                        
                      <div class="basic" data-average="<?php // echo round($get_pro_rating_avg[$pro_details_by_id->pro_id]); ?>" data-id="1" style="padding-top:10px;" ></div>
    <input type="hidden" name="rate_myproduct" id="tate" />
					</div>
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2" name="addtocart_color" id="addtocart_color">
                      <option value="0">--Select--</option>
                      <?php foreach($product_color_details as $product_color_det) { ?>
						  <option value="<?php echo $product_color_det->cf_id;?>"><?php echo $product_color_det->cf_name;?></option>
						  <?php } ?>
						</select>
					</div>
				  </div>
                  <?php } ?>
                  
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
				<div style="display:none;"><a href="#login" role="button" data-toggle="modal" style="padding-right:0;"><button class="btn btn-mini" id="login_a_click"  value="Login">Add to Wishlist</button></a></div>
		<?php } elseif (Session::has('customerid')=="") 
		{
			
			?>
			<a href="#login" role="button" data-toggle="modal" style="padding-right:0; float:left;"><button class="btn btn-mini" id="login_a_click"  value="Login">Add to Wishlist</button></a>
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
				<input type="submit" name="submit" value="Add to Wish List" style="float:left;">
				</form>
		<?php } ?>
				
				</p>
				
                <div class="span4 social_share">
                <ul style="list-style-type:none; display:block; ">
               
               
                 <li><div class="colabs-sc-twitter fl"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url('');?>;size=m&amp;text=<?php echo urlencode($pro_details_by_id->pro_title);?>&amp;img=<?php echo url('assets/product/').'/'.$product_img[0];?>&amp;url=<?php echo url('product_list/').'/'.$pro_details_by_id->pro_id;?>&amp;via=NexEcart" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li>
               
               
                <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=<?php echo url('');?>&amp;url=<?php echo url('product_list').'/'.$pro_details_by_id->pro_id;?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=<?php echo url('');?>&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li>
              
              
              
              
                <li><div class="colabs-fblike fl">
<iframe frameborder="0" style="border:none; overflow:hidden; width:80px; height:25px;" allowtransparency="true" scrolling="no" src="http://www.facebook.com/plugins/like.php?href=<?php echo url('product_list/').$pro_details_by_id->pro_id;?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;colorscheme=light&amp;font=arial"></iframe>
</div></li>
    <?php
$title=($pro_details_by_id->pro_title);
$url=(url('productview/'.$pro_details_by_id->pro_id));
$summary=($pro_details_by_id->pro_desc);
$image=(url('assets/product/').'/'.$product_img[0]);
?>
<script type="text/javascript"> 
<!--
window.fbAsyncInit = function() {
	FB.init({
	appId      : '1422599688008267', 
	channelUrl : '<?php echo url();?>', 
	status     : true,
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/fr_FR/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));


$(document).ready(function(){
	$('#FBShare').click(function(){
		FB.ui({
			method: 'feed',
			name: '<?php echo $title; ?>',
			link: '<?php echo $url;?>',
			picture: '<?php echo $image;?>',
			caption: '<?php echo $title; ?>',
			description: '<?php echo $summary; ?>'
			}, function(response){
				
			});
	});

});
//-->
</script>
        <span><a id="FBShare" style="cursor:pointer;"><img src="<?php echo url('');?>/themes/images/fb-share.jpg"></a></span>




	</ul></div>
				
                 
                
				<hr class="soft clr"/>
			
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow" style="background: #1D84C1;
    color: white;"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Title: </td><td class="techSpecTD2">{!!$pro_details_by_id->pro_title!!}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Category:</td><td class="techSpecTD2">{!!$pro_details_by_id->mc_name!!}</td></tr>
				
                <?php if($product_color_details) { ?>
				<tr class="techSpecRow"><td class="techSpecTD1">Colors:</td><td class="techSpecTD2"> <?php $color=''; foreach($product_color_details as $product_color_det) {  $color.= $product_color_det->cf_name.','; } echo trim($color,',');?></td></tr>
                <?php } ?>
                <?php if($product_size_details) { ?>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2"><?php $size=''; foreach($product_size_details as $product_size_det) {   $size.= $product_size_det->si_name.','; } echo trim($size,',');?></td>
                </tr>
                <?php } ?>
                <tr class="techSpecRow"><td class="techSpecTD1">Delivery within:</td><td class="techSpecTD2">{!!$pro_details_by_id->pro_delivery!!} days</td></tr>
                
                <tr class="techSpecRow"><td class="techSpecTD1">Specification Group:</td><td class="techSpecTD2">
                <?php $spec=''; foreach($product_spec_details as $product_spec_det) {   $spec.= $product_spec_det->spg_name.','; } echo trim($spec,',');?>
                </td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">Specification:</td><td class="techSpecTD2">
                <?php $spec=''; foreach($product_spec_details as $product_spec_det) {   $spec.= $product_spec_det->sp_name.','; } echo trim($spec,',');?>
                </td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">Extra Specification:</td><td class="techSpecTD2">
                <?php $spec=''; foreach($product_spec_details as $product_spec_det) {   $spec.= $product_spec_det->spc_value.','; } echo trim($spec,',');?>
                </td></tr>
				</tbody>
				</table>
				
				<h5>Features</h5>
				<p>
				<?php echo  $pro_details_by_id->pro_desc; ?>
				</p>
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary btnb-success"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane" id="listView">
	<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
	$product_image = explode('/**/',$product_det->pro_Img);
	
	?>
		<div class="row">	  
			<div class="span2">
             <?php 
				$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
              		
			   $res = base64_encode($product_det->pro_id); if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
                <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="width:180px;"></a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                <a href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="width:180px;"></a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			    <a href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="width:180px;"></a>
               <?php } ?>
               
			  
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5><?php echo $product_det->pro_title;?> </h5>
				<p>
				<?php echo $product_det->pro_desc;?>
				</p>
                <?php 
				$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
              		
			   $res = base64_encode($product_det->pro_id);
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
			   <a class="btn btn-small pull-right me_view" href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}">View Details</a>
               <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
               <a class="btn btn-small pull-right me_view" href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}">View Details</a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			   <a class="btn btn-small pull-right me_view" href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}">View Details</a>
               <?php } ?>
				                
               
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $<?php echo $product_det->pro_disprice;?></h3>
			<label class="checkbox">
            
            <br>
<br>


				
			</label><br/>
               <?php
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
			 
            <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" class="btn btn-large btn-primary me_btn btnb-success"> Add to cart<i class=" icon-shopping-cart"></i></a>
			  <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
               <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
              <a href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" class="btn btn-large btn-primary me_btn btnb-success"> Add to cart<i class=" icon-shopping-cart"></i></a>
			  <a href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			   <a href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}" class="btn btn-large btn-primary me_btn btnb-success"> Add to cart<i class=" icon-shopping-cart"></i></a>
			  <a href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
               <?php } ?>
		  			
				</form>
			</div>
		</div>
		<hr class="soft"/>
        <?php } }else{ ?>
        <div class="row">	  
			
			<div class="span4">
				<h3>No Product's Available</h3>				
				
				<br class="clr"/>
			</div>
			
		</div>
        <?php } ?>	
				
			<hr class="soft"/>
		</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					
					<?php if($get_related_product){ foreach($get_related_product as $product_det){ 
	$product_image = explode('/**/',$product_det->pro_Img);
	$product_saving_price = $product_det->pro_price - $product_det->pro_disprice;
	$product_discount_percentage = round(($product_saving_price/ $product_det->pro_price)*100,2);
	  if($product_det->pro_no_of_purchase < $product_det->pro_qty) {
	?>
			<li class="span3">
			  <div class="thumbnail" style="width:95%;">
				  <i class="tag"><?php echo round($product_discount_percentage);?>%</i>
                  <?php
               	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
              		
			   $res = base64_encode($product_det->pro_id);
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
               <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="height:215px;"></a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                <a href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="height:215px;"></a>
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			    <a href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}"><img class="images_place"src="<?php echo url('assets/product/').'/'.$product_image[0];?>" alt="" style="height:215px;"></a>
               <?php } ?>
					
					<div class="caption product_show">
				<h4 class="top_text dolor_text">$<?php echo $product_det->pro_disprice;?></h4>
					  <h5 class="prev_text"><?php echo $product_det->pro_title;?></h5>
                      <?php if($product_det->pro_no_of_purchase >= $product_det->pro_qty) { ?>
                                    <h4 style="text-align:center;"><a  class="btn btn-danger">Sold</a> 
                                    <?php } else { ?>
                                      <?php
               	$mcat = strtolower(str_replace(' ','-',$product_det->mc_name));
                $smcat = strtolower(str_replace(' ','-',$product_det->smc_name));
			    $sbcat = strtolower(str_replace(' ','-',$product_det->sb_name));
                $ssbcat = strtolower(str_replace(' ','-',$product_det->ssb_name));
              		
			   $res = base64_encode($product_det->pro_id);
			   if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
					  <h4><a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" class="btn align_brn btnb-success"><i class="icon-large icon-shopping-cart icon_me"></i></a></h4>  <?php } ?>
                      <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
                       <h4><a href="{!! url('productview1').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" class="btn align_brn btnb-success"><i class="icon-large icon-shopping-cart icon_me"></i></a></h4>
               
			   <?php } ?>
               <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
                <h4><a href="{!! url('productview2').'/'.$mcat.'/'.$smcat.'/'.$res!!}" class="btn align_brn btnb-success"><i class="icon-large icon-shopping-cart icon_me"></i></a></h4>
			 
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
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!!$footer; !!}
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
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="<?php echo url(''); ?>/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="<?php echo url(); ?>/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	
</div>
<span id="themesBtn"></span>
</body>
</html>
