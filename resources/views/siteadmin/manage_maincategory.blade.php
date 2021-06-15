<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary|Manage Categories</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{!!url('')!!}/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{!!url('')!!}/assets/css/main.css" />
    <link rel="stylesheet" href="{!!url('')!!}/assets/css/theme.css" />
    <link rel="stylesheet" href="{!!url('')!!}/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{!!url('')!!}/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a>Manage Main Categories</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Main Categories</h5>
            
        </header>
   
   @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
 <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width:10%;" class="text-center">S.No</th>
                  <th  class="text-center">Category Name</th>
				  <th style="text-align:center;">Top Category Name</th>
				   <th style="text-align:center;">Add Sub Category</th>
				    <th style="text-align:center;">Manage Sub Category</th>
				  <th style="text-align:center;">Edit</th>
				   <th style="text-align:center;">Status</th>
				  <th style="text-align:center;">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                @foreach($sub_maincatg_list as $maincatg)
                <tr>
                  <td  class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!! $maincatg->smc_name!!}</td>
                  <td class="text-center">{!! $maincatg->mc_name!!}</td>
                  <td class="text-center"><a href="{!! url('add_sub_main_category').'/'.$maincatg->smc_id!!}"><i class="icon-plus-sign"></i></a></td>
                  <td class="text-center"><?php if($subcatg_count_list[$maincatg->smc_id]!=0) { ?><a href="{!! url('manage_sub_category').'/'.$maincatg->smc_id!!}"><i class="icon-shopping-cart"></i><span style="color:#2574c4;padding-left:5px;">({!!$subcatg_count_list[$maincatg->smc_id]!!}) Categories </span></a><?php }else{?> <i class="icon-shopping-cart"></i><span style="color:#2574c4;padding-left:5px;">({!!$subcatg_count_list[$maincatg->smc_id]!!}) Categories </span><?php } ?></td>
				     <td class="text-center"><a href="{!! url('edit_main_category').'/'.$maincatg->smc_id!!}"><i class="icon icon-edit icon-2x"></i></a></td>
				   <td class="text-center"><?php if($maincatg->smc_status == 1){ ?><a href="{!! url('status_main_category_submit').'/'.$maincatg->smc_id.'/'.$maincatg->smc_mc_id.'/'.'0'!!}"><i class="icon icon-ok icon-2x"></i></a> <?php } else { ?> <a href="{!! url('status_main_category_submit').'/'.$maincatg->smc_id.'/'.$maincatg->smc_mc_id.'/'.'1'!!}"> <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>
				    <td class="text-center"><a href="{!! url('delete_main_category').'/'.$maincatg->smc_id.'/'.$maincatg->smc_mc_id!!}"><i class="icon icon-trash icon-2x"></i></a></td>
					
                </tr>
                <?php $i++;?>
                @endforeach
				  
				
				

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
    <script src="{!!url('')!!}/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="{!!url('')!!}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{!!url('')!!}/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
