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
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
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
                                <li class="active"><a >Product details</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Product details</h5>
            
        </header>
      <?php foreach($product_list as $products)
		{  }
		 $title 		 = $products->pro_title;
                $category_get	 = $products->pro_mc_id;
	         $maincategory 	 = $products->pro_smc_id;
		 $subcategory 	 = $products->pro_sb_id;
		 $secondsubcategory= $products->pro_ssb_id;
		 $originalprice  = $products->pro_price;
		 $discountprice  = $products->pro_disprice;
		 $inctax=$products->pro_inctax;
		 $shippingamt=$products->pro_shippamt;
		 $description 	 = $products->pro_desc;
		 $deliverydays=$products->pro_delivery;
		 $metakeyword	 = $products->pro_mkeywords;
		 $metadescription= $products->pro_mdesc;
	     $file_get  = $products->pro_Img;
        $file_get_path =  explode("/**/",$file_get); 
		 $img_count		 = $products->pro_image_count;



 
?>

        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                    <form >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Product details
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Product Title<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                       <?php echo $title ; ?>
                    </div>
                </div>
                        </div>
					 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Top Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $products->mc_name; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Main Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $products->smc_name; ?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Sub Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $products->sb_name; ?>
                    </div>
                </div>
                </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Second Sub Category<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $products->ssb_name; ?>
                    </div>
                </div>
                
                
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Product Description<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <?php echo $description; ?> 
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Product Price<span class="text-sub">*</span></label>
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
                    <label class="control-label col-lg-2" for="text1">Shipping Amount<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                     <?php echo  $shippingamt ?>
                    </div>
                </div>
                        </div>
					 
 
                         
		  
					  
 <div class="panel-body">
                           
			 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Product Image<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                   
                    
                            <img style="height:40px;" src="<?php echo url(''); ?>/assets/product/<?php echo $file_get_path[0]; ?>">
                            <?php 
					 for($j=0 ; $j< $img_count; $j++)
					 { ?>
                     <img style="height:40px;" src="<?php echo url(''); ?>/assets/product/<?php echo $file_get_path[$j+1]; ?>">
                     <?php } ?>
                    </div>
                </div>
                        </div>
                    </div>
                        </div>
		<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php echo url('manage_product'); ?>" class="btn btn-success btn-sm btn-grad">Back</a>
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
