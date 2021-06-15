<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody faq_main">
<div class="container">
<br>
<h1 style="color:#5BB75B;margin:0px;">FAQ</h1>
<hr class="soften"/>	
<br>
<div class="accordion" id="accordion2">
	<?php $i=1; foreach($faq_result as $faq) { ?>
	<div class="accordion-group">
	  <div class="accordion-heading">
		<h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $i; ?>">
		  <?php echo $faq->faq_name; ?>
		</a></h4>
	  </div>
	  <div id="collapse<?php echo $i; ?>" class="accordion-body collapse"  >
		<div class="accordion-inner">
			 <?php echo $faq->faq_ans; ?>
		</div>
	  </div>
	</div>
	<?php $i++;} ?>
  </div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer  !!}

	

</body>
</html>