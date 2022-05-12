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
        $special_service_department = DB::table('tbl_departments')->orderby('department_id','desc')->get();
        return view('admin.special_service.add_special_service')->with('special_service_department', $special_service_department);
    }
    public function all_special_services(){
        $this->AuthentificationLogin();
        $all_special_services = DB::table('tbl_special_service')
        ->join('tbl_departments','tbl_departments.department_id','=','tbl_special_service.department_id')
        ->orderby('tbl_special_service.special_service_id','desc') ->get();
        $manager_special_service = view('admin.special_service.all_special_services')->with('all_special_services',$all_special_services);
        return view('layouts.admin')->with('admin.special_service.all_special_services', $manager_special_service);
    }
    public function save_special_service(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['department_id'] = $request->special_service_department;
        $data['special_service_name'] = $request->special_service_name;
        $data['special_service_image'] = $request->special_service_image;
        $data['special_service_desc'] = $request->special_service_desc;
        $data['special_service_status'] = $request->special_service_status;

        $get_image = $request->file('special_service_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/special_service',$new_image);
            $data['special_service_image'] = $new_image;
            DB::table('tbl_special_service')->insert($data);
            Session::put('message','successful special service creation');
            return Redirect::to('all-special_services');
        }
        $data['special_service_image'] = ' ';
        DB::table('tbl_special_service')->insert($data);
        Session::put('message','Successfully created a special service!');
        return Redirect::to('all-special_services');
    }

    public function active_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update(['special_service_status'=>0]);
        Session::put('message','successful to unactive special service status');
        return Redirect::to('all-special_services');
    }
    public function unactive_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update(['special_service_status'=>1]);
        Session::put('message','successful to active special service status');
        return Redirect::to('all-special_services');
    }   


    public function edit_special_service($special_service_id){
        $this->AuthentificationLogin();
        $special_service_department = DB::table('tbl_departments')->orderby('department_id','desc')->get();

        $edit_special_service = DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->get();
        $manager_special_service = view('admin.special_service.edit_special_service')
        ->with('edit_special_service',$edit_special_service)
        ->with('special_service_department',$special_service_department);
        return view('layouts.admin')->with('admin.special_service.edit_special_service', $manager_special_service);
    }   
    public function update_special_service(Request $request,$special_service_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['department_id'] = $request->special_service_department;
        $data['special_service_name'] = $request->special_service_name;
        $data['special_service_desc'] = $request->special_service_desc;
        $data['special_service_image'] = $request->special_service_image;
        $data['special_service_status'] = $request->special_service_status;
        $get_image = $request->file('special_service_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/special_service',$new_image);
            $data['special_service_image'] = $new_image;
            DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update($data);
            Session::put('message','successful update special service');
            return Redirect::to('all-special_services');
        }
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->update($data);
        Session::put('message','Successfully updated this special service!');
        return Redirect::to('all-special_services');
    }
    public function delete_special_service($special_service_id){
        $this->AuthentificationLogin();
        DB::table('tbl_special_service')->where('special_service_id',$special_service_id)->delete();
        Session::put('message','Successfully deleted this special service!');
        return Redirect::to('all-special_services');
    }

}
