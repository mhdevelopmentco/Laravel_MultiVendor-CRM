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
use App\MerchantTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MerchantTransactionController extends Controller
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
    
    public function show_merchant_transactions()
    {
        if (Session::has('merchantid')) {
            $adminheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $adminfooter    = view('sitemerchant.includes.merchant_footer');
            $adminleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
           
            $producttransactioncnt = MerchantTransactions::get_producttransaction();
            $dealtransactioncnt    = MerchantTransactions::get_dealstransaction();
            $auctiontransactioncnt = MerchantTransactions::get_auctiontransaction();
         
            $producttoday  = MerchantTransactions::get_producttoday_order();
            $produst7days  = MerchantTransactions::get_product7days_order();
            $product30days = MerchantTransactions::get_product30days_order();
            
            $dealstoday  = MerchantTransactions::get_dealstoday_order();
            $deals7days  = MerchantTransactions::get_deals7days_order();
            $deals30days = MerchantTransactions::get_deals30days_order();
            
            $auctiontoday     = MerchantTransactions::get_auctiontoday_order();
            $auction7days     = MerchantTransactions::get_auction7days_order();
            $auction30days    = MerchantTransactions::get_auction30days_order();
            $merid            = Session::get('merchantid');
            $getproductidlist = Merchantproducts::getproductidlist($merid);
            $productlist      = $getproductidlist[0]->proid;
            
            $getauctionidlistrs = Merchant::getauctionidlist($merid);
            $getauctionidlist   = $getauctionidlistrs[0]->proid;
            
            $productchartdetails = MerchantTransactions::get_chart_product_details($productlist);
            $dealchartdetails    = MerchantTransactions::get_chart_deals_details($productlist);
            $auctionchartdetails = MerchantTransactions::get_chart_auction_details($getauctionidlist);
            
            
            return view('sitemerchant.merchant_transactiondashboard')->with('merchantheader', $adminheader)->with('merchantfooter', $adminfooter)->with('merchantleftmenus', $adminleftmenus)->with('producttoday', $producttoday)->with('produst7days', $produst7days)->with('product30days', $product30days)->with('dealstoday', $dealstoday)->with('deals7days', $deals7days)->with('deals30days', $deals30days)->with('auctiontoday', $auctiontoday)->with('auction7days', $auction7days)->with('auction30days', $auction30days)->with('producttransactioncnt', $producttransactioncnt)->with('dealtransactioncnt', $dealtransactioncnt)->with('auctiontransactioncnt', $auctiontransactioncnt)->with('productchartdetails', $productchartdetails)->with('dealchartdetails', $dealchartdetails)->with('auctionchartdetails', $auctionchartdetails);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
  
    public function product_all_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merid            = Session::get('merchantid');
            $getproductidlist = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist      = $getproductidlist[0]->proid;
                $orderdetails     = MerchantTransactions::getproduct_all_orders($productlist);
                $alltrans_reports = MerchantTransactions::alltrans_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $alltrans_reports = array();
            } else {
                $orderdetails = array();
            }
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            
            return view('sitemerchant.product_allorders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("allorders", $orderdetails)->with("alltrans_reports", $alltrans_reports);
        }
        
        else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    
    public function product_success_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
           
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                
                $productlist  = $getproductidlist[0]->proid;
                $orderdetails = MerchantTransactions::getproduct_success_orders($productlist);
                
                $allsucessprod_reports = MerchantTransactions::allsucessprod_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allsucessprod_reports = array();                    
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.product_success_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("successorders", $orderdetails)->with("allsucessprod_reports", $allsucessprod_reports);
        }
        
        else {
            return Redirect::to('sitemerchant');
        }
    }
   
    public function product_completed_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails             = MerchantTransactions::getproduct_completed_orders($productlist);
                $allcompletedprod_reports = MerchantTransactions::allcompletedprod_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allcompletedprod_reports = array();                  
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.product_completed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("completedorders", $orderdetails)->with("allcompletedprod_reports", $allcompletedprod_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
    }
    
    
    public function product_failed_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails          = MerchantTransactions::getproduct_failed_orders($productlist);
                $allfailedprod_reports = MerchantTransactions::allfailedprod_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allfailedprod_reports = array();              
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.product_failed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("failedorders", $orderdetails)->with("allholdprod_reports", $allfailedprod_reports);
        }
        
    }
    
    
    public function product_hold_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist  = $getproductidlist[0]->proid;
                $orderdetails = MerchantTransactions::getproduct_hold_orders($productlist);
                
                $allholdprod_reports = MerchantTransactions::allholdprod_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allholdprod_reports = array();                        
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.product_hold_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("holdorders", $orderdetails)->with("allholdprod_reports", $allholdprod_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    
    
    public function cod_all_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails = MerchantTransactions::getcod_all_orders($productlist);
                
                $allprod_codreports = MerchantTransactions::allprod_codreports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allprod_codreports = array();                   
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.productcod_all_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("allorders", $orderdetails)->with("allprod_codreports", $allprod_codreports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
       
    public function cod_completed_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails = MerchantTransactions::getcod_completed_orders($productlist);
                
                $allpro_codcompleted_reports = MerchantTransactions::allpro_codcompleted_reports($from_date, $to_date, $productlist);
             } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allpro_codcompleted_reports = array();     
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.productcod_completed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("completedorders", $orderdetails)->with("allpro_codcompleted_reports", $allpro_codcompleted_reports);
            
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
  
    
    public function cod_failed_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
           
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist           = $getproductidlist[0]->proid;
                $orderdetails          = MerchantTransactions::getcod_failed_orders($productlist);
                $allprod_failedreports = MerchantTransactions::allprod_failedreports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allprod_failedreports = array();       
            } else {
                $orderdetails = array();
            }
            
            return view('sitemerchant.productcod_failed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("failedorders", $orderdetails)->with("allprod_failedreports", $allprod_failedreports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    
    public function cod_hold_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails = MerchantTransactions::getcod_hold_orders($productlist);
                
                $allprod_holdreports = MerchantTransactions::allprod_holdreports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allprod_holdreports     = array();                 
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.productcod_hold_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("holdorders", $orderdetails)->with("allprod_holdreports", $allprod_holdreports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
  
    public function merchant_deals_all_orders($merid)
    {
        
        if (Session::get('merchantid')) {
         
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
                      
            $getproductidlist = MerchantTransactions::getdeals_all_orders($merid);
            if ($getproductidlist) {
                $productlist  = $getproductidlist[0]->proid;
                $orderdetails = MerchantTransactions::get_transaction_details($productlist);
             } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                         
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.deals_allorders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("allorders", $orderdetails);
            
            
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    
    public function deals_all_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            
            $getproductidlist = Merchantproducts::getproductidlist($merid);

            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails = MerchantTransactions::get_deals_all_orders($productlist);
                $dealrepp     = MerchantTransactions::getmerchant_dealreports($from_date, $to_date, $productlist);


            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $dealrepp     = array();
            } else {
                $orderdetails = array();
            }

            return view('sitemerchant.deals_allorders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("allorders", $orderdetails)->with("dealrepp", $dealrepp);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
  
    
    public function deals_success_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                
                $orderdetails           = MerchantTransactions::getdeals_success_orders($productlist);
                $getsuccess_dealreports = MerchantTransactions::getsuccess_dealreports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $getsuccess_dealreports = array();
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.deals_success_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("successorders", $orderdetails)->with("getsuccess_dealreports", $getsuccess_dealreports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    public function deals_completed_orders()
    {
        if (Session::get('merchantid')) {
       
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
           
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                $orderdetails        = MerchantTransactions::getdeals_completed_orders($productlist);
                $getcomp_dealreports = MerchantTransactions::getcomp_dealreports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $getcomp_dealreports = array();      
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.deals_completed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("completedorders", $orderdetails)->with("getcomp_dealreports", $getcomp_dealreports);
        } else {
            return Redirect::to('sitemerchant');
        }
    }
 
    
    public function deals_failed_orders()
    {
        if (Session::get('merchantid')) {
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
       
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails      = Transactions::getdeals_failed_orders($productlist);
                $allfailed_reports = MerchantTransactions::allfailed_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allfailed_reports = array();                   
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.deals_failed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("failedorders", $orderdetails)->with("allfailed_reports", $allfailed_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
   
    public function deals_hold_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails    = MerchantTransactions::getdeals_hold_orders($productlist);
                $allhold_reports = MerchantTransactions::allhold_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allhold_reports = array();                 
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.deals_hold_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("holdorders", $orderdetails)->with("allhold_reports", $allhold_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
    
    public function dealscod_all_orders()
    {
        if (Session::get('merchantid')) {
            $from_date         = Input::get('from_date');
            $to_date           = Input::get('to_date');
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist = $getproductidlist[0]->proid;
                
                $orderdetails   = MerchantTransactions::getdealscod_all_orders($productlist);
                $allcod_reports = MerchantTransactions::allcod_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allcod_reports = array();     
                
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.dealscod_allorders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("allorders", $orderdetails)->with("allcod_reports", $allcod_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
   
    
    public function dealscod_completed_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist  = $getproductidlist[0]->proid;
                $orderdetails = MerchantTransactions::getdealscod_completed_orders($productlist);
                
                $allcodcompleted_reports = MerchantTransactions::allcodcompleted_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allcodcompleted_reports = array();                      
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.dealscod_completed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("completedorders", $orderdetails)->with("allcodcompleted_reports", $allcodcompleted_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
    }
   
    
    public function dealscod_failed_orders()
    {
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
            
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist  = $getproductidlist[0]->proid;
                $orderdetails = MerchantTransactions::getdealscod_failed_orders($productlist);
                
                $allcodfailed_reports = MerchantTransactions::allcodfailed_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allcodfailed_reports = array();                 
            } else {
                $orderdetails = array();
            }
            
            return view('sitemerchant.dealscod_failed_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("failedorders", $orderdetails)->with("allcodfailed_reports", $allcodfailed_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
 
    
    public function dealscod_hold_orders()
    {
        
        if (Session::get('merchantid')) {
            
            $from_date = Input::get('from_date');
            $to_date   = Input::get('to_date');
          
            $merchantheader    = view('sitemerchant.includes.merchant_header')->with("routemenu", "transaction");
            $merchantfooter    = view('sitemerchant.includes.merchant_footer');
            $merchantleftmenus = view('sitemerchant.includes.merchant_left_menu_transaction');
            $merid             = Session::get('merchantid');
            $getproductidlist  = Merchantproducts::getproductidlist($merid);
            if ($getproductidlist) {
                $productlist        = $getproductidlist[0]->proid;
                $orderdetails       = MerchantTransactions::getdealscod_hold_orders($productlist);
                $allcodhold_reports = MerchantTransactions::allcodhold_reports($from_date, $to_date, $productlist);
            } elseif(empty($getproductidlist)) {
                $productlist = array();      
                $orderdetails = array();
                $allcodhold_reports = array();                      
            } else {
                $orderdetails = array();
            }
            return view('sitemerchant.dealscod_hold_orders')->with('merchantheader', $merchantheader)->with('merchantfooter', $merchantfooter)->with('merchantleftmenus', $merchantleftmenus)->with("holdorders", $orderdetails)->with("allcodhold_reports", $allcodhold_reports);
        } else {
            return Redirect::to('sitemerchant');
        }
        
    }
  
    public function update_order_cod()
    {
        $orderid = $_GET['order_id'];
        $status  = $_GET['id'];
        
        $updaters = MerchantTransactions::update_cod_status($status, $orderid);
        if ($updaters) {
            echo "success";
        }
        
    }
}
