<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class serviceController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_service(){
        $this->AuthentificationLogin();
        return view('admin.service.add_service');
    }
    public function all_services(){
        $this->AuthentificationLogin();
        $all_services = DB::table('tbl_service')->get();
        $manager_service = view('admin.service.all_services')->with('all_services',$all_services);
        return view('layouts.admin')->with('admin.service.all_services', $manager_service);
    }
    public function save_service(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['service_name'] = $request->service_name;
        $data['service_address'] = $request->service_address;
        $data['service_email'] = $request->service_email;
        $data['service_phone'] = $request->service_phone;
        $data['service_image'] = $request->service_image;
        $data['service_status'] = $request->service_status;

        DB::table('tbl_service')->insert($data);
        Session::put('message','Successfully created a service!');
        return Redirect::to('all-services');
    }

    public function active_service($service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_service')->where('service_id',$service_id)->update(['service_status'=>0]);
        Session::put('message','successful to unactive service status');
        return Redirect::to('all-services');
    }
    public function unactive_service($service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_service')->where('service_id',$service_id)->update(['service_status'=>1]);
        Session::put('message','successful to active service status');
        return Redirect::to('all-services');
    }   


    public function edit_service($service_id){
        $this->AuthentificationLogin();
        $edit_service = DB::table('tbl_service')->where('service_id',$service_id)->get();
        $manager_service = view('admin.service.edit_service')->with('edit_service',$edit_service);
        return view('layouts.admin')->with('admin.service.edit_service', $manager_service);
    }   
    public function update_service(Request $request,$service_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['service_name'] = $request->service_name;
        $data['service_address'] = $request->service_address;
        $data['service_email'] = $request->service_email;
        $data['service_phone'] = $request->service_phone;
        $data['service_image'] = $request->service_image;

        DB::table('tbl_service')->where('service_id',$service_id)->update($data);
        Session::put('message','Successfully updated this service!');
        return Redirect::to('all-services');
    }
    public function delete_service($service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_service')->where('service_id',$service_id)->delete();
        Session::put('message','Successfully deleted this service!');
        return Redirect::to('all-services');
    }

}
