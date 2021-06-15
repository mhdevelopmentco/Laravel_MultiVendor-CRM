<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Manage Inquiries                </title>
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
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a > Manage Inquiries                </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Inquiries                </h5>
            
        </header>
        @if (Session::has('result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
           @if (Session::has('resulterror'))
		<div class="alert alert-danger alert-dismissable">{!! Session::get('resulterror') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        
         <a href="{!! URL::previous() !!}">  <button  type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff;margin:10px;">Back</button>
                   </a>
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">             
                  
                <div class="form-group col-lg-12">
                    	<table class="table table-bordered" id="dataTables-example">
              <thead>
                <tr>
                  <th style="width:10%;"class="text-center">S.No</th>
                  <th class="text-center">Auction Name</th>
				    <th class="text-center">Customer Name</th>
				   <th style="text-align:center;">Customer Email</th>
				  <th style="text-align:center;">Customer Address</th>
				   <th style="text-align:center;">Shipping Amount</th>							   
				   <th style="text-align:center;"> Biddig Amount </th>
                   <th style="text-align:center;"> Auction Winner </th>                
                   <th style="text-align:center;"> Action </th>
                   <th style="text-align:center;"> Status </th>
                      
					   
						  
                </tr>
              </thead>
              <tbody>    
              <?php $i=1;
			
			  ?>           
              @foreach($manage_auction_bidder as $bidder)
              
                <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$bidder->auc_title !!} </td>
				     <td class="text-center"> {!!$bidder->oa_cus_name !!}	</td>
					  <td class="text-center">{!!$bidder->oa_cus_email !!}		</td>
					  <td class="text-center">{!!$bidder->oa_cus_address !!} </td>
				   <td class="text-center">{!!$bidder->oa_bid_shipping_amt !!}</td>				
					 <td class="text-center">{!!$bidder->oa_bid_amt !!}</td>
					    <td style="text-align:center;"> 
                        <?php if($bidder->oa_bid_winner ==1) { ?>
                        <img src="<?php echo url(); ?>/assets/img/winner.png" height="60" width="50" >
                        <?php } else { ?>
                        <a href="<?php echo url('auction_winner/'.$bidder->oa_id."/".$bidder->auc_id); ?>"> Choose Winner</a> 
                        <?php } ?>
                        
                        </td>
                   <td style="text-align:center;"> 
                      <?php if($bidder->oa_bid_winner ==1) { ?>
                       <a href="<?php echo url('send_auction_to_winner/'.$bidder->oa_id."/".$bidder->auc_id); ?>"> Send Auction</a> 
                        <?php } else { ?>
                        Send Auction
                        <?php } ?>
                         </td>
                      <td style="text-align:center;"> 
                     <?php
					 if($bidder->oa_bid_winner ==1) { 
					 
					 if($bidder->oa_bid_item_status == 0) { 
					 echo 'Onprocess';
					 } else if($bidder->oa_bid_item_status == 1) { 
					 echo '<span style="color:green" >Send Item	</span> <br>'.$bidder->oa_delivery_date;
					 }  else if($bidder->oa_bid_item_status == 3) { 
					 echo '<span style="color:red" >Cancelled</span> <br>'.$bidder->oa_delivery_date;
					 } 
					 
					 } else {
						  if($bidder->oa_bid_winner !=1) { 
						 echo 'Choose Winner';
						  }
					 }
					 ?>
                         </td>
                      
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
    <script src="<?php echo url(); ?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
