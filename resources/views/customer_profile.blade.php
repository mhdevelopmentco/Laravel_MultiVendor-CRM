<body>
<div id="header">
{!! $navbar !!}
<?php

foreach($customerdetails as $customer_info)
{ 
}
?>
<?php 
if($hasship==1){
	foreach($shippingdetails as $shipping_info)
	{ 

	}
}
?>
<!-- Navbar ================================================== -->
{!! $header !!}
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active">My Profile</li>
    </ul>
	<h3> Myprofile</h3>	
	<div id="grids">
<ul id="myTab" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#one">My Account</a></li>
<?php foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> <li class=""><a data-toggle="tab" href="#two">My COD Details</a></li><?php } ?>
  <li class=""><a href="#three" data-toggle="tab">My Buys</a></li><li class=""><a data-toggle="tab" href="#five">My Wish List</a></li>
  <!-- <li class=""><a data-toggle="tab" href="#six">My Bid History</a></li> -->
    <!--<li class=""><a data-toggle="tab" href="#five">My Email Subscriptions</a></li>-->
      <li class=""><a data-toggle="tab" href="#seven">My Shipping Address</a></li>	  
  
</ul>
 
<div class="tab-content">
  <div id="one" class="tab-pane active">
  <div class="row-fluid">
	 <div class="span6 hero-unit">
     <div class="alert alert-danger alert-dismissable" id="error_name" align="center" style="height:50px;width:298px;display:none;"></div>

	  <div class="form-horizontal">
      	<label style="float:left" ><strong>Name</strong></label>
		

	
            <div class="col-lg-8">
            <label class="pull-right" id="toggleDiv"><a ><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label><br>
            <div id="cusname"> <?php echo $customer_info->cus_name;?></div>
                    </div>
      </div>
      
      <div class="clearfix"></div>	

	  
      <div class="span5" style="display:none" id="username_div">
      <div class="form-group">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter Your Name" id="username1" value="" >
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-3">
                     <input type="submit" style="color:#fff"  id="update_username" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000" id="cancel_username" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                   
                    </div><br>
					  
                </div>
                
                </div>
              
                
                 <div class="clearfix"></div>	
                 
                <legend></legend>
				
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Email</strong></label>

                    <div class="col-lg-8">
                      <?php echo $customer_info->cus_email;?>
                    </div>
                </div>
               
                <legend></legend>
				 <div class="form-horizontal">
      	<label style="float:left" ><strong>Password</strong></label>
        <label class="pull-right" id="toggleDiv1"><a><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label>
        <div class="clearfix"></div>
       
       <div id="Password" style="color:#f00"><strong>*******</strong></div>
       
      </div>
	    <div class="clearfix"></div>	
				  <div class="span5" style="display:none" id="password_div">
                <div class="form-group">
                   
                    <div class="col-lg-8">
                        <input type="password" class="form-control" placeholder="Enter Your Old password" id="oldpwd">
                    </div>
                     <div class="col-lg-8">
                        <input type="password" class="form-control" placeholder="Enter Your New password" id="pwd">
                    </div>
                     <div class="col-lg-8">
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirmpwd">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <input type="submit" style="color:#fff"  id="update_password" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000"  id="cancel_password" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                   
                    </div>
                    <br>
					  
                </div>
				</div>
                
                 <div class="clearfix"></div>	
                <legend></legend>
				
	  
              
				 <div class="clearfix"></div>
               
               
		 <div class="form-horizontal">
      	<label style="float:left" ><strong>Profile images</strong></label>
        <label class="pull-right"><a href="#upload_pic" role="button" data-toggle="modal" style="padding-right:0"><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label>
        <br>
  <?php if($customer_info->cus_pic!=''){

$imgpath="assets/profileimage/".$customer_info->cus_pic;

}else{

$imgpath="themes/images/products/man.png";
}

?>
	  <img src="<?php echo $imgpath;?>" alt="" width="100px" height="auto">
	  </div>
	  
	
    
    	<div class="span5" style="display:none" id="MyDiv7">
                <div class="form-group">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Fruit ball" id="filetext" name="filetext">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-success btn-sm btn-grad"><a style="color:#fff" >Update</a></button>
                     <button class="btn btn-default btn-sm btn-grad"><a style="color:#000" >Cancel</a></button>
                   
                    </div>
					  
                </div>
				</div>
                
	   <div class="clearfix"></div>
	
 </div>
 
 
       <div class="span6">
       <div class="hero-unit">
		<div class="form-horizontal">
      	<label style="float:left" ><strong>Phone number</strong></label>
        <label class="pull-right" id="toggleDiv2"><a ><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label>
        
         <div class="clearfix"></div>
         
 <div id="cusphone"> <?php echo $customer_info->cus_phone;?></div>
 
 		<div class="span5" style="display:none" id="phonenumber_div">
                <div class="form-group">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your phone number" id="phonenum">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <input type="submit" style="color:#fff"  id="update_phonenumber" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000"  id="cancel_phonenumber" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                    </div>
					  
                </div>
				</div>
 
      </div>	
      
             
       	<div class="clearfix"></div>
        <br>
        <legend></legend>
				 <div class="form-horizontal">
      	<label style="float:left" ><strong>Address</strong></label>
        <label class="pull-right" id="toggleDiv3"><a ><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label>
    <div class="clearfix"></div>
	<div id="address1"><?php echo $customer_info->cus_address1;?></div>
	<div id="address2"><?php echo $customer_info->cus_address2;?></div>
	
      </div>
      <br>
	   <div class="clearfix"></div>
	   <div class="span5" style="display:none" id="address_div">
                <div class="form-group">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Provide address1 " id="addr1">
                    </div>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="provide address2" id="addr2">
                    </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <input type="submit" style="color:#fff"  id="update_address" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000"  id="cancel_address" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                    </div>
					  
                </div>
				</div>
               <div class="clearfix"></div>  
       
               
                <legend></legend>
				<div class="form-horizontal">
      	<label style="float:left" ><strong>Country & City</strong></label>
        <label class="pull-right" id="toggleDiv5"><a ><strong class="text_for" style="cursor:pointer;">Edit</strong></a></label><br>
        <div id="cuscountry" style="float:left; padding-right:10px"> <?php echo $customer_info->co_name;?>,</div>
        <div id="cuscity"> <?php echo $customer_info->ci_name;?></div>
      </div> 
      
      <div class="clearfix"></div>
      
	      <div class="span12" style="display:none" id="country_div">
                 <div class="form-group">
                    <div class="col-lg-5">
                       <label>Country</label>
                       <select class="form-control" id="selectcountry1"  onChange="get_city_list1(this.value)">
             <option value="0">--select country--</option>
			@foreach ($country_details as $country)
           		 <option  value="<?php echo $country->co_id;?>" <?php if($country->co_id==$customer_info->cus_country){ ?>selected<?php } ?>>{!!$country->co_name!!}</option>
          		 @endforeach 
        </select>
       
        				<label>City</label>
                        <select class="form-control" id="selectcity1" >
            		 <option value="0">--select city--</option>
		  </select>
        				
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                         <input type="submit" style="color:#fff"  id="update_city" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000"  id="cancel_country" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                    </div>
					  
                </div>
                </div>
				 <div class="clearfix"></div>
            
	  </div>
      
  </div>
  </div>
  </div>
  
  <div id="two" class="tab-pane">
  <div class="row-fluid">
	<ul class="text_tab">
    <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    	
    	<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px">
        		
            <thead style="background:#4a994c; color:#fff;">
            <tr>
                
            <th class="text-center">SNO</th>
			<th style="text-align:center;">Product Names</th>
			<th style="text-align:center;">Shipping Address</th>
			<th style="text-align:center;">Order Date</th>
			<th style="text-align:center;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;
				if(isset($getproductordersdetailss))
				{
   foreach($getproductordersdetailss as $orderdet) {

if($orderdet->cod_status==1)
	{
	$orderstatus="success";
	}
	else if($orderdet->cod_status==2) 
	{
	$orderstatus="completed";
	}
	else if($orderdet->cod_status==3) 
	{
	$orderstatus="Hold";
	}
	else if($orderdet->cod_status==4) 
	{
	$orderstatus="failed";
	}

 ?>
                <tr>
                
                  <td class="text-center"><?php echo $i;?></td>
		    <td class="text-center"><?php echo  $orderdet->pro_title;?></td>

			  <td class="text-center"><?php echo  $orderdet->ship_address1;?></td>
  <td class="text-center"><?php echo  $orderdet->cod_date;?></td>
   
   <td class="text-center"><?php echo  $orderstatus?></td>
         
                 
					
                </tr>
				 
				<?php $i=$i+1; } }?>		
              </tbody>
            </table>
    </div>
	
	
   
   </div>
      </ul>
	 </div>
  </div>
  
  <div id="three" class="tab-pane">
  <div class="row-fluid">
	<ul class="text_tab">
    <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    	
    	<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px">
        		
            <thead style="background:#4a994c; color:#fff;">
            <tr>
                
            <th class="text-center">SNO</th>
			<th style="text-align:center;">Product Names</th>
			<th style="text-align:center;">Shipping Address</th>
			<th style="text-align:center;">Order Date</th>
			<th style="text-align:center;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;
   foreach($getproductordersdetails as $orderdet) {

if($orderdet->order_status==1)
	{
	$orderstatus="success";
	}
	else if($orderdet->order_status==2) 
	{
	$orderstatus="completed";
	}
	else if($orderdet->order_status==3) 
	{
	$orderstatus="Hold";
	}
	else if($orderdet->order_status==4) 
	{
	$orderstatus="failed";
	}

 ?>
                <tr>
                
                  <td class="text-center"><?php echo $i;?></td>
		    <td class="text-center"><?php echo  $orderdet->pro_title;?></td>

			  <td class="text-center"><?php echo  $orderdet->ship_address1;?></td>
  <td class="text-center"><?php echo  $orderdet->order_date;?></td>
   
   <td class="text-center"><?php echo  $orderstatus?></td>
         
                 
					
                </tr>
				 
		<?php $i=$i+1; } ?>		
              </tbody>
            </table>
    </div>
	
	
   
   </div>
      </ul>
	 </div>
  </div>
  <div id="five" class="tab-pane">  <div class="row-fluid">	<ul class="text_tab">    <div class="row">   	    <div class="col-lg-11 panel_marg">    	    	<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px" align="center">        		            <thead style="background:#4a994c; color:#fff;">            <tr>                            <th class="text-center" style="text-align:center;">SNO</th>			<th style="text-align:center;">Product Names</th>			<th style="text-align:center;">Product Price</th>			<th style="text-align:center;">Product Image</th>			<th style="text-align:center;">Status</th>         <th style="text-align:center;">Action</th>        </tr>              </thead>              <tbody >                <?php $i=1;   foreach($wishlistdetails as $orderdet) {$product_img= explode('/**/',trim($orderdet->pro_Img,"/**/"));
             $mcat = strtolower(str_replace(' ','-',$orderdet->mc_name));
             $smcat = strtolower(str_replace(' ','-',$orderdet->smc_name));
			  $sbcat = strtolower(str_replace(' ','-',$orderdet->sb_name));
             $ssbcat = strtolower(str_replace(' ','-',$orderdet->ssb_name));
			 $res = base64_encode($orderdet->pro_id);
  ?>                <tr>                                  <td class="text-center" style="text-align:center;"><?php echo $i;?></td>		    <td class="text-center" style="text-align:center;">
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
			 <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" style="color:#ff8400;"><?php echo  $orderdet->pro_title;?></a>
			  <?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
              <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" style="color:#ff8400;"><?php echo  $orderdet->pro_title;?></a>
			  <?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			 <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" style="color:#ff8400;"><?php echo  $orderdet->pro_title;?></a>
              <?php } ?>
                               	
  
  
  <br>


  </td>			  <td class="text-center" style="text-align:center;">$<?php echo  $orderdet->pro_disprice;?></td>  <td class="text-center" style="text-align:center;"><img src="{!! url('assets/product/').'/'.$product_img[0]!!}" style="width:87px; height:auto"/></td>      <td class="text-center" style="text-align:center;"><?php       if($orderdet->pro_status =='1')   {	   echo "Available";   }   else   {	   echo "Not Available";   }      ?></td>                          	<td ><div style="text-align:center; width:230px; padding-left:0px;"> <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat != '') { ?>
			 <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$ssbcat.'/'.$res!!}" style="color:#ff8400;"><button type="submit" class="btn btn-small btn-primary pull-right me_btn" id="add_to_cart_session"> Add to carts <i class=" icon-shopping-cart"></i></button></a>
			  <?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat != '' && $ssbcat == '') { ?>
              <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$sbcat.'/'.$res!!}" style="color:#ff8400;"><button type="submit" class="btn btn-small btn-primary pull-right me_btn" id="add_to_cart_session"> Add to carts <i class=" icon-shopping-cart"></i></button></a>
			  <?php } ?>
              <?php if($mcat != '' && $smcat != '' && $sbcat == '' && $ssbcat == '') { ?>
			 <a href="{!! url('productview').'/'.$mcat.'/'.$smcat.'/'.$res!!}" style="color:#ff8400;"><button type="submit" class="btn btn-small btn-primary pull-right me_btn" id="add_to_cart_session"> Add to carts <i class=" icon-shopping-cart"></i></button></a>
              <?php } ?></div></td>				                </tr>				 		<?php $i=$i+1; } ?>		              </tbody>            </table>    </div>		      </div>      </ul>	 </div>  </div>


<!-- <div id="six" class="tab-pane">
    <div class="row-fluid">
	<ul class="text_tab">
    <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    	
    	<table class="table table-bordered table-sieve"  style="margin-left:3%;width:97%; font-size:13px">
        		
            <thead style="background:#4a994c; color:#fff;">
            <tr>
                
            <th class="text-center">SNO</th>
			<th style="text-align:center;">Auction Name</th>
			<th style="text-align:center;">Original Price</th>
			<th style="text-align:center;">Auction Price</th>
			<th style="text-align:center;">Orignal Bid Amount</th>
            <th style="text-align:center;">Your Bid Amount</th>
            <th style="text-align:center;">Bid Date</th>
            <th style="text-align:center;">Bid Shipping Amount</th>
            <th style="text-align:center;">Total Amount</th>
            
            
                </tr>
              </thead>
              <tbody>
                <?php //$i=1;
   //foreach($bidhistory as $bid) {

 
 $totalamt//=$bid->oa_bid_amt+$bid->oa_bid_shipping_amt;
 ?>
                <tr>
                
            <td class="text-center"><?php //echo $i;?></td>
            <td class="text-center"><?php //echo  $bid->auc_title;?></td>
			  <td class="text-center"><?php //echo  $bid->auc_original_price;?></td>
            <td class="text-center"><?php //echo  $bid->auc_auction_price;?></td>
            
            <td class="text-center"><?php //echo  "$".$bid->oa_original_bit_amt;?></td>
             <td class="text-center"><?php //echo   "$".$bid->oa_bid_amt;?></td>
              <td class="text-center"><?php //echo  $bid->oa_bid_date;?></td>
                 <td class="text-center"><?php //echo   "$".$bid->oa_bid_shipping_amt;?></td>
                      <td class="text-center"><?php //echo   "$".$totalamt;?></td>
              
            
            
					
                </tr>
				 
		<?php //$i=$i+1; } ?>		
              </tbody>
            </table>
    </div>
   
   </div>
      </ul>
	 </div>
  
  <div class="row-fluid">
	No data found
  
  </div>
</div> -->
<div id="seven" class="tab-pane">

  <div class="row-fluid">

	<div class="span6 hero-unit">
<div class="alert alert-danger alert-dismissable" id="shiperror_name" align="center" style="height:30px;width:298px;display:none;"></div>
    <p class="mandarory_txt"><span style="color: #F00;">* <strong>All fields are mandatory</strong></span></p>
		<div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Full Name</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your name" name="shippingcusname" id="shippingcusname"    value="<?php if($hasship==1){echo $shipping_info->ship_name;}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Address</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your address" name="shipaddr1" id="shipaddr1"  value="<?php if($hasship==1){echo $shipping_info->ship_address1;}?>">
                    </div>
                </div>
	   <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Address2</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your address" name="shipaddr2" id="shipaddr2"   value="<?php if($hasship==1){echo $shipping_info->ship_address2;}?>">
                    </div>
                </div>
		<div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Mobile</strong><span class="text-sub">*</span></label>
 
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your mobile number" name="shipcusmobile" id="shipcusmobile"   value="<?php if($hasship==1){echo $shipping_info->ship_phone;}?>" />
                    </div>
                </div>
          <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Email</strong><span class="text-sub">*</span></label>
 
                    <div class="col-lg-8">
                        <input type="email" class="form-control" placeholder="Enter your Email Id" name="shipcusemail" id="shipcusemail"   value="" />
                    </div>
                </div>      
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pass1"><span class="text-sub"></span></label>

                    
					  
                </div>
	 </div>
	  <div class="span6 hero-unit">
  <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Country</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="shippingcountry" id="shippingcountry" onChange="get_city_listshipping(this.value)">
   <option value="0">--select country--</option>
			@foreach ($country_details as $country)
           		 <option  value="<?php echo $country->co_id;?>"  <?php


if($hasship==1){

if($shipping_info->ship_country==$country->co_id){?>

 selected <?php } }?>>{!!$country->co_name!!}</option>
          		 @endforeach 
        </select>
   
                    </div>
                </div>
		    <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>City</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="shippingcity" name="shippingcity" >
                     
        </select>
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>State</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your state" name="shippingstate" id="shippingstate"   value="<?php if($hasship==1){echo $shipping_info->ship_state;}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"><strong>Zipcode</strong><span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter your zip code" name="zipcode" id="zipcode"   value="<?php if($hasship==1){echo $shipping_info->ship_postalcode;}?>">
                    </div>
                    
                    <div class="col-lg-8">
                      <input type="submit" style="color:#fff"  id="update_shippinginfo" value="update" class="btn btn-success btn-sm btn-grad"\>  
                     <input type="reset"  style="color:#000"  id="cancel_shippinginfo" value="cancel" class="btn btn-default btn-sm btn-grad"
 \>  
                   
                    </div>
                </div>
	  </div>
	 
  
  </div>
</div>
</div>

</div>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	{!! $footer !!}
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
    
    <script src="themes/js/seive.js"></script>
    
    <script>
     
    </script>
	
<div id="upload_pic" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Change Profile Picture</h3>
		  </div>
		  <div class="modal-body">
			<div style="float:left">
           
             {!! Form::open(array('url'=>'profile_image_submit','class'=>'form-horizontal loginFrm','enctype'=>'multipart/form-data')) !!}
			  
			  	<div class="controls">
              <input  type="file" class="input-file" name ="imgfile" id="imgfile">
            </div><br>
				<span>image upload size 1[MB]</span><br><br>
 <input type="submit" id="file_submit" class="btn btn-success" value="Upload" />
			
			
			</form>
            
          
            </div>	
            
            
            </div>
		  </div>
	</div>
    
    <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="themes/js/jquery.sieve.min.js" type="text/javascript"></script>
  <script>
    var searchTemplate = "<div class='row form-inline'><label class='pull-right'>Search: <input type='text' class='form-control' placeholder='keywords'></label></div>"
    $(".table-sieve").sieve({ searchTemplate: searchTemplate });
    searchTemplate = "<div class='row form-inline'><label style='float: right;'>Find a Quote: <input type='text' class='form-control' placeholder='(try typing &quot;einstein&quot;)'></label></div>"
    $(".p-sieve").sieve({ searchTemplate: searchTemplate, itemSelector: "p" });
  </script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 
function get_city_listshipping(id)
{
	var passcityid = 'id='+id;
	$.ajax( {
		type: 'get',
		data: passcityid,
		url: '<?php echo url('register_getcountry'); ?>',
		success: function(responseText){  
			if(responseText)
			{ 	 
			$('#shippingcity').html(responseText);					   
			}
			}		
		});		
}


$(document).ready(function(){
	$('#file_submit').click(function(){
		if($('#imgfile').val()=='')
		{
			alert('Image field required!');
			return false;
		}
		/*var checkimage = /\.(jpe?g|gif|png)$/i.test($('#profileimage').val()); 
		if (!checkimage) {
		alert('upload image like jpg,png,jpeg format');
		}*/
					});
});


function get_city_list1(id)
{
	var passcityid = 'id='+id;
	$.ajax( {
		type: 'get',
		data: passcityid,
		url: '<?php echo url('register_getcountry'); ?>',
		success: function(responseText){  
			if(responseText)
			{ 	 
			$('#city_div').show();
			$('#selectcity1').html(responseText);					   
			}
						}		
		});		
}

</script>
 
<script type="text/javascript">
 	
	
$(document).ready(function(){

<?php if($customer_info->cus_city!=""){?>
	var passcityid = 'id='+<?php echo $customer_info->cus_city;?>;
	//alert(passcityid);
	$.ajax( {
		type: 'get',
		data: passcityid,
		url: '<?php echo url('register_getcity_shipping'); ?>',
		success: function(responseText){ 
		 
		if(responseText)
		{ 	 
		 
		// $('#country_div').show();
		$('#selectcity1').html(responseText);					   
		}
						}		
		});		
<?php } ?>

});

$(document).ready(function(){
	var uname=$('#username1');
	$('#cancel_username').click(function()
	{
		$('#username_div').hide();
	});

	$('#update_username').click(function(){
		if(uname.val()=='')
		{
			uname.css('border', '1px solid red'); 
			uname.focus(); 
			return false;
		}
		else
		{
			uname.css('border', ''); 
			cname=uname.val();
			var  passdata= 'cname='+cname;
		
			$.ajax( {
			type: 'get',
			data: passdata,
			url: '<?php echo url('update_username_ajax'); ?>',
			success: function(responseText){  
			var result=responseText.split(",");
			if(result[0]=="success")
			{ 	
				$('#error_name').show();
				$('#error_name').html('Name Updated Successfully');
				$('#error_name').fadeOut(3000);	
				$('#username_div').hide(); 
				$('#cusname').html(result[1]);
			}
							}		
			});		
		}
	});

});//document ready

$(document).ready(function(){
	$('#cancel_password').click(function()
	{
		$('#password_div').hide();
	});

	$('#update_password').click(function()
	{
		if($('#oldpwd').val()=="")
		{	
			 $('#oldpwd').css('border', '1px solid red'); 
			$('#oldpwd').focus(); 
			//oldpwd.focus();
			return false;
		}
		else if($('#pwd').val()=="")
		{
			$('#oldpwd').css('border', ''); 
			 $('#pwd').css('border', '1px solid red'); 
			$('#pwd').focus(); 
			//pwd.focus();
			return false;
		}
		else if($('#confirmpwd').val()=="")
		{
		 	 $('#pwd').css('border', ''); 
			 $('#confirmpwd').css('border', '1px solid red'); 
			$('#confirmpwd').focus(); 
			//confirmpwd.focus();
			return false;
		}
		else
		{
			$('#confirmpwd').css('border', ''); 
			var pwd= $('#pwd').val(); 
			var confirmpwd=$('#confirmpwd').val(); 
			var oldpwd=$('#oldpwd').val(); 
			var passdata = 'oldpwd='+oldpwd+"&newpwd="+pwd+"&confirmpwd="+confirmpwd;

			$.ajax( {
				type: 'post',
				data: passdata,
				url: '<?php echo url('update_password_ajax'); ?>',
				success: function(responseText)
					{  
						//alert(responseText);
						var result=responseText.split(",");
						if(result[0]=="success")
						{ 	
						$('#error_name').show();
						$('#error_name').html('Password changed Successfully');
						$('#error_name').fadeOut(3000);	
						$('#password_div').hide(); 
						}
						if(result[0]=="fail1")
						{ 	
						$('#error_name').show();
						$('#error_name').html('Both Passwords do not match');
						$('#error_name').fadeOut(3000);	
						}
						if(result[0]=="fail2")
						{ 	
						$('#error_name').show();
						$('#error_name').html('Old Password does not match');
						$('#error_name').fadeOut(3000);	
						}
					}		
				});		
		}
	});

});//document ready

$(document).ready(function(){
	$('#phonenum').keydown(function (e) 
	{
		 if (e.shiftKey || e.ctrlKey || e.altKey)
		 {
			e.preventDefault();
		 } 
		 else 
		 {
			var key = e.keyCode;
			if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)))
			 {
				e.preventDefault();
			 }
		}
	});

	$('#cancel_phonenumber').click(function()
	{
		$('#phonenumber_div').hide();
	});

	$('#update_phonenumber').click(function()
	{

		if($('#phonenum').val()=="")
		{
			$('#error_name').show();
			$('#error_name').html('Please provide  phonenumber ');
			$('#error_name').fadeOut(3000);
			$('#phonenum').focus();
			return false;
		}
		else
		{
			var phonenum= $('#phonenum').val(); 
			var passdata = 'phonenum='+phonenum;

			$.ajax({
				type: 'get',
				data: passdata,
				url: '<?php echo url('update_phonenumber_ajax'); ?>',
				success: function(responseText)
					{  
						var result=responseText.split(",");
						if(result[0]=="success")
						{ 	
						$('#error_name').show();
						$('#error_name').html('Phonenumber changed Successfully');
						$('#error_name').fadeOut(3000);	
						$('#phonenumber_div').hide(); 
						$('#cusphone').html(result[1]);
						}

					}		
				});		
		}
	});

});//document ready

$(document).ready(function(){
	$('#cancel_address').click(function()
	{
		$('#address_div').hide();
	});

	$('#update_address').click(function()
	{

		if($('#addr1').val()=="" && $('#addr2').val()=="")
		{
			$('#error_name').show();
			$('#error_name').html('Please provide any one of the address fields');
			$('#error_name').fadeOut(3000);
			$('#phonenum').focus();
			return false;
		}
		else
		{
			var addr1= $('#addr1').val(); 
			var addr2= $('#addr2').val(); 

			var passdata ='addr1='+addr1+"&addr2="+addr2;

			$.ajax( {
				type: 'get',
				data: passdata,
				url: '<?php echo url('update_address_ajax'); ?>',
				success: function(responseText)
				{  
					var result=responseText.split(",");
					if(result[0]=="success")
					{ 	
						$('#error_name').show();
						$('#error_name').html('Address changed Successfully');
						$('#error_name').fadeOut(3000);	
						$('#address_div').hide(); 
						$('#address1').html(result[1]);
						$('#address2').html(result[2]);
					}

				}		
				});		
		}
	});

});//document ready

$(document).ready(function(){
	$('#cancel_city').click(function()
	{
		$('#city_div').hide();
	});

	$('#update_city').click(function()
	{
		var cityid=$("#selectcity1 option:selected").val();
		var countryid=$("#selectcountry1 option:selected").val();
		var passdata ='cityid='+cityid+"&countryid="+countryid;

		$.ajax( {
			type: 'get',
			data: passdata,
			url: '<?php echo url('update_city_ajax'); ?>',
			success: function(responseText)
			{  
				var result=responseText.split(",");
				if(result[0]=="success")
				{ 	
				$('#error_name').show();
				$('#error_name').html('City and Country changed Successfully');
				$('#error_name').fadeOut(3000);	
				$('#cuscountry').html(result[1]);
				$('#cuscity').html(result[2]);
				$('#city_div').hide(); 
				$('#country_div').hide();

				}

			}		
			});		

	});

});//document ready

$(document).ready(function(){
	<?php if($hasship==1){if($shipping_info->ship_ci_id!=""){?>
	var passcityid = 'id='+<?php echo $shipping_info->ship_ci_id;?>;
 
	$.ajax( {
		type: 'get',
		data: passcityid,
		url: '<?php echo url('register_getcity_shipping'); ?>',
		success: function(responseText)
		{  
	  
			if(responseText)
	 		{ 	 
		// 	alert(responseText);
			// $('#country_div').show();
			$('#shippingcity').html(responseText);					   
			}
		}		
		});		
<?php } } ?>


$('#shipcusmobile').keydown(function (e) 
{
	if (e.shiftKey || e.ctrlKey || e.altKey) 
	{
		e.preventDefault();
	} 
	else 
	{
		var key = e.keyCode;
		if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
		{
		e.preventDefault();
		}
	}
});

	$('#update_shippinginfo').click(function()
	{
		var citysel=$("#shippingcity  option:selected").val();
		if($('#shippingcusname').val()=="")
		{	
			$('#shippingcusname').focus();
			return false;
		}
		else if($('#shipaddr1').val()=="")
		{
			$('#shipaddr1').focus();
			return false;
		}
		else if($('#shipaddr2').val()=="")
		{
			$('#shipaddr2').focus();
			return false;
		}
		else if($('#shipcusmobile').val()=="")
		{	
			$('#shipcusmobile').focus();
			return false;
		}
		else if($('#shipcusemail').val()=="")
		{	
			$('#shipcusemail').focus();
			return false;
		}
		else if($('#shipcusmobile').val().length<8)
		{	
			$('#shiperror_name').show();
			$('#shiperror_name').html('Please provide valid phone number');
			$('#shiperror_name').fadeOut(3000);	
			$('#shipcusmobile').focus();
			return false;
		}

		else if(citysel==0)
		{
			$('#shippingcity').focus();
			return false;
		}
		else if($('#shippingstate').val()=="")
		{
			$('#shippingstate').focus();
			return false;
		}
		else if($('#zipcode').val()=="")
		{
			$('#zipcode').focus();
			return false;
		}
		else
		{
			var shipcus= $('#shippingcusname').val(); 
			var shipaddr1=$('#shipaddr1').val(); 
			var shipaddr2=$('#shipaddr2').val(); 
			var shipcusmobile= $('#shipcusmobile').val();
			var shipcusemail= $('#shipcusemail').val();  
			var shippingstate=$('#shippingstate').val(); 
			var zipcode=$('#zipcode').val(); 
			var cityid=$("#shippingcity option:selected").val();
			var countryid=$("#shippingcountry option:selected").val();

			var passdata = 'shipcus='+shipcus+"&shipaddr1="+shipaddr1+"&shipaddr2="+shipaddr2+"&shipcusmobile="+shipcusmobile+"&shipcusemail="+shipcusemail+"&shippingstate="+shippingstate+"&zipcode="+zipcode+"&shippingcity="+cityid+"&shippingcountry="+countryid;
 			//alert(passdata);
			$.ajax( {
				type: 'get',
				data: passdata,
				url: '<?php echo url('update_shipping_ajax'); ?>',
				success: function(responseText)
				{ // alert(responseText);
				    //var result=responseText.split(",");
					if(responseText=="success")
					{ 	
					$('#shiperror_name').show();
					$('#shiperror_name').html('Shipping Details updated Successfully');
					$('#shiperror_name').fadeOut(3000);	
					$('#password_div').hide(); 

					}
				}		
				});		
		}
	});
});//document ready

$(document).ready(function(){

	$('#cancel_country').click(function()
	{
		$('#country_div').hide();
	});

	$('#update_country').click(function()
	{
		$('#error_name').show();
		$('#error_name').html('Country changed Successfully');
		$('#error_name').fadeOut(3000);	
		$('#city_div').hide(); 
		$('#country_div').hide();
	});

});//document ready

$(document).ready(function(){

	$('#toggleDiv').click(function()
	{
	$('#username_div').toggle();
	});

});

$(document).ready(function(){

	$('#toggleDiv1').click(function()
	{
	$('#password_div').toggle();
	});

});

$(document).ready(function(){
	$('#toggleDiv2').click(function()
	{
	$('#phonenumber_div').toggle();
	});
});
$(document).ready(function(){
	$('#toggleDiv3').click(function()
	{
	$('#address_div').toggle();
	});
});
$(document).ready(function(){
	$('#toggleDiv4').click(function(){
	
	$('#city_div').toggle();
	});
});
$(document).ready(function(){

	$('#toggleDiv5').click(function()
	{
	$('#country_div').toggle();
	});
});
$(document).ready(function(){
	$('#toggleDiv7').click(function()
	{
	$('#MyDiv7').toggle();
	});

});

</script>
</body>
</html>
