  <?php  $current_route = Route::getCurrentRoute()->getPath(); ?>
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"> MERCHANTS </h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                 <li <?php if($current_route == 'merchant_dashboard'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="<?php echo url('merchant_dashboard'); ?>" >
                        <i class="icon-dashboard"></i>&nbsp; Merchants Dashboard</a>                   
                </li>
                   <li <?php if($current_route == 'add_merchant'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?> >
                    <a href="<?php echo url('add_merchant'); ?>" >
                        <i class="icon-user"></i>&nbsp;Add Merchant Account
	                </a>                   
                </li>
                 <li <?php if($current_route == 'manage_merchant'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('manage_merchant'); ?>" >
                        <i class="icon-ok-sign"></i>&nbsp;Manage Merchant Accounts
                   </a>                   
                </li>
				
            </ul>


        </div>
