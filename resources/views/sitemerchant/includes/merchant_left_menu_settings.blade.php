<?php  $current_route = Route::getCurrentRoute()->getPath(); ?> 
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">SETTINGS</h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li <?php if($current_route=="merchant_settings"){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>>
                    <a href="<?php echo url('merchant_settings'); ?>">
                        <i class="icon-cog"></i>&nbsp; Settings</a>                   
                </li>
                   <li class="panel">

<?php

if (Session::has('merchantid'))
{
    $merchantid=Session::get('merchantid');
}

 ?>

			<?php if (Session::has('merchantid')) {?>
                    <a href="<?php echo url('edit_merchant_info/'.$merchantid); ?>" >
			<?php }else { ?>  <a href="<?php echo url('sitemerchant'); ?>" ><?php } ?>
	
                        <i class="icon-envelope"></i>&nbsp;Edit Account
	                </a>                   
                </li>
                 <li class="panel">

<?php if (Session::has('merchantid')) {?>
                   <a href="<?php echo url('change_merchant_password/'.$merchantid); ?>" >
			<?php }else { ?>  <a href="<?php echo url('sitemerchant'); ?>" ><?php } ?>
  <i class="icon-mail-reply"></i>&nbsp;Change Password
                   </a>                   
                </li>
				<li  <?php if( $current_route == "mer_add_size" || $current_route == "mer_manage_size" || $current_route == "mer_add_color" || $current_route == "mer_manage_color" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>  >
				<?php if (Session::has('merchantid')) {?>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-anchor"></i> Attributes Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         <?php }else { ?>  <a href="<?php echo url('sitemerchant'); ?>" ><?php } ?>
                    </a>
					
                    <ul 
					<?php if (Session::has('merchantid')) {?>
					<?php if( $current_route == "mer_add_size" || $current_route == "mer_manage_size" || $current_route == "mer_add_color" || $current_route == "mer_manage_color" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="pagesr-nav">
                        <li <?php if( $current_route == "mer_add_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('mer_add_color'); ?>"><i class="icon-angle-right"></i> Add Color </a></li>
                        <li <?php if( $current_route == "mer_manage_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('mer_manage_color'); ?>"><i class="icon-angle-right"></i> Manage Colors </a></li>
                        <li <?php if( $current_route == "mer_add_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('mer_add_size'); ?>"><i class="icon-angle-right"></i> Add Size </a></li>
                        <li <?php if( $current_route == "mer_manage_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('mer_manage_size'); ?>"><i class="icon-angle-right"></i> Manage Sizes </a></li>
                        <?php }else { ?>  <a href="<?php echo url('sitemerchant'); ?>" ><?php } ?>
                    </ul>
					
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