<?php  $current_route = Route::getCurrentRoute()->getPath();
   ?>
  <div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">CUSTOMERS</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                  <li <?php if($current_route == 'customer_dashboard'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="<?php echo url('customer_dashboard'); ?>" >
                        <i class="icon-dashboard"></i>&nbsp; Dashboard</a>                   
                </li>
                   <li <?php if($current_route == 'add_customer'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="<?php echo url('add_customer'); ?>" >
                        <i class="icon-user"></i>&nbsp;Add Customer
	                </a>                   
                </li>
                 <li  <?php if($current_route == 'manage_customer'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('manage_customer'); ?>" >
                        <i class="icon-ok-sign"></i>&nbsp;Manage Customers
                   </a>                   
                </li>
				 <li <?php if($current_route == 'manage_inquires'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('manage_inquires'); ?>" >
                        <i class="icon-user-md"></i>&nbsp;Manage Inquiries
                   </a>                   
                </li>
				<?php /*?> <li  <?php if($current_route == 'manage_subscribers'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('manage_subscribers'); ?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Manage Subscribers
	   
                       
                   </a>                   
                </li><?php */?>
				<!-- <li <?php //if($current_route == 'manage_referral_users'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php //echo url('manage_referral_users'); ?>" >
                        <i class="icon-group"></i>&nbsp;Manage Referral Users
                   </a>                   
                </li>-->
            </ul>

        </div>
