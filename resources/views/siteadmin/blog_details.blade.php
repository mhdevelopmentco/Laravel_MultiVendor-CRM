<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Blog details</title>
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
                                <li class="active"><a>Blog details</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>blog details</h5>
            
        </header>
        <?php 
        foreach($blog_list as $blog)
		{  }
		 $title 		 = $blog->blog_title;
         $description 	 = $blog->blog_desc;
		 $category_get	 = $blog->blog_catid;
		 $file_get		     = $blog->blog_image;
		 $blog_title		 = $blog->blog_metatitle;
		 $metadescription= $blog->blog_metadesc;
		 $metakeyword	 = $blog->blog_metakey;
		 $blog_tags		 = $blog->blog_tags;
		 $blog_comments		 = $blog->blog_comments;
		 $blog_type	 = $blog->blog_type;
		  $blog_status		 = $blog->blog_status;
		 $blog_created_date	 = $blog->blog_created_date;
		 
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
                    <label class="control-label col-lg-2" for="text1">Blog Title<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                       <?php echo $title ; ?>
                    </div>
                </div>
                        </div>
						  <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Category Type<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                      <?php echo $blog->mc_name; ?>
                    </div>
                </div>
                        </div>
						 
						 
                        
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Blog Description<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <?php echo $description; ?> 
                    </div>
                </div>
                        </div>
						 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Blog Metatitle<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                    <?php echo $blog_title;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Blog MetaDescription<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                        <?php echo $metadescription;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Blog Meta keyword<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                         <?php echo $metakeyword;?>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Blog Tags<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php echo $blog_tags;?>
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Blog Image<span class="text-sub">*</span></label>
                    <div class="col-lg-4">
                            <img style="height:40px;" src="<?php echo url(''); ?>/assets/blogimage/<?php echo $file_get; ?>">
                            
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Comments<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php if($blog_comments == 0) { echo 'Not Allow'; } else { echo 'Allow'; }?>
                    </div>
                </div>
                        </div>
                       <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Status <span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php if($blog_type == 1) { echo 'Public'; } else { echo 'Draft'; }?>
                    </div>
                </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1"> Created Date <span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                            <?php echo $blog_created_date; ?>
                    </div>
                </div>
                        </div>
                    </div>
					
					<div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php if($blog_type == 1) { echo url('manage_publish_blog'); } else { echo url('manage_draft_blog'); } ?>" class="btn btn-warning btn-sm btn-grad">Back</a>
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
