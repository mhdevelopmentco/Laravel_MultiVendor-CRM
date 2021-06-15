<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Payment Settings</title>
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
	  <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/plan.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                                <li class="active"><a>Payment Settings</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Payment Settings</h5>
            
        </header>
        
         @if ($errors->any()) 
		<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
		@endif
         @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{!! Session::get('success') !!}</div>
		@endif
        <div class="row">
        	<div class="col-lg-11 panel_marg"style="padding-bottom:10px;">
                    
   {!! Form::open(array('url'=>'payment_settings_submit','class'=>'form-horizontal')) !!}
                    <?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                          Shipping  
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                           <?php foreach($get_pay_settings as $pay_details) { } ?>
                    <label class="control-label col-lg-3" for="text1">Flat Shipping ( Rs. )<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="flat_shipping" value="<?php echo $pay_details->ps_flatshipping; ?>" >
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Tax Percentage ( % )<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="tax_percentage" value="<?php echo $pay_details->ps_taxpercentage; ?>" >
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					   <?php foreach($get_pay_settings as $pay_details) { } ?>
					 <?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                          Auction 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Extend Days <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="extended_days" value="<?php echo $pay_details->ps_extenddays; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Alert Day <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="alert_day" value="<?php echo $pay_details->ps_alertdays; ?>">
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					
                    	<?php /*?><div class="panel panel-default">
                        <div class="panel-heading">
                         Fund requests / Referral 
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Minimum Fund Request (Rs.)<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="maximum_fund_request" value="<?php echo $pay_details->ps_minfundrequest; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Maximum Fund Request(Rs.) <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="maximum_fund_request" value="<?php echo $pay_details->ps_maxfundrequest; ?>">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Referral Amount ( Rs. )  <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" id="text1" name="referral_amount" value="<?php echo $pay_details->ps_referralamount; ?>">
                    </div>
                </div>
                        </div>
                        
                    </div><?php */?>
					 <div class="panel panel-default">
                        <div class="panel-heading">
                         Country / Currency
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Country Name<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <select class="validate[required] form-control" id="sport" name="country_name"  onChange="select_cur_val(this.value)" >
                        <option value="">-- Select ---</option>
						<?php foreach($country_settings as $pay_country_details) { ?>
                        <option value="<?php echo $pay_country_details->co_id; ?>" <?php if($pay_details->ps_countryid == $pay_country_details->co_id) {?> selected <?php } ?> ><?php echo $pay_country_details->co_name; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                        </div>
                    <div id="whole_currency_div">
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Country Code <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="country_code" placeholder="" id="text1" value="<?php echo $pay_details->ps_countrycode; ?>" readonly>
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Symbol   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_symbol" placeholder="Rs." id="text1" value="<?php echo $pay_details->ps_cursymbol; ?>" readonly>
                    </div>
                </div>
                        </div>
                 
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Currency Code   <span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="currency_code"  placeholder="INR" id="text1" value="<?php echo $pay_details->ps_curcode; ?>" readonly>
                    </div>
                </div>
                 </div>
              </div>
               </div>
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                        Payment Account
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Paypal Account<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                     <input type="text" class="form-control" name="paypal_account" placeholder="" value="<?php echo $pay_details->ps_paypalaccount; ?>" id="text1">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Paypal API Password<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="paypal_api_password" placeholder="" value="<?php echo $pay_details->ps_paypal_api_pw; ?>" id="text1">
                    </div>
                </div>
                        </div>
						 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Paypal API Signature  <span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="paypal_api_signature" placeholder="" value="<?php echo $pay_details->ps_paypal_api_signature; ?>" id="text1">
                    </div>
                </div>
                        </div>
					<!-- 	 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Authorize.net Transaction Key<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="authorizenet_trans_key" value="<?php //echo $pay_details->ps_authorize_trans_key; ?>" id="text1">
                    </div>
                </div>
             </div> -->
					<!-- 	 <div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Authorizenet API ID<span class="text-sub"></span></label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="" name="authorizenet_api_id" value="<?php //echo $pay_details->ps_authorize_api_id; ?>" id="text1">
                    </div>
                </div>
             </div> -->
						<div class="panel-body">
                           <div class="form-group">
                    <label class="control-label col-lg-3" for="text1">Payment Mode<span class="text-sub">*</span></label>

                    <div class="col-lg-4">
                       
              <input type="radio" <?php if($pay_details->ps_paypal_pay_mode == 0) { echo 'checked'; } ?>   value="0" id="optionsRadios1" name="payment_mode">
             Test Account                    
            
		
              <input type="radio" <?php if($pay_details->ps_paypal_pay_mode == 1) { echo 'checked'; } ?> value="1" id="optionsRadios1" name="payment_mode">
           Live Account                    
            
                    </div>
                </div>
                        </div>
                        
                    </div>
					<div class="form-group">
                    <label class="control-label col-lg-3" for="pass1"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff">Update</a></button>
                  
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
    <script src="<?php echo url(); ?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
	function select_cur_val(id)
	{
		
		var passData = 'id='+id;
	
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('select_currency_value_ajax'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   	//alert(responseText);
					$('#whole_currency_div').html(responseText);					   
				   }
				}		
			});		
	}
	</script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
