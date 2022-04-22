<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SpecialServiceController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_special_service(){
        $this->AuthentificationLogin();
        return view('admin.special_service.add_special_service');
    }
    public function all_special_services(){
        $this->AuthentificationLogin();
        $all_special_services = DB::table('tbl_special_service')->get();
        $manager_special_service = view('admin.special_service.all_special_services')->with('all_special_services',$all_special_services);
        return view('layouts.admin')->with('admin.special_service.all_special_services', $manager_special_service);
    }
    public function save_special_service(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['special_service_name'] = $request->special_service_name;
        $data['special_service_address'] = $request->special_service_address;
        $data['special_service_email'] = $request->special_service_email;
        $data['special_service_phone'] = $request->special_service_phone;
        $data['special_service_image'] = $request->special_service_image;
        $data['special_service_status'] = $request->special_service_status;

        DB::table('tbl_special_service')->insert($data);
        Session::put('message','Successfully created a special_service!');
        return Redirect::to('all-special_services');
    }

    public function active_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update(['special_service_status'=>0]);
        Session::put('message','successful to unactive special_service status');
        return Redirect::to('all-special_services');
    }
    public function unactive_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update(['special_service_status'=>1]);
        Session::put('message','successful to active special_service status');
        return Redirect::to('all-special_services');
    }   


    public function edit_special_service($special_service_id){
        $this->AuthentificationLogin();
        $edit_special_service = DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->get();
        $manager_special_service = view('admin.special_service.edit_special_service')->with('edit_special_service',$edit_special_service);
        return view('layouts.admin')->with('admin.special_service.edit_special_service', $manager_special_service);
    }   
    public function update_special_service(Request $request,$special_service_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['special_service_name'] = $request->special_service_name;
        $data['special_service_address'] = $request->special_service_address;
        $data['special_service_email'] = $request->special_service_email;
        $data['special_service_phone'] = $request->special_service_phone;
        $data['special_service_image'] = $request->special_service_image;

        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update($data);
        Session::put('message','Successfully updated this special_service!');
        return Redirect::to('all-special_services');
    }
    public function delete_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->delete();
        Session::put('message','Successfully deleted this special_service!');
        return Redirect::to('all-special_services');
    }

}
