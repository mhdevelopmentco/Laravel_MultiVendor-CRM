<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->

{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

<!-- Sidebar ================================================== -->






<!-- Sidebar end=============================================== -->







	<div class="span12">



    <ul class="breadcrumb">



		<li><a href="index">Home</a> <span class="divider">/</span></li>



		<li class="active"> Shopping Cart</li>



    </ul>



    <?php if(isset($_SESSION['cart'])){



		$count2 =  count($_SESSION['cart']);



	} else { $count2 =  0; }



	if(isset($_SESSION['deal_cart'])){	 



		 $count1 = count($_SESSION['deal_cart']); 		



		} 		



		else { $count1 = 0; } 



		$count = $count1 + $count2;



		?>



	<h3>  Shopping Cart [ <small><?php echo $count;  ?> Item(s) </small>]<a href="<?php echo url('index'); ?>" class="btn btn-large pull-right me_btn res-cont1"><i class="icon-arrow-left"></i> <span style="font-weight:normal;" >Continue Shopping</span> </a>



   



    </h3>	



	<hr class="soft hide-mob"/>		



	<?php if($count != 0) {



	?>	



		 <?php if($session_result != ''){ ?>



 		 <div class="alert alert-danger alert-dismissable"><?php echo $session_result;?>



        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>



		<?php } ?>



   


    <div class="table-responsive"> 
	<table class="table table-bordered">



              <thead>



                <tr>



                  <th>Product</th>



                  <th>Description</th>



                  <th>Quantity/Update</th>



                 



				  <th>Color</th>



                  <th>Size</th>



                  



                  <th>Tax</th>



                  <th>Total</th>



				</tr>



              </thead>



              



              <tbody>



               <?php 



			   $z = 1;



			   $overall_total_price=0;



			  if($count != 0) {



			  if(isset($_SESSION['cart'])){	



			  $cart_error = 1;			   



				$max=count($_SESSION['cart']);



				$overall_total_price='';



				$z = 1;



				for($i=0;$i<$max;$i++){



					



					$pid=$_SESSION['cart'][$i]['productid'];



					$q=$_SESSION['cart'][$i]['qty'];



					$pname="Have to get";



					foreach($result_cart[$pid] as $session_cart_result) {



						$product_img=explode('/**/',$session_cart_result->pro_Img);	



						$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);



						$overall_total_price +=$session_cart_result->pro_disprice * $q;

						$max_qty =  $session_cart_result->pro_qty - $session_cart_result->pro_no_of_purchase; 





				?>



                 <tr>



                  <td><?php echo $z;?> </td>



                  <td><?php echo $session_cart_result->pro_title; ?></td>



                  <td><img width="60" src="<?php echo url('/assets/product/').'/'.$product_img[0]; ?>" alt="<?php echo $session_cart_result->pro_title; ?>"/></td>



                   <td><?php echo $color_result[$_SESSION['cart'][$i]['color']];?> </td>



                    <td><?php echo $size_result[$_SESSION['cart'][$i]['size']];?> </td>



                   



				  <td>



					<div class="input-append"><input class="span1" style="max-width:34px" id="pro_qty<?php echo $z; ?>" placeholder=""  size="16" value="<?php echo $q; ?>" type="text"><button class="btn" type="button" onClick="minus(<?php echo $z; ?>,<?php echo $pid; ?>)"><i class="icon-minus"></i></button><button class="btn" type="button" onClick="add(<?php echo $z; ?>,<?php echo $pid; ?>,<?php echo $max_qty;?>)"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button" onClick="del(<?php echo $pid?>)"><i class="icon-remove icon-white"></i></button>				</div>



				  </td>



                  



                  <td>$<?php echo $session_cart_result->pro_disprice;?></td>                 



                  <td>$<?php echo $item_total_price.'.00';?></td>



                </tr>		



                <?php $z++;} } }			



				?>	



                



                



                



				<?php  



				$y = 0;



				$overall_total_price1 = 0;



				if(isset($_SESSION['deal_cart'])){	



				$dealcart_error = 1;	



				$max=count($_SESSION['deal_cart']);



				$overall_total_price1='';



	



				for($i=0;$i<$max;$i++){



					



					$pid=$_SESSION['deal_cart'][$i]['productid'];



					$q=$_SESSION['deal_cart'][$i]['qty'];



					$pname="Have to get";



					foreach($result_cart_deal[$pid] as $session_cart_result) {



						$product_img=explode('/**/',$session_cart_result->deal_image);	



						$item_total_price = ($_SESSION['deal_cart'][$i]['qty']) * ($session_cart_result->deal_discount_price);



						$overall_total_price1 +=$session_cart_result->deal_discount_price * $q;

						$max_deal_qty =  $session_cart_result->deal_max_limit - $session_cart_result->deal_no_of_purchase;

					



				?>



                 <tr>



                  <td><?php echo $z;?> </td>



                  <td><?php echo $session_cart_result->deal_title; ?></td>



                  <td><img width="60" src="<?php echo url('/assets/deals/').'/'.$product_img[0]; ?>" alt="<?php echo $session_cart_result->deal_title; ?>"/></td>                 



                  <td>N/A </td>



                  <td>N/A </td>



                    



				  <td>



					<div class="input-append"><input class="span1" style="max-width:34px" id="pro_qty<?php echo $z; ?>" placeholder=""  size="16" value="<?php echo $q; ?>" type="text"><button class="btn" type="button" onClick="minus_dealcart(<?php echo $z; ?>,<?php echo $pid; ?>)"><i class="icon-minus"></i></button><button class="btn" type="button" onClick="add_dealcart(<?php echo $z; ?>,<?php echo $pid; ?>,<?php echo $max_deal_qty;?>)"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button" onClick="del_dealcart(<?php echo $pid?>)"><i class="icon-remove icon-white"></i></button>				</div>



				  </td>



                  



                  <td>$<?php echo $session_cart_result->deal_discount_price;?></td>                 



                  <td>$<?php echo $item_total_price.'.00';?></td>



                </tr>		



                <?php $z++;} } 			



				?>	



                



                



               



                



				 <tr>



                  <td colspan="7" style="text-align:right"><strong>Total =</strong></td>   



                  <td colspan="8" align="center"> <strong> $<?php  echo $overall_total_price + $overall_total_price1;?> </strong></td>



                </tr>



                <?php }  } ?>



       



				</tbody>



            </table>

</div>

			



		



            <!--<table class="table table-bordered">



			<tbody>



				 <tr>



                  <td> 



				<form class="form-horizontal">



				<div class="control-group">



				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>



				<div class="controls">



				<input type="text" class="input-medium" placeholder="CODE">



				<button type="submit" class="btn"> ADD </button>



				</div>



				</div>



				</form>



				</td>



                </tr>



				



			</tbody>



			</table>-->



			



			<table class="table table-bordered" style="display:none;">



			 <tr><th style="background: #1D84C1;color:white">ESTIMATE YOUR SHIPPING </th></tr>



			 <tr> 



			 <td>



				<form class="form-horizontal">



				  <div class="control-group"  >



					<label class="control-label" for="inputPost"  style="width:440px;">Check product availability at your location(Post Code/ Zipcode) </label>



					<div class="controls" style="margin-left:458px;">



					  <input type="text" id="estimate_check_val" placeholder="ex: 641041">



					</div>



				  </div>



				  <div class="control-group">



					<div class="controls" style="margin-left:425px;">



					  <button type="button" class="btn" id="estimate_check" style="background:#424542;color:white;text-shadow:none">Verify </button><br>



                      <div id="result_zip_code" style="margin-top:10px;"> </div>



					</div>



				  </div>



				</form>				  



			  </td>



			  </tr>



            </table>	



            <?php } else { ?>



            <table class="table table-bordered">



              <thead>



              <tr><td>



              No Items in cart...



              </td></tr>



              </thead>



              </table>



              



            <?php } ?>	



	<a href="<?php echo url('index'); ?>" class="btn btn-large me_btn res-cont2"><i class="icon-arrow-left"></i> Continue Shopping </a>



     <?php if(Session::has('customerid')){ ?>





	 <?php if($count2 > 0 || $count1 > 0){ ?>  <a href="<?php echo url('checkout');?>" class="btn btn-large pull-right res-proc1" style="background:#424542;color:white;text-shadow:none;"> Proceed to Checkout <i class="icon-arrow-right"></i></a> <?php } ?>



     



     <?php } else { ?>



     



     <?php if($count2 > 0 || $count1 > 0){  ?>  <a href="#login" role="button" data-toggle="modal" class="btn btn-large pull-right res-proc2" style="background: #424542;
    text-shadow: none;
    border: none;
    color: white;"> Proceed to Checkout <i class="icon-arrow-right"></i></a> <?php } ?>



     <?php } ?>







	



</div>



</div></div>



</div>



<!-- MainBody End ============================= -->



<!-- Footer ================================================================== -->



  <script src="<?php echo url(); ?>/plug-k/demo/js/jquery-1.8.0.min.js" type="text/javascript"></script>



	{!!$footer; !!}



<!-- Placed at the end of the document so the pages load faster ============================================= -->



	<script src="<?php echo url(); ?>/themes/js/jquery.js" type="text/javascript"></script>



	<script src="<?php echo url(); ?>/themes/js/bootstrap.min.js" type="text/javascript"></script>



	<script src="<?php echo url(); ?>/themes/js/google-code-prettify/prettify.js"></script>



	



    <script src="<?php echo url(); ?>/themes/js/bootshop.js"></script>



    <script src="<?php echo url(); ?>/themes/js/jquery.lightbox-0.5.js"></script>



	



  



    <script type="text/javascript">



$(document).ready(function(){



$('#estimate_check').click(function()



{



 var estimate_check_val = $('#estimate_check_val').val();



 if(estimate_check_val == "")



 {



	 $('#estimate_check_val').css("border-color", "red");



	 $('#estimate_check_val').focus();



 }



 else if(isNaN(estimate_check_val))



 {



	  $('#estimate_check_val').css("border-color", "red");



	  $('#estimate_check_val').focus();



 }



 else



 {



	 $('#estimate_check_val').css("border-color", "");



	  $('#result_zip_code');



	  



 var passData = 'estimate_check_val='+ estimate_check_val;



 //alert(passData);



	 $.ajax( {



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('check_estimate_zipcode'); ?>',



				  success: function(responseText){  



				  if(responseText != 0 )



				  {



				  $('#result_zip_code').html('<span style="color:green;margin-top:10px;" ><b>Product can be dispatched at your location in '+responseText+ ' bussiness days</b></span>' );



				  } else



				  {



					  $('#result_zip_code').html('<span style="color:red;margin-top:10px;" ><b>Sorry!! No dispatched item for your location</b></span>' );



				  }



}



});



}



return false;   



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



    <script>



	function add(sno,pid,max_qty)



	{



		var id = document.getElementById('pro_qty'+sno).value;



		if(id < max_qty)



		{



		document.getElementById('pro_qty'+sno).value = parseInt(id) + 1;



		var new_id = document.getElementById('pro_qty'+sno).value;



		var passData = 'id='+new_id+'&pid='+pid;



		//alert(passData);



		 $.ajax({



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('set_quantity_session_cart'); ?>',



				  success: function(responseText){  



				  //alert(responseText);



        			 window.location.href = 'addtocart';



				  	}		



			});



			return false;    



		}



	}



	function minus(sno,pid)



	{



		var id = document.getElementById('pro_qty'+sno).value;



		if(id <= 10 && id > 0)



		{



		document.getElementById('pro_qty'+sno).value = parseInt(id) - 1;



		var new_id = document.getElementById('pro_qty'+sno).value;



		var passData = 'id='+new_id+'&pid='+pid;



		//alert(passData);



		 $.ajax({



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('set_quantity_session_cart'); ?>',



				  success: function(responseText){  



				  //alert(responseText);



        		 window.location.href = 'addtocart';



				  	}		



			});



			return false;    



		}



	}



	function del(id)



	{



		//alert(id);



		 var passData = 'id='+id;



		



			 $.ajax( {



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('remove_session_cart_data'); ?>',



				  success: function(responseText){  



				  window.location.href = 'addtocart';



				  						}		



			});



			return false;    		



			



   }



   



   function add_dealcart(sno,pid,max_deal_qty)



	{



		var id = document.getElementById('pro_qty'+sno).value;



		if(id < max_deal_qty)



		{



		document.getElementById('pro_qty'+sno).value = parseInt(id) + 1;



		var new_id = document.getElementById('pro_qty'+sno).value;



		var passData = 'id='+new_id+'&pid='+pid;



		//alert(passData);



		 $.ajax({



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('set_quantity_session_dealcart'); ?>',



				  success: function(responseText){  



				  //alert(responseText);



        			 window.location.href = 'addtocart';



				  	}		



			});



			return false;    



		}



	}



	function minus_dealcart(sno,pid)



	{



		var id = document.getElementById('pro_qty'+sno).value;



		if(id <= 10 && id > 0)



		{



		document.getElementById('pro_qty'+sno).value = parseInt(id) - 1;



		var new_id = document.getElementById('pro_qty'+sno).value;



		var passData = 'id='+new_id+'&pid='+pid;



		//alert(passData);



		 $.ajax({



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('set_quantity_session_dealcart'); ?>',



				  success: function(responseText){  



				  //alert(responseText);



        		 window.location.href = 'addtocart';



				  	}		



			});



			return false;    



		}



	}



	function del_dealcart(id)



	{



		//alert(id);



		 var passData = 'id='+id;



		



			 $.ajax( {



			      type: 'GET',



				  data: passData,



				  url: '<?php echo url('remove_session_dealcart_data'); ?>',



				  success: function(responseText){  



				  window.location.href = 'addtocart';



				  						}		



			});



			return false;    		



			



   }



	</script>



	 <script src="<?php echo url(); ?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>



    <script src="<?php echo url(); ?>/plug-k/demo/js/demo.js" type="text/javascript"></script>



</body>



</html>

