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
use App\Country;
use App\Customer;
use App\City;
use App\Category;
use App\Faqmodel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
    
    public function add_faq()
    {
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        return view('siteadmin.add_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter);
    }

    public function manage_faq()
    {
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $faqresult = Faqmodel::view_faq_detail();
        
        return view('siteadmin.manage_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('faqresult', $faqresult);
    }

    public function edit_faq($id)
    {
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $faqresult = Faqmodel::showindividual_faq_detail($id);
        
        return view('siteadmin.edit_faq')->with('adminheader', $adminheader)->with('adminleftmenus', $adminleftmenus)->with('adminfooter', $adminfooter)->with('faqresult', $faqresult)->with('id', $id);
    }
    
    public function delete_faq($id)
    {
        $adminheader    = view('siteadmin.includes.admin_header')->with("routemenu", "settings");
        $adminleftmenus = view('siteadmin.includes.admin_left_menus');
        $adminfooter    = view('siteadmin.includes.admin_footer');
        
        $affected = Faqmodel::delete_faq_detail($id);
        return Redirect::to('manage_faq')->with('delete_result', 'Record Deleted Successfully');
    }
    
    public function update_status_faq($id, $status)
    {
        $return = Faqmodel::update_status_faq($id, $status);
        return Redirect::to('manage_faq')->with('updated_result', 'Record Updated Successfully');
    }

    public function add_faq_submit()
    {
        
        $data = Input::except(array(
            '_token'
        ));
        $rule = array(
            'faqquestion' => 'required',
            'faqanswer' => 'required'
            
        );
        
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('add_faq')->withErrors($validator->messages())->withInput();
            
        } else {
            $entry = array(
                'faq_name' => Input::get('faqquestion'),
                'faq_ans' => Input::get('faqanswer')
                
            );
            
            $return = Faqmodel::save_faq_detail($entry);
            return Redirect::to('manage_faq')->with('insert_result', 'Record Inserted');
            
                
        }
    }
    
    public function update_faq_submit()
    {
        
        $data      = Input::except(array(
            '_token'
        ));
        $rule      = array(
            'editfaqquestion' => 'required',
            'editfaqanswer' => 'required'
            
        );
        $id        = Input::get('id');
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Redirect::to('add_faq')->withErrors($validator->messages())->withInput();
            
        } else {
            $entry = array(
                'faq_name' => Input::get('editfaqquestion'),
                'faq_ans' => Input::get('editfaqanswer')
                
            );
            
            $return = Faqmodel::update_faq_detail($id, $entry);
            return Redirect::to('manage_faq')->with('updated_result', 'Record Updated');
        }
    }
    
    
}

?>
