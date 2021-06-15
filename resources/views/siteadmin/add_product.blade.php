<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Add Products</title>
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
                            	<li class=""><a >Home</a></li>
                                <li class="active"><a>Add Products</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Add Products</h5>
            
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
        <div id="div-1" class="accordion-body collapse in body">
               {!! Form::open(array('url'=>'add_product_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}
		<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="Product_Title" placeholder="" name="Product_Title" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
		 <select class="form-control" id="Product_Category" name="Product_Category" onChange="get_maincategory(this.value)">
             	<option value="0">--- Select ---</option>
           	 <?php foreach($productcategory as $product_mc)  { ?>
              			<option value="<?php echo $product_mc->mc_id; ?>"><?php echo $product_mc->mc_name; ?></option>
                        <?php } ?>
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Main Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="Product_MainCategory" name="Product_MainCategory" onChange="get_subcategory(this.value)">
			<option value="0">-Select Main Ctaegory-</option>    
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Select Sub Category<span class="text-sub"></span></label>

                    <div class="col-lg-8">
                        <select class="form-control" id="Product_SubCategory"name="Product_SubCategory" onChange="get_second_subcategory(this.value)">
           <option value="0">-Select Sub Category-</option>   
        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Second Sub Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" id="Product_SecondSubCategory" name="Product_SecondSubCategory">
                <option value="0">-Select second Sub Category-</option>   
        </select>
                    </div>
                </div>
 		 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Quantity<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="Enter Quantity of Product" class="form-control" type="text" id="Quantity_Product" name="Quantity_Product">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Original Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="Numbers Only" class="form-control" type="text" id="Original_Price" name="Original_Price">
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Discounted Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="Numbers Only" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                                <input type="checkbox" onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( Including tax amount ) 
                                <input placeholder="Numbers Only" style="display:none;" class="form-control" type="text" id="inctax" name="inctax"> 
                    </div>
                </div>
		<div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">Shipping Amount<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'none');" value="1" checked > <label class="sample">Free</label>
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'inline');" value="2"  ><label class="sample">Amount</label>

					
						<label class="sample"></label>
                    </div>
                </div>
		
				  <div class="form-group" id="showship" style="display:none;">
                    <label for="text1" class="control-label col-lg-2">Shipping Amount<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input  placeholder="" class="form-control" type="text" id="Shipping_Amount" name="Shipping_Amount">
                    </div>
                </div>
				  
				 
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea id="wysihtml5" class="form-control" rows="10" id="Description" name="Description"></textarea>
                    </div>
                </div>
		 
		 <div class="form-group">
                    
			<label for="text2" class="control-label col-lg-2">Want to add specification<span class="text-sub">*</span></label>

                   	<div class="col-lg-8">
			<input type="radio"  id="specification" name="specification"  onClick="setVisibility('sub4', 'inline');" value="1"> <label class="sample">Yes</label>
			<input type="radio" name="specification"  id="specification" onClick="setVisibility('sub4', 'none');" value="2" checked> <label class="sample">No </label>
			<label class="sample"></label>
                   	 </div>
                </div>
                
                
                <div class="form-group" id="sub4" style="display:none">
                    <label for="text2" class="control-label col-lg-2">Specification</label>

                    <div class="col-lg-12">
                    <label>Text ( More custom specification <a href="<?php echo url('')?>/manage_specification">ADD</a> )</label></div>
		<div class="col-lg-3 col-lg-offset-2">
                       <select class="form-control" name="spec0" id="spec0">
                        <option  value="0">--select specification--</option>
            		@foreach ($productspecification as $specification) 
           		 <option  value="<?php echo $specification->sp_id;?>">{!!$specification->sp_name!!}</option>
          		 @endforeach
        		</select>
                    </div>
                    
                    <div class="col-lg-3 col-lg-offset-2">
                       <input type="text" class="form-control" id="spectext0" name="spectext0">
                    </div>
 		
                    <input type="hidden" id="specificationid1" value="1">
		    <input type="hidden" id="specificationcount" name="specificationcount" value="0">
            
              
                </div>
                
                 
                
                   <div class="col-lg-12 col-lg-offset-2">
 		       <div  id="divspecificationTxt" >

		      </div>  
        
                    </div>
       

			 
        <div style="clear:both;"></div>

		 <div class="form-group"  >

		 <div class="col-lg-3">
                    
                    </div>
                   
 		<p id="addmore" style="display:none;" ><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#F60;">Add more</a> </p>
		</div>  
<div class="form-group">

                    <label for="text2" class="control-label col-lg-2">Product Size<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" onchange="getsizename(this.value)"  name="Product_Size" id="Product_Size" >
                       <option value="0">--select size--</option>
 			@foreach ($productsize as $size) 
           		 <option  value="<?php echo $size->si_id;?>">{!!$size->si_name!!}</option>
          		 @endforeach
         
        </select><label>More custom sizes  <a href="<?php echo url('')?>/manage_size"> ADD</a></label>
                    </div>
                </div>

	<div class="form-group" id="sizediv" style="display:none;">

 <input type="hidden" id="productsizecount" name="productsizecount" value="0">
                    <label class="control-label col-lg-2" for="text1">Your Select size<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showsize" ></p>
                       <input type="hidden"  name="si"  value="0," id="si" />
                    </div>
</div>
<div class="form-group" id="quantitydiv" style="display:none;">
  		 <label class="control-label col-lg-2" for="text1">Quantity<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showquantity" ></p>
                       <input type="hidden"   value="0," id="sq" />
                    </div>
                


</div>
				


<div class="form-group" style="display:none;">
                    <label for="text2"  class="control-label col-lg-2">Add Color Field<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio" name="productcolor" onClick="setVisibility1('sub3', 'inline');" value="1"  checked ><label class="sample">Yes</label>
					           <input type="radio" name="productcolor" onClick="setVisibility1('sub3', 'none');" value="2"> <label class="sample">No                  </label>
					
						<label class="sample"></label>
                    </div>
                </div>

 <div class="form-group" id="sub3" style="display: block;">
                    <label for="text2" class="control-label col-lg-2">Product Color</label>

                   <div class="col-lg-3">

   	 <select class="form-control" id="selectprocolor" name="selectprocolor" onchange="getcolorname(this.value)">
     
       <option value="0">-Select product color-</option>   
          @foreach ($productcolor as $color) 
           		 <option style="background:<?php echo $color->co_code;?>;" value="<?php echo $color->co_id;?>">{!!$color->co_name!!}</option>
          		 @endforeach
        </select>
  More custom colors <a href="<?php echo url('')?>/manage_color">ADD</a>
                    </div>
                </div>
			<div class="form-group" id="colordiv" style="display:none;">
                    <label class="control-label col-lg-2" for="text1">Your Select Color<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showcolor"></p>
                       <input type="hidden"  name="co" value="0," id="co" />
                    </div>
                </div>
			<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Delivery days<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" id="Delivery_Days" name="Delivery_Days" onKeyPress="return onlyNumbers(this);">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      Eg : ( 2 - 5 )  
                    </div>
                </div>
		 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Select Merchant<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="Select_Merchant" id="Select_Merchant" onchange="getshop_ajax(this.value);">
<option value="0">--select merchant</option>
           @foreach ($merchantdetails as $merchant) 
           		 <option  value="<?php echo $merchant->mer_id;?>">{!!$merchant->mer_fname!!}</option>
          		 @endforeach
        </select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Select Shop<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="Select_Shop" id="Select_Shop" >
				<option value="0">-Select shop-</option>    
			</select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords"></textarea>
                    </div>
                </div>
				
				 <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description" name="Meta_Description"></textarea>
                    </div>
                </div>
				 
				 <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Product Image <span class="text-sub">*</span></label>

                  
  		   <div class="col-lg-8" id="img_upload">
                       <input type="file"  id="file0" name="file" style="background:none;width:185px;border:none;">no files
                        <div id="divTxt"></div>
                <p><a onClick="addproductimageFormField(); return false;" style="cursor:pointer;color:#F60;width:84px;" id="add_img_btn" >Add</a></p> 
                       <input type="hidden" id="aid" value="1">
                        <input type="hidden" id="count" name="count" value="0">
                    </div>



					      
                    </div>
                



              

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                   <button class="btn btn-success btn-sm btn-grad" id="submit_product" ><a style="color:#fff"  >Add Product</a></button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Reset</button>
                   
                    </div>
					  
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


	<script type="text/javascript">



function addproductimageFormField() 
{
	var id = document.getElementById("aid").value;
	var count_id = document.getElementById("count").value;	  
	if(count_id < 4)
	{
	document.getElementById('count').value = parseInt(count_id)+1;
	var count_id_new = document.getElementById("count").value;	 
	jQuery.noConflict()
	jQuery("#divTxt").append("<div id='row" + count_id + "' style='width:100%'><input type='file' name='file_more"+count_id+"' id='file"+count_id_new+"'  />&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + count_id + "\"); return false;' style='color:#F60;' >Remove</a></div>");     
	jQuery('#row' + id).highlightFade({    speed:1000 });
	id = (id - 1) + 2;
	document.getElementById("aid").value = id;	 
	}
}

function removeFormField(id)
 {
	 //alert(id);
	var count_id = document.getElementById("count").value;	
	document.getElementById('count').value = parseInt(count_id)-1;
	jQuery(id).remove();
}
 </script>
    

 <script language="JavaScript">
function setVisibility(id, visibility)
 {
document.getElementById(id).style.display = visibility;
document.getElementById('addmore').style.display =visibility;
document.getElementById('divspecificationTxt').style.display =visibility;
}
function setVisibility1(id, visibility) 
{
document.getElementById(id).style.display = visibility;
document.getElementById('colordiv').style.display =visibility;
}
function setshipVisibility(id, visibility) 
{
document.getElementById(id).style.display = visibility;
 
}
</script>

<script type="text/javascript">
	function addspecificationFormField()
	{
		var count_id = document.getElementById("specificationcount").value;
		var selectspec=$("#spec"+count_id+" option:selected").val();
		var spectext=$("#spectext"+count_id).val();

		if(selectspec!=0  && spectext!="")
		{
			var id = document.getElementById("specificationid1").value;
			var count_id = document.getElementById("specificationcount").value;
			var nameid=parseInt(count_id)+1;

			if(count_id < 2)
			{

			document.getElementById('specificationcount').value = parseInt(count_id)+1;
			jQuery("#divspecificationTxt").append(" <div class='form-group ' id='spec"+ id + "' '><div class='col-lg-3'><select name='spec"+ nameid  + "'  class='form-control'><option  value='0'>-- select specification--</option><?php foreach ($productspecification as $specification) {?><option  value='<?php echo $specification->sp_id;?>'><?php echo $specification->sp_name;?></option><?php } ?></select></div><div class='col-lg-3'><input type='text' class='form-control' name='spectext"+ nameid  + "'  /></div><div class='col-lg-3' ><a href='#' onClick='removespecFormField(\"#spec" + id + "\"); return false;' style='color:#F60;' >Remove</a></div></div>");     
			id = (id - 1) + 1;
			document.getElementById("specificationid1").value = id;

			}
			else
			{	
			alert("Maximum limit reached");
			return false;
			}

		}
		else
		{
			alert("Please select specification and provide text then click Add more");
		}	


	}
function removespecFormField(id) 
{
	var count_id = document.getElementById("specificationcount").value;
	count_id=count_id-1;

	document.getElementById("specificationcount").value=count_id;	

	jQuery(id).remove();
}


function adddeliverypolicyFormField()
{
	var id = document.getElementById("deliverypolicyid1").value;
	var count_id = document.getElementById("deliverypolicycount").value;


	if(count_id < 10)
	{
		document.getElementById('deliverypolicycount').value = parseInt(count_id)+1;
		jQuery("#divdeliverypolicy").append(" <div class='form-group' id='delivery"+ id + "'><label for='text1' class='control-label col-lg-2'>Delivery Policy <span class='text-sub'></span></label><div class='col-lg-8'> <input  class='form-control' type='text' id='Delivery_Policy'"+id+"' name='Delivery_Policy'"+id+"'><div class='col-lg-8'><a href='#' onClick='removedeliveryFormField(\"#delivery" + id + "\"); return false;' style='color:#F60;' >Remove</a></div></div></div>");     
		id = (id - 1) + 1;
		document.getElementById("deliverypolicyid1").value = id;

	}
	else
	{	
		alert("Maximum limit reached");
		return false;
	}

}
function removedeliveryFormField(id)
{
	var count_id = document.getElementById("deliverypolicycount").value;
	count_id=count_id-1;
	document.getElementById("deliverypolicycount").value=count_id;	
	jQuery(id).remove();
}


</script>	

 

<script>

 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode        
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            
         return true;
          
      }
	  function getshop_ajax(id)
	{
		 
		 var passmerchantid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passmerchantid,
				  url: 'product_getmerchantshop',
				  success: function(responseText){  
				   if(responseText)
				   {  
					$('#Select_Shop').html(responseText);					   
				   }
				}		
			});		
	}

function getcolorname(id)
	{
	
		 var passcolorid = 'id='+id+"&co_text_box="+$('#co').val();
		   $.ajax( {
			      type: 'get',
				  data: passcolorid,
				  url: 'product_getcolor',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
				  // alert(responseText)
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
						$('#colordiv').css('display', 'block'); 
						
					$('#showcolor').append('<span style="width:195px; display:inline-block;padding:10px;border:4px solid '+get_result[2]+';margin:5px 0px; display:inline-table">'+get_result[0]+'<input type="checkbox"  name="colorcheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>&nbsp;&nbsp;');	

					 
		
					var co_name_js = $('#co').val();	
					$('#co').val(get_result[1]+","+co_name_js);	  
						
					}
					else if(get_result[3]=="failed")
					{
						alert("Already color is choosed.");
					}
					else
					{
							alert("something went wrong .");
					}
					
				   }
				}		
			});		
		
	}
	function getsizename(id)
	{
		 var passsizeid = 'id='+id+"&si_text_box="+$('#si').val();
		   $.ajax( {
			      type: 'get',
				  data: passsizeid,
				  url: 'product_getsize',
				  success: function(responseText){  
				   if(responseText)
				   { 	 //alert(responseText);
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
                                  		var count=parseInt($('#productsizecount').val())+1;
						$("#productsizecount").val(count);
						$('#sizediv').css('display', 'block'); 
						//$('#quantitydiv').css('display', 'block'); 
						
					$('#showsize').append('<span style="padding-right:0px; width:150px;display:inline-block;">Select Size:<span style="color:#ff0099;padding-left:5px">'+get_result[2]+'<input type="checkbox"  name="sizecheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span></span>');
					$('#showquantity').append('<input type="text" name="quantity'+get_result[1]+'" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input> ');
		
					var co_name_js = $('#si').val();	
					$('#si').val(get_result[1]+","+co_name_js);	  
						
					//alert($('#si').val());
					}
					else if(get_result[3]=="failed")
					{
						alert("Already size is choosed.");
					}
					else
					{
							alert("something went wrong .");
					}
					
				   }
				}		
			});		
		
	}
	function get_maincategory(id)
	{
		 var passcategoryid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passcategoryid,
				  url: 'product_getmaincategory',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
					$('#Product_MainCategory').html(responseText);					   
				   }
				}		
			});		
	}

	function get_subcategory(id)
	{
		 var passsubcategoryid = 'id='+id;
		   $.ajax( {
			         type: 'get',
				  data: passsubcategoryid,
				  url: 'product_getsubcategory',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
					$('#Product_SubCategory').html(responseText);					   
				   }
				}		
			});		
	}

	function get_second_subcategory(id)
	{
		 var passsecondsubcategoryid = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passsecondsubcategoryid,
				  url: 'product_getsecondsubcategory',
				  success: function(responseText){  
				   if(responseText)
				   {    
					$('#Product_SecondSubCategory').html(responseText);					   
				   }
				}		
			});		
	}

	$( document ).ready(function() {

			$('#specificationdetails').hide();
			var title 		 = $('#Product_Title');
			var category		 = $('#Product_Category');
			var maincategory 	 = $('#Product_MainCategory');
			var subcategory 	 = $('#Product_SubCategory');
			var secondsubcategory	 = $('#Product_SecondSubCategory');
			var originalprice 	 = $('#Original_Price');
			var inctax = $('#inctax');
			var discountprice 	 = $('#Discounted_Price');
			var shippingamt          = $('#Shipping_Amount');
			var description          = $('#Description');
			var wysihtml5 		 = $('#wysihtml5');
			 	var merchant		 = $('#Select_Merchant');
			var shop		 = $('#Select_Shop');
			 
			var metakeyword		 = $('#Meta_Keywords');
			var metadescription	 = $('#Meta_Description');
			var file		 = $('#file0');
		        var pquantity		 =$('#Quantity_Product');

			


		     //   var countryid=$("#selectcountry1 option:selected").val();
	
$('#Delivery_Days').keyup(function() { 
if (this.value.match(/[^0-9-()\s]/g)) 
{ 
this.value = this.value.replace(/[^0-9-()\s]/g, ''); 
} 
});

	$('#Original_Price').keypress(function (e){
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
	$('#inctax').keypress(function (e){
		if(e.which!=8 && e.which!=0 && e.which!=13 && (e.which<48 || e.which>57))
			{
		    inctax.css('border', '1px solid red'); 
				$('#error_msg').html('Numbers Only Allowed');
				inctax.focus();
				return false;
		}
		else
		{			
            inctax.css('border', ''); 
			$('#error_msg').html('');	        
		}
        });
		
	$('#Discounted_Price').keypress(function (e){
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
		
	
        $('#submit_product').click(function() {

	 var sizeid=$("#Product_Size option:selected").val();
	 var checkedoptioncolor = $('input:radio[name=productcolor]:checked').val();
	 var shipamtchecked = $('input:radio[name=shipamt]:checked').val();
	 var colorid=$("#selectprocolor option:selected").val();
         var checkspec = $('input:radio[name=specification]:checked').val();
		 
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
		}<?php */?>
			
			if(pquantity.val() == 0)
			{
			pquantity.css('border', '1px solid red'); 
			$('#error_msg').html('Please Enter Product Quantity');
			pquantity.focus();
			return false;

			}
			else
			{
			pquantity.css('border', ''); 
			$('#error_msg').html('');

			}
		
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
		
		if(shipamtchecked==2)
		{
			if(shippingamt.val()=="")
			{
				shippingamt.css('border', '1px solid red'); 
				$('#error_msg').html('Please Provide Shipping Amount');
				shippingamt.focus();
			return false;
			}
			else
			{
				shippingamt.css('border', ''); 
				$('#error_msg').html('');

			}
			 


		}
		
		else
		{
				shippingamt.css('border', ''); 
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

		if(checkspec==1)
		{ 
			var cntspec=$('#specificationcount').val();
			var i=0;
			for(i=0;i<=cntspec;i++)
			{
			 var specid=$("#spec"+i+" option:selected").val();
			 var spectxt=$("#spectext"+i).val();
	 
			 if(specid!=0 && spectxt!="")
			 {
			 var success=1;	
			 }
			 else
			 {
			  var success=0;	
			 }
				}

	 
		if(success==0)
		{
			i=i-1;
 		      $('#error_msg').html('Please Select specification and give text');
		      $('#spec'+i).css('border', '1px solid red');
		       $('#spectext'+i).css('border', '1px solid red');	
		      return false;

		}
		else
		{
			i=i-1;
			 $('#error_msg').html(' ');
		      $('#spec'+i).css('border', '1px solid lightgray');
		       $('#spectext'+i).css('border', '1px solid lightgray');	

		}
	
		}
		if(sizeid==0)
		{
		       $('#error_msg').html('Please Select Product size');
			$("#Product_Size").css('border', '1px solid red'); 
			return false;
		}
		else
		{
			 $('#error_msg').html('');

		}
		if($('input:radio[name=productcolor]:checked').val()==1)
		{
			if($("#selectprocolor option:selected").val()<1)
			{
 				$('#error_msg').html('Please select color');
				$("#selectprocolor").css('border', '1px solid red'); 
				return false;
			}
			else
			{
				
			}
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
		
		var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
		var count_images = $('#count').val();
		for(var i=0;i <= count_images;i++)
		{
      	if($('#file'+i).val() == "")
 		{
 		$('#file'+i).focus();
		$('#file'+i).css('border', '1px solid red'); 
		$('#error_msg').html('Please choose image');
		return false;
		}			
		else if($.inArray($('#file'+i).val().split('.').pop().toLowerCase(), fileExtension) == -1) { 				
		$('#file'+i).focus();
		$('#file'+i).css('border', '1px solid red'); 
		$('#error_msg').html('Please choose valid image');
		return false;
		}
		else
		{
		$('#error_msg').html('');				
		}
		}
	});	
});
	</script>
    

  	<script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS
<script src="<?php echo url('')?>/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo url('')?>/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo url('')?>/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo url('')?>/assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo url('')?>/assets/js/formsInit.js"></script>
<script>
   //  $(function () { formInit(); });
</script>-->

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
