   <?php $current_route = Route::getCurrentRoute()->getPath(); ?>
    <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">PRODUCTS</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
              <!--  <li class="panel">
                    <a href="#">
                        <i class="icon-dashboard"></i>&nbsp;Products Dashboard</a>                   
                </li>-->
 					<li <?php if($current_route == 'mer_add_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                  
                    <a href="<?php echo url('mer_add_product');?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Products
	                </a>                   
                </li>
                <li <?php if($current_route == 'mer_manage_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('mer_manage_product');?>" >
                        <i class=" icon-edit"></i>&nbsp; Manage Products
                   </a>                   
                </li>
	 <li <?php if($current_route == 'mer_sold_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('mer_sold_product');?>" >
                        <i class="icon-tag"></i>&nbsp; Sold Products
                   </a>                   
                </li>
				 <li <?php if( $current_route == "mer_manage_product_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('mer_manage_product_shipping_details');?>" >
                        <i class="icon-ambulance"></i>&nbsp;Shipping And Delivery
                   </a>                   
                </li>
			<?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> 	<li <?php if( $current_route == "mer_manage_cashondelivery_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('mer_manage_cashondelivery_details');?>" >
                        <i class="icon-money"></i>&nbsp;Cash On Delivery
                   </a>                   
                </li><?php } ?>
            </ul>

        </div>
<!---Right Click Block Code---->
<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>