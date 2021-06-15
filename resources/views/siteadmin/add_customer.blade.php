<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Add Customer</title>
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
	  <link rel="stylesheet" href="<?php echo url('')?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a >Add Customer</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Customer</h5>
            
        </header>
        @if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
        
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
                  {!! Form::open(array('url'=>'add_customer_submit','class'=>'form-horizontal')) !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Add Customer 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Name<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="customer_first_name" value="{!! Input::old('customer_first_name') !!}">
                    </div>
                </div>
                        </div>
						
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">E-mail<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder=""    name="customer_Email" value="{!! Input::old('customer_Email') !!}">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Phone<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="customer_phone"  name="customer_phone" value="{!! Input::old('customer_phone') !!}">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address1<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder=""   name="customer_address1" value="{!! Input::old('customer_address1') !!}">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Address2<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="customer_address2" value="{!! Input::old('customer_address2') !!}">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select Country<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
          <select class="form-control" name="select_customer_country" id="select_customer_country" value="{!! Input::old('select_customer_country') !!}"  onChange="select_city_ajax(this.value)" >
                        <option value="0">-- Select --</option>
                          <?php foreach($countryresult as $countrydetails){ ?>
          				 <option value="<?php echo $countrydetails->co_id; ?>"><?php echo $countrydetails->co_name; ?></option>
           				   <?php } ?>
       					 </select>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Select City<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <select class="form-control" id="select_customer_city" name="select_customer_city" value="{!! Input::old('select_customer_city') !!}">
          			 <option>-select city-</option>
        </select>
                    </div>
                </div>
                        </div>
                        
                    </div>
					
				
					<div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button type="submit" class="btn btn-warning btn-sm btn-grad"><a style="color:#fff" >Submit</a></button>
                     <button class="btn btn-default btn-sm btn-grad"><a style="color:#000" href="#">Reset</a></button>
                   
                    </div>
					  
                </div>
                
                </form>
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
 <script>
	
	 $('#customer_phone').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});


function select_city_ajax(city_id)
 {
   var passData = 'city_id='+city_id;
   //alert(passData);
     $.ajax( {
         type: 'get',
      data: passData,
      url: '<?php echo url('ajax_select_city'); ?>',
      success: function(responseText){  
     // alert(responseText);
       if(responseText)
       { 
     $('#select_customer_city').html(responseText);        
       }
    }  
   });  
 }



	</script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
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
