<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Manage Cities</title>
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
                                <li class="active"><a >Manage Cities</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Manage Cities</h5>
            
        </header>
     @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
   
 <div class="row">
   	
    <div class="col-lg-11 panel_marg">
    
    	<table class="table table-bordered">
              <thead>
             
                <tr>
                  <th style="width:10%;" class="text-center">S.No</th>
                  <th  class="text-center">City</th>
				  <th style="text-align:center;">Country</th>
				  
				  <th style="text-align:center;">Edit</th>
				   <th style="text-align:center;">Status</th>
				  <th style="text-align:center;">Delete</th>
				    
				  <th style="text-align:center;">Default</th>
                </tr>
              </thead>
              <tbody>
              <?php $i =1; ?>
                 @foreach($citydetails as $citydet)
                <tr>
                  <td  class="text-center"><?php echo $i;?></td>
                  <td class="text-center">{!! $citydet->ci_name!!}</td>
                  <td class="text-center">{!! $citydet->co_name!!}</td>
				     <td class="text-center"><a href="{!! url('edit_city').'/'.$citydet->ci_id!!}"><i class="icon icon-edit icon-2x"></i></a></td>
                     
				   <td class="text-center"><?php if($citydet->ci_status == 1){ ?><a href="{!! url('status_city_submit').'/'.$citydet->ci_id.'/'.'0'!!}" title="Block"><i class="icon icon-ok icon-2x"></i>
                  </a> <?php } else { ?> <a href="{!! url('status_city_submit').'/'.$citydet->ci_id.'/'.'1'!!}" title="UnBlock">
                   <i class="icon icon-ban-circle icon-2x icon-me"></i></a> <?php } ?></td>
					 <td class="text-center"><a href="{!! url('delete_city').'/'.$citydet->ci_id!!}"><i class="icon icon-trash icon-2x"></i></a></td>
                   
				                        
					<td class="text-center"><input type="radio" value="{!!$citydet->ci_id!!}" <?php if($citydet->ci_default == 1){ ?>checked <?php } ?> name="default_city" id="default_city"></td>
                </tr>
                <?php $i++;?>
                @endforeach
				 
				<tr>
                  <td  class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
				     <td class="text-center"></td>
				   <td class="text-center"></td>
				    <td class="text-center"></td>
					<td class="text-center">
                     {!! Form::open(array('url'=>'update_default_city_submit','class'=>'form-horizontal')) !!}
                     <input type="hidden" name="default_city_id" id="default_city_id" value="1" />
                    <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                    {!! Form::close()!!}
                    </td>
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
    <!-- END GLOBAL SCRIPTS -->   
     <script>
	 $('input[name=default_city]').click(function(){
		
        var value= $('input[name=default_city]:checked').val();
		$('#default_city_id').val(value);
		 
		 });
	 </script>
</body>
     <!-- END BODY -->
</html>
