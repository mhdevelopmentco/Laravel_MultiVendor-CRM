<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |Countries Add Country</title>
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
                                <li class="active"><a >Add Country</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Country</h5>
            
        </header>
@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
        <div id="div-1" class="accordion-body collapse in body">

	@foreach ($countryresult as $info) 
 {!! Form::open(array('url'=>'update_country_submit','class'=>'form-horizontal')) !!}
      
 <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Country Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
			<input id="text1" placeholder="" id="ceditname" name="ceditname" class="form-control" type="text" value="<?php echo $info->co_name; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Country Code<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" placeholder="" id="ceditcode" name="ceditcode"  class="form-control" type="text" value="<?php echo $info->co_code; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <p>Ex:AL,AX, etc..</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Currency Symbol<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" placeholder="" id="cureditsymbol" name="cureditsymbol"  class="form-control" type="text" value="<?php echo $info->co_cursymbol; ?>">
                    </div>
                </div>
				 <div class="form-group">
                    <label class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <p>Ex: $,₳,etc...</p>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Currency Code<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <input id="text1" placeholder="" id="cureditcode" name="cureditcode"  class="form-control" type="text" value="<?php echo $info->co_curcode; ?>">
                    </div>
                </div>
				  <div class="form-group">
                    <label class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      <p>Ex: USD,EUR,SAR,etc...</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                      <a href="<?php echo url('manage_country');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
                    </div>
					  
                </div>

                
         </form>
@endforeach
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
