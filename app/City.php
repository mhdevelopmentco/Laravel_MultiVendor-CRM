<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class city extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_city';
    
    public static function view_city_detail()
    {
        return DB::table('nm_city')->leftJoin('nm_country', 'nm_country.co_id', '=', 'nm_city.ci_con_id')->get();
    }

    public static function view_country_details()
    {
        return DB::table('nm_country')->get();
    }

    public static function show_city_detail($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->get();
    }

    public static function delete_city_detail($id)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->delete();
    }

    public static function update_city_detail($id, $entry)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update($entry);
    }
    
    public static function save_city_detail($entry)
    {
        return DB::table('nm_city')->insert($entry);
    }

    public static function status_city($id, $status)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update(array('ci_status' => $status));
        
    }

    public static function check_exist_city_name($name, $ccode)
    {
        return DB::table('nm_city')->where('ci_con_id', '=', $ccode)->where('ci_name', '=', $name)->get();
        
    }

    public static function update_default_city_submit($id, $entry)
    {
        return DB::table('nm_city')->where('ci_id', '=', $id)->update($entry);
        
    }

    public static function update_default_city_submit1($entry)
    {
        return DB::table('nm_city')->update($entry);
        
    }
}

?>
