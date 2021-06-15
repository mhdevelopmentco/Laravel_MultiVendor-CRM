<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Auction COD              </title>
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
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a > Auction COD                </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Auction COD                </h5>
            
        </header>
        @if (Session::has('cancel_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('cancel_message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
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
					<th style="text-align:center;"> Bidding Amount </th>
                	<th style="text-align:center;">COD Status </th>
                    <th style="text-align:center;">Action</th>
					 
                </tr>
              </thead>
              <tbody>    
              <?php $i=1;
			  ?>           
              @foreach($auctiondetails as $bidder)
            
             <?php if($bidder->oa_bid_item_status==1){
				 
				 $status="onprocess";
				 
			 }
			 else if($bidder->oa_bid_item_status==2){
				 
				 $status="send";
			 }
			else  if($bidder->oa_bid_item_status==3){
				 
				 $status="cancel";
			 }
			 else
			 {
				$status="checking"; 
			 }
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 ?>
            
            
                  <tr>
                  <td class="text-center">{!!$i!!}</td>
                  <td class="text-center">{!!$bidder->auc_title !!} </td>
				     <td class="text-center"> {!!$bidder->oa_cus_name !!}	</td>
					  <td class="text-center">{!!$bidder->oa_cus_email !!}		</td>
					  <td class="text-center">{!!$bidder->oa_cus_address !!} </td>
				  		
					 <td class="text-center">{!!$bidder->oa_bid_amt !!}</td>
                     <td class="text-center"><?php echo $status;?></td>
                     
                      <td style="text-align:center;"> 
                      <?php if($bidder->oa_bid_item_status==2){?>
                       <a href="<?php echo url('cancel_auction_cod/'.$bidder->oa_id); ?>">Cancel</a> 
                       <?php } else { ?>
                       
                       No Action 
                       
                       <?php } ?>
                       
                       
                         </td>
					  
                </tr>
				     
				    <?php 
					$i++;?>
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
