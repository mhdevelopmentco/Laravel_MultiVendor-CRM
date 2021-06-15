<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary |Manage Merchant Accounts         </title>
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
                                <li class="active"><a > Manage Store Accounts          </a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Merchant Accounts          </h5>
            
        </header>
         @if (Session::has('result'))
    <div class="alert alert-success alert-dismissable">{!! Session::get('result') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
    @endif
        <div id="div-1" class="accordion-body collapse in body">
            <div class="accordion-body collapse in body" id="div-1">
           <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label>
       
       </label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter">
       </div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div id="dataTables-example_length" class="dataTables_length"><label></label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dataTables-example_filter"></div></div></div><div role="grid" class="dataTables_wrapper form-inline" id="dataTables-example_wrapper"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label></label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"></div></div></div><table aria-describedby="dataTables-example_info" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr role="row">
                    <th aria-label="S.No: activate to sort column ascending" style="width: 61px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc" aria-sort="ascending">S.No</th>
                    <th aria-label="Product Name: activate to sort column ascending" style="width: 69px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting"> Store Name</th>
                    <th aria-label="City: activate to sort column ascending" style="width: 81px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Phone</th>
                    <th aria-label="Store Name: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Address</th>
                                          <th aria-label="Store Name: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Store Image</th>
                    <th aria-label="Original Price($): activate to sort column ascending" style="width: 75px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Store Logo</th>                  
                    <th aria-label="Actions: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Edit</th>
                    <th aria-label="Hot deals: activate to sort column ascending" style="width: 65px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Block / Unblock</th>
  
                    </tr>
                                    </thead>
                                    <tbody>
                                  <?php $i = 1;
                                  //print_r($store_return);exit();
                     foreach($store_return as $store_details){ 
                  
                   ?>
                    <tr class="gradeA odd">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="text-center"><?php echo $store_details->stor_name; ?></td>
                                            <td class=" text-center"><?php echo $store_details->stor_phone; ?></td>
                                            <td class="text-center"><?php echo $store_details->stor_address1.$store_details->stor_address2; ?></td>
                                            <td class="text-center"><?php echo $store_details->ci_name; ?></td>
                                             <td class="text-center"> <img src="<?php echo url('assets/storeimage')."/".$store_details->stor_img; ?>" height="45px" ></td>                                  
                                            <td class="text-center"><a href="<?php echo url('edit_store/'.$store_details->stor_id."/".$store_details->stor_merchant_id); ?>"><i class="icon icon-edit icon-2x"></i></a></td>                                            
                                            <td class="text-center ">
                   
                                              <?php if($store_details->stor_status == 1) { ?>
                                            <a href="<?php echo url('block_store/'.$store_details->stor_id."/0"."/".$store_details->stor_merchant_id); ?>"><i class="icon icon-ok icon-2x "></i></a> <?php } else if($store_details->stor_status == 0) { ?>
                                            <a href="<?php echo url('block_store/'.$store_details->stor_id."/1"."/".$store_details->stor_merchant_id); ?>"><i class="icon icon-ban-circle icon-2x icon-me"></i></a> 
                                            <?php } ?>
                      
                                          
                                            </td>
                                        
                                        </tr>
                    <?php $i++; }  ?>
                    </tbody>
                                </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"></div></div></div></div><div class="row"><div class="col-sm-6"><div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info"></div></div><div class="col-sm-6"><div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"></div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"></ul></div></div></div></div><div class="row">
                
                <div class="col-sm-6">
                <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                <li id="dataTables-example_previous" tabindex="0" aria-controls="dataTables-example" class="paginate_button previous disabled">
                </li>
                </ul></div></div></div>
                                <div class="form-group">
                    <label class="control-label col-lg-10" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-2">
                    <a style="color:#fff" href="<?php echo url('manage_merchant'); ?>" class="btn btn-warning btn-sm btn-grad">Back</a>
                    </div></div>
                                
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
        <p>&copy; Nex Cart 2014&nbsp;</p>
    </div>
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
     
</body>
     <!-- END BODY -->
</html>
