<?php
namespace App;
use DB;
use File;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Products extends Model
{
    
    protected $guarded = array('id');
    protected $table = 'nm_product';
    
    public static function insert_product($entry)
    {
       $check_insert = DB::table('nm_product')->insert($entry);
           
        if ($check_insert) {
            return DB::getPdo()->lastInsertId();
        } else {
            return 0;
        }
        
    }

    public static function get_chart_details()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_order WHERE MONTH( `order_date` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_qtycod_details()
    {
        return DB::table('nm_ordercod')->where('cod_status', '=', 2)->sum('cod_qty');
    
    }

    public static function get_amtcod_details()
    {
        return DB::table('nm_ordercod')->where('cod_status', '=', 2)->sum('cod_amt');
   
    }

    public static function get_cod_details()
    {
        return DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')->leftjoin('nm_colorfixed', 'nm_ordercod.cod_pro_color', '=', 'nm_colorfixed.cf_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->get();
    }

    public static function get_qty_details()
    {
        return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_qty');
    
    }

    public static function get_amt_details()
    {
     
      return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_amt');
        
    }

    public static function get_shipping_details()
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_shipping', 'nm_order.order_id', '=', 'nm_shipping.ship_order_id')->leftjoin('nm_colorfixed', 'nm_order.order_pro_color', '=', 'nm_colorfixed.cf_id')->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')->get();
    }

    public static function insert_product_color_details($entry)
    {
      return DB::table('nm_procolor')->insert($entry);
    }

    public static function insert_product_specification_details($entry)
    {
       return DB::table('nm_prospec')->insert($entry);
    }

    public static function insert_product_size_details($productsizeentry)
    {
      return DB::table('nm_prosize')->insert($productsizeentry);
    }
    
    public static function get_product($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->get();
    }

    public static function get_product_specification()
    {
        return DB::table('nm_specification')->get();
    }

    public static function get_product_color()
    {
        return DB::table('nm_color')->get();
        
    }

    public static function get_product_size()
    {
        return DB::table('nm_size')->get();
        
    }

    public static function get_sizename_ajax($sizeid)
    {
        return DB::table('nm_size')->where('si_id', '=', $sizeid)->get();
        
    }

    public static function get_product_category()
    {
        return DB::table('nm_maincategory')->where('mc_status', '=', 1)->get();
    }
    
    public static function load_maincategory_ajax($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_mc_id', '=', $id)->where('smc_status', '=', 1)->get();
    }

    public static function load_subcategory_ajax($id)
    {
        
        return DB::table('nm_subcategory')->where('sb_smc_id', '=', $id)->where('sb_status', '=', 1)->get();
    }

    public static function get_second_sub_category_ajax($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_sb_id', '=', $id)->where('ssb_status', '=', 1)->get();
    }

    public static function get_colorname_ajax($colorid)
    {
        return DB::table('nm_color')->where('co_id', '=', $colorid)->get();
    }

    public static function get_main_category_ajax_edit($id)
    {
        return DB::table('nm_secmaincategory')->where('smc_id', '=', $id)->get();
    }
    
    public static function get_sub_category_ajax_edit($id)
    {
        return DB::table('nm_subcategory')->where('sb_id', '=', $id)->get();
    }
    
    public static function get_second_sub_category_ajax_edit($id)
    {
        return DB::table('nm_secsubcategory')->where('ssb_id', '=', $id)->get();
    }
    
    public static function get_product_details()
    {
        return DB::table('nm_product')->get();
    }
    
    public static function block_product_status($id, $status)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($status);
    }

    public static function get_product_view($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->join('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->join('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->join('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->join('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')->get();
    }

    public static function delete_product_color($proid)
    {
        return DB::table('nm_procolor')->where('pc_pro_id', '=', $proid)->delete();
    }

    public static function delete_product_size($proid)
    {
       return DB::table('nm_prosize')->where('ps_pro_id', '=', $proid)->delete();
    }

    public static function delete_product_spec($proid)
    {
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $proid)->delete();
    }

    public static function get_product_exist_specification($id)
    {
        return DB::table('nm_prospec')->where('spc_pro_id', '=', $id)->get();
    }

    public static function get_product_exist_color($id)
    {
        return DB::table('nm_procolor')->join('nm_color', 'nm_procolor.pc_co_id', '=', 'nm_color.co_id')->where('pc_pro_id', '=', $id)->get();
    }

    public static function get_product_exist_size($id)
    {
        return DB::table('nm_prosize')->join('nm_size', 'nm_prosize.ps_si_id', '=', 'nm_size.si_id')->where('ps_pro_id', '=', $id)->get();
    }

    public static function get_product_details_manage()
    {
        return DB::table('nm_product')->Leftjoin('nm_store', 'nm_product.pro_sh_id', '=', 'nm_store.stor_id')->Leftjoin('nm_city', 'nm_store.stor_city', '=', 'nm_city.ci_id')->get();
    }
    
    public static function edit_product($entry, $id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($entry);
    }

    public static function get_merchant_details()
    {
        return DB::table('nm_merchant')->get();
    }

    public static function get_product_details_formerchant($merid)
    {
        return DB::table('nm_store')->where('stor_merchant_id', '=', $merid)->where('stor_status', '=', 1)->get();
    }

    public static function get_active_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 1)->count();
    }

    public static function get_sold_products()
    {
        return DB::table('nm_product')->get();
    }

    public static function get_block_products()
    {
        return DB::table('nm_product')->where('pro_status', '=', 0)->count();
    }

    public static function get_today_product()
    {
        return DB::select(DB::raw("SELECT count(*) as count,sum(order_amt) as amt  from nm_order where DATEDIFF(DATE(order_date),DATE(NOW()))=0 and order_status=1"));
    }

    public static function get_7days_product()
    {
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt from nm_order WHERE (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)) and order_status=1"));
    }

    public static function get_30days_product()
    {
        return DB::select(DB::raw("select  count(*) as count,sum(order_amt) as amt from nm_order WHERE (DATE(order_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)) and order_status=1"));
    }

    public static function get_12mnth_product()
    {
        return DB::select(DB::raw("select count(*) as count,sum(order_amt) as amt from nm_order where order_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) and order_status=1"));
    }
    
    public static function get_zipcode()
    {
        return DB::table('nm_estimate_zipcode')->get();
    }
    
    public static function save_zip_code($entry)
    {
        return DB::table('nm_estimate_zipcode')->insert($entry);
    }

    public static function check_zip_code($from)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $from)->where('ez_code_series_end', '>=', $from)->get();
    }

    public static function check_zip_code_range($from, $to)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '>=', $from)->where('ez_code_series_end', '<=', $to)->get();
        
    }
    
    public static function edit_zip_code($id)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->get();
    }

    public static function update_zip_code($entry, $id)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->update($entry);
    }

    public static function check_zip_code_edit($id, $from)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_code_series', '<=', $from)->where('ez_code_series_end', '>=', $from)->where('ez_id', '!=', $id)->get();
        
    }

    public static function check_zip_code_edit_range($id, $from, $to)
    {
        return $get_result_code = DB::table('nm_estimate_zipcode')->where('ez_code_series', '>=', $from)->where('ez_code_series_end', '<=', $to)->where('ez_id', '!=', $id)->get();
       
    }
    
    public static function block_zip_code($id, $status)
    {
        return DB::table('nm_estimate_zipcode')->where('ez_id', '=', $id)->update(array(
            'ez_status' => $status
        ));
    }
    
    public static function get_induvidual_product_detail_merchant($id, $merid)
    {
        
        return DB::table('nm_product')->where('pro_mr_id', '=', $merid)->where('pro_id', '=', $id)->get();
    }
    
    public static function get_productreports($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_product')->Leftjoin('nm_store', 'nm_product.pro_sh_id', '=', 'nm_store.stor_id')->Leftjoin('nm_city', 'nm_store.stor_city', '=', 'nm_city.ci_id')->where('nm_product.created_date', $from_date)->where('nm_product.pro_status', '=', 1)->orderBy('nm_product.pro_id', 'DESC')->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_product')->Leftjoin('nm_store', 'nm_product.pro_sh_id', '=', 'nm_store.stor_id')->Leftjoin('nm_city', 'nm_store.stor_city', '=', 'nm_city.ci_id')->whereBetween('nm_product.created_date', array(
                $from_date,
                $to_date
            ))->where('nm_product.pro_status', '=', 1)->orderBy('nm_product.pro_id', 'DESC')->get();
        } else {
            
        }
        
    }
    
    public static function get_soldrep($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_product')->where('created_date', $from_date)->orderBy('pro_id', 'DESC')->get();
     
        }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_product')->whereBetween('created_date', array(
                $from_date,
                $to_date
            ))->orderBy('pro_id', 'DESC')->get();
        }
     
        else {
            
        }
        
    }

    public static function check_store($Product_Title, $Select_Shop)
    {
        return DB::table('nm_product')->where('pro_title', '=', $Product_Title)->where('pro_sh_id', '=', $Select_Shop)->get();
    }
	
	public static function get_order_details()
	{
		return DB::table('nm_order')->where('order_type', '=', 1)->get();
	}
	
	// public static function delete_product($id)
	// {
	//     return DB::table('nm_product')->where('pro_id', '=', $id)->delete();
	// }

    public static function delete_product($id)
    {
        
        // To start Image delete from folder 09/11/ 
        $filename = DB::table('nm_product')->where('pro_id', $id)->first();
        $getimagename= $filename->pro_Img;
        $getextension=explode("/**/",$getimagename);
        foreach($getextension as $imgremove)
        {
            File::delete(base_path('assets/product/').$imgremove);
        } 
        // To End 
        return DB::table('nm_product')->where('pro_id', '=', $id)->delete();
        
    }
    //Product Review manage
    public static function get_product_review()
    {
        return DB::table('nm_review')->Leftjoin('nm_product','nm_review.product_id','=','nm_product.pro_id')->Leftjoin('nm_customer','nm_review.customer_id','=','nm_customer.cus_id')->where('nm_review.product_id','!=','NULL')->get();
    }
    public static function edit_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->get();
    }
    public static function update_review($entry, $id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($entry);
    }
    public static function delete_review($id)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->delete();
    }
    public static function block_review_status($id, $status)
    {
        return DB::table('nm_review')->where('comment_id', '=', $id)->update($status);
    }
}

?>
