<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary|Cms about Us</title>
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

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!-- END PAGE LEVEL  STYLES -->
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
                                <li class="active"><a >CMS About Us</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>CMS About Us</h5> 
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
        	@if (Session::has('update_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('update_result') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
            {!! Form::open(array('url'=>'aboutus_page_update','class'=>'form-horizontal')) !!}
            @foreach($result as $info)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-3">Add About Us Page Data<span class="text-sub">*</span></label>
                    <div class="col-lg-8">
                    </div>
                </div>
              
               
                <div class="form-group">
				 <div class="col-lg-10">
                 		
                       <textarea id="wysihtml5" class="form-control" name="aboutus_data" rows="10">{!! $info->ap_description !!}</textarea>
                    </div>
                    <label class="control-label col-lg-2"><span class="text-sub"></span></label>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a   style="color:#fff">Update</a></button>
                  <!--   <button class="btn btn-default btn-sm btn-grad"><a href="#" style="color:#000">Cancel</a></button>-->
                   
                    </div>
					  
                </div>
		@endforeach
         </form>
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

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="<?php echo url('')?>/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo url('')?>/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });		
     </script>

     <!--END PAGE LEVEL SCRIPTS -->
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