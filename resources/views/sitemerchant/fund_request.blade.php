<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin |Fund Request Report</title>
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
            <li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
            <li class="active"><a href="#">Fund Request Report</a></li>
          </ul>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-12"> 
          <div class="box dark"> <header> 
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Fund Request Report</h5>
            </header> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Merchant Name</th>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                             <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $i=1;
									 foreach($fundtransactiondetails as $funddetails) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $funddetails->wr_mer_name;?></td>
                                            <td><?php echo $funddetails->wr_txn_id;?></td>
                                            <td class="center"><?php echo $funddetails->wr_paid_amount;?></td>
                                            <td class="center"><?php echo $funddetails->wr_date;?></td>
                                             <td class="center"><?php echo $funddetails->wr_status;?></td>
                                        </tr>
                                       <?php $i++;}?>
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
    <script src="<?php echo url(); ?>/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     
</body>
     <!-- END BODY -->
</html>
