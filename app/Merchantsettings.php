<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Merchantsettings extends Model
{
    protected $guarded = array('id');
    protected $table = 'nm_merchant';
    
    public static function check_oldpwd($mer_id, $oldpwd)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $mer_id)->where('mer_password', '=', $oldpwd)->get();
        
    }

    public static function update_newpwd($mer_id, $confirmpwd)
    {
        return DB::table('nm_merchant')->where('mer_id', '=', $mer_id)->update(array(
            'mer_password' => $confirmpwd
        ));
        
    }
        
}

?>
