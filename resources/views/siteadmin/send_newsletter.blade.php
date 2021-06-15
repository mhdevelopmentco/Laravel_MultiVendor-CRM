<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Send Newsletter</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/bootstrap-wysihtml5-hack.css" />
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
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a >Send Newsletter</a></li>
                            </ul>
                    </div>
                </div>
                
   
    <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Send Newsletter</h5>
            
        </header>
            @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
        @if (Session::has('error'))
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('error') !!}</div>
		@endif
          @if (Session::has('success'))
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
           {!! Form::open(array('url'=>'send_newsletter_submit','class'=>'form-horizontal')) !!}
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">City<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="city" >
           				<option value="" >-- Select --</option>
                        <?php foreach($city_list as $city){ ?>
          				<option value="<?php echo $city->ci_id; ?>" ><?php echo $city->ci_name; ?></option>
                        <?php } ?>
       			 </select>
                    </div>
                </div>

 				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Subject<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     <input type="text" class="form-control" placeholder="News Letter Subject" value="{!! Input::old('subject') !!}" name="subject" id="text1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Message<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                     
                     <div id="" >
                                    <div class="tab-pane fade active in" >
                                        <form>
                                        <textarea id="wysihtml5" name="message" class="form-control" rows="10">{!! Input::old('message') !!}</textarea>

                                        <div class="form-actions">
                                            <br />
                                           <button type="submit" class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Send</a></button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad"><a style="color:#000">Reset</a></button>
                                        </div>
                                    </form>
                                    </div> 
                                    
                                </div>
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
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
   {!! $adminfooter !!}
    <!--END FOOTER -->


   <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url(); ?>/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="<?php echo url(); ?>/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo url(); ?>/assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>

     <!--END PAGE LEVEL SCRIPTS -->

</body>
     <!-- END BODY -->
</html>
