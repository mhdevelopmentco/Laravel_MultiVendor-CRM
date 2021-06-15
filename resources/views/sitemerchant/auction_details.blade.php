<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin | Auction details</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/theme.css" />
	  <link rel="stylesheet" href="<?php echo url('')?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
<link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


       <!-- HEADER SECTION -->
         {!! $merchantheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $merchantleftmenus !!}
        <!--END MENU SECTION -->
        
	<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
                                <li class="active"><a href="#">Auction details</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Auction details</h5>
            
        </header>
        <?php 
        foreach($auction_list as $auction)
		{  }
		 $title 		 = $auction->auc_title;
         $category_get	 = $auction->auc_category;
	     $maincategory 	 = $auction->auc_main_category;
		 $subcategory 	 = $auction->auc_sub_category;
		 $secondsubcategory= $auction->auc_second_sub_category;
		 $originalprice  = $auction->auc_original_price;
		 $auctionprice  = $auction->auc_auction_price;
		 $bitincr  = $auction->auc_bitinc;		 
		 $startdate 	 = $auction->auc_start_date;
		 $enddate 		 = $auction->auc_end_date;
		 $shippingfee	 = $auction->auc_shippingfee;
		 $shippinginfo	 = $auction->auc_shippinginfo;
		 $description 	 = $auction->auc_description;
		 $merchant		 = $auction->auc_merchant_id;
		 $shop			 = $auction->auc_shop_id;
		 $metakeyword	 = $auction->auc_meta_keyword;
		 $metadescription= $auction->auc_meta_description;
		 $file_get		  = $auction->auc_image;
		 $img_count		 = $auction->auc_image_count;
		 $file_get_path =  explode("/**/",$file_get); 
		?>
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Deal details
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Auction Title<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                       <?php echo $title ; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Top Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $auction->mc_name; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Main Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $auction->smc_name; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Sub Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $auction->sb_name; ?>
                    </div>
                </div>
                </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Second Sub Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $auction->ssb_name; ?>
                    </div>
                </div>
                
                
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Auction Description<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <?php echo $description; ?> 
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Auction Price<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $originalprice; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Auction Price<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                           <?php echo $auctionprice; ?>
                    </div>
                </div>
                        </div>
						 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Savings<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $auction->auc_saving_price; ?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Bid Increment<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $bitincr; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Start Date<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo date('M-d-Y h:m:s',strtotime($startdate)); ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">End Date<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
               <?php echo date('M-d-Y h:m:s',strtotime($enddate)); ?>
                    </div>
                </div>
                        </div>
						 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Shipping Fee<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo  $shippingfee; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Shipping Information<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo  $shippinginfo; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Merchant Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo $auction->mer_fname; ?>
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Shop Name<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                         <?php echo $auction->stor_name; ?>  
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Auction Image<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <img style="height:40px;" src="<?php echo url(''); ?>/assets/auction/<?php echo $file_get_path[0]; ?>">
                            <?php 
					 for($j=0 ; $j< $img_count; $j++)
					 { ?>
                     <img style="height:40px;" src="<?php echo url(''); ?>/assets/auction/<?php echo $file_get_path[$j+1]; ?>">
                     <?php } ?>
                    </div>
                </div>
                        </div>
                    </div>
					<div class="panel panel-default">
                        <div class="panel-heading">
                          Transaction Details 
                        </div>                     
						 <div class="panel-body">
                           <div class="form-group">
                    <label for="text1" class="control-label col-lg-3"><span class="text-sub"></span></label>
                    <div class="col-lg-4">
                        No Deals Found(Waiting For Table)
                    </div>
                </div>
                        </div>                       
                    </div>
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php echo url('manage_auction'); ?>" class="btn btn-warning btn-sm btn-grad">Back</a>
                    </div>
					  
                </div>
                
                </form>
                </div>
        
        </div>
    </div>
</div>
   
    </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->  
  <!-- FOOTER -->
      {!! $merchantfooter !!}
    <!--END FOOTER --> 
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
