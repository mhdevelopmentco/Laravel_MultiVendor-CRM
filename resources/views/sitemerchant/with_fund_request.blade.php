<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Laravel Ecommerce  Multivendor Admin |Withdraw Fund Request</title>
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
<link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="<?php echo url(); ?>/assets/css/datepicker.css" rel="stylesheet">	
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo url(); ?>/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url(); ?>/assets/plugins/timeline/timeline.css" />

	

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
           
                <?php foreach($commison_amt as $commision) { } 
				$comminsion = $commision->mer_commission;
				
				$deal =  $deal_count * $deal_discount_count ;
				$commision_amt_deal = $deal * ($comminsion / 100);
				$deal_withdraw = $deal - $commision_amt_deal;
			 	$product =  $product_no_count * $product_discount_count ;
				$commision_amt_pro = $product * ($comminsion / 100);
				$product_withdraw = $product -$commision_amt_pro;
				 ?>
				
    <div class="inner"> 
      <div class="row"> 
        <div class="col-lg-12"> 
          <ul class="breadcrumb">
            <li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
            <li class="active"><a href="#">Withdraw Fund Request</a></li>
          </ul>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-12"> 
          <div class="box dark"> <header> 
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Withdraw Fund Request</h5>
            </header> 
            <div class="row"> 
           <!-- <div class="col-lg-8 panel_marg"> 
              <form class="form-horizontal">
               <table class="table table-bordered">
               <tbody><tr>
               <td>Total Product amount :</td>
                <td><strong> $ 28899  </strong> </td>
               </tr>
                 <tr>
               <td>Admin Commision percentage :</td>
                <td><strong>$20</strong></td>
               </tr>
                 <tr>
               <td>  Withdraw Account Balance is:</td>
                <td><strong>$ 23119.2</strong></td>
               </tr>
                 <tr>
               <td> Fund Amount Received: </td>
                <td> <strong>$ 21759.2 </strong>   </td>
               </tr>
                <tr>
               <td> Balance Withdraw Amount :  </td>
                <td> <strong> $ 21759.2  </strong>  </td>
               </tr>
                <tr>
               <td>  Total Deal amount : </td>
                <td><strong> $ 0</strong> </td>
               </tr>
                <tr>
               <td>                   Amount                   </td>
                <td> <input placeholder="Amount" type="text"></td>
               </tr>
               
               </tbody></table>
               <div class="form-group">
                    <label class="control-label col-lg-3 pull-right" for="pass1">
 <button class="btn btn-warning btn-sm btn-grad"><a style="color:#fff" href="#">Submit</a></button>
                     <button class="btn btn-default btn-sm btn-grad"><a style="color:#000" href="#">Reset</a></button>
                    <div class="col-lg-2">
                    
                   
                    </div>
					  
                </label></div>
               </form>
                  </div>-->
              <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                 {!! Form::open(array('url'=>'withdraw_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
                  <label for="text1" class="control-label col-lg-4"> 
                 Total Product amount : $ <?php echo $product; ?>
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2">
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
               Admin Commision percentage :  <?php  echo $comminsion; ?> %
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2"> 
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                    Withdraw Account Balance is: $ <?php echo $deal_pro_amt =  $deal_withdraw + $product_withdraw; ?>
                 <input type="hidden" name="total_withdraw" id="total_withdraw" value="<?php echo $deal_withdraw + $product_withdraw; ?>" />
             
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2"> 
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                   Fund Amount Received:  $ <?php echo $paidamounttomerchant; ?>
                 
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2">
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                 Balance Withdraw Amount : $ <?php echo $deal_pro_amt - $paidamounttomerchant; ?>
                 <input type="hidden" name="total_to_pay" id="total_to_pay" value="<?php echo $deal_pro_amt - $paidamounttomerchant; ?>" />
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2">
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div> 
              
			  <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                Total Deal amount :<?php 	echo "$".$deal;	 ?>
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2"> 
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
			
            
			  <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                Amount
                  <span style="font-size:12px;"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2"> 
                    </div>
                    <label for="text1" class="control-label col-lg-4"> 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
			  <div class="col-lg-10 panel_marg"> 
                <div class="form-group"> 
                  <label for="text1" class="control-label col-lg-4"> 
                 
                  <input type="text" class="form-control" placeholder="" value="" id="pay" name="pay">
                   <input type="hidden" class="form-control" placeholder="" value="{!! Session::get('merchantid') !!}" name="mer_id" id="mer_id">
                
                  <span style="font-size:12px; color:#F00" id="error"></span></label>
                  <div class="col-lg-8"> 
                    <div class="col-lg-2"> 
                    </div>
                    <label for="text1" class="control-label col-lg-4" > 
                    <span class="text-sub"></span></label>
                    <div class="col-lg-5"> 
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                    <label class="control-label col-lg-4" for="pass1">
 <button class="btn btn-warning btn-sm btn-grad" type="submit" id="total_to_pay_submit" style="color:#fff">Submit</button>
                     <button class="btn btn-default btn-sm btn-grad"><a style="color:#000" href="#">Reset</a></button>
                    <div class="col-lg-2">
                    
                   
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
    <script> 
	$(document).ready(function() {
		$('#total_to_pay_submit').click(function() {
			if($('#pay').val() == "")
			{
				$('#pay').focus();
				$('#pay').css('border', 'red');
				$('#error').html('Please Enter Amount');
				return false;
			}
			else 
			if(parseInt($('#pay').val()) > parseInt($('#total_to_pay').val()))
			{
				$('#pay').focus();
				$('#pay').css('border', 'red');
				$('#error').html('Please Enter Valid Amount');
								return false;
			}
			else 
			if(isNaN($('#pay').val()))
			{
				$('#pay').focus();
				$('#pay').css('border', 'black solid 1px');
				$('#error').html('Please Enter Valid Amount');
								return false;
			} else
			if($('#pay').val() <= 0)
			{
				$('#pay').focus();
				$('#pay').css('border', '#fff');
				$('#error').html('Please Enter Valid Amount');
								return false;
			}
			else
			{
				$('#pay').css('border', '');
				$('#error').html('');
			}
		});
	});
	</script>
     <script src="<?php echo url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
    
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.resize.js"></script>
	<script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo url(); ?>/assets/js/pie_chart.js"></script>
    
    


<script src="<?php echo url(); ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo url(); ?>/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>



<script src="<?php echo url(); ?>/assets/plugins/autosize/jquery.autosize.min.js"></script>

       <script src="<?php echo url(); ?>/assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>

        
    
	<script src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.errorbars.js"></script>
	<script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script  src="<?php echo url(); ?>/assets/plugins/flot/jquery.flot.stack.js"></script>    
    <script src="<?php echo url(); ?>/assets/js/bar_chart.js"></script>
    
    
        
     
</body>
     <!-- END BODY -->
</html>
