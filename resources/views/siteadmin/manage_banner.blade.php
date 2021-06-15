<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Manage Banner</title>
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
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >Manage Banner</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Banner</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
   <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image Title</th>
                  <th  style="width:50%;">Redirect URL</th>
                  <th style="text-align:center;">Image</th>
				  <th style="text-align:center;">Edit</th>
				  <th style="text-align:center;">Block / Unblock</th>
				  <th style="text-align:center;">Delete</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
                @foreach($mnge_banner as $mnge_banner_list)
                <tr>
                  <td>{!!$i!!}</td>
                  <td>{!! $mnge_banner_list->bn_title !!}</td>
                  <td>{!! $mnge_banner_list->bn_redirecturl !!}</td>
                  <td class="text-center"><img src="{!! url('assets/bannerimage/').'/'.$mnge_banner_list->bn_img!!}" style="height:40px;"></td>
				   <td class="text-center"><a href="{!! url('edit_banner_image').'/'.$mnge_banner_list->bn_id!!}"><i class="icon icon-edit icon-2x"></i></a></td>
                   	
				    <td class="text-center"><?php if($mnge_banner_list->bn_status == 0){ ?><a href="{!! url('status_banner_submit').'/'.$mnge_banner_list->bn_id.'/'.'1'!!}"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_banner_submit').'/'.$mnge_banner_list->bn_id.'/'.'0'!!}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>
					 <td class="text-center"><a href="{!! url('delete_banner_submit').'/'.$mnge_banner_list->bn_id!!}"><i class="icon icon-trash icon-2x"></i></a></td>
                </tr>
                <?php $i++;?>
                @endforeach
				                 <!-- <tr>
                  <td>1</td>
                  <td>bonanza</td>
                  <td>http://demo.uniecommerce.com/</td>
                  <td class="text-center"><img src="assets/img/laptop.jpg" style="height:40px;"></td>
				   <td class="text-center"><a href="#"><i class="icon icon-edit icon-2x"></i></a></td>
				    <td class="text-center"><a href="#"><i class="icon icon-ban-circle icon-2x icon-me"></i></a></td>
					 <td class="text-center"><a href="#"><i class="icon icon-trash icon-2x"></i></a></td>
                </tr>-->
				  
                
              </tbody>
            </table>
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
     
</body>
     <!-- END BODY -->
</html>
