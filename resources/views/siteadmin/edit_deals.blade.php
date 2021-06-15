<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Add Deals</title>
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
     <link href="<?php echo url('')?>/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">	
     <link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">	
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo url('')?>/assets/css/bootstrap-wysihtml5-hack.css" />
   
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
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
                            	<li class=""><a href="#">Home</a></li>
                                <li class="active"><a href="#">Add Deals</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Deals</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?php if(isset($action) && $action == 'save') { $process = 'save'; $button = 'Add Deals'; $form_action = 'add_deals_submit'; } 
		      else if(isset($action) && $action == 'update') { $process = 'update'; $button = 'Update Deals'; }  
				
foreach($deal_list as $deals)
		{  }
		 $title 		 = $deals->deal_title;
         $category_get	 = $deals->deal_category;
	     $maincategory 	 = $deals->deal_main_category;
		 $subcategory 	 = $deals->deal_sub_category;
		 $secondsubcategory= $deals->deal_second_sub_category;
		 $originalprice  = $deals->deal_original_price;
		 $discountprice  = $deals->deal_discount_price;
		 $startdate 	 = $deals->deal_start_date;
		 $enddate 		 = $deals->deal_end_date;
		 $expirydate	 = $deals->deal_expiry_date;
		 $description 	 = $deals->deal_description;
		 $merchant		 = $deals->deal_merchant_id;
		 $shop			 = $deals->deal_shop_id;
		 $metakeyword	 = $deals->deal_meta_keyword;
		 $metadescription= $deals->deal_meta_description;
		 $minlimt		 = $deals->deal_min_limit;
		 $maxlimit		 = $deals->deal_max_limit;
		 $purchaselimit	 = $deals->deal_purchase_limit;
		 $file_get		     = $deals->deal_image;
		 $img_count		 = $deals->deal_image_count;
		 
		?>
         {!! Form::open(array('url'=>'edit_deals_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
          
      			<input type="hidden" name="action" value="<?php echo $process; ?>" />
				<input type="hidden" name="deal_edit_id" value="<?php echo $deals->deal_id; ?>" />
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"></label>
					
                    <div class="col-lg-8">
                        <div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="title" name="title" placeholder="" class="form-control" type="text" value="<?php echo $title; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="category" id="category" onChange="select_main_cat(this.value)" >
                        <option value="0">--- Select ---</option>
                       <?php foreach($category as $cat_list)  { ?>
              			<option value="<?php echo $cat_list->mc_id; ?>" <?php if($cat_list->mc_id ==  $category_get) { ?> selected <?php } ?> ><?php echo $cat_list->mc_name; ?></option>
                        <?php } ?>
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Main Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="maincategory" id="maincategory" onChange="select_sub_cat(this.value)" >
           			  <option value="0">---Select---</option>          
      				  </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Sub Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                        <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
           			    <option value="0">---Select---</option>         
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Second Sub Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
		               <option value="0">---Select---</option>      
        			   </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Original Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="originalprice" name="originalprice" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $originalprice; ?>" >
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Discounted Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="discountprice" name="discountprice" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $discountprice; ?>">
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Start Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker1" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="startdate" name="startdate" class="form-control" value="<?php echo $startdate; ?>" ></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">End Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker2" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="enddate" name="enddate" class="form-control" value="<?php echo $enddate; ?>"></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Deal Expiry Date<span class="text-sub">*</span></label>

                    <div class="col-lg-3" >
                        <div id="datetimepicker3" class=" date input-group">
                        <input data-format="yyyy-MM-dd hh:mm:ss"  type="text" id="expirydate" name="expirydate" class="form-control" value="<?php echo $expirydate; ?>"></input>
                        <span class="add-on input-group-addon">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                      </div>

                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" name="description" class="form-control" rows="10" ><?php echo $description; ?></textarea>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Merchant<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="merchant" name="merchant" onChange="select_store_name(this.value)">
            <option value="0">-- Select --</option>
                         <?php foreach($merchant_details as $merchant_induvidual_details) { ?>
                          <option value="<?php echo $merchant_induvidual_details->mer_id;  ?>" <?php if($merchant_induvidual_details->mer_id ==  $merchant) { ?> selected <?php } ?> ><?php echo $merchant_induvidual_details->mer_fname;  ?></option>
                         <?php } ?>
           		        </select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Shop<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="shop" name="shop">
               <option value="0">-- Select --</option>
        </select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="metakeyword" name="metakeyword" class="form-control" ><?php echo $metakeyword; ?></textarea>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="metadescription" name="metadescription" class="form-control"><?php echo $metadescription; ?></textarea>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Minimum Deal Limit<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="minlimit" name="minlimt" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $minlimt; ?>" >
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Maximum Deal Limit<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="maxlimit" name="maxlimit" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $maxlimit; ?>">
                    </div>
                </div>
				 <?php /*?> <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Deal Purchase Limit Per Customer<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="purchaselimit" name="purchaselimit" placeholder="Numbers Only" class="form-control" type="text" value="<?php echo $purchaselimit; ?>">
                    </div>
                </div><?php */?>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Deal Image<span class="text-sub">*</span><br><span  style="color:#999">(max 5)</span></label>
					<?php 
$file_get_path =  explode("/**/",$file_get); 
?>
                    <div class="col-lg-8" id="img_upload">
                    	<div style="float:left; max-width:219px">
						
						<input type="hidden" name="file_new" value="<?php echo  $file_get_path[0]; ?>"  >
                       <input type="file"  id="file" name="file" >
					   <span>
					   <img src="<?php echo url(''); ?>/assets/deals/<?php echo $file_get_path[0]; ?>" height="50" width="50" > 
					   </span>                        </div>                   
                     <?php 

for($j=0 ; $j< $img_count; $j++) {      $file_get_path[$j+1] = '';                                          ?>
                     <div style="float:left; max-width:219px"><input type="hidden" name="file_more_new<?php echo $j; ?>" value="<?php echo  $file_get_path[$j]; ?>" >
                     <input type='file' name='file_more<?php echo $j; ?>' style="padding-bottom:5px;" /> <img src="<?php echo url(''); ?>/assets/deals/<?php echo $file_get_path[$j]; ?>" height="50" width="50" ></div>
					 <?php } ?>
                       <div id="divTxt"></div>  
                      <p style="clear:both"><a onClick="addFormField(); return false;" style="cursor:pointer;color:#F60;" >Add</a></p> 
                       <input type="hidden" id="count" name="count" value="<?php echo $img_count; ?>">
                       <input type="hidden" id="aid" value="1">
                    </div>
                   
              		
                 </div>			
					

              

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button class="btn btn-warning btn-sm btn-grad" id="submit_deal" ><a style="color:#fff"  ><?php echo $button; ?></a></button>
                     <a href="<?php echo url('manage_deals'); ?>" style="color:#000" class="btn btn-default btn-sm btn-grad">Cancel</a>
                   
                    </div>
					  
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
    
 	<script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
    
    <script type='text/javascript'>
$(document).ready(function(){
    var counter = 2;
    $('#del_file').hide();
    $('img#add_file').click(function(){
        $('#file_tools').before('<br><div class="col-lg-8" id="f'+counter+'"><input name="file[]" type="file"></div>');
        $('#del_file').fadeIn(0);
    counter++;
    });
    $('img#del_file').click(function(){
        if(counter==3){
            $('#del_file').hide();
        }   
        counter--;
        $('#f'+counter).remove();
    });
});
</script>

    <script>
	
	function select_main_cat(id)
	{
		   var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_select_main_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#maincategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	function select_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_select_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#subcategory').html(responseText);					   
				   }
				}		
			});		
	}
	
	function select_second_sub_cat(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_select_second_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});		
	}
	function select_store_name(id)
	{
		var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_store_name'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#shop').html(responseText);					   
				   }
				}		
			});		
	}
	// Onload to get selected category
	$( document ).ready(function() {
	var passData = 'edit_id=<?php echo $maincategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_select_main_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#maincategory').html(responseText);					   
				   }
				}		
			});	
	var passData = 'edit_sub_id=<?php echo $subcategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_select_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#subcategory').html(responseText);					   
				   }
				}		
			});	
	var passData = 'edit_secnd_sub_id=<?php echo $secondsubcategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('deals_edit_second_sub_cat'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		//alert(responseText);
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});	
			
			var passData = 'edit_id=<?php echo $shop; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('auction_select_store_name_edit'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#shop').html(responseText);					   
				   }
				}		
			});		
	});
	
		$( document ).ready(function() {
		
        var title 			 = $('#title');
        var category		 = $('#category');
	    var maincategory 	 = $('#maincategory');
		var subcategory 	 = $('#subcategory');
		var secondsubcategory= $('#secondsubcategory');
		var originalprice 	 = $('#originalprice');
		var discountprice 	 = $('#discountprice');
		var startdate 		 = $('#startdate');
		var enddate 		 = $('#enddate');
		var expirydate		 = $('#expirydate');
		var wysihtml5 		 = $('#wysihtml5');
		var merchant		 = $('#merchant');
		var shop			 = $('#shop');
		var metakeyword		 = $('#metakeyword');
		var metadescription	 = $('#metadescription');
		var minlimt			 = $('#minlimit');
		var maxlimit		 = $('#maxlimit');
		var purchaselimit	 = $('#purchaselimit');
		var file		 	 = $('#file');
	
 			var ext = $('#file').val().split('.').pop().toLowerCase();
			var allow = new Array('png','jpg','jpeg','png');
			var valid = false;
			for(var x = 0; x < allow.length; x++) {
    		if(allow[x] == ext) {
        	valid = true;
        	break;
    			}
				}
		
        $('#originalprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			originalprice.focus();
			return false;
        }
		else
		{			
            originalprice.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#discountprice').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            discountprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			discountprice.focus();
			return false;
        }
		else
		{			
            discountprice.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#minlimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            minlimt.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			minlimt.focus();
			return false;
        }
		else
		{			
            minlimt.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		$('#maxlimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            maxlimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			maxlimit.focus();
			return false;
        }
		else
		{			
            maxlimit.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
		<?php /*?>$('#purchaselimit').keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
		{
            purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			purchaselimit.focus();
			return false;
        }
		else
		{			
            purchaselimit.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });<?php */?>
        
		
		$('#submit_deal').click(function() {
		 var pass_id = '<?php echo $deals->deal_id; ?>';
		var passData = 'title='+title.val()+'&dealid='+pass_id;
		//alert(passData);
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('check_title_exist_edit'); ?>',
				  success: function(responseText){  
				   if(responseText == 1)
				   { 
					title.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Title');
			title.focus();
			return false;
				   }				   	 
				}		
			});		

		if($.trim(title.val()) == "")
		{
			title.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Title');
			title.focus();
			return false;
		}
        else
        {
        title.css('border', ''); 
        $('#error_msg').html('');
        }
		if(category.val() == 0)
		{
			category.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Category');
			category.focus();
			return false;
		}
        else
        {
        category.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(maincategory.val() == 0)
		{
			maincategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Main Category');
			maincategory.focus();
			return false;
		}
        else
        {
        maincategory.css('border', ''); 
        $('#error_msg').html('');
        }
		
		<?php /*?>if(subcategory.val() == 0)
		{
			subcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Sub Category');
			subcategory.focus();
			return false;
		}
        else
        {
        subcategory.css('border', ''); 
        $('#error_msg').html('');
        }
        if(secondsubcategory.val() == 0)
		{
			secondsubcategory.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Select Sub Category');
			secondsubcategory.focus();
			return false;
		}
        else
        {
        secondsubcategory.css('border', ''); 
        $('#error_msg').html('');
        }
		<?php */?>
		if(originalprice.val() == 0)
		{
			originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Original Price');
			originalprice.focus();
			return false;
		}
		else if(isNaN(originalprice.val()) == true)
		{
			originalprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			originalprice.focus();
			return false;
		}
        else
        {
        originalprice.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(discountprice.val() == 0)
		{
			discountprice.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Discount Price');
			discountprice.focus();
			return false;
		}
		else if(isNaN(discountprice.val()) == true)
		{
			discountprice.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			discountprice.focus();
			return false;
		}
		else if(parseInt(discountprice.val()) > parseInt(originalprice.val()) )
		{
			discountprice.css('border', '1px solid red'); 
			$('#error_msg').html('Discount price sholud be less than original price');
			discountprice.focus();
			return false;
		}
        else
        {
        discountprice.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(startdate.val() == '')
		{
			startdate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Start Date');
			startdate.focus();
			return false;
		}
        else
        {
        startdate.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(enddate.val() == '')
		{
			enddate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select End Date');
			enddate.focus();
			return false;
		}
		else if(enddate.val() < startdate.val() )
		{
			enddate.css('border', '1px solid red'); 
			$('#error_msg').html('End Date sholud be greater than start date');
			enddate.focus();
			return false;
		}
        else
        {
        enddate.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(expirydate.val() == '')
		{
			expirydate.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Expiry Date');
			expirydate.focus();
			return false;
		}
		else if(expirydate.val() < enddate.val() )
		{
			expirydate.css('border', '1px solid red'); 
			$('#error_msg').html('Expiry Date sholud be greater than start date');
			expirydate.focus();
			return false;
		}
        else
        {
        expirydate.css('border', ''); 
        $('#error_msg').html('');
        }
		
		  if($.trim(wysihtml5.val()) == '')
		{
			wysihtml5.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Description');
			wysihtml5.focus();
			return false;
		}
        else
        {
        wysihtml5.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(merchant.val() == 0)
		{
			merchant.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Merchant');
			merchant.focus();
			return false;
		}
        else
        {
        merchant.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(shop.val() == 0)
		{
			shop.css('border', '1px solid red'); 
			$('#error_msg').html('Please Select Shop');
			shop.focus();
			return false;
		}
        else
        {
        shop.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if($.trim(metakeyword.val()) == "")
		{
			metakeyword.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Metakeyword');
			metakeyword.focus();
			return false;
		}
        else
        {
        metakeyword.css('border', ''); 
        $('#error_msg').html('');
        }
	
		if($.trim(metadescription.val()) == "")
		{
			metadescription.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Metadescription');
			metadescription.focus();
			return false;
		}
        else
        {
        metadescription.css('border', ''); 
        $('#error_msg').html('');
        }
		
		if(minlimt.val() == 0)
		{
			minlimt.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Minimum Limit');
			minlimt.focus();
			return false;
		}
		else if(isNaN(minlimt.val()) == true)
		{
			minlimt.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			minlimt.focus();
			return false;
		}
        else
        {
        minlimt.css('border', ''); 
        $('#error_msg').html('');
        }

		if(maxlimit.val() == 0)
		{
			maxlimit.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Maximum Limit');
			maxlimit.focus();
			return false;
		}
		else if(isNaN(maxlimit.val()) == true)
		{
			maxlimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			maxlimit.focus();
			return false;
		}
		else if(parseInt(maxlimit.val()) <= parseInt(minlimt.val()) )
		{
			maxlimit.css('border', '1px solid red'); 
			$('#error_msg').html('Maximum value should greater than minimum value');
			maxlimit.focus();
			return false;
		}
        else
        {
        maxlimit.css('border', ''); 
        $('#error_msg').html('');
        }
		
		<?php /*if(purchaselimit.val() == 0)
		{
			purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Purchase Limit');
			purchaselimit.focus();
			return false;
		}
		else if(isNaN(purchaselimit.val()) == true)
		{
			purchaselimit.css('border', '1px solid red'); 
			$('#error_msg').html('Numbers Only Allowed');
			purchaselimit.focus();
			return false;
		}
        else
        {
        purchaselimit.css('border', ''); 
        $('#error_msg').html('');
        }
	
		 var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      	if(file.val() == "")
 		{
 		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose image');
		return false;
		}			
		else if ($.inArray($('#file').val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
		file.focus();
		file.css('border', '1px solid red'); 
		$('#error_msg').html('Please choose valid image');
		return false;
		}			
		else
		{
		file.css('border', ''); 
		$('#error_msg').html('');				
		}		*/ ?>			
     	
		});
	
		
    });
	</script>
    
    <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
   <script src="<?php echo url('')?>/assets/js/bootstrap-datetimepicker.min.js"></script>
	
	<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
			
			$(function () {
                $('#datetimepicker2').datetimepicker();
            });
			
			$(function () {
                $('#datetimepicker3').datetimepicker();
            });
    </script>

         <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo url('')?>/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="<?php echo url('')?>/assets/js/editorInit.js"></script>
    <script>
       $(function () { formWysiwyg(); });
    </script>
   <script type="text/javascript">
    function addFormField() {
      var id = document.getElementById("aid").value;
	  var count_id = document.getElementById("count").value;	  
	  if(count_id < 4){
	  document.getElementById('count').value = parseInt(count_id)+1;
      jQuery.noConflict()
      jQuery("#divTxt").append("<tr style='height:5px;' > <td> </td> </tr><tr id='row" + id + "' style='width:100%'><td width='20%'><input type='file' name='file_more"+count_id+"' /></td><td>&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' style='color:#F60;' >Remove</a></td></tr>");     
         jQuery('#row' + id).highlightFade({    speed:1000 });
     id = (id - 1) + 2;
     document.getElementById("aid").value = id;
	}	
	if(count_id == 4)
	{
		alert("You can add maximum 5 images");;
	}
    }
        
      function removeFormField(id) {
var count_id = document.getElementById("count").value;
 document.getElementById('count').value = parseInt(count_id)-1;
        jQuery(id).remove();
    }
    </script>
    
</body>
     <!-- END BODY -->
</html>
