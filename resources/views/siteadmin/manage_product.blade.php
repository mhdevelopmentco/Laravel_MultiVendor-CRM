<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |    Manage Products                   </title>
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
	 <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                                <li class="active"><a >  Manage Products                   </a></li>
                            </ul>
                    </div>
                </div>
				<center>
		 <form  action="{!!action('ProductController@manage_product')!!}" method="POST">
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
            <h5>  Manage Products                    </h5>
            
        </header>
 @if (Session::has('block_message'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('block_message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
        <div id="div-1" class="accordion-body collapse in body">
           <div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label>
		   
		   </label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter">
		   </div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 59px;" aria-label="S.No: activate to sort column ascending" aria-sort="ascending">S.No</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 67px;" aria-label="Deals Name: activate to sort column ascending">Product Name</th>
										
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label="Store Name: activate to sort column ascending">Store Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 73px;" aria-label="Original Price($): activate to sort column ascending">Original Price($)</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Discounted Price($): activate to sort column ascending">Discounted Price($)</th>
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 76px;" aria-label=" Deal Image : activate to sort column ascending"> Product Image </th>
									 
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 71px;" aria-label="Actions: activate to sort column ascending">Actions</th>
										
										<!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 74px;" aria-label="Preview: activate to sort column ascending">Preview</th> -->
										<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 68px;" aria-label="Deal details: activate to sort column ascending">Product details</th>
										</tr>
                                    </thead>
                                    <tbody>
<?php $i = 1 ;
  if(isset($_POST['submit']))
			{
				foreach($productrep as $row) { 
							if($row->pro_no_of_purchase < $row->pro_qty)
							{
									  $product_get_img = explode("/**/",$row->pro_Img);
									  if($row->pro_status == 1)
									  {
										  $process = "<a href='".url('block_product/'.$row->pro_id.'/0')."' > <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";
								  } else if($row->pro_status == 0) {
										   $process = "<a href='".url('block_product/'.$row->pro_id.'/1')."' > <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";
									  }
									  ?>
                                    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class="  "><?php echo substr($row->pro_title,0,45); ?></td>
                                            <td class="center  "><?php echo $row->stor_name;?></td>
                                            <td class="center  "><?php echo $row->pro_price; ?></td>
                                            <td class="center  "><?php echo $row->pro_disprice; ?></td>
                                            <td class="center  "><a><img style="height:40px;" src="<?php echo url(''); ?>/assets/product/<?php echo $product_get_img[0]; ?>"></a></td>
                                          
                                            <td class="center  "><a href="#">
                                           <a href="<?php echo url('edit_product/'.$row->pro_id); ?>" > <i class="icon icon-edit" style="margin-left:15px;"></i></a>
                                         	<?php echo  $process; ?>
                                            <a href="<?php echo url('productview'); ?>/<?php echo $row->pro_id; ?>"  target="_blank" ><i class="icon-search icon-2x"></i></a><?php if(count($delete_product) == "") { ?><a href="<?php echo url('delete_product'); ?>/<?php echo $row->pro_id; ?>" ><i class="icon-search icon-2x"></i></a> <?php } else { foreach($delete_product as $dp) { } if($dp->order_pro_id != $row->pro_id) { ?> <a href="<?php echo url('delete_product'); ?>/<?php echo $row->pro_id; ?>" ><i class="icon-search icon-2x"></i></a><?php } } ?>
                                            </td>
                                            <td class="center  "><a href="<?php echo url('productview'); ?>/<?php echo $row->pro_id; ?>"  target="_blank" ><i class="icon-search icon-2x"></i></a></td>
                             <td class="center  "><a href="<?php echo url('product_details')."/".$row->pro_id; ?>">View details</a></td>
                                        </tr>
									<?php $i++; } }
			}
			else{


						foreach($product_details as $product_list) { 
							if($product_list->pro_no_of_purchase < $product_list->pro_qty)
							{
									  $product_get_img = explode("/**/",$product_list->pro_Img);
									  if($product_list->pro_status == 1)
									  {
										  $process = "<a href='".url('block_product/'.$product_list->pro_id.'/0')."' > <i style='margin-left:10px;' class='icon icon-ok icon-me'></i> </a>";
								      } else if($product_list->pro_status == 0) {
										   $process = "<a href='".url('block_product/'.$product_list->pro_id.'/1')."' > <i style='margin-left:10px;' class='icon icon-ban-circle icon-me'></i> </a>";
									  }
									  ?>
                                    <tr class="gradeA odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td class="  "><?php echo substr($product_list->pro_title,0,45); ?></td>
                                            <td class="center  "><?php echo $product_list->stor_name;?></td>
                                            <td class="center  "><?php echo $product_list->pro_price; ?></td>
                                            <td class="center  "><?php echo $product_list->pro_disprice; ?></td>
                                            <td class="center  "><a><img style="height:40px;" src="<?php echo url(''); ?>/assets/product/<?php echo $product_get_img[0]; ?>"></a></td>
                                          
                                            <td class="center  "><a href="#">
                                           <a href="<?php echo url('edit_product/'.$product_list->pro_id); ?>" > <i class="icon icon-edit" style="margin-left:15px;"></i></a>
                                         	<?php echo  $process; ?>
                                             <?php if(count($delete_product) == "") { ?> <a href="<?php echo url('delete_product')."/".$product_list->pro_id; ?>" ><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a><?php } else { foreach($delete_product as $dp) { } if($dp->order_pro_id != $product_list->pro_id) { ?> <a href="<?php echo url('delete_product')."/".$product_list->pro_id; ?>" ><i class="icon icon-trash icon-1x" style="margin-left:14px;"></i></a> <?php } } ?>
                                            </td>
                                            
                             <td class="center  "><a href="<?php echo url('product_details')."/".$product_list->pro_id; ?>">View details</a></td>
                                        </tr>
									<?php $i++; } }
			}									?>
				 </tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"><ul class="pagination"></ul></div></div></div></div><div class="row">
								
								<div class="col-sm-6">
								<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
								<ul class="pagination">
								<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
								</li>
								</ul></div></div></div></div>
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
