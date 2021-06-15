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
                <li <?php if( $current_route == "auction_dashboard" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('auction_dashboard');?>">
                        <i class="icon-dashboard"></i>&nbsp;Auction Dashboard</a>                   
                </li>
                   <li <?php if( $current_route == "add_auction" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('add_auction');?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Auction Products
	                </a>                   
                </li>
                 <li <?php if( $current_route == "manage_auction" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('manage_auction');?>" >
                        <i class=" icon-edit"></i>&nbsp;Manage Auction Products
                   </a>                   
                </li>
				 <li <?php if( $current_route == "expired_auction" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('expired_auction');?>" >
                        <i class="icon-tag"></i>&nbsp;Archive Auction Products
                   </a>                   
                </li>
				 <li <?php if( $current_route == "auction_winners" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('auction_winners');?>" >
                       <i class="icon-trophy"></i>&nbsp;Auction Winners
                   </a>                   
                </li>
		
				<li <?php if( $current_route == "auction_cod" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('auction_cod');?>" >
                        <i class="icon-money"></i>&nbsp;Cash On Delivery
                   </a>                   
                </li>
            </ul>

        </div>