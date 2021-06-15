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
    <link href="<?php echo url('')?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
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
				<center>
		 <form  action="{!!action('CustomerController@manage_inquires')!!}" method="POST">
							<input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
							 <div class="row">
							 <br>
							 
							 
							   <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6">From Date</div>
							<div class="col-sm-6">
							 <input type="text" name="from_date"  class="form-control" id="datepicker-8" required>
							 
							  </div>
							  </div>
							   </div>
							    <div class="col-sm-3">
							    <div class="item form-group">
							<div class="col-sm-6">To Date</div>
							<div class="col-sm-6">
							 <input type="text" name="to_date"  id="datepicker-9" class="form-control">
							 
							  </div>
							  </div>
							   </div>
							   
							   <div class="form-group">
							   <div class="col-sm-2">
							 <input type="submit" name="submit" class="btn btn-block btn-success" value="Search">
							 </div>
							</div>
							
							 </form>
							 </center>
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
                  <th class="text-center"> Name</th>
				    <th class="text-center">E-mail</th>
				   <th style="text-align:center;">Phone number</th>
				  <th style="text-align:center;">Message</th>
			
							   
					  <th style="text-align:center;"> Delete </th>
					   
						  
                </tr>
              </thead>
               <tbody>
                                  <?php $i = 1;
	  if(isset($_POST['submit']))
			{
				
	 foreach($enquiresrep as $enquiry_details){ $enquiry_date = date('d/m/Y', strtotime($enquiry_details->created_date))?>
										<tr class="gradeA odd">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->name; ?></td>
                                            <td class=" text-center"><?php echo $enquiry_details->email; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->phone; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->message; ?></td>
                                            <td class="text-center"><?php echo $enquiry_date; ?></td>
                                        
                                        </tr>
			<?php $i++; }
			}
			else
			{
								     foreach($enquires_list as $enquiry_details){ $enquiry_date = date('d/m/Y', strtotime($enquiry_details->created_date))?>
										<tr class="gradeA odd">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->name; ?></td>
                                            <td class=" text-center"><?php echo $enquiry_details->email; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->phone; ?></td>
                                            <td class="text-center"><?php echo $enquiry_details->message; ?></td>
                                            <td class="text-center"><?php echo $enquiry_date; ?></td>
                                        
                                        </tr>
			<?php $i++; } }?>
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
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	   <script>
         $(function() {
            $( "#datepicker-8" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: false
            });
            $( "#datepicker-9" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
         });
      </script> 
</body>
     <!-- END BODY -->
</html>
