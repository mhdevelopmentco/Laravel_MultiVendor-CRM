<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class MerchantTransactions extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_order_auction';
    
    public static function getproduct_all_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getproduct_success_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getproduct_completed_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getproduct_hold_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getproduct_failed_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getcod_all_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getcod_completed_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getcod_hold_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getcod_failed_orders($productlist)
    {
        
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function get_deals_all_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdeals_all_orders($merid)
    {
       return DB::select(DB::raw("SELECT pro_mr_id, GROUP_CONCAT(pro_id SEPARATOR ', ') as proid FROM nm_product GROUP BY pro_mr_id having pro_mr_id=$merid"));
 
    }
    
    public static function get_transaction_details($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdeals_success_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getdeals_completed_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getdeals_hold_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdeals_failed_orders($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdealscod_all_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdealscod_completed_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function getdealscod_hold_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }
    
    public static function getdealscod_failed_orders($productlist)
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
        
    }

    public static function get_producttransaction()
    {
        return DB::table('nm_order')->where('order_type', '=', 1)->count();
        
    }

    public static function get_dealstransaction()
    {
        return DB::table('nm_order')->where('order_type', '=', 2)->count();
    }

    public static function get_auctiontransaction()
    {
        return DB::table('nm_order_auction')->count();
    }

    public static function get_producttoday_order()
    {
        return DB::select(DB::raw("SELECT count(order_id) as count,sum(order_amt) as amt  from nm_order where order_type=1 and DATEDIFF(DATE(order_date),DATE(NOW()))=0"));
        
    }

    public static function get_product7days_order()
    {
        return DB::select(DB::raw("select count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=1 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_product30days_order()
    {
        return DB::select(DB::raw("select  count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=1 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_dealstoday_order()
    {
        return DB::select(DB::raw("SELECT count(order_id) as count,sum(order_amt) as amt  from nm_order where order_type=2 and DATEDIFF(DATE(order_date),DATE(NOW()))=0"));
        
    }

    public static function get_deals7days_order()
    {
        return DB::select(DB::raw("select count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=2 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_deals30days_order()
    {
        return DB::select(DB::raw("select  count(order_id) as count,sum(order_amt) as amt from nm_order WHERE order_type=2 and (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_auctiontoday_order()
    {
        return DB::select(DB::raw("SELECT count(oa_id) as count,sum(oa_original_bit_amt) as amt  from nm_order_auction where   DATEDIFF(DATE(oa_bid_date),DATE(NOW()))=0"));
        
    }

    public static function get_auction7days_order()
    {
        return DB::select(DB::raw("select count(oa_id) as count,sum(oa_original_bit_amt) as amt from nm_order_auction WHERE  (DATE(oa_bid_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_auction30days_order()
    {
        return DB::select(DB::raw("select  count(oa_id) as count,sum(oa_original_bit_amt) as amt from nm_order_auction WHERE  (DATE(oa_bid_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_chart_product_details($productlist)
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_pro_id in($productlist) and order_type=1 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_deals_details($productlist)
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_pro_id in($productlist) and order_type=2 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_auction_details($getauctionidlist)
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_auction WHERE oa_pro_id in($getauctionidlist) and MONTH( `oa_bid_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }
    
    public static function update_cod_status($status, $orderid)
    {
        return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->update(array(
            'cod_status' => $status
        ));
    }
    
    public static function getmerchant_dealreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    
    public static function getsuccess_dealreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    
    public static function getcomp_dealreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
     
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function allhold_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function allfailed_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function allcod_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
        } else {
            
        }
        
    }
    
    public static function allcodcompleted_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function allcodhold_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
     
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    
    public static function allcodfailed_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    
    public static function alltrans_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    
    public static function allsucessprod_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    public static function allcompletedprod_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    
    public static function allholdprod_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function allfailedprod_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_order.order_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function allpro_codcompleted_reports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    public static function allprod_codreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }

    public static function allprod_holdreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
         
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    
    public static function allprod_failedreports($from_date, $to_date, $productlist)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->whereIn('nm_ordercod.cod_pro_id', array(
                $productlist
            ))->get();
            
        } else {
            
        }
        
    }
}

?>
