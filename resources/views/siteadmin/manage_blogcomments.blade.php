<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Manage Blog comments         </title>
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
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url('')?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                                <li class="active"><a > Manage Blog comments                </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Blog comments                </h5>
            
        </header>
        @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">
		
               
				
				
				 

                <div class="form-group col-lg-12">
                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">S.No</th>
                  <th class="text-center"> Name</th>
		    <th class="text-center">E-mail</th>
		   <th style="text-align:center;">Wesite</th>
		  <th style="text-align:center;">Blog Title</th>
		 <th style="text-align:center;">Comments</th>
		 <th style="text-align:center;">Date</th>
		 <th style="text-align:center;">(Approve/Unapprove)</th>
		 <th style="text-align:center;">Reply To comments</th>
		 </tr>
              </thead>
              <tbody>    
              <?php $i=1;?>           
              @foreach($blog_comments as $inq_list)
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$inq_list->cmt_name!!} </td>
				     <td class="text-center"> {!!$inq_list->cmt_email!!}	</td>
					  <td class="text-center">{!!$inq_list->cmt_website!!}		</td>
					  <td class="text-center">{!!$inq_list->blog_title!!} </td>
					 <td class="text-center">{!!$inq_list->cmt_msg!!} </td>
						<td class="text-center">{!!$inq_list->cmt_date!!} </td>
				 <td class="text-center"><?php if($inq_list->cmt_admin_approve== 1){ ?><a href="{!! url('status_blogcmt_submit').'/'.$inq_list->cmt_id.'/'.'0'!!}"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_blogcmt_submit').'/'.$inq_list->cmt_id.'/'.'1'!!}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>
	   <td class="center  "><a href="<?php echo url('reply_blogcmts')."/".$inq_list->cmt_id; ?>">Reply</a></td>
					 
                </tr>
				     
				    <?php $i++;?>
					@endforeach
				 
              </tbody>
            </table>
                </div>

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
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
