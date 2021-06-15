<body>
{!! $navbar !!}
<!-- Navbar ================================================== -->
{!! $header !!}
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	
<!-- Sidebar end=============================================== -->

	<div class="span9">
    <ul class="breadcrumb">
    <?php if($get_blog_list) { foreach($get_blog_list as $fetchblog_list) { } ?>
    <li><a href="<?php echo url(); ?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo url('blog'); ?>">BLOG</a> <span class="divider">/</span></li>
    <li class="active"><?php echo $fetchblog_list->blog_title; ?></li>
    </ul>	
      @if (Session::has('success'))
		<div class="alert alert-success alert-dismissable">{!! Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
		@endif
    @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">You Have Errors While Providing Comment.
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
    <h4><?php echo $fetchblog_list->blog_title; ?></h4>
    <ul class="breadcrumb" style="background:none;">
    <li><span><?php   $created_date =  $fetchblog_list->blog_created_date;
					  $explode_date = explode(" ",$created_date);
					echo  date('l jS \of F Y', strtotime($explode_date[0]));?>&nbsp;|</span></li>
    <li><span>Posted by  <a href="#" style="color:#F00;"> Admin</a>| </span></li>
    <li><a href="#" style="color:#F00;"><?php echo $get_blog_list_cat_name[$fetchblog_list->blog_catid]; ?> | </a></li>
    <li><i class="icon-comment-alt"></i><a href="<?php echo url('blog_comment/'. $fetchblog_list->blog_id); ?>"  style="color:#F00;"> <?php echo $get_blog_list_count[$fetchblog_list->blog_id];  ?>  Comments</a> <span class="divider">/</span></li>
    
  
    </ul>
    
	<div class="row">
    	
    <div class="span4">  
			<img src="<?php echo url(); ?>/assets/blogimage/<?php echo $fetchblog_list->blog_image; ?>" width="320" height="190">
            </div>
              <div class="span4 marg"> 
              <div class="span4 social_share" style="margin-left:0px;">
                <ul style="list-style-type:none;margin-left:0px;">
                   <li><div class="colabs-sc-twitter fl"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1401325387.html#_=1401683471204&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php echo url(); ?>&amp;size=m&amp;text=<?php echo $fetchblog_list->blog_title; ?>&amp;url=<?php echo url(); ?>/blog" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 109px; height: 20px;"></iframe><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></div></li><strong></strong>
                   
             <li><div class="shortcode-google-plusone fl"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1401683471225" name="I0_1401683471225" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;annotation=bubble&amp;size=medium&amp;origin=http%3A%2F%2Fcolorlabsproject.com&amp;url=<?php echo url('blog/'.$fetchblog_list->blog_id); ?>&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.Xh27AGpQ8ys.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTPG4IuYlgUtku52bcizMHeeQ1ZTOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1401683471225&amp;parent=http%3A%2F%2Fcolorlabsproject.com&amp;pfname=&amp;rpctoken=22542457" data-gapiattached="true" title="+1"></iframe></div></div></li>
             
<li><div class="colabs-fblike fl">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.nexploc.com%2Fblog<?php echo $fetchblog_list->blog_id; ?>%2F1&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=586410728144592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div></li>
	</ul></div>
               
			<p ><div style="text-align:justify !important;"><?php echo $fetchblog_list->blog_desc; ?></div></p>
            </div>
			
			
			<div class="span9">
            
            
          </div>

	</div>
    
    
    <hr class="soften">
    <?php foreach($get_blog_comment_check as $check_comment_by_admin) 
	if($check_comment_by_admin->bs_allowcommt == 1) { ?>
    <div class="span9">
    <h5>Leave a Reply</h5>
    <div class="row">
    <div class="span6">
     {!! Form::open(array('url'=>'blog_comment_submit','class'=>'form-horizontal')) !!}<strong></strong>
      @if ($errors->any())
         <br>
		 <ul style="color:red;">
		<div class="alert alert-danger alert-dismissable">{!! implode('', $errors->all(':message<br>')) !!}
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
		</ul>	
		@endif
      
    <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left !important;">Name<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                    <input placeholder="" class="form-control span7" name="cmt_page" type="hidden" value="1">
                     <input placeholder="" class="form-control span7" name="cmt_id" type="hidden" value="<?php echo $fetchblog_list->blog_id; ?>">
                        <input placeholder="" class="form-control span7" type="text" name="name" value="{!! Input::old('name') !!}" >
                    </div>
                </div>
    </div>
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Email<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <input placeholder="" class="form-control span7" type="text" name="email" value="{!! Input::old('email') !!}" >
                    </div>
                </div>
    </div>
    
    
    
    
    
    <div class="span6">
    	<div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Website</label>

                    <div class="col-lg-8">
                        <input placeholder="" class="form-control span7" type="text" name="website" value="{!! Input::old('website') !!}" >
                    </div>
                </div>
    </div>
    
    <div class="span6">
    <div class="form-group">
                    <label for="text1" class="control-label col-lg-2">Message<span class="text-sub">*</span></label>

                    <div class="col-lg-8">
                        <textarea  class="form-horizontal span7" rows="3" name="message" >{!! Input::old('message') !!}</textarea>
                    </div>
                </div>
    </div>
    
    
    <div class="span6">
    <button type="submit" class="btn btn-success large" > Submit comment </button>
    </div>
    </form>
    </div>
    <div class="row">
    </div>
    </div>
    <?php } } else { ?>
      <h4 style="color:#F00;">No Blogs Available...</h4>
    <?php } ?>
	</div>

<div class="span3" id="sidebar">


<div class="row">
    
    </div>
    
    <div class="clearfix"></div>
    
<div class="thumbnail"><h5>Categories</h5>
<legend></legend>
<ul class="topnav blog-menu">
    <?php foreach($getheader_category as $fetch_heder_category) {?>
	<li><a class="active" href="<?php echo url('blog_category/'.$fetch_heder_category->mc_id); ?>"><?php echo $fetch_heder_category->mc_name; ?></a></li>
    <?php } ?>
</ul></div>
		
		<br>
       
        <div class="row">
        <div class="span3 thumbnail">
        <h5>Popular Posts</h5>
        <legend></legend>
        <ul class="topnav post-menu">
        <?php $count_popular= count($get_blog_list_popular);
		$pp = 1;
		 foreach($get_blog_list_popular as $fetch_popular_post){ 
		 ?>
        <li><a style="text-align:left !important" href="<?php echo url('blog_view/'.$fetch_popular_post->blog_id); ?>"  ><?php echo $fetch_popular_post->blog_title; ?></a></li>
		<?php if($count_popular != $pp)
        { ?>
        <hr class="soft"/>
        <?php } ?>
       
        <?php $pp++; } ?>
        </ul>
        </div>
        </div>
	</div>
	</div>
	</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

	{!! $footer !!}

     <script type="text/javascript">
$(document).ready(function(){

$("#searchbox").keyup(function(e) 
{

var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{
$("#display").html("").hide();	
}
else
{
	var passData = 'searchword='+ searchbox;
	 $.ajax( {
			      type: 'GET',
				  data: passData,
				  url: '<?php echo url('autosearch'); ?>',
				  success: function(responseText){  
				  $("#display").html(responseText).show();	
}
});
}
return false;    

});
});
</script>
    <script src="<?php echo url(); ?>/plug-k/js/bootstrap-typeahead.js" type="text/javascript"></script>
    <script src="<?php echo url(); ?>/plug-k/demo/js/demo.js" type="text/javascript"></script>
	

<script type="text/javascript" src="<?php echo url(); ?>/themes/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url(); ?>/themes/js/scriptbreaker-multiple-accordion-1.js"></script>
    <script language="JavaScript">
    
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<span class="icon-chevron-right"></span>',
            openedSign: '<span class="icon-chevron-down"></span>'
        });
    });
    
    </script>
</body>
</html>