<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <div class="span3" id="sidebar">
                    <div class="well well-small btn-warning"><strong>Categories </strong></div>
                    <ul id="css3menu1" class="topmenu"><input type="checkbox" id="css3menu-switcher" class="switchbox"><label onClick="" class="switch" for="css3menu-switcher"></label>
                        <?php foreach($main_category as $fetch_main_cat) { $pass_cat_id1 = "1,".$fetch_main_cat->mc_id; ?>
                        <li class="topfirst"><a href="<?php echo url('catproducts/viewcategorylist')." / ".base64_encode($pass_cat_id1); ?>"><?php echo $fetch_main_cat->mc_name; ?> </a>
                            <?php if(count($sub_main_category[$fetch_main_cat->mc_id])!= 0) { ?>
                            <ul>
                                <?php foreach($sub_main_category[$fetch_main_cat->mc_id] as $fetch_sub_main_cat)  { $pass_cat_id2 = "2,".$fetch_sub_main_cat->smc_id; ?>
                                <?php if(count($second_main_category[$fetch_sub_main_cat->smc_id])!= 0) { ?>
                                <li class="subfirst"><a href="<?php echo url('catproducts/viewcategorylist')." / ".base64_encode($pass_cat_id2); ?>"><?php echo $fetch_sub_main_cat->smc_name ; ?></a>
                                    <ul>
                                        <?php  foreach($second_main_category[$fetch_sub_main_cat->smc_id] as $fetch_sub_cat) { $pass_cat_id3 = "3,".$fetch_sub_cat->sb_id;?>
                                        <?php if(count($second_sub_main_category[$fetch_sub_cat->sb_id])!= 0) { ?>
                                        <li class="subsecond"><a href="<?php echo url('catproducts/viewcategorylist')." / ".base64_encode($pass_cat_id3); ?>"><?php echo  $fetch_sub_cat->sb_name; ?></a>
                                            <ul>
                                                <?php  foreach($second_sub_main_category[$fetch_sub_cat->sb_id] as $fetch_secsub_cat) { $pass_cat_id4 = "4,".$fetch_secsub_cat->ssb_id; ?>
                                                <li class="subthird"><a href="<?php echo url('catproducts/viewcategorylist')." / ".base64_encode($pass_cat_id4); ?>"><?php echo $fetch_secsub_cat->ssb_name ?></a></li>
                                                <?php } ?> </ul>
                                            <?php } ?> </li>
                                        <?php } ?> </ul>
                                    <?php } ?> </li>
                                <?php } ?> </ul>
                            <?php } ?> </li>
                        <?php } ?>
                    </ul><br/>
                    <div class="clearfix"></div> <br/>
                    
                   </div>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo url();?>">Home</a> <span class="divider">/</span></li>
                        <li class="active">Payment Result </li>
                    </ul>
                    <div class="span4" style="margin:0px"> @if (Session::has('result'))
                        <h4>  Your Order Successfully Placed.</h5>	    @endif       @if (Session::has('fail'))    <h4>  Your Payment Process failed..</h5>	    @endif	 @if (Session::has('error'))    <h4>  Your Payment Process  has been stopped Due to Some error...</h5>	    @endif        </div>        <div class="clearfix"></div>	<hr class="soft"/>			 <h4>Thank You For Shopping with Laravel Ecommerce. </h4>				<h5>Transaction Details</h5>	<table class="table table-bordered">              <thead>                <tr>                	<th>Customer Name</th>                    <th>Transaction Id</th>					<th>Status</th>				</tr>              </thead>              <tbody>           			 <?php   			 if($orderdetails)				{ 				foreach($orderdetails as $orderdet) { } ?>				                  <tr>                <td><?php echo Session::get('username');?></td>                  <td><?php echo $orderdet->cod_transaction_id;?> </td>                  <td><?php echo "HOLD";?></td>                                                     </tr>		  <?php  } ?>				</tbody>            </table>		                          <h5> Product Details for Current Transaction </h5>	                                <table class="table table-bordered">              <thead>                <tr>                <th>Product Name</th>                  <th>Product Quantity</th>                  <th>Amount</th>                				</tr>              </thead>              <tbody>										<?php  if($orderdetails  )				{ 				foreach($orderdetails as $orderdet) {															/*if($orderdet->cod_order_type == 1){					$taxamount=($orderdet->cod_amt*$orderdet->pro_tax_percentage)/100;					}					else					{						$taxamount=($orderdet->cod_amt*$orderdet->pro_tax_percentage)/100;					}*/					if($orderdet->cod_order_type == 1)					{						$shipamt = $orderdet->pro_shippamt;						$taxamount=($orderdet->cod_amt*$orderdet->pro_inctax)/100;					}					else					{						$shipamt = 0;						$taxamount=0;					}					 ?>								  <tr>               	  <td><?php if($orderdet->cod_order_type == 1){ echo $orderdet->pro_title; } else { echo $orderdet->deal_title;}?></td>                  <td><?php echo $orderdet->cod_qty  ;?> </td>                  <td><?php echo $orderdet->cod_amt; ?></td>      			 </tr>				<?php  }								 				} ?>                	 <tr>               	  <td>&nbsp;</td>                  <td style="font-weight:bold;">Sub-Total</td>                  <td style="font-weight:bold;"><?php  echo $get_subtotal;            ?></td>      			 </tr>
                        <tr>               	  <td>&nbsp;</td>                  <td style="font-weight:bold;">Tax</td>                  <td style="font-weight:bold;"><?php  echo $get_tax;            ?></td>      			 </tr>
                           <tr>               	  <td>&nbsp;</td>                  <td style="font-weight:bold;">Shipping Total</td>                  <td style="font-weight:bold;"><?php  echo $get_shipping_amount;            ?></td>      			 </tr>
                            <tr>               	  <td>&nbsp;</td>                  <td style="font-weight:bold;">Total</td>                  <td style="font-weight:bold;"><?php $total = $get_subtotal + $get_tax + $get_shipping_amount;  echo number_format((float)$total, 2, '.', '');  ?></td>      			 </tr>
                        </tbody>            </table>         	<h4>			 	</h4></div>
                </div>
            </div>
        </div>
        <!-- MainBody End ============================= -->
        <!-- Footer ================================================================== -->{!! $footer !!}

        <script src="<?php echo url('');?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
        <script src="<?php echo url('');?>/plug-k/demo/js/demo.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo url('');?>/themes/js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="<?php echo url('');?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $(".topnav").accordion({
                    accordion: true,
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