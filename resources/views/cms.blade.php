<body>
{!! $navbar !!}


<!-- Navbar ================================================== -->
<!-- Header End====================================================================== -->

<div id="mainBody faq_main">
<div class="container">
<?php if($cms_result){ foreach($cms_result as $cms) { 
$cms_desc = stripslashes($cms->cp_description);  ?>
<h1 style="color:#ff8400;"><?php echo $cms->cp_title; ?> </h1>
<legend></legend>
<div id="legalNotice">
	<?php echo $cms_desc; ?>
</div>
<?php } } else { ?>
<h1 style="color:#ff8400;"></h1>
<legend></legend>
<div id="legalNotice">
	<?php echo 'No data found!'; ?>
	</div>	
</div>
<?php } ?>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer  !!}

	

</body>
</html>