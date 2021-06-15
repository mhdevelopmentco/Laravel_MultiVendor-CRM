 <?php  $current_route = Route::getCurrentRoute()->getPath(); ?> 
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo url(); ?>/assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading"> Fund requests </h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                
      <li <?php if($current_route == 'fund_request'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>> <a href="<?php echo url('fund_request'); ?>" > <i class="icon-dashboard"></i>&nbsp; Fund Request Report
</a> </li>
                   
      <li <?php if($current_route == 'with_fund_request'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>> <a href="<?php echo url('with_fund_request'); ?>" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav"> 
        <i class="icon-resize-small"></i>&nbsp;Withdraw Fund Request <span class="pull-right"> 
        <i class="icon-angle-right"></i> </span> </a> </li>
       

           
            </ul>

			 
        </div>
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