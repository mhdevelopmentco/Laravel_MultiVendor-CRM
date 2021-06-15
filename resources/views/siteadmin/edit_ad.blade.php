<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Living Lectionary | Ads Add</title>
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
                                <li class="active"><a >Ads Add | VirtualPlaza</a></li>
                            </ul>
                    </div>
                </div>
            <div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Ads Add | VirtualPlaza</h5>
            
        </header>
        <div id="div-1" class="accordion-body collapse in body">
@if ($errors->any())
         <br>
		 <ul style="color:red;">
		{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>	
		@endif
        @if (Session::has('message'))
		<p style="background-color:green;color:#fff;">{!! Session::get('message') !!}</p>
		@endif
              {!! Form::open(array('url'=>'edit_ad_submit','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}

		@foreach($adresult as $info)

<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                 <label for="text1" class="control-label col-lg-2">Ad Title<span class="text-sub" >*</span></label>

                    <div class="col-lg-8">
                 <input id="text1" placeholder="" class="form-control" type="text" name="editadtitle" value="<?php echo $info->ad_name;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2">Ads Position<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="editadposition">
            <option value="0" <?php if($info->ad_position==0){ ?> selected <?php };?>>select position</option>
            <option value="1" <?php if($info->ad_position==1){ ?> selected <?php }; ?>>Header right</option>
            <option value="2" <?php if($info->ad_position==2){ ?> selected <?php }; ?>>Left side bar</option>
            <option value="3" <?php if($info->ad_position==3){ ?> selected <?php }; ?>>Bottom footer</option>
             
        </select>
                    </div>
                </div>

                <?php /*?><div class="form-group">
                    <label class="control-label col-lg-2">Pages<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                         <select class="form-control" name="editpage">
            <option value="0" <?php if($info->ad_pages==0){ ?> selected <?php }; ?>>select any page</option>
            <option value="1" <?php if($info->ad_pages==1){ ?> selected <?php };?>>Home</option>
            <option value="2" <?php if($info->ad_pages==2){ ?> selected <?php };?>>Deals</option>
            <option value="3" <?php if($info->ad_pages==3){ ?> selected <?php }; ?>>Product</option>
            <option value="4" <?php if($info->ad_pages==4){ ?> selected <?php }; ?>>Auction</option>
        </select>
                    </div>
                </div><?php */?>

                <div class="form-group">
                    <label class="control-label col-lg-2">Redirect URL<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
          <input id="text1" placeholder="" class="form-control" type="text" name="editredirecturl" value="<?php echo $info->ad_redirecturl;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text2" class="control-label col-lg-2">Upload Image<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input type="file"  name="file" id="ad_img"  value="{!!$info->ad_img!!}" id="text1" placeholder="Fruit ball"><br>
			 <img src="{!! url('assets/adimage/').'/'.$info->ad_img!!}" style="height:60px;">
                    </div>


                    </div>
                </div>
                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-2"><span  class="text-sub"></span></label>

                    <div class="col-lg-8">
                     <button  type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">Update</button>
                      <a href="<?php echo url('manage_ad');?>" class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>
                   
                    </div>
					  
                </div>

               @endforeach 
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


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo url('')?>/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo url('')?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url('')?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->   
     
</body>
     <!-- END BODY -->
</html>
