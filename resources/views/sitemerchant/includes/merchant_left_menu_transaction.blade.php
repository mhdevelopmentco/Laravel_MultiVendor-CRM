<?php  $current_route = Route::getCurrentRoute()->getPath(); ?> 
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"> TRANSACTIONS </h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <?php /*<li <?php if($current_route=="deals_all_orders") { echo 'class="panel active"'; }else { echo 'class="panel"';} ?>>
                    <a href="#" >
                        <i class="icon-dashboard"></i>&nbsp; Transaction Dashboard</a>                   
                </li>*/ ?>
                   <li <?php if($current_route=="merchant_deals_all_orders" || $current_route=="merchant_deals_success_orders" || $current_route=="merchant_deals_completed_orders" || $current_route=="merchant_deals_hold_orders" || $current_route=="merchant_deals_failed_orders"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-resize-small"></i>&nbsp;Deals Transaction
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav">
                         <li class="" ><a href="<?php echo url('merchant_deals_all_orders');?>"><i class="icon-angle-right"></i>All Orders </a></li>
                      <li class=""><a href="<?php echo url('merchant_deals_success_orders');?>"><i class="icon-angle-right"></i> Success Orders</a></li>
                    <li class=""><a href="<?php echo url('merchant_deals_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li>
                      <li class=""><a href="<?php echo url('merchant_deals_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                      <li class=""><a href="<?php echo url('merchant_deals_failed_orders');?>"><i class="icon-angle-right"></i>Failed Orders</a></li>

                    </ul>                   
                </li>
                 <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> <li <?php if($current_route=="merchant_dealscod_all_orders" ||  $current_route=="merchant_dealscod_completed_orders" || $current_route=="merchant_dealscod_hold_orders" || $current_route=="merchant_dealscod_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav1">
                        <i class="icon-money"></i>&nbsp;Deals COD
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav1">
                         <li class=""><a href="<?php echo url('merchant_dealscod_all_orders');?>"><i class="icon-angle-right"></i> All Orders</a></li>
                       <li class=""><a href="<?php echo url('merchant_dealscod_completed_orders');?>"><i class="icon-angle-right"></i> Completed Orders </a></li>
                         <li class=""><a href="<?php echo url('merchant_dealscod_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                        <li class=""><a href="<?php echo url('merchant_dealscod_failed_orders');?>"><i class="icon-angle-right"></i> Failed Orders</a></li>
                    </ul>                   
                </li><?php } ?>
				
                <li <?php if($current_route=="merchant_product_all_orders" || $current_route=="merchant_product_success_orders" || $current_route=="merchant_product_completed_orders" || $current_route=="merchant_product_failed_orders" || $current_route=="merchant_product_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav2">
                        <i class="icon-dropbox"></i>&nbsp;Products Transaction
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav2">
                         <li class=""><a href="<?php echo url('merchant_product_all_orders');?>"><i class="icon-angle-right"></i>All Orders </a></li>
                      <li class=""><a href="<?php echo url('merchant_product_success_orders');?>"><i class="icon-angle-right"></i> Success Orders</a></li>
                    <li class=""><a href="<?php echo url('merchant_product_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li>
                      <li class=""><a href="<?php echo url('merchant_product_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                      <li class=""><a href="<?php echo url('merchant_product_failed_orders');?>"><i class="icon-angle-right"></i>Failed Orders</a></li>
                    </ul>                   
                </li>
                
              <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?>   <li <?php if($current_route=="merchant_product_cod_all_orders" || $current_route=="merchant_product_cod_success_orders" || $current_route=="merchant_product_cod_completed_orders" || $current_route=="merchant_product_cod_failed_orders" || $current_route=="merchant_product_cod_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav3">
                        <i class="icon-money"></i>&nbsp;Products COD
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav3">
                         <li class=""><a href="<?php echo url('merchant_product_cod_all_orders');?>"><i class="icon-angle-right"></i> All Orders</a></li>
                       <li class=""><a href="<?php echo url('merchant_product_cod_completed_orders');?>"><i class="icon-angle-right"></i> Completed Orders </a></li>
                         <li class=""><a href="<?php echo url('merchant_product_cod_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                        <li class=""><a href="<?php echo url('merchant_product_cod_failed_orders');?>"><i class="icon-angle-right"></i> Failed Orders</a></li>

                    </ul>                   
                </li> <?php } ?>
                
              <?php /* <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav4">
                        <i class="icon-legal"></i>&nbsp;Auction Transaction
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav4">
                        <li class=""><a href="<?php echo url('manage_auction_bidder'); ?>"><i class="icon-angle-right"></i> Auction Bidders </a></li>
                        <li class=""><a href="<?php echo url('auction_by_bidder'); ?>"><i class="icon-angle-right"></i> Bidders by auction</a></li>    
                    </ul>                   
                </li>*/ ?>
                
                
            </ul>
            
             <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
               <?php /* <div class="media-body">
                    <h5 class="media-heading"> FUND REQUESTS</h5>
                    
                </div> */ ?>
                <br />
            </div>

           <?php /* <ul id="menu" class="collapse">
                <li class="panel">
                    <a href="<?php echo url('all_fund_request'); ?>" >
                        <i class="icon-arrow-right"></i>&nbsp; All Fund requests</a>                   
                </li>
                   <li class="panel ">
                    <a href="#">
                        <i class="icon-ok"></i>&nbsp;Approved Fund requests                         
	                </a>                                        
                </li>
                 <li class="panel ">
                    <a href="#">
                        <i class="icon-ban-circle"></i>&nbsp;Rejected Fund requests   
                    </a>
                 </li>
				
                <li class="panel">
                    <a href="#">
                        <i class="icon-ok-circle"></i>&nbsp;Success Fund requests   
                    </a>
                    
                </li>
                
                <li class="panel ">
                    <a href="#">
                        <i class="icon-mail-reply-all"></i>&nbsp;Failed Fund requests   
                    </a>
                </li>
            </ul>*/ ?>

			 
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