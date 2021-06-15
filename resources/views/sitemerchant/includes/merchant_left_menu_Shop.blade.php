<?php  $current_route = Route::getCurrentRoute()->getPath(); ?> 
<?php

if (Session::has('merchantid'))
{
    $merchantid=Session::get('merchantid');
}

 ?>
 
<div id="left">
            <div class="media user-media well-small">
                <!-- <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a> -->
                
                <div class="media-body">
                    <h5 class="media-heading">PRODUCTS</h5>
                    
                </div>
                <br />
            </div>

             <ul id="menu" class="collapse">
                
      <li <?php if($current_route == 'merchant_manage_shop'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>> <a  href="<?php echo url('merchant_manage_shop/'.$merchantid); ?>"> <i class="icon-dashboard"></i>&nbsp;Manage Shops
        </a> </li>
                   
      <li <?php if($current_route == 'merchant_add_shop'){ echo 'class="panel active"'; } else { echo 'class="panel"'; } ?>> <a href="<?php echo url('merchant_add_shop/'.$merchantid); ?>"> <i class=" icon-plus-sign"></i>&nbsp;Add Shops
       </a> </li>
    
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