<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Customer extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_customer';
    
    public static function get_website_users()
    {
        return DB::table('nm_customer')->where('cus_logintype', '=', 2)->where('cus_status', '=', 0)->count();
    }

    public static function get_fb_users()
    {
        return DB::table('nm_customer')->where('cus_logintype', '=', 3)->where('cus_status', '=', 0)->count();
    }

    public static function update_subscriber_msgstatus()
    {
        return DB::table('nm_subscription')->update(array('sub_readstatus' => 1));
    }

    public static function update_inquiries_msgstatus()
    {
        return DB::table('nm_inquiries')->update(array('inq_readstatus' => 1));
    }

    public static function get_admin_users()
    {
        return DB::table('nm_customer')->where('cus_logintype', '=', 1)->where('cus_status', '=', 0)->count();
    }
    
    public static function get_chart_detailsnew()
    {
        $chart_count = "";
        for ($i = 1; $i <= 12; $i++) {
            $results = DB::select(DB::raw("SELECT count(*) as count FROM nm_customer WHERE  cus_logintype=2 and  MONTH( `cus_joindate` ) = " . $i));
            $chart_count .= $results[0]->count . ",";
        }
        $chart_count1 = trim($chart_count, ",");
        return $chart_count1;
    }

    public static function get_country()
    {
        return DB::table('nm_country')->where('co_status', '=', 0)->get();
    }

    public static function get_inquiry_details_email($id)
    {
        return DB::table('nm_inquiries')->where('iq_id', '=', $id)->get();
    }

    public static function insert_customer($entry)
    {
        return DB::table('nm_customer')->insert($entry);
    }

    public static function update_customer($id, $entry)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $id)->update($entry);
    }

    public static function randomPassword()
    {
        $alphabet    = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass        = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n      = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public static function get_city_list()
    {
        return DB::table('nm_city')->where('ci_status', '=', 1)->get();
    }

    public static function get_customer_list()
    {
        return DB::table('nm_customer')->Leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->orderBy('nm_customer.cus_joindate', 'desc')->get();
    }

    public static function get_customer($id)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $id)->get();
    }

    public static function get_customer_country($id)
    {
        return DB::table('nm_country')->where('co_id', '=', $id)->where('co_status', '=', 0)->get();
    }

    public static function get_customer_city($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->where('ci_status', '=', 1)->get();
    }

    public static function check_emailaddress($emailaddr)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $emailaddr)->get();
    }

    public static function check_emailaddress_edit($emailaddr, $cusid)
    {
        return DB::table('nm_customer')->where('cus_email', '=', $emailaddr)->where('cus_id', '!=', $cusid)->get();
    }
    
    public static function delete_customer($id)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $id)->delete();
    }

    public static function status_customer($id, $status)
    {
        return DB::table('nm_customer')->where('cus_id', '=', $id)->update(array('cus_status' => $status));
    }

    public static function subscriber_list()
    {
        return DB::table('nm_subscription')->LeftJoin('nm_customer', 'nm_customer.cus_id', '=', 'nm_subscription.sub_cus_id')->LeftJoin('nm_city', 'nm_city.ci_id', '=', 'nm_customer.cus_city')->get();
    
    }

    public static function delete_subscriber($id)
    {
        return DB::table('nm_subscription')->where('sub_id', '=', $id)->delete();
    }

    public static function edit_subscriber_status($id, $status)
    {
        return DB::table('nm_subscription')->where('sub_id', '=', $id)->update(array('sub_status' => $status));
    }

    public static function inquires_list()
    {
        return DB::table('nm_inquiries')->get();
    }

    public static function delete_inquires($id)
    {
        return DB::table('nm_inquiries')->where('iq_id', '=', $id)->delete();
    }

    public static function referral_list()
    {
        return DB::table('nm_referaluser')->LeftJoin('nm_customer', 'nm_customer.cus_id', '=', 'nm_referaluser.ruse_userid')->get();
    }

    public static function get_logintoday_users()
    {
        return DB::select(DB::raw("SELECT count(DISTINCT cus_id) as count  from nm_login where DATEDIFF(DATE(log_date),DATE(NOW()))=0"));
    }

    public static function get_login7days_users()
    {
        return DB::select(DB::raw("select count(DISTINCT cus_id) as count from nm_login WHERE (DATE(log_date) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
    }

    public static function get_login30days_users()
    {
        return DB::select(DB::raw("select  count(DISTINCT cus_id) as count from nm_login WHERE (DATE(log_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))"));
    }

    public static function get_login12mnth_users()
    {
        return DB::select(DB::raw("select count(DISTINCT cus_id) as count from nm_login where log_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)"));
    }
    
    public static function enquires_list()
    {
        return DB::table('nm_enquiry')->get();
    }

    public static function get_customerreports($from_date, $to_date)
    {
       if ($from_date != '' & $to_date == '') {
       return DB::table('nm_customer')->Leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->where('nm_customer.created_date', $from_date)->where('nm_customer.cus_status', '=', 1)->orderBy('nm_customer.cus_id', 'DESC')->get();
           
     }
        
        elseif ($from_date != '' & $to_date != '') {
            return DB::table('nm_customer')->Leftjoin('nm_city', 'nm_customer.cus_city', '=', 'nm_city.ci_id')->whereBetween('nm_customer.created_date', array(
                $from_date,
                $to_date
            ))->where('nm_customer.cus_status', '=', 1)->orderBy('nm_customer.cus_id', 'DESC')->get();
        } else {
            
        }
        
    }
    
    public static function get_enquires($from_date, $to_date)
    {
        
        if ($from_date != '' & $to_date == '') {
            return DB::table('nm_enquiry')->where('created_date', $from_date)->where('status', '=', 1)->orderBy('id', 'DESC')->get();
        }
        
        elseif ($from_date != '' & $to_date != '') {
            
            return DB::table('nm_enquiry')->whereBetween('created_date', array(
                $from_date,
                $to_date
            ))->where('status', '=', 1)->orderBy('id', 'DESC')->get();
            
        } else {
            
        }
        
    }
    
}

?>
