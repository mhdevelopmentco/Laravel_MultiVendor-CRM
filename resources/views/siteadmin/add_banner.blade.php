<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin | Add Banner Image</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
         @if (Session::has('error'))
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('error') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('url'=>'add_banner_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Image Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" placeholder="Banner Title"  name="bn_title" value="{!!Input::old('bn_title')!!}" id="bn_title" class="form-control" type="text">
                    </div>
                </div>

               <?php /*?><div class="form-group">
                    <label class="control-label col-lg-3" for="text1"> 
					 <label class="sample"></label></label>

                    <div class="col-lg-8">
					           <input type="checkbox" id="inlineCheckbox1"  name="bn_type[0]" id="bn_type1" value="1" > <label class="sample"> Product                  </label>
					<input type="checkbox" id="inlineCheckbox1"  name="bn_type[1]" id="bn_type2" value="2"> <label class="sample"> Deal                  </label></label>
						<input type="checkbox" id="inlineCheckbox1"  name="bn_type[2]" id="bn_type3" value="3"> <label class="sample"> Auction                  </label></label>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-3">Upload Banner Image<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                      <input type="file"  name="file" id="bn_img" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-3">Redirect URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="text" name="bn_redirecturl" id="bn_redirecturl" class="form-control" value="{!!Input::old('bn_redirecturl')!!}"  placeholder="Redirect Url" id="text1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-3"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type='submit' class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</button>
                   
                    </div>
					  
                </div>

                
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
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
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
</body>
     <!-- END BODY -->
</html>
