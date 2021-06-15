<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Failed Fund Request               </title>
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
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url('')?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a> Failed Fund Request                  </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Failed Fund Request                  </h5>
            
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
                  <th class="text-center"> Merchnat Name</th>
				    <th class="text-center">Merchant Email</th>
				   <th style="text-align:center;">Transaction Id</th>
				  <th style="text-align:center;">Paid Amount</th>
				   <th style="text-align:center;">Status</th>
							   
					
					   
						  
                </tr>
              </thead>
              <tbody>    
              <?php $i = 1; foreach($get_funds  as $fund) { 
			 
			  
						  
			  ?>           
               {!! Form::open(array('url'=>'fund_paypal','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
             
                </form>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center"><?php echo $fund->mer_fname; ?></td>
				     <td class="text-center"><?php echo $fund->mer_email; ?></td>
					  <td class="text-center"><?php echo $fund->wr_txn_id; ?></td>
					  <td class="text-center"><?php echo  $fund->wr_paid_amount; ?></td>
					   <td class="text-center"><?php echo 'Failed' ?></td>
					  
				                      	<?php /*if($fund->mer_payment ) { ?>
					 <td class="text-center">
                     <?php if($newrequestedwithdrawamount != 0) {?>
                     <a href="<?php echo url('fund_paypal/'.$send); ?>" class="btn btn-warning btn-sm btn-grad" > Pay Now </a>      
                     <?php } else { ?>    .
                     <a class="btn btn-warning btn-sm btn-grad" > Nil </a> <strong></strong>           
                     <?php } ?>
                     </td>
					 <?php } else { ?>
                     <td class="text-center"><a >No paypal email for this merchant</a></td>
                     <?php }*/  ?>
                </tr>
				
				    <?php $i++; } ?>
					
				 
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


