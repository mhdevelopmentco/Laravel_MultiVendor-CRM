   <?php  $current_route = Route::getCurrentRoute()->getPath(); ?> 
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">AUCTION</h5>
                    
                </div>
                <br />
            </div>

               <ul id="menu" class="collapse">
              <!--  <li <?php //if($current_route == 'fund_request'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="#">
                        <i class="icon-dashboard"></i>&nbsp;Auction Dashboard</a> -->                  
                </li>
                   <li <?php if($current_route == 'merchant_add_auction'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="<?php echo url('merchant_add_auction'); ?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Auction Products
	                </a>                   
                </li>
                 <li <?php if($current_route == 'merchant_manage_auction'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="<?php echo url('merchant_manage_auction'); ?>" >
                        <i class=" icon-edit"></i>&nbsp;Manage Auction Products
                   </a>                   
                </li>
				 <li <?php if($current_route == 'merchant_expired_auction'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="<?php echo url('merchant_expired_auction'); ?>" >
                        <i class="icon-tag"></i>&nbsp;Archive Auction Products
                   </a>                   
                </li>
				 <li <?php if($current_route == 'merchant_auction_winners'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="<?php echo url('merchant_auction_winners'); ?>" >
                       <i class="icon-trophy"></i>&nbsp;Auction Winners
                   </a>                   
                </li>
			 
				<li <?php if($current_route == 'merchant_auction_cod'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>  
                    <a href="<?php echo url('merchant_auction_cod'); ?>" >
                        <i class="icon-money"></i>&nbsp;Auction COD
                   </a>                   
                </li>
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