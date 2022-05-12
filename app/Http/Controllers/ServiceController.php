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
        $service_department = DB::table('tbl_departments')->orderby('department_id','desc')->get();
        return view('admin.service.add_service')->with('service_department', $service_department);
    }
    public function all_services(){
        $this->AuthentificationLogin();
        $all_services = DB::table('tbl_service')
        ->join('tbl_departments','tbl_departments.department_id','=','tbl_service.department_id')
        ->orderby('tbl_service.service_id','desc') ->get();
        $manager_service = view('admin.service.all_services')->with('all_services',$all_services);
        return view('layouts.admin')->with('admin.service.all_services', $manager_service);
    }
    public function save_service(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['department_id'] = $request->service_department;
        $data['service_name'] = $request->service_name;
        $data['service_image'] = $request->service_image;
        $data['service_desc'] = $request->service_desc;
        $data['service_status'] = $request->service_status;
        
        $get_image = $request->file('service_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/service',$new_image);
            $data['service_image'] = $new_image;
            DB::table('tbl_service')->insert($data);
            Session::put('message','successful service creation');
            return Redirect::to('all-services');
        }
        $data['service_image'] = ' ';

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
        $service_department = DB::table('tbl_departments')->orderby('department_id','desc')->get();

        $edit_service = DB::table('tbl_service')->where('service_id',$service_id)->get();
        $manager_service = view('admin.service.edit_service')
        ->with('edit_service',$edit_service)
        ->with('service_department',$service_department);
        return view('layouts.admin')->with('admin.service.edit_service', $manager_service);
    }   
    public function update_service(Request $request,$service_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['department_id'] = $request->service_department;
        $data['service_name'] = $request->service_name;
        $data['service_desc'] = $request->service_desc;
        $data['service_image'] = $request->service_image;
        $data['service_status'] = $request->service_status;
        $get_image = $request->file('service_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/service',$new_image);
            $data['service_image'] = $new_image;
            DB::table('tbl_service')->where('service_id',$service_id)->update($data);
            Session::put('message','successful update service');
            return Redirect::to('all-services');
        }
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
