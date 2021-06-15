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
use App\Products;
use App\Auction;
use App\Customer;
use App\Transactions;
use App\Merchantadminlogin;
use App\Merchantproducts;
use App\Merchantsettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantproductController extends Controller
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
    
    public function add_product()
    {
        $adminheader          = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
        $adminleftmenus       = view('sitemerchant.includes.merchant_left_menu_product');
        $adminfooter          = view('sitemerchant.includes.merchant_footer');
        $productcategory      = Products::get_product_category();
        $productcolor         = Products::get_product_color();
        $productsize          = Products::get_product_size();
        $productspecification = Products::get_product_specification();
         
        return view('sitemerchant.add_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcategory', $productcategory)->with('productcolor', $productcolor)->with('productsize', $productsize)->with('productspecification', $productspecification);
    }
    
    public function mer_edit_product($id)
    {
        
        if (Session::get('merchantid')) {
            $merchantid = Session::get('merchantid');
            
            $merid          = Session::get('merchantid');
            $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
            $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_product');
            $adminfooter    = view('sitemerchant.includes.merchant_footer');
            
            $category              = Products::get_product_category();
            $product_list          = Products::get_product($id);
            $productcolor          = Products::get_product_color();
            $merchantdetails       = Products::get_merchant_details();
            $productsize           = Products::get_product_size();
            $productspecification  = Products::get_product_specification();
            $existingspecification = Products::get_product_exist_specification($id);
            $existingcolor         = Products::get_product_exist_color($id);
            $existingsize          = Products::get_product_exist_size($id);
          
            $product_return = Products::get_induvidual_product_detail_merchant($id, $merid);
            
            if ($product_return) {
                return view('sitemerchant.edit_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('productcolor', $productcolor)->with('category', $category)->with('product_list', $product_list)->with('merchantdetails', $merchantdetails)->with('productspecification', $productspecification)->with('productsize', $productsize)->with('existingspecification', $existingspecification)->with('existingcolor', $existingcolor)->with('existingsize', $existingsize);
                
            }
        } else {
            return Redirect::to('sitemerchant');
        }
    
    }
    
    public function manage_product()
    {
        $merchant_id = Session::get('merchantid');
        
        $from_date       = Input::get('from_date');
        $to_date         = Input::get('to_date');
        $allprod_reports = Merchantproducts::allprod_reports($from_date, $to_date, $merchant_id);
        $adminheader     = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
        $adminleftmenus  = view('sitemerchant.includes.merchant_left_menu_product');
        $adminfooter     = view('sitemerchant.includes.merchant_footer');
        $details         = Merchantproducts::get_product_details($merchant_id);
        $delete_product  = Merchantproducts::get_order_details();
        return view('sitemerchant.manage_product')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('allprod_reports', $allprod_reports)->with('delete_product', $delete_product);
    }
    
    public function sold_product()
    {
        if (Session::get('merchantid')) {
            
            $merchant_id = Session::get('merchantid');
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            
            $adminheader          = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
            $adminleftmenus       = view('sitemerchant.includes.merchant_left_menu_product');
            $adminfooter          = view('sitemerchant.includes.merchant_footer');
            $details              = Merchantproducts::get_product_details($merchant_id);
            $merchant_soldreports = Merchantproducts::merchant_soldreports($from_date, $to_date, $merchant_id);
            
            return view('sitemerchant.sold_products')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_details', $details)->with('merchant_soldreports', $merchant_soldreports);
        } else {
            
            return Redirect::to('sitemerchant');
            
        }
    }

    public function mer_add_product_submitnew()
    {
        
        $merid = Session::get('merchantid');
        
        
        if ($merid) {
            
            
            $meridd = Session::get('merchantid');
            
            $date1 = date('m/d/Y');
            $data  = Input::except(array(
                '_token'
            ));
            
            $count = Input::get('count');
           
            $selectedcolors = Input::get('co');
            
            $trimmedselectedcolors = trim($selectedcolors, ",");
            
            $colorarray = explode(",", $trimmedselectedcolors);
            
            $colorcount         = count($colorarray) - 1;
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
            
          
            $admin = '0';
            
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
                
                'pro_mr_id' => $meridd,
                
                'pro_sh_id' => $Select_Shop,
                
                'pro_mkeywords' => $Meta_Keywords,
                
                'pro_mdesc' => $Meta_Description,
                
                'pro_Img' => $file_name_insert,
                
                'pro_image_count' => $img_count,
                
                'pro_qty' => $pquantity,
                
                'created_date' => $date1
                
                
                
            );
            
            $productid = Products::insert_product($entry);
            
            
            
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
     
    }
    
    public function mer_add_product_submit()
    {
        
      
        if (Session::get('merchantid')) {
            
            $data  = Input::except(array(
                '_token'
            ));
            $count = Input::get('count');
            
            $selectedcolors        = Input::get('co');
            $trimmedselectedcolors = trim($selectedcolors, ",");
            $colorarray            = explode(",", $trimmedselectedcolors);
            $colorcount            = count($colorarray) - 1;
            
            $date1 = date('m/d/Y');
            
            
            $specificationcount = Input::get('specificationcount');
            $selectedsizes      = Input::get('si');
            
            $trimmedsizes     = trim($selectedsizes, ",");
            $sizearray        = explode(",", $trimmedsizes);
            $productsizecount = Input::get('productsizecount');
            
            
            $filename_new_get = "";
            for ($i = 0; $i < $count; $i++) {
                $file_more          = Input::file('file_more' . $i);
                $file_more_name     = $file_more->getClientOriginalName();
                $move_more_img      = explode('.', $file_more_name);
                $filename_new       = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                $newdestinationPath = './assets/product/';
                $uploadSuccess_new  = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                $filename_new_get .= $filename_new . "/**/";
            }
            
            $now              = date('Y-m-d H:i:s');
            $inputs           = Input::all();
            $file             = Input::file('file');
            $filename         = $file->getClientOriginalName();
            $move_img         = explode('.', $filename);
            $filename         = $move_img[0] . str_random(8) . "." . $move_img[1];
            $destinationPath  = './assets/product/';
            $uploadSuccess    = Input::file('file')->move($destinationPath, $filename);
            $file_name_insert = $filename . "/**/" . $filename_new_get;
            
            $Product_Title             = Input::get('Product_Title');
            $Product_Category          = Input::get('Product_Category');
            $Product_MainCategory      = Input::get('Product_MainCategory');
            $Product_SubCategory       = Input::get('Product_SubCategory');
            $Product_SecondSubCategory = Input::get('Product_SecondSubCategory');
            $Original_Price            = Input::get('Original_Price');
            $Discounted_Price          = Input::get('Discounted_Price');
            $Shipping_Amount           = Input::get('Shipping_Amount');
            if ($Shipping_Amount == "") {
                $Shipping_Amount = 0;
                
            }
            
            $Description = Input::get('Description');
            $pquantity   = Input::get('Quantity_Product');
          
            $Delivery_Days    = Input::get('Delivery_Days');
            $Delivery_Policy  = Input::get('Delivery_Policy');
            $Meta_Keywords    = Input::get('Meta_Keywords');
            $Meta_Description = Input::get('Meta_Description');
            $Select_Merchant  = Input::get('Select_Merchant');
            $Select_Shop      = Input::get('Select_Shop');
            $inc_tax          = Input::get('inctax');
            $add_spec         = Input::get('specification');
            $postfb           = Input::get('postfb');
            $img_count        = Input::get('count');
           
            for ($i = 0; $i <= $specificationcount; $i++) {
                if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                    $add_spec = 2;
                    
                }
            }
            
                $entry     = array(
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
                'created_date' => $date1
                
            );
            $productid = Products::insert_product($entry);
            
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
                        } else {
                            
                        }
                    }
                }
                
                
                if ($add_spec == 1) {
                    
                    for ($i = 0; $i <= $specificationcount; $i++) {
                        
                        if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                            
                            
                            
                            
                        } else {
                            
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
                            } else {
                                $productsizeentry = array(
                                    'ps_pro_id' => $productid,
                                    'ps_si_id' => $sizearray[$i],
                                    'ps_volume' => Input::get('quantity' . $sizearray[$i])
                                );
                            }
                            Products::insert_product_size_details($productsizeentry);
                        } else {
                            
                        }
                    }
                }
            }
            
            
            
            return Redirect::to('mer_manage_product')->with('block_message', 'Product Added Successfully');
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    public function mer_edit_product_submit()
    {
        
        $now    = date('Y-m-d H:i:s');
        $inputs = Input::all();
        
        
        $id                    = Input::get('product_edit_id');
        $productid             = Input::get('product_edit_id');
        $selectedcolors        = Input::get('co');
        $trimmedselectedcolors = trim($selectedcolors, ",");
        $colorarray            = explode(",", $trimmedselectedcolors);
        $colorcount            = count($colorarray);
        
        
        $returncolor = Products::delete_product_color($id);
        $returnsize  = Products::delete_product_size($id);
        $returnspec  = Products::delete_product_spec($id);
        
        $specificationcount = Input::get('specificationcount');
        
        
        $selectedsizes = Input::get('si');
        
        $trimmedsizes = trim($selectedsizes, ",");
        $sizearray    = explode(",", $trimmedsizes);
        
        $productsizecount = Input::get('productsizecount');
     
        $img_count        = Input::get('count');
        $filename_new_get = "";
        for ($i = 0; $i < $img_count; $i++) {
            $file_more = Input::file('file_more' . $i);
            if ($file_more == "") {
                $dile_name_new_get = Input::get('file_more_new' . $i);
                $filename_new_get .= $dile_name_new_get . "/**/";
            } else {
                $file_more_name     = $file_more->getClientOriginalName();
                $move_more_img      = explode('.', $file_more_name);
                $filename_new       = $move_more_img[0] . str_random(8) . "." . $move_more_img[1];
                $newdestinationPath = './assets/product/';
                $uploadSuccess_new  = Input::file('file_more' . $i)->move($newdestinationPath, $filename_new);
                $filename_new_get .= $filename_new . "/**/";
            }
            
        }
        
        $file = Input::file('file');
        if ($file == "") {
            $filename = Input::get('file_new');
        } else {
            $filename        = $file->getClientOriginalName();
            $move_img        = explode('.', $filename);
            $filename        = $move_img[0] . str_random(8) . "." . $move_img[1];
            $destinationPath = './assets/deals/';
            $uploadSuccess   = Input::file('file')->move($destinationPath, $filename);
        }
        
        $file_name_insert = $filename . "/**/" . $filename_new_get;
        $id               = Input::get('product_edit_id');
        
        
        $Product_Title             = Input::get('Product_Title');
        $Product_Category          = Input::get('category');
        $Product_MainCategory      = Input::get('maincategory');
        $Product_SubCategory       = Input::get('subcategory');
        $Product_SecondSubCategory = Input::get('secondsubcategory');
        $Original_Price            = Input::get('Original_Price');
        $Discounted_Price          = Input::get('Discounted_Price');
        $Shipping_Amount           = Input::get('Shipping_Amount');
        if ($Shipping_Amount == "") {
            $Shipping_Amount = 0;
            
        }
        $Description = Input::get('Description');
        
        $Delivery_Days    = Input::get('Delivery_Days');
        $Delivery_Policy  = Input::get('Delivery_Policy');
        $Meta_Keywords    = Input::get('Meta_Keywords');
        $Meta_Description = Input::get('Meta_Description');
        $Select_Merchant  = Input::get('Select_Merchant');
        $Select_Shop      = Input::get('Select_Shop');
        $inc_tax          = Input::get('inctax');
        $add_spec         = Input::get('specification');
        $postfb           = Input::get('postfb');
        $img_count        = Input::get('count');
        $pquantity        = Input::get('Quantity_Product');
        $sold_out         = 1;     
       
        $entry  = array(
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
                    
                } else {
                    
                }
            }
        }
        for ($i = 0; $i <= $specificationcount; $i++) {
            
            if (Input::get('spec' . $i) == 0 || Input::get('spectext' . $i == "")) {
                
                
                
            } else {
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
                } else {
                    
                }
            }
        }
        
        return Redirect::to('mer_manage_product')->with('block_message', 'Product Updated Successfully');
    }
    
    public function product_getmaincategory()
    {
        $categoryid = $_GET['id'];
        
        $main_category = Merchantproducts::load_maincategory_ajax($categoryid);
    
        if ($main_category) {
            $maincategoryresult = "";
            $maincategoryresult .= "<option value='0'> -Select Main Category- </option>";
            foreach ($main_category as $main_category_ajax) {
            $maincategoryresult .= "<option value='" . $main_category_ajax->smc_id . "'> " . $main_category_ajax->smc_name . " </option>";
            }
            echo $maincategoryresult;
        } else {
            echo $maincategoryresult = "<option value='0'>No list available in the category </option>";
        }
        
    }

    public function product_getsubcategory()
    {
        $categoryid = $_GET['id'];
        
        $sub_category = Merchantproducts::load_subcategory_ajax($categoryid);
        if ($sub_category) {
            $subcategoryresult = "";
            $subcategoryresult = "<option value='0'> -- Select sub Category-- </option>";
            foreach ($sub_category as $sub_category_ajax) {
                $subcategoryresult .= "<option value='" . $sub_category_ajax->sb_id . "'> " . $sub_category_ajax->sb_name . " </option>";
            }
            echo $subcategoryresult;
        } else {
            echo $subcategoryresult = "<option value='0'>No list available in the category </option>";
        }
    }
    
    public function product_getsecondsubcategory()
    {
        $categoryid         = $_GET['id'];
        $secondsub_category = Merchantproducts::get_second_sub_category_ajax($categoryid);
        if ($secondsub_category) {
            $secondsubcategoryresult = "";
            $secondsubcategoryresult = "<option value='0'> -- Select Second Sub Category-- </option>";
            foreach ($secondsub_category as $second_sub_category_ajax) {
                $secondsubcategoryresult .= "<option value='" . $second_sub_category_ajax->ssb_id . "'> " . $second_sub_category_ajax->ssb_name . " </option>";
            }
            echo $secondsubcategoryresult;
        } else {
            echo $secondsubcategoryresult = "<option value='0'>No list available in the category </option>";
        }
    }
    
    public function product_getcolor()
    {
        
        $colorid          = $_GET['id'];
        $result_colorname = Merchantproducts::get_colorname_ajax($colorid);
        
        foreach ($result_colorname as $result_colorname_ajax) {
            
            $returnvalue = $result_colorname_ajax->co_name;
            
        }
        echo $returnvalue;
    }
    
    public function product_edit_getmaincategory()
    {
        $id       = $_GET['edit_id'];
        $main_cat = Merchantproducts::get_main_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->smc_id . "' selected> " . $main_cat_ajax->smc_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function product_edit_getsubcategory()
    {
        $id       = $_GET['edit_sub_id'];
        $main_cat = Merchantproducts::get_sub_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->sb_id . "' selected> " . $main_cat_ajax->sb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function Product_edit_getsecondsubcategory()
    {
        $id = $_GET['edit_second_sub_id'];
        
        $main_cat = Merchantproducts::get_second_sub_category_ajax_edit($id);
        if ($main_cat) {
            $return = "";
            foreach ($main_cat as $main_cat_ajax) {
                $return = "<option value='" . $main_cat_ajax->ssb_id . "' selected> " . $main_cat_ajax->ssb_name . " </option>";
            }
            echo $return;
        } else {
            echo $return = "<option value='0'> No datas found </option>";
        }
    }
    
    public function block_product($id, $status)
    {
        $entry = array(
            'pro_status' => $status
        );
        Merchantproducts::block_product_status($id, $entry);
        if ($status == 1) {
            return Redirect::to('mer_manage_product')->with('block_message', 'Product unblocked');
        } else if ($status == 0) {
            return Redirect::to('mer_manage_product')->with('block_message', 'Product Blocked');
        }
    }
    
    public function product_details($id)
    {
        $adminheader    = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
        $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_product');
        $adminfooter    = view('sitemerchant.includes.merchant_footer');
        $return         = Merchantproducts::get_product_view($id);
        return view('sitemerchant.product_details')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('product_list', $return);
    }
    
    public function manage_product_shipping_details()
    {
        $adminheader      = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
        $adminleftmenus   = view('sitemerchant.includes.merchant_left_menu_product');
        $adminfooter      = view('sitemerchant.includes.merchant_footer');
        $merid            = Session::get('merchantid');
        $getproductidlist = Merchantproducts::getproductidlist($merid);
        if ($getproductidlist) {
            $productlist     = $getproductidlist[0]->proid;
            $shippingdetails = Merchantproducts::get_shipping_details($productlist);
        } else {
            $shippingdetails = array();
        }
        
        return view('sitemerchant.shipping_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('shippingdetails', $shippingdetails);
    }

    public function manage_cashondelivery_details()
    {
        $merid            = Session::get('merchantid');
        $adminheader      = view('sitemerchant.includes.merchant_header')->with('routemenu', "products");
        $adminleftmenus   = view('sitemerchant.includes.merchant_left_menu_product');
        $adminfooter      = view('sitemerchant.includes.merchant_footer');
       
        $merid            = Session::get('merchantid');
        $getproductidlist = Merchantproducts::getproductidlist($merid);
        if ($getproductidlist) {
            $productlist = $getproductidlist[0]->proid;
            $coddetails  = Merchantproducts::get_cod_details($productlist);
        } else {
            $coddetails = array();
        }
                
        return view('sitemerchant.cod_list')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('coddetail', $coddetails);
    }
	
    public function delete_product($id)
		{
			
		if (Session::get('merchantid'))
			{
			
			 $adminheader 		= view('sitemerchant.includes.merchant_header')->with('routemenu',"products");	
			 $adminleftmenus	= view('sitemerchant.includes.merchant_left_menu_product');
			 $adminfooter 		= view('sitemerchant.includes.merchant_footer');

		 $del_pro = Merchantproducts::delete_product($id);
			
		return Redirect::to('manage_product')->with('product Deleted','Product Deleted Successfully');	
		}
		else
        {
        return Redirect::to('sitemerchant');
        }	
	   }

}
