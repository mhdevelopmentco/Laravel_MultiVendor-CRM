<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin | Transaction Dashboard</title>
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
	<link rel="stylesheet" href="<?php echo url('')?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url('')?>/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo url('')?>/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="<?php echo url('')?>/stylesheet" href="assets/plugins/timeline/timeline.css" />
<script class="include" type="text/javascript" src="<?php echo url(); ?>/assets/js/chart/jquery.min.js"></script>
	

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
      {!!$adminheader!!}
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       {!!$adminleftmenus!!}
        
        
        <!--END MENU SECTION -->

		<div></div>

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                    <div class="col-lg-12">
                        	<ul class="breadcrumb">
                            	<li class=""><a href="#">Home</a></li>
                                <li class="active"><a href="#">Transaction</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-dashboard"></i></div>
            <h5>Transaction Dashboard</h5>
            
        </header>
	    <div class="row">
                <div class="col-lg-6" style="padding:30px; min-height:750px">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Total Transactions Count</strong> 
                            <a href="#"><i class="icon icon-align-justify pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                           <div id="chart6" style="margin-top:20px; margin-left:20px; width:450px; height:450px;"></div>
                           <table width="30%" border="0">
                              <tbody><tr>
                                <td style="background:#4bb2c5"><label class="label label-active">Products</label></td>
                                <td style="background:#eaa228"><label class="label label-archive">Deals</label></td>
                                 <td style="background:#eaa228"><label class="label label-archive">Auctions</label></td>
                                
                                
                                 
                                                              
                              </tr>
                            </tbody></table>
                        </div>
                       
                        	

                        
                    </div>
                </div>
                <br>
                <div class="col-lg-5 " style="padding-top:30px">                
                <strong>MARKETING RESPONSE RATE</strong> 
                </div>
                
                <div class="col-lg-5 " style="padding-top:10px">
                
                    <div class="panel panel-default">
                        
                        
                        <div class="panel-heading">
                            <strong>Deals Transaction Details</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                    	<th>Transactions</th>
                                        <th>Count</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Today</td>
                                            <td><?php echo $producttoday[0]->count;?></td>
                                            <td><?php if($producttoday[0]->amt){echo $producttoday[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last 7 days</td>
                                            <td><?php echo $produst7days[0]->count;?></td>
                                            <td><?php if($produst7days[0]->amt){echo $produst7days[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last 30 days</td>
                                            <td><?php echo $product30days[0]->count;?></td>
                                            <td><?php if($product30days[0]->amt){echo $product30days[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
							   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5 " style="padding-top:10px">
                
                    <div class="panel panel-default">
                        
                        
                        <div class="panel-heading">
                            <strong>Products Transaction Details</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                    	<th>Transactions</th>
                                        <th>Count</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Today</td>
                                            <td><?php echo $dealstoday[0]->count;?></td>
                                            <td><?php if($dealstoday[0]->amt){echo $dealstoday[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last 7 days</td>
                                            <td><?php echo $deals7days[0]->count;?></td>
                                            <td><?php if($deals7days[0]->amt){echo $deals7days[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last 30 days</td>
                                            <td><?php echo $deals30days[0]->count;?></td>
                                            <td><?php if($deals30days[0]->amt){echo $deals30days[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-5 " style="padding-top:10px">
                
                    <div class="panel panel-default">
                        
                        
                        <div class="panel-heading">
                            <strong>Auction Transaction Details</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                    	<th>Transactions</th>
                                        <th>Count</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Today</td>
                                            <td><?php echo $auctiontoday[0]->count;?></td>
                                            <td><?php if($auctiontoday[0]->amt){echo $auctiontoday[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last 30 days</td>
                                            <td><?php echo $auction7days[0]->count;?></td>
                                            <td><?php if($auction7days[0]->amt){echo $auction7days[0]->amt;}else {echo "-";}?></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Last month</td>
                                            <td><?php echo $auction30days[0]->count;?></td>
                                            <td><?php if($auction30days[0]->amt){echo $auction30days[0]->amt;}else {echo "-";}?></td>
                                            
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
                                <li class="active"><a  style="cursor:pointer;" onclick="showchart1();" data-toggle="tab">Last One Year Product Transaction</a>  </li>
                                   <li class="active"><a  style="cursor:pointer;"  onclick="showchart2();" data-toggle="tab">Last One Year Deals Transaction</a>  </li>
                                      <li class="active"><a  style="cursor:pointer;" onclick="showchart3();"  data-toggle="tab">Last One Year Auction Transaction</a>  </li>
                              
                              </ul>
                            
                            <div class="tab-content">
                              <div id="chart1" style="margin-top:20px; margin-left:20px; max-width:950px; height:470px;"></div>
                               <div id="chart2" style="margin-top:20px;margin-left:20px; max-width:950px; height:470px;"></div>
                                <div id="chart3" style="margin-top:20px;margin-left:20px; max-width:950px; height:470px;"></div>
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
            <!--END PAGE CONTENT -->
 
        </div>
    
     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy; Living Lectionary&nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
  <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script type="text/javascript">

	function showchart1()
	{
		document.getElementById("chart1").style.display='block';
		document.getElementById("chart2").style.display='none';
		document.getElementById("chart3").style.display='none';
		/*$( "#chart1" ).show();
		$( "#chart2" ).hide();
		$( "#chart3" ).hide();*/
	}
	function showchart2()
	{ 
		document.getElementById("chart2").style.display='block';
		document.getElementById("chart1").style.display='none';
		document.getElementById("chart3").style.display='none';
	}
	function showchart3()
	{
		document.getElementById("chart3").style.display='block';
		document.getElementById("chart2").style.display='none';
		document.getElementById("chart1").style.display='none';
	}
	
	</script>
	<script>
	$(document).ready(function(){
		
	plot6 = $.jqplot('chart6', [[<?php echo $producttransactioncnt; ?>,<?php echo $dealtransactioncnt; ?>,<?php echo $auctiontransactioncnt; ?> ]], {seriesDefaults:{renderer:$.jqplot.PieRenderer!!});
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
