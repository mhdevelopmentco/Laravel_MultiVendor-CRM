<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary| Edit Banner Image</title>
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
                                <li class="active"><a >Add Banner Image</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Banner Image</h5>
            
        </header>
        @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'edit_banner_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
				@foreach($banner_detail as $banner_det)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Image Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <input type="hidden" name="bn_id" id="bn_id" value="{!!$banner_det->bn_id!!}"/>
                        <input id="text1" placeholder="Fruit ball"  name="bn_title" id="bn_title" value="{!! $banner_det->bn_title!!}" class="form-control" type="text">
                    </div>
                </div>

             <?php /*  <div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> 
					 <label class="sample"></label></label>

                  ?>  <div class="col-lg-8">
                    <?php $bn_type_db = explode(',',$banner_det->bn_type); ?>
					           <input type="checkbox" id="inlineCheckbox1"  name="bn_type[0]" id="bn_type1" value="1" <?php if($bn_type_db[0] == 1){ ?> checked <?php } ?> > <label class="sample"> Product                  </label>
					<input type="checkbox" id="inlineCheckbox1" name="bn_type[1]" id="bn_type2" value="2" <?php if($bn_type_db[1] == 2){ ?> checked <?php } ?>> <label class="sample"> Deal                  </label></label>
						<input type="checkbox" id="inlineCheckbox1"  name="bn_type[2] id="bn_type3" value="3" <?php if($bn_type_db[2] == 3){ ?> checked <?php } ?>> <label class="sample"> Auction                  </label></label>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-3">Upload Banner Image<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                      <input type="file"  name="file" id="bn_img" value="{!! $banner_det->bn_img!!}" placeholder="Fruit ball" id="text1"><br>
                      <img src="{!! url('assets/bannerimage/').'/'.$banner_det->bn_img!!}" style="height:60px;">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">Redirect URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" name="bn_redirecturl" id="bn_redirecturl" value="{!! $banner_det->bn_redirecturl!!}" class="form-control" placeholder="Fruit ball" id="text1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type='submit' class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <a href="<?php echo url('manage_banner_image');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
                    </div>
					  
                </div>
				@endforeach
                
         {!! Form::close() !!}
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
