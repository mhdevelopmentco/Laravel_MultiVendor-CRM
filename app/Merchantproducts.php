<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Merchantproducts extends Model
{
    
    protected $guarded = array('id');
    protected $table = 'nm_product';
    
    public static function insert_product($entry)
    {
        return DB::table('nm_product')->insert($entry);
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
    
    public static function get_product_details($id)
    {
        return DB::table('nm_product')->where('pro_mr_id', '=', $id)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
    }
    
    public static function block_product_status($id, $status)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($status);
    }

    public static function get_product_view($id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->join('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->join('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->join('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->join('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')->get();
    }

    public static function edit_product($entry, $id)
    {
        return DB::table('nm_product')->where('pro_id', '=', $id)->update($entry);
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

    public static function get_merchant_details()
    {
        return DB::table('nm_merchant')->get();
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

    public static function get_cod_details($productlist)
    {
        return DB::table('nm_ordercod')->leftjoin('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_customer', 'nm_ordercod.cod_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_shipping', 'nm_ordercod.cod_id', '=', 'nm_shipping.ship_order_id')->leftjoin('nm_colorfixed', 'nm_ordercod.cod_pro_color', '=', 'nm_colorfixed.cf_id')->leftjoin('nm_size', 'nm_ordercod.cod_pro_size', '=', 'nm_size.si_id')->whereIn('nm_ordercod.cod_pro_id', array(
            $productlist
        ))->get();
    }

    public static function get_shipping_details($productlist)
    {
        return DB::table('nm_order')->orderBy('order_date', 'desc')->leftjoin('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->leftjoin('nm_customer', 'nm_order.order_cus_id', '=', 'nm_customer.cus_id')->leftjoin('nm_shipping', 'nm_order.order_id', '=', 'nm_shipping.ship_order_id')->leftjoin('nm_colorfixed', 'nm_order.order_pro_color', '=', 'nm_colorfixed.cf_id')->leftjoin('nm_size', 'nm_order.order_pro_size', '=', 'nm_size.si_id')->whereIn('nm_order.order_pro_id', array(
            $productlist
        ))->get();
    }

    public static function get_qty_details()
    {
        return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_qty');
    }

    public static function get_amt_details()
    {
       return DB::table('nm_order')->where('order_status', '=', 2)->sum('order_amt');
    }
    
    public static function getproductidlist($merid)
    {
       return DB::select(DB::raw("SELECT pro_mr_id, GROUP_CONCAT(pro_id SEPARATOR ', ') as proid FROM nm_product GROUP BY pro_mr_id having pro_mr_id=$merid"));
        
    }

    public static function merchant_productrep($from_date, $to_date, $merchant_id)
    {
       if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $merchant_id)->where('nm_product.created_date', $from_date)->where('nm_product.pro_status', '=', 1)->orderBy('nm_product.pro_id', 'DESC')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $id)->whereBetween('nm_product.created_date', array(
                $from_date,
                $to_date
            ))->where('nm_product.pro_status', '=', 1)->orderBy('nm_product.pro_id', 'DESC')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
        } else {
            
        }
        
    }

    public static function allprod_reports($from_date, $to_date, $merchant_id)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $merchant_id)->where('nm_product.created_date', $from_date)->orderBy('nm_product.pro_id', 'DESC')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $merchant_id)->whereBetween('nm_product.created_date', array(
                $from_date,
                $to_date
            ))->orderBy('nm_product.pro_id', 'DESC')->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
        } else {
            
        }
        
    }
    
    public static function merchant_soldreports($from_date, $to_date, $id)
    {
        
        if ($from_date != '' & $to_date == '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $id)->where('nm_product.created_date', $from_date)->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
            
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_product')->where('nm_product.pro_mr_id', '=', $id)->whereBetween('nm_product.created_date', array(
                $from_date,
                $to_date
            ))->LeftJoin('nm_store', 'nm_store.stor_id', '=', 'nm_product.pro_sh_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_store.stor_city')->get();
        } else {
            
        }
        
    }
	
	public static function get_order_details()
	{
		return DB::table('nm_order')->where('order_type', '=', 1)->get();
	}
	
	public static function delete_product($id)
	{
			 
	    return DB::table('nm_product')->where('pro_id', '=', $id)->delete();
						
	}
    
}

?>
