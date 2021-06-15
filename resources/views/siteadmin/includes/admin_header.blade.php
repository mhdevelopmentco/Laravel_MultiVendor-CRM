<?php  $current_route = Route::getCurrentRoute()->getPath();

if(isset($routemenu))
{
$menu=$routemenu;
}
 ?>
<div oncontextmenu="return false"></div> 
     <script type="text/javascript">
 var __lc = {};
__lc.license = 4302571;

(function() {
 var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
 lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>

  <div id="top">

             <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo url('')?>" class="navbar-brand">
                 	  <img src="<?php echo url()."/"; ?>assets/logo/logo.png" alt="Logo" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
<?php $newsubscriberscount=Session::get('newsubscriberscount');
	$blogcmtcount=Session::get('blogcmtcount');
$inquiriescnt=Session::get('inquiriescnt');
$adrequestcnt=Session::get('adrequestcnt');

?>
                    <!-- MESSAGES SECTION -->
                    <li class="dropdown">
                        <a href="<?php echo url('manage_inquires');?>" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Inquiries">
                            <span class="label label-warning"><?php echo $inquiriescnt;?></span>    <i class="icon-envelope-alt"></i>&nbsp;
                        </a>
		  </li>
		   <li class="dropdown">
                        <a href="<?php echo url('manage_blogcmts');?>" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Blog comments">
                            <span class="label label-success"><?php echo $blogcmtcount;?></span>    <i class="icon-comment-alt"></i>&nbsp; 
                        </a>
		  </li>
		 <?php /*?> <li class="dropdown">
                        <a href="<?php echo url('manage_subscribers');?>" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="New Subscribers">
                            <span class="label label-success"><?php echo $newsubscriberscount;?></span>    <i class="icon-bookmark-empty"></i>&nbsp; 
                        </a>
		  </li><?php */?>
            <li class="dropdown">
                        <a href="<?php echo url('manage_ad');?>" data-original-title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom" title="Advertise request">
                            <span class="label label-success"><?php echo $adrequestcnt;?></span>    <i class="icon-bookmark-empty"></i>&nbsp; 
                        </a>
		  </li>
                    <!--END MESSAGES SECTION -->

                    <!--TASK SECTION -->
                <!--    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-danger">5</span>   <i class="icon-tasks"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Profile </strong>
                                            <span class="pull-right text-muted">40% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Pending Tasks </strong>
                                            <span class="pull-right text-muted">20% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Work Completed </strong>
                                            <span class="pull-right text-muted">60% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong> Summary </strong>
                                            <span class="pull-right text-muted">80% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Tasks</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </li>-->
                    <!--END TASK SECTION -->

                    <!--ALERTS SECTION -->
                 <!--   <li class="chat-panel dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-info">8</span>   <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-alerts">

                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-comment" ></i> New Comment
                                    <span class="pull-right text-muted small"> 4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-twitter info"></i> 3 New Follower
                                    <span class="pull-right text-muted small"> 9 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-envelope"></i> Message Sent
                                    <span class="pull-right text-muted small" > 20 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-tasks"></i> New Task
                                    <span class="pull-right text-muted small"> 1 Hour ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="icon-upload"></i> Server Rebooted
                                    <span class="pull-right text-muted small"> 2 Hour ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </li>-->
                    <!-- END ALERTS SECTION -->

                    <!--ADMIN SETTINGS SECTIONS -->

                   
                     <li><a href="<?php echo url('admin_profile');?>" class="btn btn-default"><i class="icon-user"></i> My Profile </a>
                            </li>
                            <li><a href="<?php echo url('admin_settings');?>" class="btn btn-default"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo url('admin_logout');?>" class="btn btn-default"><i class="icon-signout"></i> Logout </a>
                            </li>
                    
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>
            
			<div class="mainmenu"> 
            <ul class="">
                <li><a href="<?php echo url('siteadmin_dashboard');?>" <?php if($menu=="dashboard"){?>class="active"<?php } ?>>Dashboard</a></li>
                <li><a href="<?php echo url('general_setting');?>" <?php if($menu=="settings"){?>class="active"<?php } ?>>Settings</a>  </li>
                <li><a href="<?php echo url('deals_dashboard');?>" <?php if($menu=="deals"){?>class="active"<?php } ?>>Deals  </a>  </li>
                <li><a href="<?php echo url('product_dashboard');?>" <?php if($menu=="products"){?>class="active"<?php } ?>> Products </a>  </li> 
                <!--<li><a href="<?php //echo url('auction_dashboard');?>" <?php //if($menu=="auction"){?>class="active"<?php //} ?>> Auction </a>  </li> -->
                <li><a href="<?php echo url('customer_dashboard');?>" <?php if($menu=="customer"){?>class="active"<?php } ?>>Customers </a>  </li>
                <li><a href="<?php echo url('merchant_dashboard');?>" <?php if($menu=="merchant"){?>class="active"<?php } ?>> Merchants </a>  </li>
                <li><a href="<?php echo url('deals_all_orders');?>" <?php if($menu=="transaction"){?>class="active"<?php } ?>> Transaction </a> </li>
                <li><a href="<?php echo url('manage_publish_blog');?>" <?php if($menu=="blog"){?>class="active"<?php } ?>>Blogs</a> </li>
                </ul>
            </div>

        </div>
