   <?php  $current_route = Route::getCurrentRoute()->getPath(); ?>
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">DEALS</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
               <!-- <li class="panel">
                    <a href="#">
                        <i class="icon-dashboard"></i>&nbsp;Deals Dashboard</a>                   
                </li>-->
                   <li <?php if($current_route == 'mer_add_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?> >
                    <a href="<?php echo url('mer_add_deals'); ?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Deals
	                </a>                   
                </li>
                 <li <?php if($current_route == 'mer_manage_deals' || $current_route == 'mer_deal_details/{id}' || $current_route == 'mer_edit_deals/{id}' )  { ?> class="panel active" <?php } else { echo 'class="panel"';  } ?>>
                    <a href="<?php echo url('mer_manage_deals'); ?>" >
                        <i class=" icon-edit"></i>&nbsp;Manage Deals
                   </a>                   
                </li>
				 <li  <?php if($current_route == 'mer_expired_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="<?php echo url('mer_expired_deals'); ?>" >
                        <i class="icon-check-sign"></i>&nbsp;Expired Deals
                   </a>                   
                </li>
				<!-- <li  <?php //if($current_route == 'mer_validate_coupon_code' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('mer_validate_coupon_code'); ?>" >
                        <i class="icon-barcode"></i>&nbsp;Validate Coupon Code
                   </a>                   
                </li>
				 <li  <?php //if($current_route == 'mer_redeem_coupon_list' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('mer_redeem_coupon_list'); ?>" >
                        <i class="icon-asterisk"></i>&nbsp;Redeem Coupon List
                   </a>                   
                </li>-->
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