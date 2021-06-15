<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |  Manage Customers                 </title>
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
                                <li class="active"><a>  Manage Customers                  </a></li>
                            </ul>
                    </div>
                </div>
				<center>
		 <form  action="{!!action('CustomerController@manage_customer')!!}" method="POST">
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
            <h5>  Manage Customers                  </h5>
            
        </header>
  @if (Session::has('updated_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('updated_result') !!}</div>
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		@endif
        @if (Session::has('insert_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('insert_result') !!}</div>
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		@endif
        @if (Session::has('delete_result'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('delete_result') !!}</div>
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
          <div class="accordion-body collapse in body" id="div-1">
           <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">
		   </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
										<th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">S.No</th>
										<th aria-label="Product Name: activate to sort column ascending" style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Name</th>
										<th aria-label="City: activate to sort column ascending" style="width: 81px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Email</th>
										<th aria-label="Store Name: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">City</th>
										<th aria-label="Original Price($): activate to sort column ascending" style="width: 75px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Joined Date</th>
										
										<th aria-label=" Product Image : activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Edit</th>
										<th aria-label="Send Mail: activate to sort column ascending" style="width: 64px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Status</th>
										<th aria-label="Actions: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Delete</th>
										<th aria-label="Hot deals: activate to sort column ascending" style="width: 65px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Login Type</th>
										
										</tr>
                                    </thead>
                                    <tbody>


				<?php $i = 1 ;
				
		 if(isset($_POST['submit']))
			{
				foreach($customerrep as $row)
			 {

$logintype="";
 if($row->cus_logintype==1)
{
$logintype="Admin User";
}
else if($row->cus_logintype==2)
{
$logintype="Website User";
}
else if($row->cus_logintype==3)
{
$logintype="Facebook User";
}


?>

 <tr class="gradeA odd">
            <td class="sorting_1"><?php echo $i; ?></td>
               <td class="  "><?php echo   $row->cus_name;?></td>
    <td class="  "><?php echo   $row->cus_email;?></td>
         <td class="center  "><?php echo   $row->ci_name;?></td>
              <td class="center  "><?php echo   $row->cus_joindate;?></td>
					   
               <td class="center    ">  <a href="<?php echo url('edit_customer/'.$row->cus_id); ?>" > <i class="icon icon-edit icon-2x" style="margin-left:15px;"></i></a></td>

				<td class="text-center"><?php if($row->cus_status==0){ ?><a href="{!! url('status_customer_submit').'/'.$row->cus_id.'/'.'1'!!}"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_customer_submit').'/'.$row->cus_id.'/'.'0'!!}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>

			<td class="center    ">  <a href="<?php echo url('delete_customer/'.$row->cus_id); ?>" > <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>

                                            <td class="center"><?php echo $logintype;?></td>
                                           
                                        </tr>
										
						<?php $i++; 			 
			 }
			}
else
{	
				
						foreach($customerresult as $customerdetails) { 
									  ?>

<?php 
$logintype="";
 if($customerdetails->cus_logintype==1)
{
$logintype="Admin User";
}
else if($customerdetails->cus_logintype==2)
{
$logintype="Website User";
}
else if($customerdetails->cus_logintype==3)
{
$logintype="Facebook User";
}


?>


                                   	    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class="  "><?php echo   $customerdetails->cus_name;?></td>
                                            <td class="  "><?php echo   $customerdetails->cus_email;?></td>
                                            <td class="center  "><?php echo   $customerdetails->ci_name;?></td>
                                            <td class="center  "><?php echo   $customerdetails->cus_joindate;?></td>
					   
                                            <td class="center    ">  <a href="<?php echo url('edit_customer/'.$customerdetails->cus_id); ?>" > <i class="icon icon-edit icon-2x" style="margin-left:15px;"></i></a></td>

				<td class="text-center"><?php if($customerdetails->cus_status==0){ ?><a href="{!! url('status_customer_submit').'/'.$customerdetails->cus_id.'/'.'1'!!}"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_customer_submit').'/'.$customerdetails->cus_id.'/'.'0'!!}">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>

			<td class="center    ">  <a href="<?php echo url('delete_customer/'.$customerdetails->cus_id); ?>" > <i class="icon icon-trash icon-2x" style="margin-left:15px;"></i></a></td>

                                            <td class="center"><?php echo $logintype;?></td>
                                           
                                        </tr>
										
						<?php $i++; } 
}?>			
										
										</tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"></ul></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
								<ul class="pagination">
								<li id="dataTables-example_previous" tabindex="0" aria-controls="dataTables-example" class="paginate_button previous disabled">
								</li>
								</ul></div></div></div></div>
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
     <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
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
