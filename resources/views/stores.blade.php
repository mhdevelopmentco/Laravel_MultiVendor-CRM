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
    <li><a href="<?php echo url('index');?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo url('stores');?>">Stores</a></li>
    </ul>	
	<center> @if (Session::has('success_store'))
		<div class="alert alert-warning alert-dismissable">{!! Session::get('success_store') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif</center>
	 <h4>Stores</h4>
     <legend></legend>
     <div class="container">
     <div class="row">
     	<div class="span12">
       <?php foreach($get_store_details as $store) { ?>
         <div class="span2 thumbnail stor store-res" style="margin-top:10px; min-height:350px;" >
         <img src="<?php echo url(); ?>/assets/storeimage/<?php echo $store->stor_img;  ?>" style="height:150px; width:256px;" >
         <a href="#"><h4><?php echo $store->stor_name; ?></h4></a>
       <div class="clearfix"></div>
       
      <center> <table border="0" class="table table-hover">
          <tr>
            <td>Deals</td>
            <td>:</td>
            <td><?php
			if($get_store_deal_count[$store->stor_id] != 0) {
			 echo $get_store_deal_count[$store->stor_id]; } else { echo 'N/A'; } ?></td>
          </tr>
          <tr>
            <td>Products</td>
            <td>:</td>
            <td><?php 
			if($get_store_product_count[$store->stor_id] != 0) {
			 echo $get_store_product_count[$store->stor_id]; } 
			 else { echo 'N/A'; } ?>
			</td>
          </tr>
        
        </table>
       <a href="<?php echo url('storeview/'.base64_encode(base64_encode(base64_encode($store->stor_id)))); ?>">
       <button class="btn  btn-warning">View Details</button> </a>
        </center>
         </div>
         <?php } ?>
          
   
     </div>
     </div>
     </div>
</div>
</div> </div>
</div>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}

</body>
</html>
