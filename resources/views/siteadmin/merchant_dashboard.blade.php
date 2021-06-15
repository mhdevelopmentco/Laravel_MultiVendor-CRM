<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Merchant Dashboard</title>
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
	<link rel="stylesheet" href="<?php echo url(); ?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url(); ?>/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo url(); ?>/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/timeline/timeline.css" />

 <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jquery.min.js"></script>

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
                                <li class="active"><a>Merchants</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-dashboard"></i></div>
            <h5>Merchant Dashboard</h5>
            
        </header>
        
        
        
        	
           
            	<div class="row ">
                    <div class="col-lg-12 panel_marg">
                 <a style="color:#fff" href="<?php echo url(); ?>" class="btn btn-warning btn-sm btn-grad" target="_blank" >Go to Live</a>
                 <button class="btn btn-success btn-sm btn-grad"><a style="color:#fff" href="<?php echo url('product_all_orders'); ?>">See All Transaction</a></button>
                </div>
                </div>
                
            
        
        
      			  <div class="row">
                <div class="col-lg-6" style="padding:30px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Total Merchants</strong> 
                            <a href="#"><i class="icon icon-align-justify pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                           <div id="chart6" style="margin-top:20px; margin-left:20px; width:450px; height:450px;"></div>
                          <table width="30%" border="0">
                              <tr>
                                <td style="background:#4bb2c5"><label class="label label-active">Admin Add Stores</label></td>
                                <td style="background:#eaa228"><label class="label label-archive">Merchant Add Stores</label></td>
                                                              
                              </tr>
                            </table>
                        </div>
                       
                        	

                        
                    </div>
                </div>
                <div class="col-lg-5 " style="padding-top:30px"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">	
                            <strong>MERCHANT DETAILS</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="" width="100%">
                                    
                                    <tbody>
                                        <tr>
 
                                            <td>Total Merchants </td>
                                            <td><?php echo  $merchant_count ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$merchant_count.'%"'; ?>;> 
		  <span class="sr-only">60% Complete</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td>Total Stores</td>
                                            <td><?php echo $store_cnt; ?></td>
                                            
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$store_cnt.'%"'; ?>;> 
		  <span class="sr-only">60% Complete</span>
		</div>
	      </div></td>
										 </tr>
                                        
                                        <tr>
                                            <td>Admin Add Stores</td>
                                            <td><?php echo $admin_stores_cnt; ?></td>
                                            
                                        </tr>
                                         <tr>
                                             <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  <?php echo 'style="width:'.$admin_stores_cnt.'%"'; ?>;>
		  <span class="sr-only">40% Complete (success)</span>
		</div>
	      </div></td>  
 <tr>
                                            <td>Merchant Add Stores</td>
                                            <td><?php echo $merchant_stores_cnt; ?></td>
                                         
                                        </tr>
                                         <tr>
                                           <td colspan="2"><div class="progress progress-striped active">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" <?php echo 'style="width:'.$merchant_stores_cnt.'%"'; ?>;> 
		  <span class="sr-only">60% Complete</span>
		</div>
	      </div></td>
                                            
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5"  style="padding-left:12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Merchant Login Date Details</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Website Merchants</th>
                                            <th>Count</th>
					</tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Last 30 days</td>
                                            <td>0</td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td>Last 12 months</td>
                                            <td>15</td>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td>Last 10 years </td>
                                            <td>30</td>
                                           
                                            
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    </div>
</div>
   
    </div>
                    
                    
                    <div class="row">
                    	<div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               <strong>Statistics</strong> 
                            </div>
                             
                            <div class="panel-body">
                              <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Last One Year Transaction</a>
                                </li>
                              </ul>
                            
                            <div class="tab-content">
                              <div id="chart1" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
                                <!--<div class="tab-pane fade" id="profile-pills">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>-->
                                <!--<div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>-->
                                
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
  
    <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    <script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[<?php echo $admin_stores_cnt; ?>,<?php echo $merchant_stores_cnt ?>]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } });
		});
	</script>
    <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		<?php $s1 = "[" .$merchant_count. "]"; ?>
        var s1 = <?php echo $s1; ?>;
        var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'May','June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        plot1 = $.jqplot('chart1', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
    
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });</script>
    

    <!--- Chart Plugins -->
      <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.pointLabels.min.js"></script>
    
    <!--- --->
    


<script src="<?php echo url(); ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>



<script src="<?php echo url(); ?>/assets/plugins/autosize/jquery.autosize.min.js"></script>

       <script src="<?php echo url(); ?>/assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>

        
    
	<script src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="<?php echo url(); ?>/assets/js/bar_chart.js"></script>
        
     
</body>
     <!-- END BODY -->
</html>
