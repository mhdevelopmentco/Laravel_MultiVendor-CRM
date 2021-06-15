<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Customerprofile extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
    
    
    public static function get_customer_details($customerid)
    {
        return DB::table('nm_customer')->leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->leftjoin('nm_country', 'nm_customer.cus_country', '=', 'nm_country.co_id')->where('cus_id', '=', $customerid)->get();
        
    }

    public static function get_customer_shipping_details($customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->get();
        
    }
    
    public static function getproductordersdetails($customerid)
    {
        return DB::table('nm_order')->join('nm_product', 'nm_order.order_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_order.order_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_order.order_pro_id')->orderBy('nm_order.order_date', 'desc')->where('order_cus_id', '=', $customerid)->get();
        
    }

    public static function getproductordersdetailss($customerid)
    {
        return DB::table('nm_ordercod')->join('nm_product', 'nm_ordercod.cod_pro_id', '=', 'nm_product.pro_id')->join('nm_shipping', 'nm_ordercod.cod_cus_id', '=', 'nm_shipping.ship_cus_id')->groupBy('nm_ordercod.cod_pro_id')->orderBy('nm_ordercod.cod_date', 'desc')->where('cod_cus_id', '=', $customerid)->get();
        
    }

    public static function get_shipping_details($customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->get();
        
    }

    public static function update_customer_name($cname, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_name' => $cname));
        
    }
    
    public static function update_address1($addr1, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_address1' => $addr1));
        
    }

    public static function update_address2($addr2, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_address2' => $addr2));
        
    }

    public static function update_city($city, $country, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array(
            'cus_city' => $city,
            'cus_country' => $country
        ));
        
    }
    
    public static function update_phonenumber($phonenum, $cusid)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->update(array('cus_phone' => $phonenum));
        
    }

    public static function update_newpwd($customerid, $confirmpwd)
    {
        
        return DB::table('nm_customer')->where('cus_id', '=', $customerid)->update(array('cus_pwd' => $confirmpwd));
    }

    public static function check_oldpwd($cusid, $oldpwd)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $cusid)->where('cus_pwd', '=', $oldpwd)->get();
        
    }

    public static function insert_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid)
    {
        return DB::table('nm_shipping')->insert(array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_phone' => $shipcusmobile,
            'ship_email' => $shipcusemail,
            'ship_cus_id',
            '=',
            $customerid
        ));
    }

    public static function update_shipping($shipcus, $shipaddr1, $shipaddr2, $shipcusmobile, $shipcusemail, $shippingstate, $zipcode, $cityid, $countryid, $customerid)
    {
        return DB::table('nm_shipping')->where('ship_cus_id', '=', $customerid)->update(array(
            'ship_name' => $shipcus,
            'ship_address1' => $shipaddr1,
            'ship_address2' => $shipaddr2,
            'ship_ci_id' => $cityid,
            'ship_state' => $shippingstate,
            'ship_country' => $countryid,
            'ship_postalcode' => $zipcode,
            'ship_phone' => $shipcusmobile,
            'ship_email' => $shipcusemail
        ));
        
    }

    public static function update_profileimage($customerid, $filename)
    {
        
        return DB::table('nm_customer')->where('cus_id', '=', $customerid)->update(array(
            'cus_pic' => $filename
        ));
    }
    
    public static function get_wishlistdetails($customerid)
    {
        return DB::table('nm_wishlist')->join('nm_product', 'nm_wishlist.ws_pro_id', '=', 'nm_product.pro_id')->join('nm_maincategory', 'nm_product.pro_mc_id', '=', 'nm_maincategory.mc_id')->join('nm_secmaincategory', 'nm_product.pro_smc_id', '=', 'nm_secmaincategory.smc_id')->join('nm_subcategory', 'nm_product.pro_sb_id', '=', 'nm_subcategory.sb_id')->join('nm_secsubcategory', 'nm_product.pro_ssb_id', '=', 'nm_secsubcategory.ssb_id')->where('ws_cus_id', '=', $customerid)->get();
        
    }

    public static function get_wishlistdetailscnt($customerid)
    {
        return DB::table('nm_wishlist')->where('ws_cus_id', '=', $customerid)->count();
        
    }

    public static function get_bidhistorycnt($customerid)
    {
        return DB::table('nm_order_auction')->where('oa_cus_id', '=', $customerid)->count();
        
    }

    public static function get_bidhistory($customerid)
    {
        return DB::table('nm_order_auction')->join('nm_auction', 'nm_order_auction.oa_pro_id', '=', 'nm_auction.auc_id')->where('oa_cus_id', '=', $customerid)->get();
        
    }

    public static function get_general_settings()
    {
	return DB::table('nm_generalsetting')->get();
		 
    } 
 
}

?>
