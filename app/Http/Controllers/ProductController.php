<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Models;
use App\Register;
use App\Home;
use App\Footer;
use App\Settings;
use App\Merchant;
use App\Blog;
use App\Dashboard;
use App\Admodel;
use App\Deals;
use App\Auction;
use App\Products;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
  
    
    /*
    
    |--------------------------------------------------------------------------
    
    | Default Home Controller
    
    |--------------------------------------------------------------------------
    
    |
    
    | You may wish to use controllers instead of, or in addition to, Closure
    
    | based routes. That's great! Here is an example controller method to
    
    | get you started. To route to this controller, just add the route:
    
    |
    
    |	Route::get('/', 'HomeController@showWelcome');
    
    |
    
    */
    
    
    
    public function product_dashboard()
    {
        
        if (Session::has('userid')) {
         
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
                       
            $sold_details = Products::get_sold_products();
            
            $active_cnt = Products::get_active_products();
            
            $blocked_cnt = Products::get_block_products();
            
            $producttdy = Products::get_today_product();
            
            $product7days = Products::get_7days_product();
            
            $product30days = Products::get_30days_product();
            
            $product12mnth = Products::get_12mnth_product();
            
            $ordermnth_count = Products::get_chart_details();
            
            return view('siteadmin.product_dashboard')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('sold_details', $sold_details)->with('active_count', $active_cnt)->with('blocked_cnt', $blocked_cnt)->with('producttdy', $producttdy)->with('product7days', $product7days)->with('product30days', $product30days)->with('product12mnth', $product12mnth)->with('ordermnth_count', $ordermnth_count);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
  
        
    }
 
    
    public function add_product()
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $productcategory = Products::get_product_category();
            
            $productcolor = Products::get_product_color();
            
            $productsize = Products::get_product_size();
            
            $productspecification = Products::get_product_specification();
            
            $merchantdetails = Products::get_merchant_details();
         
            return view('siteadmin.add_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcategory', $productcategory)->with('productcolor', $productcolor)->with('productsize', $productsize)->with('productspecification', $productspecification)->with('merchantdetails', $merchantdetails);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
 
    
    public function edit_product($id)
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $category = Products::get_product_category();
            
            $product_list = Products::get_product($id);
            
            $productcolor = Products::get_product_color();
            
            $merchantdetails = Products::get_merchant_details();
            
            $productsize = Products::get_product_size();
            
            $productspecification = Products::get_product_specification();
            
            $existingspecification = Products::get_product_exist_specification($id);
            
            $existingcolor = Products::get_product_exist_color($id);
            
            $existingsize = Products::get_product_exist_size($id);
    
            return view('siteadmin.edit_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcolor', $productcolor)->with('category', $category)->with('product_list', $product_list)->with('merchantdetails', $merchantdetails)->with('productspecification', $productspecification)->with('productsize', $productsize)->with('existingspecification', $existingspecification)->with('existingcolor', $existingcolor)->with('existingsize', $existingsize);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
 
    public function manage_product()
    {
        if (Session::has('userid')) {

            $from_date  = Input::get('from_date');
            $to_date    = Input::get('to_date');
            $productrep = Products::get_productreports($from_date, $to_date);
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $details = Products::get_product_details_manage();
			
			$delete_product = Products::get_order_details();
        
            return view('siteadmin.manage_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('productrep', $productrep)->with('delete_product', $delete_product);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    public function delete_product($id)
	{
			
		if(Session::has('userid'))
		{
		 $adminheader 		= view('siteadmin.includes.admin_header')->with("routemenu","settings");	
		 $adminleftmenus	= view('siteadmin.includes.admin_left_menus');
		 $adminfooter 		= view('siteadmin.includes.admin_footer');
    	 $del_pro = Products::delete_product($id);
		 return Redirect::to('manage_product')->with('product Deleted','Product Deleted Successfully');	
		}
		else
        {
         return Redirect::to('siteadmin');
        }	
	}
    
    public function sold_product()
    {
        
        if (Session::has('userid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            $soldrep   = Products::get_soldrep($from_date, $to_date);
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $details = Products::get_product_details();
        
            return view('siteadmin.sold_products')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('soldrep', $soldrep);
            
        }
            
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function add_product_submit()
    {
        
        if (Session::has('userid')) {
            
            
            $date = date('m/d/Y');
            $data = Input::except(array(
                '_token'
            ));
            
            $count = Input::get('count');
         
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray) - 1;
            
            
            $specificationcount = Input::get('specificationcount');
            
            $selectedsizes = Input::get('si');
           
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
            
            $productsizecount = Input::get('productsizecount');
          
            
            $filename_new_get = "";
            
            for ($i = 0; $i < $count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                $file_more_name = $file_more->getClientOriginalName();
                
                
                $move_more_img = explode('.', $file_more_name);
                
                $filename_new = $move_more_img[0] . "." . $move_more_img[1];
               
                $newdestinationPath = './assets/product/';
                
                $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                $filename_new_get .= $filename_new . "/**/";
                
            }
          
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            
            $file     = Input::file('file');
            $filename = $file->getClientOriginalName();
            
            
            $move_img = explode('.', $filename);
            $filename = $move_img[0] . "." . $move_img[1];
            
            $destinationPath = './assets/product/';
           
            $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
            
            $file_name_insert = $filename . "/**/" . $filename_new_get;
           
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('Product_Category');
            
            $Product_MainCategory = Input::get('Product_MainCategory');
            
            $Product_SubCategory = Input::get('Product_SubCategory');
            
            $Product_SecondSubCategory = Input::get('Product_SecondSubCategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            if ($Shipping_Amount == "") {
                
                $Shipping_Amount = 0;
              
            }
          
            $Description = Input::get('Description');
            
            $pquantity = Input::get('Quantity_Product');
          
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
           
            for ($i = 0; $i <= $specificationcount; $i++) {
                
                if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                    
                    $add_spec = 2;
          
                }
                
            }
            
            $check_store = Products::check_store($Product_Title, $Select_Shop);
            
            if ($check_store) {
                return Redirect::to('add_product')->with('success', 'The Product Already exist in the Store');
            } else {
                
                
                $entry = array(
                    
                    
                    'pro_title' => $Product_Title,
                    
                    'pro_mc_id' => $Product_Category,
                    
                    'pro_smc_id' => $Product_MainCategory,
                    
                    'pro_sb_id' => $Product_SubCategory,
                    
                    'pro_ssb_id' => $Product_SecondSubCategory,
                    
                    'pro_qty' => $pquantity,

                    'pro_price' => $Original_Price,
                    
                    'pro_disprice' => $Discounted_Price,
                    
                    'pro_inctax' => $inc_tax,
                    
                    'pro_shippamt' => $Shipping_Amount,
                    
                    'pro_desc' => $Description,
                    
                    'pro_isspec' => $add_spec,
                    
                    'pro_delivery' => $Delivery_Days,
                    
                    'pro_mr_id' => $Select_Merchant,
                    
                    'pro_sh_id' => $Select_Shop,
                    
                    'pro_mkeywords' => $Meta_Keywords,
                    
                    'pro_mdesc' => $Meta_Description,
                    
                    'pro_Img' => $file_name_insert,
                    
                    'pro_image_count' => $img_count,
                    
                    'pro_qty' => $pquantity,
                    
                    'created_date' => $date
               
                );
                
                $productid = Products::insert_product($entry);
          
            }
            
            if ($productid) {
                
                if ($colorcount > 0) {
                    
                    for ($i = 0; $i < $colorcount; $i++) {
                        
                        $val = Input::get('colorcheckbox' . $colorarray[$i]);
                    
                        if ($val == 1) {
                            
                            $colorentry = array(
                                'pc_pro_id' => $productid,
                                
                                'pc_co_id' => $colorarray[$i]
                                
                            );
                            
                            Products::insert_product_color_details($colorentry);
                            
                        }
                        
                        else {
                    
                            
                        }
                        
                    }
                    
                }
       
                if ($add_spec == 1) {
                  
                    for ($i = 0; $i <= $specificationcount; $i++) {
                     
                        if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                     
                        }
                        
                        else {
                       
                            $specificationentry = array(
                                'spc_pro_id' => $productid,
                                
                                'spc_sp_id' => Input::get('spec' . $i),
                                
                                'spc_value' => Input::get('spectext' . $i)
                                
                            );
                            
                            Products::insert_product_specification_details($specificationentry);
                    
                        }
                   
                    }
                
                }
                
                if ($productsizecount > 0) {
                  
                    for ($i = 0; $i < $productsizecount; $i++) {
                        
                        $val = Input::get('sizecheckbox' . $sizearray[$i]);
                        
                        if ($val == 1) {
                            
                            if (Input::get('quantity' . $sizearray[$i]) == "") {
                                
                                
                                
                                $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $sizearray[$i],
                                    
                                    'ps_volume' => 0
                                    
                                );
                                
                            }
                            
                            else {
                                
                                $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    
                                    'ps_si_id' => $sizearray[$i],
                                    
                                    'ps_volume' => Input::get('quantity' . $sizearray[$i])
                                    
                                );
                                
                            }
                            
                            Products::insert_product_size_details($productsizeentry);
                            
                        }
                        
                        else {
                            
                            
                            
                        }
                        
                    }
                    
                }
                
            }
            return Redirect::to('manage_product');
            
        }
        
        else {
            
          
            return Redirect::to('siteadmin');
            
        }
    }
       
    
    public function add_product_submitold()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $count = Input::get('count');
            
            $selectedcolors = Input::get('co');
          
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray) - 1;
          
            $specificationcount = Input::get('specificationcount');
            
            $selectedsizes = Input::get('si');
            
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
          
            $productsizecount = Input::get('productsizecount');
           
            $filename_new_get = "";
            
            for ($i = 0; $i < $count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                $file_more_name = $file_more->getClientOriginalName();
                
                $move_more_img = explode('.', $file_more_name);
                
                $filename_new = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                
                $newdestinationPath = './assets/product/';
                
                $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                
                $filename_new_get .= $filename_new . "/**/";
                
            }
            
            
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            
            $file = Input::file('file');
            
            $filename = $file->getClientOriginalName();
            
            $move_img = explode('.', $filename);
            
            $filename = $move_img[0] . str_random(8) . "." . $move_img[1];
            
            $destinationPath = './assets/product/';
            
            $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
            
            $file_name_insert = $filename . "/**/" . $filename_new_get;
           
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('Product_Category');
            
            $Product_MainCategory = Input::get('Product_MainCategory');
            
            $Product_SubCategory = Input::get('Product_SubCategory');
            
            $Product_SecondSubCategory = Input::get('Product_SecondSubCategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            $Description = Input::get('Description');
            
            $pquantity = Input::get('Quantity_Product');
            
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
           
            if ($inc_tax == 1) {
                
            }
            
            else {
                
                $inc_tax = 0;
                
            }
          
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mr_id' => $Select_Merchant,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity
           
            );
            
            $productid = Products::insert_product($entry);
            
            if ($productid) {
                
                if ($colorcount > 0) {
                    
                    for ($i = 0; $i < $colorcount; $i++) {
                    
                        $colorentry = array(
                            'pc_pro_id' => $productid,
                            
                            'pc_co_id' => $colorarray[$i]
                            
                        );
                        
                        Products::insert_product_color_details($colorentry);
                        
                    }
                    
                }
                
                for ($i = 0; $i <= $specificationcount; $i++) {
                    
                    $specificationentry = array(
                        'spc_pro_id' => $productid,
                        
                        'spc_sp_id' => Input::get('spec' . $i),
                        
                        'spc_value' => Input::get('spectext' . $i)
                        
                    );
                    
                    Products::insert_product_specification_details($specificationentry);
                 
                }
                
                if ($productsizecount > 0) {
                    
                    for ($i = 0; $i < $productsizecount; $i++) {
                        
                        $val = Input::get('sizecheckbox' . $sizearray[$i]);
                        
                        if ($val == 1) {
                            
                            $productsizeentry = array(
                                'ps_pro_id' => $productid,
                                
                                'ps_si_id' => $sizearray[$i],
                                
                                'ps_volume' => Input::get('quantity' . $sizearray[$i])
                                
                            );
                            
                            Products::insert_product_size_details($productsizeentry);
                            
                        }
                        
                        else {
                            
                            
                            
                        }
                        
                    }
                    
                }
                
            }
       
            return Redirect::to('manage_product');
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
           
        }
      
    }
  
    
    public function edit_product_submit()
    {
     
        if (Session::has('userid')) {
            
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
       
            $id = Input::get('product_edit_id');
            
            $productid = Input::get('product_edit_id');
            
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray);
         
            $returncolor = Products::delete_product_color($id);
            
            $returnsize = Products::delete_product_size($id);
            
            $returnspec = Products::delete_product_spec($id);
            
            $specificationcount = Input::get('specificationcount');
          
            $selectedsizes = Input::get('si');
          
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
            
            $productsizecount = Input::get('productsizecount');
                     
            $img_count = Input::get('count');
            
            $filename_new_get = "";
            
            for ($i = 0; $i < $img_count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                if ($file_more == "") {
                    
                    $dile_name_new_get = Input::get('file_more_new' . $i);
                    
                    $filename_new_get .= $dile_name_new_get . "/**/";
                    
                } else {
                    
                    $file_more_name = $file_more->getClientOriginalName();
                    
                    $move_more_img = explode('.', $file_more_name);
                    
                    $filename_new = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                    
                    $newdestinationPath = './assets/product/';
                    
                    $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                    
                    $filename_new_get .= $filename_new . "/**/";
                    
                }
         
            }
           
            $file = Input::file('file');
            
            if ($file == "") {
                
                $filename = Input::get('file_new');
                
            }
            
            else {
                
                $filename1 = $file->getClientOriginalName();
                
                $move_img = explode('.', $filename1);
                
                $filename = $move_img[0] . str_random(8) . "." . $move_img[1];
                
                $destinationPath = './assets/product/';
                
                $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
                
            }
                      
            $file_name_insert = $filename . "/**/" . $filename_new_get;
            
            $id = Input::get('product_edit_id');
           
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('category');
            
            $Product_MainCategory = Input::get('maincategory');
            
            $Product_SubCategory = Input::get('subcategory');
            
            $Product_SecondSubCategory = Input::get('secondsubcategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            if ($Shipping_Amount == "") {
                
                $Shipping_Amount = 0;
          
            }
            
            $Description = Input::get('Description');
           
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
            
            $pquantity = Input::get('Quantity_Product');

            $sold_out  = 1;      
            
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mr_id' => $Select_Merchant,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity,

                'sold_status' => $sold_out
             
            );
            
            $return = Products::edit_product($entry, $id);
          
            if ($colorcount > 0) {
                
                for ($i = 0; $i < $colorcount; $i++) {
                    
                    $val = Input::get('colorcheckbox' . $colorarray[$i]);
                  
                    if ($val == 1) {
                        
                        $colorentry = array(
                            'pc_pro_id' => $productid,
                            
                            'pc_co_id' => $colorarray[$i]
                            
                        );
                        
                        Products::insert_product_color_details($colorentry);
                    
                    }
                    
                    else {
                    
                    }
                    
                }
                
            }
            
            for ($i = 0; $i <= $specificationcount; $i++) {
            
                if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
              
                }
                
                else {
                    
                    $specificationentry = array(
                        'spc_pro_id' => $productid,
                        
                        'spc_sp_id' => Input::get('spec' . $i),
                        
                        'spc_value' => Input::get('spectext' . $i)
                        
                    );
                    
                    Products::insert_product_specification_details($specificationentry);
                  
                }
            
            }
            
            if ($productsizecount > 0) {
                
                for ($i = 0; $i < $productsizecount; $i++) {
                    
                    $val = Input::get('sizecheckbox' . $sizearray[$i]);
                    
                    if ($val == 1) {
                        
                        $productsizeentry = array(
                            'ps_pro_id' => $productid,
                            
                            'ps_si_id' => $sizearray[$i],
                            
                            'ps_volume' => Input::get('quantity' . $sizearray[$i])
                            
                        );
                        
                        Products::insert_product_size_details($productsizeentry);
                        
                    }
                    
                    else {
                        
                        
                        
                    }
                    
                }
                
            }
        
            return Redirect::to('manage_product')->with('block_message', 'Product Updated Successfully');
      
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
        
    public function edit_product_submitold()
    {
        
        if (Session::has('userid')) {
         
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            
            $pquantity = Input::get('Quantity_Product');
            
            $id = Input::get('product_edit_id');
            
            $productid = Input::get('product_edit_id');
            
            $returncolor = Products::delete_product_color($id);
            
            $returnsize = Products::delete_product_size($id);
            
            $returnspec = Products::delete_product_spec($id);
            
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount = count($colorarray);
            
            $specificationcount = Input::get('specificationcount');
            
            $selectedsizes = Input::get('si');
            
            $trimmedsizes = trim($selectedsizes, ",");
            
            $sizearray = explode(",", $trimmedsizes);
            
            $productsizecount = Input::get('productsizecount');
           
            $img_count = Input::get('count');
            
            $filename_new_get = "";
            
            for ($i = 0; $i < $img_count; $i++) {
                
                $file_more = Input::file('file_more' . $i);
                
                if ($file_more == "") {
                    
                    $dile_name_new_get = Input::get('file_more_new' . $i);
                    
                    $filename_new_get .= $dile_name_new_get . "/**/";
                    
                } else {
                    
                    $file_more_name = $file_more->getClientOriginalName();
                    
                    $move_more_img = explode('.', $file_more_name);
                    
                    $filename_new = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                    
                    $newdestinationPath = './assets/product/';
                    
                    $uploadSuccess_new = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                    
                    $filename_new_get .= $filename_new . "/**/";
                    
                }
            
            }
            
            $file = Input::file('file');
            
            if ($file == "") {
                
                $filename = Input::get('file_new');
                
            }
            
            else {
                
                $filename = $file->getClientOriginalName();
                
                $move_img = explode('.', $filename);
                
                $filename = $move_img[0] . str_random(8) . "." . $move_img[1];
                
                $destinationPath = './assets/deals/';
                
                $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
                
            }
            
            echo $file_name_insert = $filename . "/**/" . $filename_new_get . "<br>" . Input::get('deal_edit_id');
            
            $id = Input::get('product_edit_id');
            
            $Product_Title = Input::get('Product_Title');
            
            $Product_Category = Input::get('category');
            
            $Product_MainCategory = Input::get('maincategory');
            
            $Product_SubCategory = Input::get('subcategory');
            
            $Product_SecondSubCategory = Input::get('secondsubcategory');
            
            $Original_Price = Input::get('Original_Price');
            
            $Discounted_Price = Input::get('Discounted_Price');
            
            $Shipping_Amount = Input::get('Shipping_Amount');
            
            $Description = Input::get('Description');
            
            $Delivery_Days = Input::get('Delivery_Days');
            
            $Delivery_Policy = Input::get('Delivery_Policy');
            
            $Meta_Keywords = Input::get('Meta_Keywords');
            
            $Meta_Description = Input::get('Meta_Description');
            
            $Select_Merchant = Input::get('Select_Merchant');
            
            $Select_Shop = Input::get('Select_Shop');
            
            $inc_tax = Input::get('inctax');
            
            $add_spec = Input::get('specification');
            
            $postfb = Input::get('postfb');
            
            $img_count = Input::get('count');
            
            if ($inc_tax == 1) {
                
            }
            
            else {
                
                $inc_tax = 0;
                
            }
            
            $entry = array(
                
                'pro_title' => $Product_Title,
                
                'pro_mc_id' => $Product_Category,
                
                'pro_smc_id' => $Product_MainCategory,
                
                'pro_sb_id' => $Product_SubCategory,
                
                'pro_ssb_id' => $Product_SecondSubCategory,
                
                'pro_price' => $Original_Price,
                
                'pro_disprice' => $Discounted_Price,
                
                'pro_inctax' => $inc_tax,
                
                'pro_shippamt' => $Shipping_Amount,
                
                'pro_desc' => $Description,
                
                'pro_isspec' => $add_spec,
                
                'pro_delivery' => $Delivery_Days,
                
                'pro_mr_id' => $Select_Merchant,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity
             
            );
            
            $return = Products::edit_product($entry, $id);
            
            if ($colorcount > 0) {
                
                for ($i = 0; $i < $colorcount; $i++) {
                
                    $colorentry = array(
                        'pc_pro_id' => $productid,
                        
                        'pc_co_id' => $colorarray[$i]
                        
                    );
                    
                    Products::insert_product_color_details($colorentry);
                    
                }
                
            }
            
            if ($add_spec == 1) {
                
                for ($i = 0; $i <= $specificationcount; $i++) {
                    
                    if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                  
                    }
                    
                    else {
                        
                        $specificationentry = array(
                            'spc_pro_id' => $productid,
                            
                            'spc_sp_id' => Input::get('spec' . $i),
                            
                            'spc_value' => Input::get('spectext' . $i)
                            
                        );
                        
                        Products::insert_product_specification_details($specificationentry);
                     
                    }
                  
                }
                
            }
            
            if ($productsizecount > 0) {
                
                for ($i = 0; $i < $productsizecount; $i++) {
                    
                    $val = Input::get('sizecheckbox' . $sizearray[$i]);
                    
                    if ($val == 1) {
                        
                        $productsizeentry = array(
                            'ps_pro_id' => $productid,
                            
                            'ps_si_id' => $sizearray[$i],
                            
                            'ps_volume' => Input::get('quantity' . $sizearray[$i])
                            
                        );
                        
                        Products::insert_product_size_details($productsizeentry);
                        
                    }
                    
                    else {
                        
                        
                        
                    }
                    
                }
                
            }
        
            return Redirect::to('manage_product')->with('block_message', 'Product Updated Successfully');
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    public function product_getmaincategory()
    {
        
        $categoryid = $_GET['id'];
        
        $main_category = Products::load_maincategory_ajax($categoryid);
        
        if ($main_category) {
            
            $maincategoryresult = "";
            
            $maincategoryresult .= "<option value='0'> -Select Main Category- </option>";
            
            foreach ($main_category as $main_category_ajax) {
            
                $maincategoryresult .= "<option value='" . $main_category_ajax->smc_id . "'> " . $main_category_ajax->smc_name . " </option>";
                
            }
            
            echo $maincategoryresult;
            
        }
        
        else {
            
            echo $maincategoryresult = "<option value='0'>No list available in the category </option>";
            
        }
      
    }
    
    public function product_getsubcategory()
    {
        
        $categoryid = $_GET['id'];
       
        $sub_category = Products::load_subcategory_ajax($categoryid);
        
        if ($sub_category) {
            
            $subcategoryresult = "";
            
            $subcategoryresult = "<option value='0'> -- Select sub Category-- </option>";
            
            foreach ($sub_category as $sub_category_ajax) {
                
                $subcategoryresult .= "<option value='" . $sub_category_ajax->sb_id . "'> " . $sub_category_ajax->sb_name . " </option>";
                
            }
            
            echo $subcategoryresult;
            
        }
        
        else {
            
            echo $subcategoryresult = "<option value='0'>No list available in the category </option>";
            
        }
        
    }
    
    
    
    public function product_getsecondsubcategory()
    {
        
        $categoryid = $_GET['id'];
        
        $secondsub_category = Products::get_second_sub_category_ajax($categoryid);
        
        if ($secondsub_category) {
            
            $secondsubcategoryresult = "";
            
            $secondsubcategoryresult = "<option value='0'> -- Select Second Sub Category-- </option>";
            
            foreach ($secondsub_category as $second_sub_category_ajax) {
                
                $secondsubcategoryresult .= "<option value='" . $second_sub_category_ajax->ssb_id . "'> " . $second_sub_category_ajax->ssb_name . " </option>";
                
            }
            
            echo $secondsubcategoryresult;
            
        }
        
        else {
            
            echo $secondsubcategoryresult = "<option value='0'>No list available in the category </option>";
            
        }
        
    }
    
    
    
    public function product_getcolor()
    {
        
        $colorid = $_GET['id'];
        
        if ($_GET['co_text_box'] == "") {
            
            $get_text_array = 0;
            
        }
        
        else {
            
            $get_text_array = trim($_GET['co_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
            
            $countval = count($result_array);
            
        }
        
        $array_push_values = array();
        
        for ($i = 0; $i < $countval; $i++) {
            
            array_push($array_push_values, $result_array[$i]);
            
        }
       
        $result_colorname = Products::get_colorname_ajax($colorid);
        
        foreach ($result_colorname as $result_colorname_ajax) {
         
            $returnvalue = $result_colorname_ajax->co_name . "," . $result_colorname_ajax->co_id . "," . $result_colorname_ajax->co_code;
       
        }
        
        if (in_array($colorid, $array_push_values)) {
            
            return $returnvalue . ",failed";
            
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
        
        
    }
    
    
    
    public function product_getcolor_edit()
    {
        
        $colorid = $_GET['id'];
        
        if ($_GET['co_text_box'] == "") {
            
            $get_text_array = 0;
        
        }
        
        else {
          
            $get_text_array = trim($_GET['co_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
            
            $countval = count($result_array);
          
        }
        
        if ($get_text_array == 0) {
            
            $array_push_values = array();
            
            for ($i = 0; $i < $countval; $i++) {
                
                array_push($array_push_values, $result_array[$i]);
                
            }
       
        }
        
        else {
            
            $array_push_values = array();
            
            for ($i = 0; $i <= $countval; $i++) {
                
                array_push($array_push_values, $result_array[$i]);
                
            }
            
            
            
        }
       
        $result_colorname = Products::get_colorname_ajax($colorid);
        
        foreach ($result_colorname as $result_colorname_ajax) {
       
            $returnvalue = $result_colorname_ajax->co_name . "," . $result_colorname_ajax->co_id . "," . $result_colorname_ajax->co_code;
         
        }
        
        if (in_array($colorid, $array_push_values)) {
            
            return $returnvalue . ",failed";
            
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
    }
    
    
    
    public function product_getsize()
    {
        
        $sizeid = $_GET['id'];
        
        if ($_GET['si_text_box'] == "") {
            
            $get_text_array = 0;
            
        }
        
        else {
          
            $get_text_array = trim($_GET['si_text_box'], ',');
            
            $result_array = explode(',', $get_text_array);
          
            $countval = count($result_array);
            
        }
        
        $array_push_values = array();
        
        for ($i = 0; $i < $countval; $i++) {
            
            array_push($array_push_values, $result_array[$i]);
            
        }
        
        $result_sizename = Products::get_sizename_ajax($sizeid);
        
        foreach ($result_sizename as $result_sizename_ajax) {
            
                     $returnvalue = $result_sizename_ajax->si_name . "," . $result_sizename_ajax->si_id . "," . $result_sizename_ajax->si_name;
        
        }
        
        if (in_array($sizeid, $array_push_values)) {
            
            return $returnvalue . ",failed";
            
        }
        
        else {
            
            return $returnvalue . ",success";
            
        }
        
        
        
    }
    
    
    public function product_edit_getmaincategory()
    {
        
        $id = $_GET['edit_id'];
        
        $main_cat = Products::get_main_category_ajax_edit($id);
        
        if ($main_cat) {
            
            $return = "";
            
            foreach ($main_cat as $main_cat_ajax) {
                
                $return = "<option value='" . $main_cat_ajax->smc_id . "' selected> " . $main_cat_ajax->smc_name . " </option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            
            echo $return = "<option value='0'> No datas found </option>";
            
        }
        
    }
    
    
    
    public function product_edit_getsubcategory()
    {
        
        $id = $_GET['edit_sub_id'];
        
        $main_cat = Products::get_sub_category_ajax_edit($id);
        
        if ($main_cat) {
            
            $return = "";
            
            foreach ($main_cat as $main_cat_ajax) {
                
                $return = "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name . " </option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            
            echo $return = "<option value='0'> No datas found </option>";
            
        }
        
    }
  
    
    public function product_getmerchantshop()
    {
        
        $id = $_GET['id'];
        
        $shop_det = Products::get_product_details_formerchant($id);
       
        if ($shop_det) {
            
            $return = "";
        
            foreach ($shop_det as $shop_det_ajax) {
                
                $return .= "<option value='" . $shop_det_ajax->stor_id . "' selected> " . $shop_det_ajax->stor_name . " </option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            
            echo $return = "<option value='0'> No datas found </option>";
            
        }
      
    }
    
    
    
    public function Product_edit_getsecondsubcategory()
    {
        
        $id = $_GET['edit_second_sub_id'];
       
        $main_cat = Products::get_second_sub_category_ajax_edit($id);
        
        if ($main_cat) {
            
            $return = "";
            
            foreach ($main_cat as $main_cat_ajax) {
                
                $return = "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name . " </option>";
                
            }
            
            echo $return;
            
        }
        
        else {
            
            echo $return = "<option value='0'> No datas found </option>";
            
        }
        
    }
    
    
    
    public function block_product($id, $status)
    {
        
        if (Session::has('userid')) {
            
            $entry = array(
                
                'pro_status' => $status
                
            );
            
            Products::block_product_status($id, $entry);
            
            if ($status == 1) {
                
                return Redirect::to('manage_product')->with('block_message', 'Product unblocked');
                
            }
            
            else if ($status == 0) {
                
                return Redirect::to('manage_product')->with('block_message', 'Product Blocked');
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function product_details($id)
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $return = Products::get_product_view($id);
            
            return view('siteadmin.product_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_list', $return);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    public function manage_product_shipping_details()
    {
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
           
            $shippingdetails = Products::get_shipping_details();
            
                        
            $qty = Products::get_qty_details();
            
            $amt = Products::get_amt_details();
            
            return view('siteadmin.shipping_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('shippingdetails', $shippingdetails)->with('qty', $qty)->with('amt', $amt);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    public function manage_cashondelivery_details()
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $coddetails = Products::get_cod_details();
            
            $qty = Products::get_qtycod_details();
            
            $amt = Products::get_amtcod_details();
          
            return view('siteadmin.cod_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('qty', $qty)->with('amt', $amt)->with('coddetail', $coddetails);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
      
    }
    
      
    public function add_estimated_zipcode()
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::get_zipcode();
            
            return view('siteadmin.add_estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
       
        }
        
        else {
            
            return Redirect::to('siteadmin');
          
        }
        
    }
    
    
    
    public function add_estimated_zipcode_submit()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $rule = array(
                
                'zip_code' => 'required|numeric',
                
                'zip_code2' => 'required|numeric',
                
                'delivery_days' => 'required|numeric'
                
            );
            
            $validator = Validator::make($data, $rule);
            
            if ($validator->fails()) {
                
                return Redirect::to('add_estimated_zipcode')->withErrors($validator->messages())->withInput();
             
            }
            
            else {
                
                $check1 = Products::check_zip_code(Input::get('zip_code'));
                
                if ($check1) {
                    
                    return Redirect::to('add_estimated_zipcode')->with('success', 'Start code already exist')->withInput();
                    
                }
                
                else {
                    
                    $check2 = Products::check_zip_code(Input::get('zip_code2'));
                    
                    if ($check2) {
                        
                        return Redirect::to('add_estimated_zipcode')->with('success', 'End code already exist')->withInput();
                        
                    }
                    
                    else {
                        
                        $check3 = Products::check_zip_code_range(Input::get('zip_code'), Input::get('zip_code2'));
                        
                        if ($check3) {
                            
                            return Redirect::to('add_estimated_zipcode')->with('success', 'The Range Overlaps')->withInput();
                            
                        } else {
                            
                            $entry = array(
                                
                                'ez_code_series' => Input::get('zip_code'),
                                
                                'ez_code_series_end' => Input::get('zip_code2'),
                                
                                'ez_code_days' => Input::get('delivery_days')
                                
                            );
                         
                            $return = Products::save_zip_code($entry);
                            
                            return Redirect::to('estimated_zipcode')->with('success', 'Record Updated Successfully');
                            
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function estimated_zipcode()
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::get_zipcode();
            
            return view('siteadmin.estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
            
            
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
         
        }
        
    }
    
    
    
    public function edit_zipcode($id)
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menus');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $zipcode = Products::edit_zip_code($id);
            
            return view('siteadmin.edit_estimated_zipcode')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('zipcode', $zipcode);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
    
    
    
    public function edit_estimated_zipcode_submit()
    {
        
        if (Session::has('userid')) {
            
            $data = Input::except(array(
                '_token'
            ));
            
            $rule = array(
                
                'zip_code' => 'required|numeric',
                
                'zip_code2' => 'required|numeric',
                
                'delivery_days' => 'required|numeric'
                
            );
            
            $validator = Validator::make($data, $rule);
            
            if ($validator->fails()) {
                
                return Redirect::to('edit_zipcode/' . Input::get('id'))->withErrors($validator->messages())->withInput();
           
                
            }
            
            else {
                
                $check = Products::check_zip_code_edit(Input::get('id'), Input::get('zip_code'));
                
                if ($check) {
                    
                    return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', 'Start code already exist')->withInput();
                    
                }
                
                else {
                    
                    $check1 = Products::check_zip_code_edit(Input::get('id'), Input::get('zip_code2'));
                    
                    if ($check1) {
                        
                        return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', 'End code already exist')->withInput();
                        
                    }
                    
                    else {
                        
                        $check2 = Products::check_zip_code_edit_range(Input::get('id'), Input::get('zip_code'), Input::get('zip_code2'));
                        
                        if ($check2) {
                            
                            return Redirect::to('edit_zipcode/' . Input::get('id'))->with('success', 'The Range Overlaps')->withInput();
                            
                        }
                        
                        else {
                            
                            $entry = array(
                                
                                'ez_code_series' => Input::get('zip_code'),
                                
                                'ez_code_series_end' => Input::get('zip_code2'),
                                
                                'ez_code_days' => Input::get('delivery_days')
                                
                            );
                            
                            
                            
                            $return = Products::update_zip_code($entry, Input::get('id'));
                            
                            return Redirect::to('estimated_zipcode')->with('success', 'Record Updated Successfully');
                            
                        }
                        
                    }
                    
                }
                
                
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }
  
    
    public function block_zipcode($id, $status)
    {
        
        if (Session::has('userid')) {
            
            Products::block_zip_code($id, $status);
            
            if ($status == 1) {
                
                return Redirect::to('estimated_zipcode')->with('success', 'Record Activated Successfully');
            } else {
                
                return Redirect::to('estimated_zipcode')->with('success', 'Record Blocked Successfully');
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    //Product Review
    public function manage_review()
    {
        if (Session::has('userid')) {
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');

            $get_review = Products::get_product_review();

             return view('siteadmin.manage_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('get_review', $get_review);
        }
        else{
            return Redirect::to('siteadmin');
        }
    }
     public function edit_review($id)
    {
        
        if (Session::has('userid')) {
            
            $adminheader = view('siteadmin.includes.admin_header')->with("routemenu", "products");
            
            $adminleftmenus = view('siteadmin.includes.admin_left_menu_product');
            
            $adminfooter = view('siteadmin.includes.admin_footer');
            
            $result = Products::edit_review($id);
     
            return view('siteadmin.edit_review')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('result',$result);
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }

    public function edit_review_submit()
    {
        if (Session::has('userid')) {
            $now = date('Y-m-d H:i:s');
            
            $inputs = Input::all();
            $review_id = Input::get('comment_id');
            $review_title = Input::get('review_title');
            $review_comment = Input::get('review_comment');

            $entry = array(
                
                'title' => $review_title,
                
                'comments' => $review_comment,
             
            );
            $return = Products::update_review($entry, $review_id);
            return Redirect::to('manage_review');
        }
        else{
            return Redirect::to('siteadmin');
        }
    }
    public function delete_review($id)
    {
        if(Session::has('userid'))
        {
         $adminheader       = view('siteadmin.includes.admin_header')->with("routemenu","settings");  
         $adminleftmenus    = view('siteadmin.includes.admin_left_menus');
         $adminfooter       = view('siteadmin.includes.admin_footer');
         $del_review = Products::delete_review($id);
         return Redirect::to('manage_review')->with('product Deleted','Review Deleted Successfully'); 
        }
        else
        {
         return Redirect::to('siteadmin');
        }
    }
        public function block_review($id, $status)
    {
        
        if (Session::has('userid')) {
            
            $entry = array(
                
                'status' => $status
                
            );
            
            Products::block_review_status($id, $entry);
            
            if ($status == 0) {
                
                return Redirect::to('manage_review')->with('block_message', 'Product unblocked');
                
            }
            
            else if ($status == 1) {
                
                return Redirect::to('manage_review')->with('block_message', 'Product Blocked');
                
            }
            
        }
        
        else {
            
            return Redirect::to('siteadmin');
            
        }
        
    }   
 
}
