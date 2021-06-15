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
               <?php /* <li <?php if($current_route=="show_transaction") { echo 'class="panel active"'; }else { echo 'class="panel"';} ?>>
                    <a href="#" >
                        <i class="icon-dashboard"></i>&nbsp; Transaction Dashboard</a>                   
                </li> */ ?>
                   <li <?php if($current_route=="deals_all_orders" || $current_route=="deals_success_orders" || $current_route=="deals_completed_orders" || $current_route=="deals_failed_orders" || $current_route=="deals_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-resize-small"></i>&nbsp;Deals Transaction
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav">
                         <li class="" ><a href="<?php echo url('deals_all_orders');?>"><i class="icon-angle-right"></i>All Orders </a></li>
                      <li class=""><a href="<?php echo url('deals_success_orders');?>"><i class="icon-angle-right"></i> Success Orders</a></li>
                    <?php /*?><li class=""><a href="<?php echo url('deals_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li><?php */?>
                      <li class=""><a href="<?php echo url('deals_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                      <li class=""><a href="<?php echo url('deals_failed_orders');?>"><i class="icon-angle-right"></i>Failed Orders</a></li>

                    </ul>                   
                </li>
             <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?>     <li <?php if($current_route=="dealscod_all_orders" ||  $current_route=="dealscod_completed_orders" || $current_route=="dealscod_failed_orders" || $current_route=="dealscod_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav1">
                        <i class="icon-money"></i>&nbsp;Deals COD
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav1">
                         <li class=""><a href="<?php echo url('dealscod_all_orders');?>"><i class="icon-angle-right"></i> All Orders</a></li>
                       <li class=""><a href="<?php echo url('dealscod_completed_orders');?>"><i class="icon-angle-right"></i> Completed Orders </a></li>
                         <li class=""><a href="<?php echo url('dealscod_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                        <li class=""><a href="<?php echo url('dealscod_failed_orders');?>"><i class="icon-angle-right"></i> Failed Orders</a></li>
                    </ul>                   
                </li> <?php } ?>
				
                <li <?php if($current_route=="product_all_orders" || $current_route=="product_success_orders" || $current_route=="product_completed_orders" || $current_route=="product_failed_orders" || $current_route=="product_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav2">
                        <i class="icon-dropbox"></i>&nbsp;Products Transaction
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav2">
                         <li class=""><a href="<?php echo url('product_all_orders');?>"><i class="icon-angle-right"></i>All Orders </a></li>
                      <li class=""><a href="<?php echo url('product_success_orders');?>"><i class="icon-angle-right"></i> Success Orders</a></li>
                    <?php /*?><li class=""><a href="<?php echo url('product_completed_orders');?>"><i class="icon-angle-right"></i>Completed Orders </a></li><?php */?>
                      <li class=""><a href="<?php echo url('product_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                      <li class=""><a href="<?php echo url('product_failed_orders');?>"><i class="icon-angle-right"></i>Failed Orders</a></li>
                    </ul>                   
                </li>
                
    <?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?>             <li <?php if($current_route=="cod_all_orders" || $current_route=="cod_success_orders" || $current_route=="cod_completed_orders" || $current_route=="cod_failed_orders" || $current_route=="cod_hold_orders" ){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav3">
                        <i class="icon-money"></i>&nbsp;Products COD
                         <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
	                </a>
                     <ul class="collapse" id="form-nav3">
                         <li class=""><a href="<?php echo url('cod_all_orders');?>"><i class="icon-angle-right"></i> All Orders</a></li>
                       <li class=""><a href="<?php echo url('cod_completed_orders');?>"><i class="icon-angle-right"></i> Completed Orders </a></li>
                         <li class=""><a href="<?php echo url('cod_hold_orders');?>"><i class="icon-angle-right"></i> Hold Orders</a></li>
                        <li class=""><a href="<?php echo url('cod_failed_orders');?>"><i class="icon-angle-right"></i> Failed Orders</a></li>

                    </ul>                   
                </li><?php } ?>
                
                
                
            </ul>
            
             <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"> FUND REQUESTS</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li <?php if($current_route=="all_fund_request"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('all_fund_request'); ?>" >
                        <i class="icon-arrow-right"></i>&nbsp; All Fund requests</a>                   
                </li>
                   <li <?php if($current_route=="success_fund_request"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('success_fund_request');?>">
                        <i class="icon-ok"></i>&nbsp;Success Fund requests                         
	                </a>                                        
                </li>
                 <li <?php if($current_route=="pending_fund_request"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('pending_fund_request');?>">
                        <i class="icon-ban-circle"></i>&nbsp;Pending Fund requests   
                    </a>
                 </li>
				
                               
                <li <?php if($current_route=="failed_fund_request"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('failed_fund_request');?>">
                        <i class="icon-mail-reply-all"></i>&nbsp;Failed Fund requests   
                    </a>
                </li>
            </ul>

			 
        </div>
        
        
