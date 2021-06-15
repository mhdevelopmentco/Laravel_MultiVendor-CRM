<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |Manage Publish Blog</title>
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
	  <link rel="stylesheet" href="assets/css/plan.css" />
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
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a>Manage Publish Blog</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Publish Blog</h5>
            
        </header>
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            <div class="accordion-body collapse in body" id="div-1">
           <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">
		   </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div>
        
           <table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="Rendering engine: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">S.No</th>
										<th aria-label="Browser: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Blog Title</th>
										<th aria-label="Platform(s): activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Category</th>
										
																				<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Date</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> Image </th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> Edit </th>	
									
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Status</th>
                                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Delete</th>
										<th aria-label="CSS grade: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Blog details</th>

										</tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1 ;
									  foreach($blog_details as $blog_list) { 
									  $auc_get_img = $blog_list->blog_image;
									  if($blog_list->blog_status == 1)
									  {
										  $process = "<a href='".url('block_blog/'.$blog_list->blog_id.'/0/'.$blog_list->blog_type)."' > <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";
								  } else if($blog_list->blog_status == 0) {
										   $process = "<a href='".url('block_blog/'.$blog_list->blog_id.'/1/'.$blog_list->blog_type)."' > <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";
									  }
									  ?>
                                    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class=""><?php echo substr($blog_list->blog_title,0,45); ?></td>
                                            <td class=""><?php echo $blog_list->mc_name; ?> </td>
                                            
                                           
                                            <td class="center  "><?php echo $blog_list->blog_created_date; ?></td>
                                            
                                            <td class="center  "><a href="#"><img style="height:40px;" src="<?php echo url(''); ?>/assets/blogimage/<?php echo $auc_get_img; ?>"></a></td>
                                     <td class="text-center"><a href="{!! url('edit_blog').'/'.$blog_list->blog_id!!}"><i class="icon icon-edit icon-2x"></i></a></td>
                                          <td class="text-center"><?php echo $process; ?></td>
					 <td class="text-center"><a href="{!! url('delete_blog_submit').'/'.$blog_list->blog_id.'/'.$blog_list->blog_type!!}"><i class="icon icon-trash icon-2x"></i></a></td>
                                            
                                            <td class="center  "><a href="<?php echo url('blog_details')."/".$blog_list->blog_id; ?>">View details</a></td>
                                        </tr>
									<?php $i++; } ?>
									
										</tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
								<ul class="pagination">
								<li id="dataTables-example_previous" tabindex="0" aria-controls="dataTables-example" class="paginate_button previous disabled">
								</li>
								</ul></div></div></div></div>
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
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     <script src="<?php echo url('')?>/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
</body>
     <!-- END BODY -->
</html>
