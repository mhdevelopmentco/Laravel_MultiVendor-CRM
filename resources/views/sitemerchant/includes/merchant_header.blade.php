<?php  $current_route = Route::getCurrentRoute()->getPath();

if(isset($routemenu))
{
$menu=$routemenu;
}
if (Session::get('merchantid'))
{
    $merchantid=Session::get('merchantid');
}

?>
<div oncontextmenu="return false"></div>   
<div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo url('sitemerchant_dashboard')?>" class="navbar-brand">
                      <img src="<?php echo url()."/"; ?>assets/logo/logo.png" alt="Logo" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <!-- MESSAGES SECTION -->
                  
                    <!--END MESSAGES SECTION -->

                    <!--TASK SECTION -->
                 
                    <!--END TASK SECTION -->

                    <!--ALERTS SECTION -->
                    
                    <!-- END ALERTS SECTION -->

                    <!--ADMIN SETTINGS SECTIONS -->
<?php

if (Session::get('merchantid'))
{
    $merchantid=Session::get('merchantid');
}

?>
        <strong> Hi, <?php echo Session::get('merchantname');?></strong>
                             <li><a href="<?php echo url('merchant_profile');?>" class="btn btn-default"><i class="icon-user"></i> Profile </a>
                            </li>
                            <li><a href="<?php echo url('merchant_settings');?>" class="btn btn-default"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo url('merchant_logout');?>" class="btn btn-default"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </a>

                      

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>
			<div class="mainmenu"> 
            <ul class="">
                <li><a href="<?php echo url('sitemerchant_dashboard');?>" <?php if($menu=="dashboard"){?>class="active"<?php } ?> >Dashboard</a></li>
                <li><a href="<?php echo url('merchant_settings');?>" <?php if($menu=="settings"){?>class="active"<?php } ?>>Settings</a>  </li>
                <li><a href="<?php echo url('mer_add_deals');?>" <?php if($menu=="deals"){?>class="active"<?php } ?>>Deals  </a>  </li>
                <li><a href="<?php echo url('mer_add_product');?>" <?php if($menu=="products"){?>class="active"<?php } ?>> Products </a>  </li> 
                <!--<li><a href="<?php //echo url('merchant_add_auction');?>" <?php //if($menu=="auction"){?>class="active"<?php //} ?>> Auction </a>  </li> -->
                <?php /*<li><a href="<?php echo url('show_merchant_transactions');?>" <?php if($menu=="transaction"){?>class="active"<?php } ?>> TRANSACTIONS  </a>  </li>*/ ?>
                <li><a href="<?php echo url('merchant_deals_all_orders');?>" <?php if($menu=="transaction"){?>class="active"<?php } ?>> Transactions  </a>  </li>
                <li><a href="<?php echo url('fund_request');?>"  <?php if($menu=="funds"){?>class="active"<?php } ?>> Fund requests </a>  </li>
                <li><a href="<?php echo url('merchant_manage_shop/'.$merchantid);?>" <?php if($menu=="shop"){?>class="active"<?php } ?>>  Shops  </a> </li>
                </ul>
            </div>

        </div>
