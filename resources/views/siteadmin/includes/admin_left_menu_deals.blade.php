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
                <li <?php if($current_route == 'deals_dashboard' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?> >
                    <a href="<?php echo url('deals_dashboard'); ?>">
                        <i class="icon-dashboard"></i>&nbsp;Deals Dashboard</a>                   
                </li>
                   <li <?php if($current_route == 'add_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?> >
                    <a href="<?php echo url('add_deals'); ?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Deals
	                </a>                   
                </li>
                 <li <?php if($current_route == 'manage_deals' || $current_route == 'deal_details/{id}' || $current_route == 'edit_deals/{id}' )  { ?> class="panel active" <?php } else { echo 'class="panel"';  } ?>>
                    <a href="<?php echo url('manage_deals'); ?>" >
                        <i class=" icon-edit"></i>&nbsp;Manage Deals
                   </a>                   
                </li>
				 <li  <?php if($current_route == 'expired_deals' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="<?php echo url('expired_deals'); ?>" >
                        <i class="icon-check-sign"></i>&nbsp;Expired Deals
                   </a>                   
                </li>

                <li  <?php if($current_route == 'manage_deal_review' ) { ?> class="panel active" <?php } else { echo 'class="panel"';} ?>>
                    <a href="<?php echo url('manage_deal_review'); ?>" >
                        <i class="icon-check-sign"></i>&nbsp;Manage Deal Reviews
                   </a>                   
                </li>
				<!-- <li  <?php //if($current_route == 'validate_coupon_code' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('validate_coupon_code'); ?>" >
                        <i class="icon-barcode"></i>&nbsp;Validate Coupon Code
                   </a>                   
                </li>
				 <li  <?php //if($current_route == 'redeem_coupon_list' ) { ?> class="panel active" <?php //} else { echo 'class="panel"';} ?>>
                    <a href="<?php //echo url('redeem_coupon_list'); ?>" >
                        <i class="icon-asterisk"></i>&nbsp;Redeem Coupon List
                   </a>                   
                </li>-->
            </ul>

        </div>
