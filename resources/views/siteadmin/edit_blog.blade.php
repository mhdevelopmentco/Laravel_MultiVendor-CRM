<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |Edit Blog</title>
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
                                <li class="active"><a>Edit Blog</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Blog</h5>
            
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
             {!! Form::open(array('url'=>'edit_blog_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
             @foreach($selected_blog as $blog_detail)
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"> Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="text1" placeholder="" class="form-control" value="{!!$blog_detail->blog_title!!}" type="text" name="blog_title"  >
                        <input id="blog_id" placeholder="" class="form-control" value="{!!$blog_detail->blog_id!!}" type="hidden" name="blog_id"  >
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="form-control" rows="10" name="blog_description" >{!!$blog_detail->blog_desc!!}</textarea>
                    </div>
                </div>
				 
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="blog_category" value="{!! Input::old('blog_category') !!}" >
          		   <option value="0">-- Select --</option>
                          <?php foreach($categoryresult as $categorydetails){ ?>
          				 <option value="<?php echo $categorydetails->mc_id; ?>" <?php if($blog_detail->blog_catid == $categorydetails->mc_id){?>selected <?php } ?>><?php echo $categorydetails->mc_name; ?></option>
           				   <?php } ?>

        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Image <span class="text-sub">*</span></label>

                   <div class="col-lg-8">

		   <input type="file"  name="file" id="blog_img" >
		 
							
                    </div>
                    
                </div>
                
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <img src="<?php echo url('assets/blogimage/'.$blog_detail->blog_image);?>" height="80" />Select a snapshot (png,jpg,jpeg less than 1M).
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" value="{!!$blog_detail->blog_metatitle!!}"  id="text1" name="meta_title" value="{!! Input::old('meta_title') !!}" >
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta description <span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="text4" class="form-control" name="meta_description"   >{!!$blog_detail->blog_metadesc!!}</textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="meta_keywords" value="{!!$blog_detail->blog_metakey!!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Tags<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" id="text1" placeholder="" class="form-control" name="tags" value="{!!$blog_detail->blog_tags!!}" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Allow Comments<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="checkbox" checked="" value="1" name="allow_comments" <?php if($blog_detail->blog_comments == 1){?>checked <?php } ?>" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Status<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
					           <input type="radio" name="blogstatus"  title="Publish" value="1" <?php if($blog_detail->blog_type == 1){?>checked <?php } ?>> <label class="sample">Publish                                                      </label>
					<input type="radio" name="blogstatus"  title="Draft" value="2" <?php if($blog_detail->blog_type == 2){?>checked <?php } ?>> <label class="sample">Draft	                                                                                   </label>
						<label class="sample"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Submit</button>
                     <a href="<?php echo url('manage_publish_blog');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
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
</body>
     <!-- END BODY -->
</html>
