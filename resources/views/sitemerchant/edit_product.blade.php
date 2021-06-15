<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary Admin | Add Products</title>
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
<link rel="shortcut icon" href="<?php echo url(''); ?>/themes/images/favicon.png">
    <link rel="stylesheet" href="<?php echo url('')?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
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
                            	<li class=""><a href="<?php echo url('sitemerchant_dashboard'); ?>">Home</a></li>
                                <li class="active"><a href="#">Add Products</a></li>
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
 
<?php foreach($product_list as $products)
		{  }
		 $title 		 = $products->pro_title;
         	$category_get	 = $products->pro_mc_id;
	     	$maincategory 	 = $products->pro_smc_id;
		 $subcategory 	 = $products->pro_sb_id;
		 $secondsubcategory= $products->pro_ssb_id;
		 $originalprice  = $products->pro_price;
		 $discountprice  = $products->pro_disprice;
		 $inctax=$products->pro_inctax;
		 $shippingamt=$products->pro_shippamt;
		 $description 	 = $products->pro_desc;
		 $deliverydays=$products->pro_delivery;
		  $merchant		 = $products->pro_mr_id;
		 $shop			 = $products->pro_sh_id;
		 $metakeyword	 = $products->pro_mkeywords;
		 $metadescription= $products->pro_mdesc;
		 $file_get		 = $products->pro_Img;
		 $img_count		 = $products->pro_image_count;
		 $productspec=$products->pro_isspec;
		$pqty=$products->pro_qty;
?>


        <div id="div-1" class="accordion-body collapse in body">
               {!! Form::open(array('url'=>'mer_edit_product_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}


		<input type="hidden" name="product_edit_id" value="<?php echo $products->pro_id; ?>" />
		<div id="error_msg"  style="color:#F00;font-weight:800"  > </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Title<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input id="Product_Title" placeholder="" name="Product_Title" class="form-control" type="text" value="<?php echo $title; ?>">
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
                    <label class="control-label col-lg-2">Select Sub Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="subcategory" id="subcategory" onChange="select_second_sub_cat(this.value)" >
           			    <option value="0">---Select---</option>         
				        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Select Second Sub Category<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <select class="form-control" name="secondsubcategory" id="secondsubcategory"  >
		               <option value="0">---Select---</option>      
        			   </select>
                    </div>
                </div>
 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Quantity<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="Enter Quantity of Product" class="form-control" type="text" id="Quantity_Product" name="Quantity_Product" value="<?php echo $pqty; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Original Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input   placeholder="Numbers Only" class="form-control" type="text" id="Original_Price" value="<?php echo $originalprice; ?>" name="Original_Price">
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Discounted Price<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="Numbers Only" class="form-control" type="text" id="Discounted_Price" name="Discounted_Price" value="<?php echo $discountprice; ?>">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                                <input type="checkbox" <?php if($inctax > 0) { ?> checked="checked" <?php } ?> onclick="if(this.checked){$('#inctax').show();}else{$('#inctax').hide();$('#inctax').val(0)}"> ( Including tax amount ) 
                                <input placeholder="Numbers Only" <?php if($inctax == 0) { ?> style="display:none;" <?php } ?>  class="form-control" type="text" id="inctax" name="inctax" value="<?php echo $inctax;?>"> 
                    </div>
                </div>
		<div class="form-group"  >
                    <label for="text2"  class="control-label col-lg-2">Shipping Amount<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'none');" value="1" <?php if($shippingamt<1){?>checked<?php } ?> > <label class="sample">Free</label>
<input type="radio" id="shipamt" name="shipamt" onClick="setshipVisibility('showship', 'inline');" value="2" <?php if($shippingamt>0){?>checked<?php } ?>  ><label class="sample">Amount</label>

					
						<label class="sample"></label>
                    </div>
                </div>
<?php 
if($shippingamt<1)
{ 
$showship="display:block";
}
else
{

$showship="display:none";
}

?>

				  <div class="form-group" id="showship" style="<?php echo $showship;?>" >
                    <label for="text1" class="control-label col-lg-2">Shipping Amount<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input  placeholder="" class="form-control" type="text" id="Shipping_Amount" name="Shipping_Amount" value="<?php echo $shippingamt; ?>">
                    </div>
                </div>
				  
				 
				 <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
         <textarea id="wysihtml5" class="form-control" rows="10" id="Description" name="Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
		  <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Want to add specification<span class="text-sub">*</span></label>

                   <div class="col-lg-8">
<input type="radio"  name="specification"  onClick="setVisibility('sub4', 'inline');" value="1" <?php if($productspec==1) {?> checked <?php }?>> <label class="sample">Yes                  </label>
		<input type="radio" name="specification"  onClick="setVisibility('sub4', 'none');" value="2" <?php if($productspec==2) {?>checked <?php } ?>> <label class="sample">No                  </label>
					
						<label class="sample"></label>
                    </div>
                </div>
                


<?php  
$resultspec="";
$resultspectext="";
  ?>
  
	 
	@foreach ($existingspecification as $existingspecification1) 
	<?php 
	$resultspec=$existingspecification1->spc_sp_id.",".$resultspec;
	$resultspectext=$existingspecification1->spc_value.",".$resultspectext;
	?>
	@endforeach

<?php 
if(strlen($resultspec)>0)
{

$trimmedspec=trim($resultspec,",");
$specarray=explode(",",$trimmedspec);
$speccount=count($specarray)-1;
$trimmedtext=trim($resultspectext,",");
$textarray=explode(",",$trimmedtext);
$specidvalue=$speccount+1;
}
else
{
 $speccount=0;
}
 
?>


	<?php if($productspec==1){ ?>
	
                
         <div class="form-group" id="sub4" <?php if($productspec==1){?>style="display:block"<?php }else {?>style="display:none;"<?php }?> >
                    <label for="text2" class="control-label col-lg-2">Specification</label>

                    <div class="col-lg-8">
                    <label>Text ( More custom specification <a href="<?php echo url('')?>/manage_specification">ADD</a> )</label>
			</div>

		<?php for($i=0;$i<=$speccount;$i++){?>
		
			<div class="col-lg-3 col-lg-offset-2" style="margin-top:5px;">
			  <select class="form-control" name="<?php echo 'spec'.$i;?>">
                        <option  value="0">--select specification--</option>
            		@foreach ($productspecification as $specification) 
           		 <option  value="<?php echo $specification->sp_id;?>" <?php if($specification->sp_id==$specarray[$i]){?>selected<?php } ?> >{!!$specification->sp_name!!}</option>
          		 @endforeach
        		</select>
                    </div>


                   
                    <div class="col-lg-3">
                       <input type="text" class="form-control" name="<?php echo 'spectext'.$i;?>" value="<?php echo $textarray[$i];?>">
                    </div>
 		
	 	<?php } ?>	


                    <input type="hidden" id="specificationid1" value="<?php echo $specidvalue;?>">
		    <input type="hidden" id="specificationcount" name="specificationcount" value="<?php echo $speccount;?>">
                    
                </div>


 		<div  id="divspecificationTxt">

		</div>  

		 <div class="form-group"  >

		 <div class="col-lg-3">
                    
                    </div>
                   
 		<p id="addmore" <?php if($productspec==1){?>style="display:block"<?php }else {?>style="display:none;"<?php }?>><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#F60; ">Add more</a> </p>
		</div>  


<?php } else {?>
  <div class="form-group" id="sub4" style="display:none;"  >
                    <label for="text2" class="control-label col-lg-2">Specification</label>

                    <div class="col-lg-8">
                    <label>Text ( More custom specification <a href="<?php echo url('')?>/manage_specification">ADD</a> )</label>
			</div>

		 
		
			<div class="col-lg-3 col-lg-offset-2">
			  <select class="form-control" id="spec0" name="spec0">
                        <option  value="0">--select specification--</option>
            		@foreach ($productspecification as $specification) 
           		 <option  value="<?php echo $specification->sp_id;?>"  >{!!$specification->sp_name!!}</option>
          		 @endforeach
        		</select>
                    </div>


                   
                    <div class="col-lg-3">
                       <input type="text" class="form-control" id="spectext0" name="spectext0" value="">
                    </div>
 		 


                    <input type="hidden" id="specificationid1" value="1">
		    <input type="hidden" id="specificationcount" name="specificationcount" value="0">
                    
                </div>


 		<div  id="divspecificationTxt">

		</div>  

		 <div class="form-group"  >

		 <div class="col-lg-3">
                    
                    </div>
                   
 		<p id="addmore"  style="display:none;"><a onClick="addspecificationFormField();"  style="cursor:pointer;color:#F60; ">Add more</a> </p>
		</div>  



<?php }?>
<div class="form-group">
	 <label for="text2" class="control-label col-lg-2">Product Size<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <select class="form-control" onchange="getsizename(this.value)"  name="Product_Size" id="Product_Size" >
                       <option value="0">--select size--</option>
 			@foreach ($productsize as $size) 
           		 <option  value="<?php echo $size->si_id;?>">{!!$size->si_name!!}</option>
          		 @endforeach
         
        </select>
        <label>More custom sizes  <a href="<?php echo url('')?>/manage_size"> ADD</a></label>
                    </div>
                </div>

<?php  
$resultsize="";
$sizename="";
 ?>
	@foreach ($existingsize as $existingsize1) 
	<?php 
		$resultsize=$existingsize1->ps_si_id.",".$resultsize;
		$sizename=$existingsize1->si_name.",".$sizename;
	?>
	@endforeach

<?php 
if(strlen($resultsize)>0)
{

$trimmedsizes=trim($resultsize,",");
$sizearray=explode(",",$trimmedsizes);
$sizecount=count($sizearray);
$trimsizename=explode(",",$sizename);
}
else
{
$resultsize="0,";
$sizecount=0;
}
 
?>




<div class="form-group" id="sizediv" <?php if($sizecount>0){ ?> style="display:block;" <?php } else {?>style="display:none;" <?php } ?>>

 <input type="hidden" id="productsizecount" name="productsizecount" value="<?php echo $sizecount;?> ">
		 <label class="control-label col-lg-2" for="text1">Your Select size<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showsize" >

		<?php for($i=0;$i<$sizecount;$i++) { ?>

 		<span style="padding-right:10px;">Select Size:</span><?php echo $trimsizename[$i];?><span style="color:#ff0099;padding-right:90px"><input type="checkbox"  name="<?php echo 'sizecheckbox'.$sizearray[$i];?>"style="padding-left:30px;" checked="checked" value="1" ></span>
		 <?php } ?>
		</p>
		
 		
                       <input type="hidden"  name="si"  value="<?php echo $resultsize;?>" id="si" />
                    </div>
</div>
<div class="form-group" id="quantitydiv" <?php if($sizecount>0){ ?> style="display:none;" <?php }else { ?> style="display:none;" <?php } ?>>
  		 <label class="control-label col-lg-2" for="text1">Quantity<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showquantity" >

		<?php for($i=0;$i<$sizecount;$i++) { ?>
	 <input type="text" name="<?php echo 'quantity'.$sizearray[$i];?>" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input>  <?php } ?>	
</p>
                       <input type="hidden"   value="0," id="sq" />
                    </div>
</div>
				
<?php  
$resultcolor="";
$colorname="";
$colorcode="";
 ?>
	@foreach ($existingcolor as $existingcolor1) 
	<?php 
		$resultcolor=$existingcolor1->pc_co_id.",".$resultcolor;
		$colorname=$existingcolor1->co_name.",".$colorname;
		$colorcode=$existingcolor1->co_code.",".$colorcode;
	?>
	@endforeach

<?php 

 
if(strlen($resultcolor)>0)
{

$trimmedcolor=trim($resultcolor,",");
$colorarray=explode(",",$trimmedcolor);
$colorcount=count($colorarray);
$colornamearray=explode(",",$colorname);
$colorcodearray=explode(",",$colorcode);
}
else
{
$colorcount=0;
$resultcolor="0,";
}

?>

 
	
<div class="form-group" style="display:none;">
	 <label for="text2" class="control-label col-lg-2">Add Color Field<span class="text-sub">*</span></label>
	 <div class="col-lg-8">  <input type="radio" name="productcolor" onClick="setVisibility1('sub3', 'none');" value="1" checked> <label class="sample">yes                  </label>
					<input type="radio" name="productcolor" onClick="setVisibility1('sub3', 'inline');" value="2" ><label class="sample">No</label>
						<label class="sample"></label>
                    </div>
                </div>
                
                <div class="form-group" id="sub3"   <?php if($colorcount>0){ ?> style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
                    <label for="text2" class="control-label col-lg-2">Product Color</label>

                   <div class="col-lg-3">
			     <select class="form-control"  onchange="getcolorname(this.value)">
            
			 @foreach ($productcolor as $color) 
           		 <option style="background:<?php echo $color->co_code;?>;" value="<?php echo $color->co_id;?>">{!!$color->co_name!!}</option>
          		 @endforeach
      			    </select>
        
        More custom colors <a href="<?php echo url('')?>/manage_color">ADD</a>
                    </div>
                </div>

			<div class="form-group" id="colordiv" <?php if($colorcount>0){ ?> style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
                    <label class="control-label col-lg-2" for="text1">Your Select Color<span class="text-sub">:</span></label>

                    <div class="col-lg-8">
                       <p id="showcolor" >
			<?php for($i=0;$i<$colorcount;$i++) { ?>
			
<?php $bordercolor="border:5px solid".$colorcodearray[$i];?>
			<span style="width:220px;padding:10px;<?php echo $bordercolor;?>";margin:0px;"><?php echo $colornamearray[$i];?><input type="checkbox"  name="<?php echo 'colorcheckbox'.$colorarray[$i];?>"style="padding-left:30px;" checked="checked" value="1" ></span>

			<?php } ?>


			</p>
                       <input type="hidden"  name="co" value="<?php echo $resultcolor;?>" id="co" />
                    </div>
                </div>
		<div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Delivery days<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <input type="text" class="form-control" placeholder="" id="Delivery_Days" name="Delivery_Days" value="<?php echo $deliverydays; ?>">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="text2" class="control-label col-lg-2"><span class="text-sub"></span></label>

                    <div class="col-lg-8">
                      Eg : ( 2 - 5 )  
                    </div>
                </div>
                
				<input type="hidden" id="Select_Merchant" name="Select_Merchant" value="{!!Session::get('merchantid')!!}" />
				  
                
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Select Shop<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="Select_Shop" id="Select_Shop" >
			 </select>
                    </div>
                </div>
				  <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Meta keywords<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Keywords" name="Meta_Keywords"><?php echo $metakeyword;?></textarea>
                    </div>
                </div>
				
				 <div class="form-group">
                    <label class="control-label col-lg-2" for="text1">Meta description<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                       <textarea class="form-control" id="Meta_Description" name="Meta_Description"><?php echo $metadescription ; ?></textarea>
                    </div>
                </div>
				
<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Product Image<span class="text-sub">*</span><br><span  style="color:#999">(max 5)</span></label>
					<?php $file_get_path =  explode("/**/",$file_get); ?>
                    <div class="col-lg-8" id="img_upload">
                    	<div style="float:left; max-width:219px"><input type="hidden" name="file_new" value="<?php echo  $file_get_path[0]; ?>"  >
                       <input type="file"  id="file" name="file" ><span><img src="<?php echo url(''); ?>/assets/product/<?php echo $file_get_path[0]; ?>" height="50" width="50" > </span>                        </div>                   
                     <?php 
					 for($j=0 ; $j< $img_count; $j++)
					 { ?>
                     <div style="float:left; max-width:219px"><input type="hidden" name="file_more_new<?php echo $j; ?>" value="<?php echo  $file_get_path[$j+1]; ?>" >
                     <input type='file' name='file_more<?php echo $j; ?>' style="padding-bottom:5px;" /> <img src="<?php echo url(''); ?>/assets/product/<?php echo $file_get_path[$j+1]; ?>" height="50" width="50" ></div>
					 <?php } ?>
                       <div id="divTxt"></div>  
                      <p style="clear:both"><a onClick="addimgFormField(); return false;" style="cursor:pointer;color:#F60;" >Add</a></p> 
                       <input type="hidden" id="count" name="count" value="<?php echo $img_count; ?>">
                       <input type="hidden" id="aid" value="1">
                    </div>
                   
              		
                 </div>			
		<div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                   <button class="btn btn-warning btn-sm btn-grad" id="submit_product" ><a style="color:#fff"  >Add Product</a></button>
                     <button type="reset" class="btn btn-default btn-sm btn-grad" style="color:#000">Reset</button>
                   
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
<script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>

 

 <script language="JavaScript">
function setVisibility(id, visibility) {


document.getElementById(id).style.display = visibility;
document.getElementById('addmore').style.display =visibility;
 
}
function setVisibility1(id, visibility) {


document.getElementById(id).style.display = visibility;
document.getElementById('colordiv').style.display =visibility;
 
}
function setshipVisibility(id, visibility) 
{
document.getElementById(id).style.display = visibility;
 
}
</script>
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
	  if(count_id < 2){
 			document.getElementById('specificationcount').value = parseInt(count_id)+1;
		 jQuery("#divspecificationTxt").append(" <div class='form-group' id='spec"+ id + "'><div class='col-lg-3 col-lg-offset-2'><select name='spec"+ nameid  + "'  class='form-control'><option  value='0'>-- select specification--</option><?php foreach ($productspecification as $specification) {?><option  value='<?php echo $specification->sp_id;?>'><?php echo $specification->sp_name;?></option><?php } ?></select></div><div class='col-lg-3'><input type='text' class='form-control' name='spectext"+ nameid  + "'  /></div><div class='col-lg-3'><a href='#' onClick='removespecFormField(\"#spec" + id + "\"); return false;' style='color:#F60;' >Remove</a></div></div>");   

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
function removespecFormField(id) {
	var count_id = document.getElementById("specificationcount").value;
	 count_id=count_id-1;

document.getElementById("specificationcount").value=count_id;	

        jQuery(id).remove();
    }

</script>	

 <script type="text/javascript">
 
	
    function addimgFormField() {
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
    }
       
      function removeFormField(id) {

        jQuery(id).remove();
    }



	

		
   </script>
   
 <script type='text/javascript'>

$(document).ready(function(){
    	var counter = 2;
	$('#add_spec').click(function(){
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
				  url: 'product_getmerchantshop_ajax',
				  success: function(responseText){  
				   if(responseText)
				   { 	//alert(responseText);
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
				  url:'<?php echo url('product_getcolor'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
				 
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
						$('#colordiv').css('display', 'block'); 
						
					$('#showcolor').append('<span style="width:220px;padding:10px;border:5px solid '+get_result[2]+';margin:0px;">'+get_result[0]+'<input type="checkbox"  name="colorcheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>&nbsp;&nbsp;');			
					var co_name_js = $('#co').val();			
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
				  url: '<?php echo url('product_getsize'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 	 
					
					var get_result = responseText.split(',');
					if(get_result[3]=="success")
					{
                                  		var count=parseInt($('#productsizecount').val())+1;
						$("#productsizecount").val(count);
						$('#sizediv').css('display', 'block'); 
						//$('#quantitydiv').css('display', 'block'); 
						
					$('#showsize').append('<span style="padding-right:10px;">Select Size:</span><span style="color:#ff0099;padding-right:90px">'+get_result[2]+'<input type="checkbox"  name="sizecheckbox'+get_result[1]+'"style="padding-left:30px;" checked="checked" value="1" ></span>');
					$('#showquantity').append('<input type="text" name="quantity'+get_result[1]+'" value="1" style="padding:10px;border:5px solid gray;margin:0px;" onkeypress="return isNumberKey(event)" ></input> ');
		
					var co_name_js = $('#si').val();	
					$('#si').val(get_result[1]+","+co_name_js);	  
						
					
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
	



	function select_main_cat(id)
	{
		   var passData = 'id='+id;
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('product_getmaincategory'); ?>',
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
				  url: '<?php echo url('product_getsubcategory'); ?>',
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
				  url: '<?php echo url('product_getsecondsubcategory'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});		
	}
	// Onload to get selected category
	$( document ).ready(function() {

		

		var passmerchantid = 'id=<?php echo Session::get('merchantid'); ?>';
		$.ajax( {
			      type: 'get',
				  data: passmerchantid,
				  url: '<?php echo url('product_getmerchantshop'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 	//alert(responseText);
					$('#Select_Shop').html(responseText);					   
				   }
				}		
			});		
 






	var passData = 'edit_id=<?php echo $maincategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('product_edit_getmaincategory'); ?>',
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
				  url: '<?php echo url('product_edit_getsubcategory'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
				   		// alert(responseText);
					$('#subcategory').html(responseText);					   
				   }
				}		
			});	
	var passData = 'edit_second_sub_id=<?php echo $secondsubcategory; ?>';
		   $.ajax( {
			      type: 'get',
				  data: passData,
				  url: '<?php echo url('product_edit_getsecondsubcategory'); ?>',
				  success: function(responseText){  
				   if(responseText)
				   { 
 
				   	//alert(responseText);
					$('#secondsubcategory').html(responseText);					   
				   }
				}		
			});	
	});
	
		
		
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
			 
			var shop		 = $('#Select_Shop');
			var metakeyword		 = $('#Meta_Keywords');
			var metadescription	 = $('#Meta_Description');
			var file		 = $('#file');
 var pquantity		 =$('#Quantity_Product');
	
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
	 var colorid=$("#selectprocolor option:selected").val();
         var checkspec = $('input:radio[name=specification]:checked').val();
	 var  sizecnt=$("#productsizecount").val();
  var shipamtchecked = $('input:radio[name=shipamt]:checked').val();
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
		
		if(subcategory.val() == 0)
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
			 var spectxt=$("#spec"+i).val();
			 if(specid!=0 && spectxt!=="")
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
		if(sizeid==0 && sizecnt==0)
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
      <?php /*?>	if(file.val() == "")
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
		}<?php */?>
	});	
	
	});
	</script>
    
  	<script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

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
</body>
     <!-- END BODY -->
</html>
