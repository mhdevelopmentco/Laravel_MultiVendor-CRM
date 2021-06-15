<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php if (Session::has('merchantid'))
{
    $merchantid=Session::get('merchantid');
}

?>
    <meta charset="UTF-8" />
    <title>Living Lectionary| Dashboard</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo url('');?>/assets/css/MoneAdmin.css" />
<link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">
    <link rel="stylesheet" href="<?php echo url('');?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="<?php echo url('');?>/assets/css/layout2.css" rel="stylesheet" />
    <link href="<?php echo url('');?>/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="<?php echo url('');?>/stylesheet" href="assets/plugins/timeline/timeline.css" />
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jquery.min.js"></script>
    <!-- <script src="http://192.168.2.50/nexemerchant/assets/plugins/jquery-2.0.3.min.js"></script>-->
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
    <div id="wrap" >
 <!-- HEADER SECTION -->
	{!!$merchantheader!!}
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left" >
           

        </div>
        <!--END MENU SECTION -->
		<div class="container">
        	<div class="row">
                    

                </div>
        	
        </div>


        <!--PAGE CONTENT -->
        <div class=" container" >
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                        	<header>
                <div class="icons"><i class="icon-dashboard"></i></div>
                <h5>Admin Dashboard</h5>
            </header>
              <?php
$sold_cnt=0;
 foreach($soldproductscnt as $soldres){
	if($soldres->pro_no_of_purchase	>=$soldres->pro_qty)
		{
		$sold_cnt++;
		}
	

	}
?>
            	<div class="col-lg-12">
                        <div style="text-align: center;">
                           
                              <a class="quick-btn1 active" href="<?php echo url('mer_manage_product');?>">
                                <i class="icon-check icon-2x"></i>
                                <span>Active Products</span>
                                <span class="label label-danger"><?php echo $activeproductscnt;?></span>
                            </a>
							 <a class="quick-btn1" href="<?php echo url('mer_sold_product');?>">
                                <i class="icon-check-minus icon-2x"></i>
                                <span>Sold Products</span>
                                <span class="label label-success"><?php echo $sold_cnt; ?></span>
                            </a>
                          
                            <a class="quick-btn1" href="<?php echo url('mer_manage_deals'); ?>">
                                <i class="icon-cloud-upload icon-2x"></i>
                                <span>Active Deals</span>
                                <span class="label label-warning"><?php echo $activedealscnt;?></span>
                            </a>
                              <a class="quick-btn1" href="<?php echo url('mer_expired_deals'); ?>">
                                <i class="icon-external-link icon-2x"></i>
                                <span>Archive Deals</span>
                                <span class="label btn-metis-2"><?php echo $archievddealcnt;?></span>
                            </a>
                          
                                          
                           
                            <a class="quick-btn1" href="<?php echo url('merchant_manage_shop').'/'.$merchantid;?>">
                                <i class="icon-check icon-2x"></i>
                                <span>Stores</span>
                                <span class="label label-danger"><?php echo $storescnt;?></span>
                            </a>
                            </div>
                        
                        <div style="height:30px"></div>

                    </div>
                        </div>
                    </div>
                </div>
                
                
                 <div class="row">
                    <div class="col-lg-12">
                 <button class="btn btn-success btn-sm btn-grad" style="margin-bottom:10px;"><a style="color:#fff" href="<?php echo url(); ?>" target="_blank">Go to Live</a></button>
                
                </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               Total Deal And Product Count
                            </div>
                             
                            <div class="panel-body col-lg-6  panel panel-default">
           						 <div class="panel-heading text-center">
              <strong>Deal Details</strong>
            </div>                   
			<div class="demo-container">
                            
			<div id="chart6"  style="margin-top:20px; text-align:center; margin-left:20px; width:450px; height:350px;"></div>
			
            <table width="30%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5"><label class="label label-active">Active Deals</label><span class=" label label-danger"><?php echo $activedealscnt;?></span> </td>
                                <td style="background:#eaa228"><label class="label label-archive">Archive Deals</label><span class=" label label-danger"><?php echo $archievddealcnt;?></span></td>
                               
                                                              
                              </tr>
                            </tbody></table>
		    </div>
          
		</div>
       
                            <div class="panel-body col-lg-6 panel panel-default ">
                              <div class="panel-heading text-center">
              <strong>Product Details</strong>
            </div>
			<div class="demo-container">
			<div id="chart10"  style="margin-top:20px; text-align:center; margin-left:20px; width:450px; height:350px;"></div>
			
            <table width="30%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5"><label class="label label-active">Active products</label><span class=" label label-danger"><?php echo $activeproductscnt;?></span></td>
                                <td style="background:#eaa228"><label class="label label-archive">Sold products</label><span class=" label label-danger"><?php echo $sold_cnt;?></span></td>
                                 
                                                              
                              </tr>
                            </tbody></table>  
		    </div>
          
		</div>
                             
		
                            </div>
                    </div>

                    
                     <!--<div class="col-lg-4">

                        <div class="chat-panel panel panel-primary">
                            <div class="panel-heading">
                                <i class="icon-comments"></i>
                                Chat
                            <div class="btn-group pull-right">
                                <button type="button" data-toggle="dropdown">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                            <div class="panel-body">
                                <ul class="chat">
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> Jack Sparrow </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/img/2.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="icon-time"></i> 13 mins ago</small>
                                                <strong class="pull-right primary-font"> Jhony Deen</strong>
                                            </div>
                                            <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/img/3.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> Jack Sparrow </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/img/4.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="icon-time"></i> 13 mins ago</small>
                                                <strong class="pull-right primary-font"> Jhony Deen</strong>
                                            </div>
                                            <br />
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="Text1" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" id="Button1">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>

                        </div>


                    </div>-->
                </div>
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               <strong>Month Wise Transactions</strong>
                            </div>
                            
                            <div class="panel-body panel panel-default"> 
                            <div class="panel-heading text-center">
                               <strong>Product Transaction</strong>
                            </div>    
                            <div class="demo-container" id="chart1" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
		  
           <div class="panel-heading text-center">
                               <strong>Deals Transaction</strong>
                            </div>		
                            <div class="demo-container" id="chart2" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>
           
            <div class="panel-heading text-center">
                               <strong>Auction Transaction</strong>
                            </div>		
              <div class="demo-container" id="chart3" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>	
        
        
      </div>
                             
		
                            </div>
                    </div>

                    
                    
                </div>
                
                
                 
                 <div class="row">
                    <div class="col-lg-12">
                         <?php /*?><div class="panel panel-default">
                                <div class="panel-heading">
                                   Last one year Transactions report
                                </div>
                             
                            <div class="panel-body">
                              
								  <div class="demo-container" id="chart5" style="margin-top:20px; margin-left:20px; width:950px; height:470px;"></div>	
								</div>
                             
		
                            </div><?php */?>
                    </div>

                    
                   
                </div>
                 
                          
              

                
            </div>

        </div>
       
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    {!! $merchantfooter !!}
    <!--END FOOTER -->
    <script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[<?php echo $get_chart6_details; ?> ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } } );
		});
	</script>
      <script>
	$(document).ready(function(){
		
	plot10 = $.jqplot('chart10', [[<?php echo $activeproductscnt; ?>,<?php echo $sold_cnt; ?> ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer } });
		});
	</script>
   
   
      <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		<?php $s1 = "[" .$productchartdetails. "]"; ?>
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
     <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		<?php $s1 = "[" .$dealchartdetails. "]"; ?>
        var s1 = <?php echo $s1; ?>;
        var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'May','June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        plot1 = $.jqplot('chart2', [s1], {
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
    
        $('#chart2').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });</script>
   
     <script class="code" type="text/javascript">$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
		
		<?php $s1 = "[" .$auctionchartdetails. "]"; ?>
        var s1 = <?php echo $s1; ?>;
        var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'May','June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        plot1 = $.jqplot('chart3', [s1], {
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
    
        $('#chart3').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });</script>
   
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jqplot.pointLabels.min.js"></script>
    

    <!-- GLOBAL SCRIPTS -->
  	
     <script src="<?php echo url('');?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('');?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="<?php echo url('');?>/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="<?php echo url('');?>/assets/js/bar_chart.js"></script>
    
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
