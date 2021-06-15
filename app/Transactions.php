<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Transactions extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_order_auction';
       
    public static function manage_auction_bidder()
    {
        return DB::table('nm_order_auction')->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->get();
    }
    
    public static function auction_by_bidder()
    {
        return DB::table('nm_auction')->get();
    }

    public static function auction_by_bidder_count()
    {
        $auction_det = DB::table('nm_auction')->get();
        
        foreach ($auction_det as $auction) {
            $catg_result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $auction->auc_id)->get();
            if ($catg_result) {
                $result[$auction->auc_id] = count($catg_result);
            } else {
                $result[$auction->auc_id] = 0;
            }
        }
        return $result;
    }
    
    public static function auction_by_bidder_amt_count()
    {
        $auction_det = DB::table('nm_auction')->get();
        
        foreach ($auction_det as $auction) {
            $catg_result = DB::table('nm_order_auction')->where('oa_pro_id', '=', $auction->auc_id)->sum('oa_bid_amt');
            if ($catg_result) {
                $result[$auction->auc_id] = $catg_result;
            } else {
                $result[$auction->auc_id] = 0;
            }
        }
        return $result;
    }
    
    public static function list_auction_bidders($id)
    {
        return DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->LeftJoin('nm_auction', 'nm_auction.auc_id', '=', 'nm_order_auction.oa_pro_id')->get();
    }
    
    public static function auction_winner($id)
    {
        return DB::table('nm_order_auction')->where('oa_pro_id', '=', $id)->where('oa_bid_winner', '=', 1)->get();
    }

    public static function check_delivery_status($id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->get();
    }
    
    public static function select_auction_winner($entry, $id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->update($entry);
    }
    
    public static function update_auction_status($entry, $id)
    {
        return DB::table('nm_order_auction')->where('oa_id', '=', $id)->update($entry);
    }

    public static function getproduct_all_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->get();
        
    }

    public static function getproduct_success_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->get();
        
    }

    public static function getproduct_completed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 1)->get();
        
    }

    public static function getproduct_hold_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->get();
        
    }
    
    public static function getproduct_failed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->get();
        
    }
    
    public static function getcod_all_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->get();
        
    }
    
    public static function getcod_completed_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->get();
        
    }

    public static function getcod_hold_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->get();
        
    }
    
    public static function getcod_failed_orders()
    {
       return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->get();
        
    }

    public static function getdeals_all_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->get();
        
    }

    public static function getdeals_success_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->get();
        
    }

    public static function getdeals_completed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 2)->where('nm_order.order_type', '=', 2)->get();
        
    }

    public static function getdeals_hold_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->get();
        
    }
    
    public static function getdeals_failed_orders()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->get();
        
    }
    
    public static function getdealscod_all_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->get();
        
    }
    
    public static function getdealscod_completed_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->get();
        
    }
    public static function getdealscod_hold_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->get();
        
    }
    
    public static function getdealscod_failed_orders()
    {
        return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->get();
        
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

    public static function get_chart_product_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE  order_type=1 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_deals_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE order_type=2 and MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_chart_auction_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order_auction WHERE MONTH( `oa_bid_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }
    
    public static function get_funds()
    {
        return DB::select(DB::raw("  SELECT * FROM nm_withdraw_request vg LEFT JOIN (select f.wr_mer_id, sum(wr_paid_amount) as paidedamount from nm_withdraw_request_paypal f group by f.wr_mer_id ) f ON f.wr_mer_id = vg.wd_mer_id LEFT JOIN nm_merchant on vg.wd_mer_id=nm_merchant.mer_id "));
    }
    
    public static function success_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Success'"));
    }
    
    public static function pending_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Pending'"));
    }
    
    public static function failed_fund_request()
    {
        return DB::select(DB::raw("  SELECT * FROM  nm_withdraw_request_paypal f LEFT JOIN nm_merchant on f.wr_mer_id=nm_merchant.mer_id where f.wr_status = 'Failed'"));
    }
    
   public static function insert_funds_paypal($entry)
    {
        $d = DB::table('nm_withdraw_request_paypal')->insert($entry);
      
    } 

    public static function update_funds_paypal($entry, $id)
    {
        return DB::table('nm_withdraw_request_paypal')->where('wr_txn_id', '=', $id)->update($entry);
    }

    public static function update_cod_status($status, $orderid)
    {
        return DB::table('nm_ordercod')->where('cod_id', '=', $orderid)->update(array(
            'cod_status' => $status
        ));
   
    }
    
    public static function getall_dealreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function get_successreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
         
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
            
        } else {
            
        }
        
    }
    
    public static function get_holdreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function get_failedreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->where('nm_order.created_date', $from_date)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_order.order_pro_id', '=', 'nm_deals.deal_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 2)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    
    public static function get_codreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
       
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function get_completedreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
         
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function getcod_holdreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    
    public static function getcod_failedreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
         
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_ordercod')->orderBy('cod_id', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_deals', 'nm_ordercod.cod_pro_id', '=', 'nm_deals.deal_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 2)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function getall_reports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function product_successrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_order')->orderBy('order_id', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 1)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }

    public static function product_holdrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 3)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function product_failedrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->where('nm_order.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            
            return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->where('nm_order.order_status', '=', 4)->where('nm_order.order_type', '=', 1)->whereBetween('nm_order.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }

    public static function product_codrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function product_completedrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 2)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
        } else {
            
        }
        
    }
    
    public static function productcod_holdrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 3)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
    
    public static function productcod_failedrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
                        
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->where('nm_ordercod.created_date', $from_date)->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_ordercod')->orderBy('cod_date', 'desc')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->where('nm_ordercod.cod_status', '=', 4)->where('nm_ordercod.cod_order_type', '=', 1)->whereBetween('nm_ordercod.created_date', array(
                $from_date,
                $to_date
            ))->get();
            
        } else {
            
        }
        
    }
}

?>
