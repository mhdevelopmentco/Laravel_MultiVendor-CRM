
<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->

{!! $header !!}

<!-- Header End====================================================================== -->

<div id="mainBody">

	<div class="container">

	<div class="row">

<!-- Sidebar end=============================================== -->

	<div class="span12">

    <ul class="breadcrumb">

		<li><a href="index.html">Home</a> <span class="divider">/</span></li>

		<li class="active">Checkout</li>

    </ul>

	<h3>CHECKOUT</h3>

    <div class="row">

    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $count = $item_count_header1 + $item_count_header2;

	if($count !=0) {

	?>

             

                    <div class="col-lg-2">

                    </div>

        {!! Form::Open(array('url' => 'payment_checkout_process')) !!}            

    <div class="span6">
	
    <?php if($count > 1) { ?>

   <!-- <label class="control-label col-lg-8" for="text1">

       Multiple Shipping Address

       &nbsp;<input type="radio" name="mul_shipping_addr" id="mulshipping_addr_1rad" value="yes" style="margin-top:-2px;"> Yes

       &nbsp;<input type="radio" name="mul_shipping_addr" id="mulshipping_addr_2rad" value="no"  style="margin-top:-2px;" checked="true"> No

       <span class="text-sub"></span></label>-->

       <?php } else { ?>
		<!--<input type="radio" style="display:none;" name="mul_shipping_addr" id="mulshipping_addr_2rad" value="no"  style="margin-top:-2px;" checked="true" > -->
		<?php } ?>
		
		<?php // Shipping address starts here ?>
		 <div style="border: 1px solid #202020;
    padding: 14px;margin-bottom:25px;" id="shipping_addr_div"   class="shipping_addr_class" >

        <h5 class="panel-deal">SHIPPING ADDRESS<?php //echo $z;?></h5>

        

       <label class="control-label col-lg-8" for="text1">

       Load Shipping Address For The Profile Details

       &nbsp;<input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_1rad<?php //echo $z;?>" onClick="shipping_addr_func(1)" value="yes" style="margin-top:-2px;"> Yes

       &nbsp;<input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_2rad<?php //echo $z;?>" onClick="shipping_addr_func(0)" value="no"  style="margin-top:-2px;" checked="true"> No

       <span class="text-sub"></span></label>

    <legend></legend>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="fname<?php //echo $z;?>" name="fname<?php //echo $z;?>" placeholder="" required class="form-control">

                         <input type="hidden" id="load_ship<?php //echo $z;?>" name="load_ship<?php //echo $z;?>" value="0">

                    </div>

                </div>

    </div>  

 <!--    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Last Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="lname<?php //echo $z;?>" name="lname<?php //echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div> -->
   <div class="span"> 

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line1<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr_line<?php //echo $z;?>" name="addr_line<?php //echo $z;?>" placeholder="" required class="form-control">

                    </div>

                </div>

    </div>
    </div>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line2<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr1_line<?php //echo $z;?>" name="addr1_line<?php //echo $z;?>" placeholder="" required class="form-control">

                    </div>

                </div>

    </div>

    <div class="span">

    <div class="form-group"> 

                    <label for="text1" class="control-label col-lg-2">City<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="city<?php //echo $z;?>" name="city<?php //echo $z;?>" placeholder="" required class="form-control">

                    </div>

                </div>

    </div>

    </div>

    <div class="row">



    <div class="span">

    <div class="row-fluid">

    <div class="span4">

    <label class="control-label col-lg-2" for="text1">State<span class="text-sub">*</span></label>

   <input type="text" id="state<?php //echo $z;?>" name="state<?php //echo $z;?>" placeholder="" required class="form-control">

    </div>



    </div>

    </div>

    <div class="span">

    <div class="row-fluid">

    <div class="span4">

    <label class="control-label col-lg-2" for="text1">Country<span class="text-sub">*</span></label>

   <input type="text" id="country<?php //echo $z;?>" name="country<?php //echo $z;?>" placeholder="" required class="form-control">

    </div>



    </div>

    </div>

    </div>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Phone Number<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" class="form-control span"  placeholder="" name="phone1_line<?php //echo $z;?>" required id="phone1_line<?php //echo $z;?>" maxlength="10">

                        <?php /*?> <input type="text" class="form-control span1" onKeyup=" if($(this).val().length > 3){ $('#phone3_line<?php echo $z;?>').focus();}" placeholder="" id="phone2_line<?php echo $z;?>" maxlength="4">

                          <input type="text" class="form-control span1" placeholder="" id="phone3_line<?php echo $z;?>" maxlength="4">
<?php */?>
                          

                    </div>

                </div>

    </div>

    <div class="span">

   

                    <label class="control-label col-lg-2" for="text1">Zip Code<span class="text-sub">*</span></label>

                    <div class="col-lg-8">

<input type="text" class="form-control span" placeholder="" required id="zipcode<?php //echo $z;?>" name="zipcode<?php //echo $z;?>">

                    </div>

               
    </div>

        <div class="span">

   

                    <label class="control-label col-lg-2" for="text1">Email<span class="text-sub">*</span></label>

                    <div class="col-lg-8">

<input type="text" class="form-control span" placeholder=""  required id="email<?php //echo $z;?>" name="email<?php //echo $z;?>" value="">

                    </div>

               
    </div>

    </div>

    </div>
<?php // shipping address ends here ?>
   <?php  $z = 1; 
   if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){				   

				//$max=count($_SESSION['cart']);
				
				$max = 1;

				$overall_total_price='';

				$overall_shipping_price='';

				$overall_tax_price='';

				

				for($i=0;$i<$max;$i++){

					

					$pid=$_SESSION['cart'][$i]['productid'];

					$q=$_SESSION['cart'][$i]['qty']; ?>

             

      
<?php /*
    <div style="border: 1px solid #202020;
    padding: 14px;margin-bottom:25px;" id="shipping_addr_div<?php echo $pid;?>"  <?php if($z > 1){ ?> class="shipping_addr_class" style="display:none;"<?php } ?>>

        <h5 class="panel-deal">SHIPPING ADDRESS<?php //echo $z;?></h5>

        

       <label class="control-label col-lg-8" for="text1">

       Load Shipping Address For The Profile Details

       &nbsp;<input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_1rad<?php //echo $z;?>" onClick="shipping_addr_func(1)" value="yes" style="margin-top:-2px;"> Yes

       &nbsp;<input type="radio" name="shipping_addr<?php //echo $z;?>" id="shipping_addr_2rad<?php //echo $z;?>" onClick="shipping_addr_func(0)" value="no"  style="margin-top:-2px;" checked="true"> No

       <span class="text-sub"></span></label>

    <legend></legend>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="fname<?php //echo $z;?>" name="fname<?php //echo $z;?>" placeholder="" class="form-control">

                         <input type="hidden" id="load_ship<?php //echo $z;?>" name="load_ship<?php //echo $z;?>" value="0">

                    </div>

                </div>

    </div>  

 <!--    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Last Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="lname<?php //echo $z;?>" name="lname<?php //echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div> -->
   <div class="span"> 

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line1<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr_line<?php //echo $z;?>" name="addr_line<?php //echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>
    </div>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line2<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr1_line<?php //echo $z;?>" name="addr1_line<?php //echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    <div class="span">

    <div class="form-group"> 

                    <label for="text1" class="control-label col-lg-2">City<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="city<?php //echo $z;?>" name="city<?php //echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    </div>

    <div class="row">



    <div class="span">

    <div class="row-fluid">

    <div class="span4">

    <label class="control-label col-lg-2" for="text1">State<span class="text-sub">*</span></label>

   <input type="text" id="state<?php //echo $z;?>" name="state<?php //echo $z;?>" placeholder="" class="form-control">

    </div>



    </div>

    </div>

    <div class="span">

    <div class="row-fluid">

    <div class="span4">

    <label class="control-label col-lg-2" for="text1">Country<span class="text-sub">*</span></label>

   <input type="text" id="country<?php //echo $z;?>" name="country<?php //echo $z;?>" placeholder="" class="form-control">

    </div>



    </div>

    </div>

    </div>

    <div class="row">

    <div class="span">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Phone Number<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" class="form-control span"  placeholder="" name="phone1_line<?php //echo $z;?>" id="phone1_line<?php //echo $z;?>" maxlength="10">
*/ ?>
                        <?php /*?> <input type="text" class="form-control span1" onKeyup=" if($(this).val().length > 3){ $('#phone3_line<?php echo $z;?>').focus();}" placeholder="" id="phone2_line<?php echo $z;?>" maxlength="4">

                          <input type="text" class="form-control span1" placeholder="" id="phone3_line<?php echo $z;?>" maxlength="4">
<?php */?>
        <?php /*                  

                    </div>

                </div>

    </div>

    <div class="span">

   

                    <label class="control-label col-lg-2" for="text1">Zip Code<span class="text-sub">*</span></label>

                    <div class="col-lg-8">

<input type="text" class="form-control span" placeholder="" id="zipcode<?php //echo $z;?>" name="zipcode<?php //echo $z;?>">

                    </div>

               
    </div>

        <div class="span">

   

                    <label class="control-label col-lg-2" for="text1">Email<span class="text-sub">*</span></label>

                    <div class="col-lg-8">

<input type="text" class="form-control span" placeholder=""  required id="email<?php //echo $z;?>" name="email<?php //echo $z;?>" value="">

                    </div>

               
    </div>

    </div>

    </div>
*/ ?>
    <?php $z++; 
	} } ?>

    <?php   if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){				   

				$max=count($_SESSION['deal_cart']);

				$overall_total_price='';

				$overall_shipping_price='';

				$overall_tax_price='';
				
				

				for($i=0;$i<$max;$i++){

					

					$pid=$_SESSION['deal_cart'][$i]['productid'];

					$q=$_SESSION['deal_cart'][$i]['qty']; ?>

             

      
<?php /* 
    <div style="border: 1px solid #202020;
    padding: 14px;" id="shipping_addr_div<?php echo $pid;?>"  <?php if($z > 1){ ?> class="shipping_addr_class" style="display:block;"<?php } ?>>

        <h5 class="panel-deal">DEAL SHIPPING ADDRESS <?php echo $z;?></h5>

        

       <label class="control-label col-lg-8" for="text1">

       Load Shipping Address For The Profile Details

       &nbsp;<input type="radio" name="shipping_addr<?php echo $z;?>" id="shipping_addr_1rad<?php echo $z;?>" onClick="shipping_addr_func(<?php echo $z;?>,1)" value="yes" style="margin-top:-2px;"> Yes

       &nbsp;<input type="radio" name="shipping_addr<?php echo $z;?>" id="shipping_addr_2rad<?php echo $z;?>" onClick="shipping_addr_func(<?php echo $z;?>,0)" value="no"  style="margin-top:-2px;" checked="true"> No

       <span class="text-sub"></span></label>

    <legend></legend>

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">First Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="fname<?php echo $z;?>" name="fname<?php echo $z;?>" placeholder="" class="form-control">

                         <input type="hidden" id="load_ship<?php echo $z;?>" name="load_ship<?php echo $z;?>" value="0">

                    </div>

                </div>

    </div>  

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Last Name<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="lname<?php echo $z;?>" name="lname<?php echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3 width-deal"> 

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line1<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr_line<?php echo $z;?>" name="addr_line<?php echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Address Line2<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="addr1_line<?php echo $z;?>" name="addr1_line<?php echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group"> 

                    <label for="text1" class="control-label col-lg-2">City<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" id="city<?php echo $z;?>" name="city<?php echo $z;?>" placeholder="" class="form-control">

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="row-fluid">

    <div class="span4">

    <label class="control-label col-lg-2" for="text1">State<span class="text-sub">*</span></label>

   <input type="text" id="state<?php echo $z;?>" name="state<?php echo $z;?>" placeholder="" class="form-control">

    </div>

    <div class="span4">

      

    

    </div>

    </div>

    </div>

    </div>

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Phone Number<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" class="form-control"  placeholder="" name="phone1_line<?php echo $z;?>" id="phone1_line<?php echo $z;?>" maxlength="10">
*/ ?>
                         <?php /*?><input type="text" class="form-control span1" onKeyup=" if($(this).val().length > 3){ $('#phone3_line<?php echo $z;?>').focus();}" placeholder="" id="phone2_line<?php echo $z;?>" maxlength="4">

                          <input type="text" class="form-control span1" placeholder="" id="phone3_line<?php echo $z;?>" maxlength="4"><?php */ ?>

             <?php /*             

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

   

                    <label class="control-label col-lg-2" for="text1">Zip Code<span class="text-sub">*</span></label>

                    

<input type="text" class="form-control" placeholder="" id="zipcode<?php echo $z;?>" name="zipcode<?php echo $z;?>">


                

    </div>

        <div class="span3 width-deal">

   

                    <label class="control-label col-lg-2" for="text1">Email<span class="text-sub">*</span></label>

                    

<input type="text" class="form-control" placeholder="example@gmail.com" required id="email<?php echo $z;?>" name="email<?php echo $z;?>" value="123">


                

    </div>

    </div>

    </div>
<?php */ ?>
    <?php $z++;} } ?>

    <?php } if($count > 1) { ?>

    <div class="row">

    <div class="span5">

    <!--<div class="form-group">

                    <label class="control-label col-lg-8" for="text1">

                                             Same Shipping Address For The Other Products

                                     &nbsp;<input type="radio" name="shipping_addr" id="shipping_addr_rad1" value="yes" checked=""style="margin-top:-2px;"> Yes

                                              &nbsp;<input type="radio" name="shipping_addr" id="shipping_addr_rad2" value="no" checked="" style="margin-top:-2px;"> No

                                                                  

                    <span class="text-sub"></span></label>

                    <div class="col-lg-2">

                    </div>

                </div>-->

    </div>

    <div class="span3 width-deal">

    <div class="form-group">

                    <label class="control-label col-lg-8" for="text1"> 

                   

                    <span class="text-sub"></span></label>

                    <div class="col-lg-2">  

                    </div>

                </div>

    </div>

    

    </div>

    <?php } ?>

    

    <?php 

	 foreach($shipping_addr_details as $ship_addr_det){} 

	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $count = $item_count_header1 + $item_count_header2;
if($count !=0) {
	?>

  

    <input type="hidden" name="count_pid" id="count_pid" value="<?php echo $count; ?>" />
  <?php  if($shipping_addr_details) { ?>
    <input type="hidden" name="ship_name" id="ship_name" value="<?php echo $ship_addr_det->ship_name; ?>" />

	<input type="hidden" name="ship_address1" id="ship_address1" value="<?php echo $ship_addr_det->ship_address1; ?>" />

	<input type="hidden" name="ship_address2" id="ship_address2" value="<?php echo $ship_addr_det->ship_address2; ?>" />

	<input type="hidden" name="ship_city" id="ship_city" value="<?php echo $ship_addr_det->ci_name; ?>" />

    <input type="hidden" name="ship_state" id="ship_state" value="<?php echo $ship_addr_det->ship_state; ?>" />

    <input type="hidden" name="ship_postalcode" id="ship_postalcode" value="<?php echo $ship_addr_det->ship_postalcode; ?>" />

    <input type="hidden" name="ship_phone" id="ship_phone" value="<?php echo $ship_addr_det->ship_phone; ?>" />

    <input type="hidden" name="ship_email" id="ship_email" value="<?php echo $ship_addr_det->ship_email; ?>" />

    <input type="hidden" name="ship_country" id="ship_country" value="<?php echo $ship_addr_det->co_name; ?>" />
	<?php } ?>
	
                    <label for="text1" class="control-label col-lg-8" style="margin-top:20px;">

                                             Select Payment Method

                                              &nbsp;

                                              <input type="radio" checked value="1" id="paypal_radio" name="select_payment_type"style="margin-top:-2px;"> Paypal

                                              <?php foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> &nbsp;<input type="radio"  value="0" id="cod_radio" name="select_payment_type" style="margin-top:-2px;"> Cash On Delivery <?php } ?>

                                                                  

                    <span class="text-sub"></span></label>

                    <div class="col-lg-2">

                    </div>

     <!--<div id="total_select_pay_iformation">

    <h5>PAYMENT INFORMATION</h5>

    <legend></legend>  

    <div class="row">	

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Name on Card<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                        <input type="text" class="form-control" placeholder="" id="text1">

                    </div>

                </div>

    </div>

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Card No<span class="text-sub">*</span> <img src="themes/images/b3.png"></label>



                    <div class="col-lg-8">

                        <input type="text" class="form-control" placeholder="" id="text1">

                  </div>

                </div>

    </div>

    </div>

    

    <div class="row">

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Expiration<span class="text-sub">*</span></label>



                   <div class="col-lg-8">

                       <select class="form-control span1">

            <option>Default</option>

            <option>English</option>

            <option>3</option>

            <option>4</option>

            <option>5</option>

        </select>

                        <select class="form-control span1">

            <option>Default</option>

            <option>English</option>

            <option>3</option>

            <option>4</option>

            <option>5</option>

        </select>

                          

                    </div>

                </div>



    </div>

    <div class="span3">

    <div class="form-group">

                   <br>



                    <div class="col-lg-8">

                       <input type="checkbox" checked="" value="option1" id="optionsRadios1" name="optionsRadios">&nbsp;Save card

                    </div>

                </div>

    </div>

    </div>

    </div>-->

    

    <div class="row hide" id="cod_div">

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2"><img src="themes/images/cod_delivery.png" width="150" height="81">

                    <span class="text-sub"></span></label>

                    <div class="col-lg-8">



                    </div>

                </div>

    </div>

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>



                    <div class="col-lg-8">

                     

                    </div>

                </div>

    </div>

    </div>

    

    <div class="row" id="paypal_div">

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2"><img src="themes/images/bn2.png" width="150" height="100">

                    <span class="text-sub"></span></label>

                    <div class="col-lg-8">



                    </div>

                </div>

    </div>

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>



                    <div class="col-lg-8">

                     

                    </div>

                </div>

    </div>

    </div>

    <legend></legend>

    <div class="row">

  

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-8"> 

                   

                    <span class="text-sub"></span></label>

                    <div class="col-lg-2">  

                    </div>

                </div>

    </div>

    </div>
<?php } ?>
    </div>

    

    

    

    

    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $count = $item_count_header1 + $item_count_header2;

			

	if($count != 0) {

	?>



     <div class="span6">

     
<div style="border: 1px solid #202020;
    padding: 14px;" id="shipping_addr_div">
     <h5 class="panel-deal">ORDER SUMMARY [ <small style="color:white !important"><?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $item_count_header = $item_count_header1 + $item_count_header2;

			 if($item_count_header != 0) { echo $item_count_header; } else { echo 0; } ?> Item(s) </small>]</h5>

     <legend></legend>

   

     <?php 

			  
		$z = 1;
		$overall_total_price='';

				$overall_shipping_price='';

				$overall_tax_price='';
			  if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){				   

				$max=count($_SESSION['cart']);

				

				

				for($i=0;$i<$max;$i++){

					

					$pid=$_SESSION['cart'][$i]['productid'];

					$q=$_SESSION['cart'][$i]['qty'];

					$size=$size_result[$_SESSION['cart'][$i]['size']];

					$color=$color_result[$_SESSION['cart'][$i]['color']];

					$pname="Have to get";

					

					foreach($result_cart[$pid] as $session_cart_result) {

						$product_img=explode('/**/',$session_cart_result->pro_Img);	

						$item_total_price = ($_SESSION['cart'][$i]['qty']) * ($session_cart_result->pro_disprice);

						$overall_total_price +=$session_cart_result->pro_disprice * $q;

						$overall_shipping_price +=$session_cart_result->pro_shippamt;

						$overall_tax_price +=$session_cart_result->pro_inctax;

	   					$delivery_date[$z] = '+'.$session_cart_result->pro_delivery.'days';

				?>
  <h4>Product Details </h4>
     <div class="row">

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Shipment <?php echo $z;?> <span class="text-sub">*</span></label>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3">

    <div class="form-group">

    				

                    <label class="control-label col-lg-2" for="text1">Estimated Delivery<span class="text-sub"> <?php  echo date('D,M,Y', strtotime($delivery_date[$z]));?></span></label>

                </div>

    </div>

    </div>

    

    <legend></legend>

    <div class="row product_select" style="margin:0px auto" id="product_select_div<?php echo $pid;?>">

    <div class="span2 check-wid">

      <img src="<?php echo url('/assets/product/').'/'.$product_img[0]; ?>" alt="<?php echo $session_cart_result->pro_title; ?>" width="100" height="auto" style="padding:10px"></div>

    <div class="span3">

  <label><?php echo $session_cart_result->pro_title; ?></label>

    <label>Size:<?php echo $size;?> - Color: <?php echo $color;?> <span class="pull-right">Qty:<?php echo $q;?></span></label>

    <label>Shipping:$<?php echo $session_cart_result->pro_shippamt;?> <span class="pull-right">Tax:<?php echo $session_cart_result->pro_inctax.' %';?></span></label>

      <label>Price:$<?php echo $session_cart_result->pro_disprice;?><span class="pull-right">Total:$<?php echo $item_total_price.'.00';?></span></label>

      

    </div>

    </div>

    <br>

    <input type="hidden" name="item_name[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_title; ?>" />

    <input type="hidden" name="item_type[<?php echo $z;?>]" value="1" />

	<input type="hidden" name="item_code[<?php echo $z;?>]" value="<?php echo $pid; ?>" />

	<input type="hidden" name="item_desc[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_desc; ?>" />

	<input type="hidden" name="item_qty[<?php echo $z;?>]" value="<?php echo $q; ?>" />

    <input type="hidden" name="item_color[<?php echo $z;?>]" value="<?php echo $_SESSION['cart'][$i]['color']; ?>" />

    <input type="hidden" name="item_size[<?php echo $z;?>]" value="<?php echo $_SESSION['cart'][$i]['size']; ?>" />

    <input type="hidden" name="item_color_name[<?php echo $z;?>]" value="<?php echo $color; ?>" />

    <input type="hidden" name="item_size_name[<?php echo $z;?>]" value="<?php echo $size; ?>" />

    <input type="hidden" name="item_price[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_disprice; ?>" />

    <input type="hidden" name="item_tax[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_inctax; ?>" />

    <input type="hidden" name="item_shipping[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_shippamt; ?>" />

    <input type="hidden" name="item_totprice[<?php echo $z;?>]" value="<?php echo $item_total_price; ?>" />
	
	<input type="hidden" name="item_merchant[<?php echo $z;?>]" value="<?php echo $session_cart_result->pro_mr_id; ?>" />

    

    

   <?php $no_item_found = 1; $z++;} } 	}		

				?>	

     

     <?php 
				$overall_deal_total_price='';

				$overall_deal_shipping_price='';

				$overall_deal_tax_price='';
			   if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){				   

				$max=count($_SESSION['deal_cart']);

				for($i=0;$i<$max;$i++){

					

					$pid=$_SESSION['deal_cart'][$i]['productid'];

					$q=$_SESSION['deal_cart'][$i]['qty'];

					$pname="Have to get";

					

					foreach($result_cart_deal[$pid] as $session_deal_cart_result) {

						$product_img=explode('/**/',$session_deal_cart_result->deal_image);	

						$item_total_price = ($_SESSION['deal_cart'][$i]['qty']) * ($session_deal_cart_result->deal_discount_price);

						$overall_deal_total_price +=$session_deal_cart_result->deal_discount_price * $q;

						$overall_deal_shipping_price +=0;


						$overall_deal_tax_price +=0;

	   					//$delivery_date[$z] = '+'.$session_deal_cart_result->pro_delivery.'days';

				?>
<h4>Deal Details </h4>
     <div class="row">

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Shipment <?php echo $z;?> <span class="text-sub">*</span></label>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3">

    <!--<div class="form-group">

    				

                    <label class="control-label col-lg-2" for="text1">Estimated Delivery<span class="text-sub"> <?php // echo date('D,M,Y', strtotime($delivery_date[$z]));?></span></label>

                </div>-->

    </div>

    </div>

    

    <legend></legend>

    <div class="row product_select" style="margin:0px auto" id="product_select_div<?php echo $pid;?>">

    <div class="span2">

      <img src="<?php echo url('/assets/deals/').'/'.$product_img[0]; ?>" alt="<?php echo $session_deal_cart_result->deal_title; ?>" width="100" height="auto" style="padding:10px"></div>

    <div class="span3">

  <label><?php echo $session_deal_cart_result->deal_title; ?></label>

    <?php /*?><label>Size:<?php //echo $size;?> - Color: <?php //echo $color;?> <span class="pull-right">Qty:<?php //echo $q;?></span></label><?php */?>

    <label>Qty:<?php echo $q;?></label>

    <?php /*?><label>Shipping:$<?php echo $session_cart_result->pro_shippamt;?> <span class="pull-right">Tax:$<?php echo $session_cart_result->pro_inctax.'.00';?></span></label><?php */?>

      <label>Price:$<?php echo $session_deal_cart_result->deal_discount_price;?><br><span class="">Total:$<?php echo $item_total_price.'.00';?></span></label>

      

    </div>

    </div>

    <br>

    <input type="hidden" name="item_name[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_title; ?>" />

    <input type="hidden" name="item_type[<?php echo $z;?>]" value="2" />

	<input type="hidden" name="item_code[<?php echo $z;?>]" value="<?php echo $pid; ?>" />

	<input type="hidden" name="item_desc[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_description; ?>" />

	<input type="hidden" name="item_qty[<?php echo $z;?>]" value="<?php echo $q; ?>" />

    <input type="hidden" name="item_color[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_size[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_color_name[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_size_name[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_price[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_discount_price; ?>" />

   <input type="hidden" name="item_tax[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_shipping[<?php echo $z;?>]" value="" />

    <input type="hidden" name="item_totprice[<?php echo $z;?>]" value="<?php echo $item_total_price; ?>" />

    <input type="hidden" name="item_merchant[<?php echo $z;?>]" value="<?php echo $session_deal_cart_result->deal_merchant_id; ?>" />

    

   <?php $no_item_found = 1; $z++;} } 	}		

				?>	

                 <legend></legend>

     <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Order Subtotal:<span class="text-sub">*</span></label>

		

                    <div class="col-lg-8">

                      

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">$<?php echo ($overall_total_price + $overall_deal_total_price).'.00';?></label>

		<input type="hidden" name="subtotal" value="<?php echo ($overall_total_price + $overall_deal_total_price); ?>" />

                    <div class="col-lg-8">

                       

                    </div>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Order Shipping<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                      

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">$<?php echo ($overall_shipping_price + $overall_deal_shipping_price).'.00';?></label>

<input type="hidden" name="shipping_price" value="<?php echo ($overall_shipping_price + $overall_deal_shipping_price); ?>" />

                    <div class="col-lg-8">

                       

                    </div>

                </div>

    </div>

    </div>

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">Order Tax<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                      

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="form-group">
					<?php  $overall_per_pro_tax = ($overall_total_price+$overall_shipping_price) *($overall_tax_price/100); 
							$overall_per_deal_tax = ($overall_deal_total_price+$overall_deal_shipping_price) *($overall_deal_tax_price/100); ?> 
                            
                    <label for="text1" class="control-label col-lg-2"><?php echo ($overall_tax_price + $overall_deal_tax_price).' %';?></label>

<input type="hidden" name="tax_price" value="<?php echo round($overall_per_pro_tax + $overall_per_deal_tax); ?>" />

                    <div class="col-lg-8">

                       

                    </div>

                </div>

    </div>

    </div>

    <!--<div class="row">

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">Select Shopping<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                       <select class="form-control">

            <option>Default</option>

            <option>English</option>

            <option>3</option>

            <option>4</option>

            <option>5</option>

        </select>

                    </div>

                </div>

    </div>

    <div class="span3">

    <div class="form-group"><br>

                    <label class="control-label col-lg-2" for="text1"><span class="text-sub"></span></label>



                    <div class="col-lg-8">

                        $95:00

                    </div>

                </div>

    </div>

    </div>-->

     

    <!--<div class="row">

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">My Credit:<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                      

                    </div>

                </div>

    </div>

    <div class="span3">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2">$45:00<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                       

                    </div>

                </div>

    </div>

    </div>-->

    <div class="row">

    <div class="span3 width-deal">

    <div class="form-group">

                    <label for="text1" class="control-label col-lg-2 me_color">Order Total:<span class="text-sub">*</span></label>



                    <div class="col-lg-8">

                      

                    </div>

                </div>

    </div>

    <div class="span3 width-deal">

    <div class="form-group">
					<?php  $overall_pro_price = ($overall_total_price+$overall_shipping_price) + (($overall_total_price+$overall_shipping_price) *($overall_tax_price/100)); 
							$overall_deal_price = ($overall_deal_total_price+$overall_deal_shipping_price) + (($overall_deal_total_price+$overall_deal_shipping_price) *($overall_deal_tax_price/100));  ?> 
                    <label for="text1" class="control-label col-lg-2 me_color">$<?php  echo round($overall_pro_price+$overall_deal_price);?></label>

			<input type="hidden" name="total_price" value="<?php echo round($overall_pro_price+$overall_deal_price); ?>" />

                    <div class="col-lg-8">

                       

                    </div>

                </div>

    </div>

    </div>

     <?php } ?>

    

    <div class="form-group">

    <br>

                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub" id="error_div" style="color:red;"></span></label>



                    <div class="col-lg-8">

                    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart'])&& !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $count = $item_count_header1 + $item_count_header2;
			 if($count != 0) {
			 ?>

                    <input type="hidden" name="count_session" id="count_session" value="<?php echo $count; ?>" />

                     <button type="submit" id="place_order_submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Place Order</button>
			 <?php } ?>
                   

                    </div>

					  

                </div>

     </div>
</div>
     </form>

      <?php if(empty($item_count_header)){ ?>

     <div class="span6">

     <h5>ORDER SUMMARY [ <small ><?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){	 $item_count_header1 = count($_SESSION['cart']); } else { $item_count_header1 = 0; } 

			if(isset($_SESSION['deal_cart']) && !empty($_SESSION['deal_cart'])){	 $item_count_header2 = count($_SESSION['deal_cart']); } else { $item_count_header2 = 0; }

			 $item_count_header = $item_count_header1 + $item_count_header2;

			 if($item_count_header != 0) { echo $item_count_header; } else { echo 0; } ?> Item(s) </small>]</h5>

     <legend></legend>

     <div class="row">

    <div class="span3">

    <div class="form-group">

                    <label class="control-label col-lg-2" for="text1">No Order's Placed </label>

                </div>

    </div>

    </div>

     </div>

     <?php } ?>

    </div>	

	



</div>

</div>

</div>

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

	

    <script>

	function shipping_addr_func(val)

    {

		//alert(pid+'-'+val);

		var ship_name = $('#ship_name').val(); 

		var ship_address1 = $('#ship_address1').val();

		var ship_address2 = $('#ship_address2').val();

		var ship_city = $('#ship_city').val();

		var ship_state =  $('#ship_state').val();

		var ship_postalcode = $('#ship_postalcode').val();

		var ship_phone =  $('#ship_phone').val();

        var ship_email =  $('#ship_email').val();  

		var ship_country = $('#ship_country').val();

		if( val > 0)

		{

		$('#fname').val(ship_name);

		$('#lname').val('');

		$('#addr_line').val(ship_address1);

		$('#addr1_line').val(ship_address2);

		$('#city').val(ship_city);

		$('#state').val(ship_state);

        $('#country').val(ship_country);

		$('#phone1_line').val(ship_phone);

		$('#zipcode').val(ship_postalcode); 

        $('#email').val(ship_email);



		$('#load_ship').val(1);

		}

		else

		{

			$('#fname').val('');

			$('#lname').val('');

			$('#addr_line').val('');

			$('#addr1_line').val('');

			$('#city').val('');

			$('#state').val('');

            $('#country').val('');

			$('#phone1_line').val('');

			$('#zipcode').val('');

            $('#email').val(''); 

			$('#load_ship').val(0);

		}

	}

	$(document).ready(function(){

		

		$('#paypal_radio').click(function(){			

				$('#paypal_div').show();

				$('#cod_div').hide();			

		});

		$('#cod_radio').click(function(){			

				$('#paypal_div').hide();

				$('#cod_div').show();

		});

		$('#mulshipping_addr_1rad').click(function(){	

			$('.shipping_addr_class').css("display","block");

			});

		$('#mulshipping_addr_2rad').click(function(){

				$('.shipping_addr_class').css("display","none");

				$('#shipping_addr_div1').css("display","block");

			});

		

		var count = $('#count_pid').val();

		var zip_regex =  /[0-9-()+]{6,7}/;

		var phone_regex =  /[0-9-()+]{8,10}/;

		$('#place_order_submit').click(function(){
			//alert($('input:radio[name=mul_shipping_addr]:checked').val());
			if($('input:radio[name=mul_shipping_addr]:checked').val()=="yes")

			{

			for(var i=1;i<=count;i++)

			{

				if($('#fname'+i).val() == '')

				{

					$('#fname'+i).css("border","1px solid red");

					$('#fname'+i).focus();

					$('#error_div').html('Enter First Name');

					return false;

				}

				else

				{

					$('#fname'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#lname'+i).val() == '')

				{

					$('#lname'+i).css("border","1px solid red");

					$('#lname'+i).focus();

					$('#error_div').html('Enter Last Name');

					return false;

				}

				else

				{

					$('#lname'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#addr_line'+i).val() == '')

				{

					$('#addr_line'+i).css("border","1px solid red");

					$('#addr_line'+i).focus();

					$('#error_div').html('Enter Address Line1');

					return false;

				}

				else

				{

					$('#addr_line'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#addr1_line'+i).val() == '')

				{

					$('#addr1_line'+i).css("border","1px solid red");

					$('#addr1_line'+i).focus();

					$('#error_div').html('Enter Address Line2');

					return false;

				}

				else

				{

					$('#addr1_line'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#city'+i).val() == '')

				{

					$('#city'+i).css("border","1px solid red");

					$('#city'+i).focus();

					$('#error_div').html('Enter your city');

					return false;

				}

				else

				{

					$('#city'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#state'+i).val() == '')

				{

					$('#state'+i).css("border","1px solid red");

					$('#state'+i).focus();

					$('#error_div').html('Enter your state');

					return false;

				}

				else

				{

					$('#state'+i).css("border","");

					$('#error_div').html('');

				}

				if($('#phone1_line'+i).val() == '')

				{

					$('#phone1_line'+i).css("border","1px solid red");

					$('#error_div').html('Enter your phone no');

					$('#phone1_line'+i).focus();

					return false;

				}

				else if(!phone_regex.test($('#phone1_line'+i).val()))

				{

					$('#phone1_line'+i).css("border","1px solid red");

					$('#phone1_line'+i).focus();

					$('#error_div').html('Enter your valid phone no');

					return false;

				}

				else

				{

					$('#phone1_line'+i).css("border","");

					$('#error_div').html('');

				}

				
				if($('#zipcode'+i).val() == '')

				{

					$('#zipcode'+i).css("border","1px solid red");

					$('#zipcode'+i).focus();

					$('#error_div').html('Enter your zipcode');

					return false;

				}

				else if(!zip_regex.test($('#zipcode'+i).val()))


				{

					$('#zipcode'+i).css("border","1px solid red");

					$('#zipcode'+i).focus();

					$('#error_div').html('Enter your valid zipcode');

					return false;

				}

				else

				{

					$('#zipcode'+i).css("border","");

					$('#error_div').html('');

				}

				

			}

			}

			else if($('input:radio[name=mul_shipping_addr]:checked').val()=="no")

			{		//alert('asd');

				if($('#fname1').val() == '')

				{

					$('#fname1').css("border","1px solid red");

					$('#fname1').focus();

					$('#error_div').html('Enter your first name');

					return false;

				}

				else

				{

					$('#fname1').css("border","");

					$('#error_div').html('');

				}

				if($('#lname1').val() == '')

				{

					$('#lname1').css("border","1px solid red");

					$('#lname1').focus();

					$('#error_div').html('Enter your last name');

					return false;

				}

				else

				{

					$('#lname1').css("border","");

					$('#error_div').html('');

				}

				if($('#addr_line1').val() == '')

				{

					$('#addr_line1').css("border","1px solid red");

					$('#addr_line1').focus();

					$('#error_div').html('Enter your address line1');

					return false;

				}

				else

				{

					$('#addr_line1').css("border","");

					$('#error_div').html('');

				}

				if($('#addr1_line1').val() == '')

				{

					$('#addr1_line1').css("border","1px solid red");

					$('#addr1_line1').focus();

					$('#error_div').html('Enter your address line2');

					return false;

				}

				else

				{

					$('#addr1_line1').css("border","");

					$('#error_div').html('');

				}

				if($('#city1').val() == '')

				{

					$('#city1').css("border","1px solid red");

					$('#city1').focus();

					$('#error_div').html('Enter your city');

					return false;

				}

				else

				{

					$('#city1').css("border","");

					$('#error_div').html('');

				}

				if($('#state1').val() == '')

				{

					$('#state1').css("border","1px solid red");

					$('#state1').focus();

					$('#error_div').html('Enter your state');

					return false;

				}

				else

				{

					$('#state1').css("border","");

					$('#error_div').html('');

				}

				if($('#phone1_line1').val() == '')

				{

					$('#phone1_line1').css("border","1px solid red");

					$('#phone1_line1').focus();

					$('#error_div').html('Enter your phone no');

					return false;

				}

				else if(!phone_regex.test($('#phone1_line1').val()))

				{

					$('#phone1_line1').css("border","1px solid red");

					$('#phone1_line1').focus();

					$('#error_div').html('Enter your valid phone no');

					return false;

				}

				else

				{

					$('#phone1_line1').css("border","");

					$('#error_div').html('');

				}

				

				if($('#zipcode1').val() == '')

				{

					$('#zipcode1').css("border","1px solid red");

					$('#zipcode'+i).focus();

					$('#error_div').html('Enter your zipcode');

					return false;

				}

				else if(!zip_regex.test($('#zipcode1').val()))

				{

					$('#zipcode1').css("border","1px solid red");

					$('#zipcode1').focus();

					$('#error_div').html('Enter your valid zipcode');

					return false;

				}

				else

				{

					$('#zipcode1').css("border","");

					$('#error_div').html('');

				}

			}

			

			});

		

		});

    </script>

    
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