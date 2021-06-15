<div id="logoArea" class="navbar para-nav">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
    </a>
    <div class="container" style="width: 1170px;">
        <?php if($logodetails){foreach($logodetails as $logo) { $logoimgpath="assets/logo/" .$logo->imgs_name; } } else { $logoimgpath="themes/images/logo2.png"; }?> <a class="brand" href="<?php echo url('index'); ?>"><img src="<?php echo url('').'/'.$logoimgpath; ?>" alt="laravelecommerce Multivendor"/></a>
        <div class="pull-right mob-cart" style="padding-top:10px; padding-left:25px">
        <img src="<?php echo url(''); ?>/themes/images/cart.png"> <span class="text-info"><a href="<?php echo url('cart'); ?>" >
        <strong>		
        <?php 
        if(isset($_SESSION['cart']))
            {	 
                $item_count_header1 = count($_SESSION['cart']); 
                } 
        else {
            $item_count_header1 = 0; 
            } 			
            if(isset($_SESSION['deal_cart']))
                {	 
                    $item_count_header2 = count($_SESSION['deal_cart']); 
            } 
            else { 
                $item_count_header2 = 0; 
                }			 
                $item_count_header = $item_count_header1 + $item_count_header2;	
            if($item_count_header != 0) {
             echo $item_count_header; 
             } 
             else { 
                echo 0; 
                }		
                ?>        </strong>  items in your cart</a></span>            
        </div>
        <form class="form-inline navbar-search pull-right" style="margin-top: 17px">
            <select class="srchTxt" onchange="window.location.href = '<?php echo url("category_list")."/ "; ?>' + this.value;">
                <option value="0">Select Category</option>
                <?php foreach($header_category as $category_list) { ?>
                <option value="<?php echo base64_encode($category_list->mc_id); ?>">
                    <?php echo $category_list->mc_name; ?></option>
                <?php } ?> </select>
            <div id="display" style="display: none; position:absolute; top:40px;width:12% important; z-index:10; background:#EEEEEE;color:black;filter:alpha(opacity=80); border:1px solid #ddd; border-radius:6px; max-height:150px; overflow:scroll; line-height:25px; padding:10px "
            class=" "> </div>
        </form>
        <form class="form-inline navbar-search pull-right" action="{!!action('HomeController@search')!!}" style="margin-left: -5px;margin-top: 17px">			
            <input type="text" id="searchbox" placeholder="Search Product Name" autocomplete="on" style="font-family:lato !important;border:1px solid #3479B3;z-index:999999;border-radius: 0px;height:auto;" name="q" class="form-control"/>			<!--<select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>-->
            </form> 
        <br> </div>
        <div class="row menu-bgg">
        <div class="container" style="width: 1170px;" >
    <ul id="topMenu" class="nav pull-right" style="width:100%">
        <li <?php if(Route::getCurrentRoute()->getPath() == 'index' || Route::getCurrentRoute()->getPath() == '/') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('index'); ?>">Home</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->getPath() == 'products') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('products'); ?>">Products</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->getPath() == 'deals') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('deals'); ?>">Deals</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->getPath() == 'sold') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('sold'); ?>">Sold Out</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->getPath() == 'stores') { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('stores'); ?>">Stores</a>
        </li>
        <li <?php if(Route::getCurrentRoute()->getPath() == 'nearbystore' ) { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('nearbystore'); ?>">Near by store</a>
        </li>
         <li <?php if(Route::getCurrentRoute()->getPath() == 'contactus' ) { ?>class="active"
            <?php } else {?> class=""
            <?php } ?>><a href="<?php echo url('contactus'); ?>">Contact Us</a>
        </li>
    </ul>
    </div>
    </div>
</div>
