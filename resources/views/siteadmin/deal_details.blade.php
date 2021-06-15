<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Product details</title>
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
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
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
         {!! $adminheader !!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!! $adminleftmenus !!}
        <!--END MENU SECTION -->
        
	<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a >Deal details</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Deal details</h5>
            
        </header>
        <?php 
        foreach($deal_list as $deals)
		{  }
		 $title 		 = $deals->deal_title;
         $category_get	 = $deals->deal_category;
	     $maincategory 	 = $deals->deal_main_category;
		 $subcategory 	 = $deals->deal_sub_category;
		 $secondsubcategory= $deals->deal_second_sub_category;
		 $originalprice  = $deals->deal_original_price;
		 $discountprice  = $deals->deal_discount_price;
		 $startdate 	 = $deals->deal_start_date;
		 $enddate 		 = $deals->deal_end_date;
		 $expirydate	 = $deals->deal_expiry_date;
		 $description 	 = $deals->deal_description;
		 $merchant		 = $deals->deal_merchant_id;
		 $shop			 = $deals->deal_shop_id;
		 $metakeyword	 = $deals->deal_meta_keyword;
		 $metadescription= $deals->deal_meta_description;
		 $minlimt		 = $deals->deal_min_limit;
		 $maxlimit		 = $deals->deal_max_limit;
		 $purchaselimit	 = $deals->deal_purchase_limit;
		 $file_get		     = $deals->deal_image;
		 $img_count		 = $deals->deal_image_count;
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
                    <label class="control-label col-lg-2" for="text1">Deal Title<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                       <?php echo $title ; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Top Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $deals->mc_name; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Main Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $deals->smc_name; ?>
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Deal Description<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <?php echo $description; ?> 
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Deals Price<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $originalprice; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Discount Price<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                           <?php echo $discountprice; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Discount Percentage<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $deals->deal_discount_percentage."%"; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Savings<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $deals->deal_saving_price; ?>
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
                    <label class="control-label col-lg-2" for="text1">Deal Expiry Date<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo date('M-d-Y h:m:s',strtotime($expirydate)); ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Minimum Deal Limit<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo  $minlimt; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">maximum Deal Limit<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   <?php echo  $maxlimit; ?>
                    </div>
                </div>
                        </div>
					
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Purchase Count<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                 <?php echo $deals->deal_no_of_purchase; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Merchant Name<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $deals->mer_fname; ?>
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Shop Name<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                      <?php echo $deals->stor_name; ?>
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Deals Image<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <img style="height:40px;" src="<?php echo url(''); ?>/assets/deals/<?php echo $file_get_path[0]; ?>">
                            <?php 
					 for($j=0 ; $j< $img_count; $j++)
					 { ?>
                     <img style="height:40px;" src="<?php echo url(''); ?>/assets/deals/<?php echo $file_get_path[$j+1]; ?>">
                     <?php } ?>
                    </div>
                </div>
                        </div>
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php echo url('manage_deals'); ?>" class="btn btn-warning btn-sm btn-grad">Back</a>
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
      {!! $adminfooter !!}
    <!--END FOOTER --> 
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
