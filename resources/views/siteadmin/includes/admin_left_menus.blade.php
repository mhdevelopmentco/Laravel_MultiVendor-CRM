 <?php $current_route = Route::getCurrentRoute()->getPath(); ?>
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
                <li <?php if( $current_route == "general_setting" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('general_setting'); ?>">
                        <i class="icon-cog"></i>&nbsp;General Settings</a>                   
                </li>
                   <li <?php if( $current_route == "email_setting" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('email_setting'); ?>" >
                        <i class="icon-envelope"></i>&nbsp;Email & Contact Settings
	                </a>                   
                </li>
                 <!--li <?php //if( $current_route == "smtp_setting" ) //{ ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('smtp_setting'); ?>" >
                        <i class="icon-mail-reply"></i>&nbsp;SMTP Mailer Settings
                   </a>                   
                </li-->
				 <li <?php if( $current_route == "social_media_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('social_media_settings'); ?>" >
                        <i class="icon-facebook"></i>&nbsp;Social Media Page Settings
                   </a>                   
                </li>
				 <li <?php if( $current_route == "payment_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('payment_settings'); ?>" >
                        <i class="icon-credit-card"></i>&nbsp;Payment settings
	   
                       
                   </a>                   
                </li>
				<?php /*?> <li  <?php if( $current_route == "module_settings" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="<?php echo url('module_settings'); ?>" >
                        <i class="icon-table"></i>&nbsp;Modules Setting
                   </a>                   
                </li><?php */?>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-picture"> </i> Image Settings   
                        <span class="pull-right">
                          <i class="icon-angle-right"></i>
                        </span>
                       <!--&nbsp; <span class="label label-default">3</span>&nbsp;-->
                    </a>
                    <ul class="collapse" id="component-nav">
                       
                        <li class=""><a href="<?php echo url('add_logo'); ?>"><i class="icon-angle-right"></i> Logo Settings </a></li>
                         <li class=""><a href="<?php echo url('add_favicon'); ?>"><i class="icon-angle-right"></i> Favicon Settings </a></li>
                        <li class=""><a href="<?php echo url('add_noimage'); ?>"><i class="icon-angle-right"></i> No-Image Settings </a></li>
                        <!--   <li class=""><a href="tabs_panels.html"><i class="icon-angle-right"></i> Image zoom settings </a></li>
                      <li class=""><a href="notifications.html"><i class="icon-angle-right"></i> Notification </a></li>
                         <li class=""><a href="more_notifications.html"><i class="icon-angle-right"></i> More Notification </a></li>
                        <li class=""><a href="modals.html"><i class="icon-angle-right"></i> Modals </a></li>
                          <li class=""><a href="wizard.html"><i class="icon-angle-right"></i> Wizard </a></li>
                         <li class=""><a href="sliders.html"><i class="icon-angle-right"></i> Sliders </a></li>
                        <li class=""><a href="typography.html"><i class="icon-angle-right"></i> Typography </a></li> -->
                    </ul>
                </li>
                <li <?php if( $current_route == "add_banner_image" || $current_route == "manage_banner_image" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-camera"></i> Banner Image Settings
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_banner_image" || $current_route == "manage_banner_image" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="form-nav">
                        <li <?php if( $current_route == "add_banner_image" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_banner_image'); ?>"><i class="icon-angle-right"></i> Add Banner Image </a></li>
                        <li <?php if( $current_route == "manage_banner_image" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_banner_image'); ?>"><i class="icon-angle-right"></i> Manage Banner Images </a></li>
                        
                    </ul>
                </li>

                <li  <?php if( $current_route == "add_size" || $current_route == "manage_size" || $current_route == "add_color" || $current_route == "manage_color" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>  >
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-anchor"></i> Attributes Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>
                    <ul <?php if( $current_route == "add_size" || $current_route == "manage_size" || $current_route == "add_color" || $current_route == "manage_color" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="pagesr-nav">
                        <li <?php if( $current_route == "add_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_color'); ?>"><i class="icon-angle-right"></i> Add Color </a></li>
                        <li <?php if( $current_route == "manage_color" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_color'); ?>"><i class="icon-angle-right"></i> Manage Colors </a></li>
                        <li <?php if( $current_route == "add_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_size'); ?>"><i class="icon-angle-right"></i> Add Size </a></li>
                        <li <?php if( $current_route == "manage_size" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_size'); ?>"><i class="icon-angle-right"></i> Manage Sizes </a></li>
                        
                    </ul>
                </li>


  <li <?php if( $current_route == "add_specification" || $current_route == "manage_specification" || $current_route == "add_specification_group" || $current_route == "manage_specification_group" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-bar-chart"></i> Spec Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                         
                    </a>

			 <ul class="collapse" id="chart-nav">
                        <li><a href="<?php echo url('add_specification_group'); ?>"><i class="icon-angle-right"></i> Add specification group </a></li>
                        <li><a href="<?php echo url('manage_specification_group'); ?>"><i class="icon-angle-right"></i> Manage specification group</a></li>
                        <li><a href="<?php echo url('add_specification'); ?>"><i class="icon-angle-right"></i> Add specification </a></li>
                        <li><a href="<?php echo url('manage_specification'); ?>"><i class="icon-angle-right"></i> Manage specification</a></li>
                    </ul>
                </li>
                

 <li <?php if( $current_route == "add_country" || $current_route == "manage_country" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >


                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-globe"></i> Countries Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>

		  <ul <?php if( $current_route == "add_country" || $current_route == "manage_country" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="DDL-nav">
                        
                        <li <?php if( $current_route == "add_country" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_country'); ?>"><i class="icon-angle-right"></i>Add Country </a></li>
                        <li <?php if( $current_route == "manage_country" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_country'); ?>"><i class="icon-angle-right"></i> Manage Country </a></li>
                       <!--  <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li> -->
                    </ul>
		 </li>
                <li <?php if( $current_route == "add_city" || $current_route == "manage_city" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                        <i class=" icon-building"></i> Cities Management
	   
                    <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                    </a>
                    <ul <?php if( $current_route == "add_city" || $current_route == "manage_city" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="DDL4-nav">
                        
                        <li <?php if( $current_route == "add_city" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_city'); ?>"><i class="icon-angle-right"></i>Add City </a></li>
                        <li <?php if( $current_route == "manage_city" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_city'); ?>"><i class="icon-angle-right"></i> Manage Cities </a></li>
                       <!--  <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li> -->
                    </ul>
                </li>
                <li <?php if( $current_route == "add_category" || $current_route == "manage_category" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
                        <i class="icon-plus"></i> Category Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          
                    </a>
                    <ul <?php if( $current_route == "add_category" || $current_route == "manage_category" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?> id="error-nav">
                        <li <?php if( $current_route == "add_category" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_category'); ?>"><i class="icon-angle-right"></i> Add Category </a></li>
                        <li <?php if( $current_route == "manage_category" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_category'); ?>"><i class="icon-angle-right"></i> Manage Categories </a></li>
                       
                    </ul>
                </li>
                   <li <?php if( $current_route == "add_cms_page" || $current_route == "manage_cms_page" || $current_route == "aboutus_page" || $current_route == "terms" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?>>
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav2">
                        <i class="icon-pencil"></i> CMS Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul  <?php if( $current_route == "add_cms_page" || $current_route == "manage_cms_page" || $current_route == "aboutus_page" || $current_route == "terms" ) { ?> class="in"  <?php } else { echo 'class="collapse"';  }?>  id="chart-nav2">

                        <li <?php if( $current_route == "add_cms_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('add_cms_page'); ?>"  ><i class="icon-angle-right"></i> Add Page</a></li>
                        <li  <?php if( $current_route == "manage_cms_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('manage_cms_page'); ?>" ><i class="icon-angle-right"></i> Manage CMS Pages</a></li>
                        <li  <?php if( $current_route == "aboutus_page" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('aboutus_page'); ?>"><i class="icon-angle-right"></i> About Us</a></li>                
                         <li  <?php if( $current_route == "terms" ) { ?> class="active"  <?php } else { echo 'class=""';  }?>><a href="<?php echo url('terms'); ?>"><i class="icon-angle-right"></i> Terms & Conditions</a></li>                   
                    </ul>
                </li>
				<li <?php if( $current_route == "add_ad" || $current_route == "manage_ad" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav1">
                    <i class="icon-external-link-sign"></i> Ads Management
	   
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav1">
                        <li><a href="<?php echo url('add_ad'); ?>"><i class="icon-angle-right"></i> Add Ads</a></li>
                        <li><a href="<?php echo url('manage_ad'); ?>"><i class="icon-angle-right"></i> Manage Ads</a></li>
                    </ul>
                </li>
				<li <?php if( $current_route == "add_faq" || $current_route == "manage_faq" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                  <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav3">
                        <i class="icon-question-sign"></i> FAQ
	   
                  <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                  <ul class="collapse" id="chart-nav3">
                    <li><a href="<?php echo url('add_faq'); ?>"><i class="icon-angle-right"></i> Add FAQ</a></li>
                        <li><a href="<?php echo url('manage_faq'); ?>"><i class="icon-angle-right"></i> Manage FAQ</a></li>
                    </ul>
                </li>
				<li <?php if( $current_route == "manage_newsletter_subscribers" || $current_route == "send_newsletter" ) { ?> class="panel active"  <?php } else { echo 'class="panel"';  }?> >
                    <a  data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav4">
                        <i class="icon-signin"></i> News Letter
                        <span class="pull-right">
                            <i class="icon-angle-right"></i>
                        </span>
                          &nbsp; <span class="label label-danger"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav4">
                        <li><a href="<?php echo url('send_newsletter'); ?>"><i class="icon-angle-right"></i> Send Newsletter</a></li>
                        <li><a href="<?php echo url('manage_newsletter_subscribers'); ?>"><i class="icon-angle-right"></i> Manage subscribed users</a></li>

                    </ul>
              </li>
              
               <!--<li <?php //if( $current_route == "add_estimated_zipcode" ) { ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('add_estimated_zipcode');?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Add Estimated Zipcode
                   </a>                   
                </li>
                <li <?php //if( $current_route == "estimated_zipcode" ) { ?> class="panel active"  <?php //} else { echo 'class="panel"';  }?>>
                    <a href="<?php //echo url('estimated_zipcode');?>" >
                        <i class="icon-circle-arrow-right"></i>&nbsp;Estimated Zipcode
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