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
                <li <?php if($current_route == 'product_dashboard' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('product_dashboard');?>">
                        <i class="icon-dashboard"></i>&nbsp;Products Dashboard</a>                   
                </li>
  <li <?php if($current_route == 'add_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                  
                    <a href="<?php echo url('add_product');?>" >
                        <i class=" icon-plus-sign"></i>&nbsp;Add Products
	                </a>                   
                </li>
                <li <?php if($current_route == 'manage_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('manage_product');?>" >
                        <i class=" icon-edit"></i>&nbsp; Manage Products
                   </a>                   
                </li>
	 <li <?php if($current_route == 'sold_product' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('sold_product');?>" >
                        <i class="icon-tag"></i>&nbsp; Sold Products
                   </a>                   
                </li>
				 <li <?php if( $current_route == "manage_product_shipping_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('manage_product_shipping_details');?>" >
                        <i class="icon-ambulance"></i>&nbsp;Shipping And Delivery
                   </a>                   
                </li>
			<?php $general=DB::table('nm_generalsetting')->get(); foreach($general as $gs) {} if($gs->gs_payment_status == 'COD') { ?> 	<li <?php if( $current_route == "manage_cashondelivery_details" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('manage_cashondelivery_details');?>" >
                        <i class="icon-money"></i>&nbsp;Cash On Delivery
                   </a>                   
                </li> <?php } ?>

                <li <?php if($current_route == 'manage_review' ) { ?> class="panel active" <?php } else { ?> class="panel" <?php } ?> >
                    <a href="<?php echo url('manage_review');?>" >
                        <i class=" icon-edit"></i>&nbsp; Manage Product Reviews
                   </a>                   
                </li>
            </ul>

        </div>
