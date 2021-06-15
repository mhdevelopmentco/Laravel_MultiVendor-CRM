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
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a>Home</a></li>
                                <li class="active"><a> Manage Inquiries                </a></li>
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
                  <th class="text-center"> Merchant Name</th>
				    <th class="text-center">Merchant Email</th>
				   <th style="text-align:center;">Total Withdraw Amount</th>
				  <th style="text-align:center;">Paid Withdraw Amound</th>
				   <th style="text-align:center;">Requested Withdraw Amount</th>
							   
					  <th style="text-align:center;"> Action </th>
					   
						  
                </tr>
              </thead>
              <tbody>    
              <?php $i = 1; foreach($get_funds  as $fund) { 
			 
			  
			  $newrequestedwithdrawamount=$fund->wd_submited_wd_amt-$fund->paidedamount;
			  
			  $send = base64_encode($fund->mer_id.'/**/'.$fund->mer_fname.'/**/'.$fund->mer_payment.'/**/'.$newrequestedwithdrawamount)
			  
			  ?>           
               {!! Form::open(array('url'=>'fund_paypal','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
               <input type="hidden" name="mer_id" value="<?php echo $fund->mer_id; ?>">
               <input type="hidden" name="mer_name" value="<?php echo $fund->mer_fname; ?>">
               <input type="hidden" name="mer_paypal" value="<?php echo $fund->mer_payment; ?>">
               <input type="hidden" name="pay_amt" value="<?php echo $fund->wd_submited_wd_amt; ?>">
                </form>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center"><?php echo $fund->mer_fname; ?></td>
				     <td class="text-center"><?php echo $fund->mer_email; ?></td>
					  <td class="text-center"><?php echo $fund->wd_total_wd_amt; ?></td>
					  <td class="text-center"><?php echo  $fund->paidedamount; ?></td>
				   <td class="text-center"><?php echo $newrequestedwithdrawamount; ?></td>	
                   
                   	<?php if($fund->mer_payment ) { ?>
					 <td class="text-center">
                     <?php if($newrequestedwithdrawamount != 0) {?>
                     <a href="<?php echo url('fund_paypal/'.$send); ?>" class="btn btn-warning btn-sm btn-grad" > Pay Now </a>      
                     <?php } else { ?>    .
                     <a class="btn btn-warning btn-sm btn-grad" > Nil </a> <strong></strong>           
                     <?php } ?>
                     </td>
					 <?php } else { ?>
                     <td class="text-center"><a >No paypal email for this merchant</a></td>
                     <?php } ?>
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
     <!---Right Click Block Code---->
<script language="javascript">
document.onmousedown=disableclick;
status="Cannot Access for this mode";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>


<!---F12 Block Code---->
<script type='text/javascript'>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
</script>
</body>
     <!-- END BODY -->
</html>


