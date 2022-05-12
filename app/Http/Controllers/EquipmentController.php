<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class EquipmentController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_equipment(){
        $this->AuthentificationLogin();
        $equipment_service = DB::table('tbl_service')->orderby('service_id','desc')->get();
        return view('admin.equipment.add_equipment')->with('equipment_service',$equipment_service);
    }
    public function all_equipments(){
        $this->AuthentificationLogin();
        $all_equipments = DB::table('tbl_equipment')->get();
        $manager_equipment = view('admin.equipment.all_equipments')->with('all_equipments',$all_equipments);
        return view('layouts.admin')->with('admin.equipment.all_equipments', $manager_equipment);
    }
    public function save_equipment(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['equipment_name'] = $request->equipment_name;
        $data['equipment_desc'] = $request->equipment_desc;
        $data['service_id'] = $request->equipment_service;
        $data['equipment_status'] = $request->equipment_status;
        $data['equipment_image'] = $request->equipment_image;

        $get_image = $request->file('equipment_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/equipment',$new_image);
            $data['equipment_image'] = $new_image;
            DB::table('tbl_equipment')->insert($data);
            Session::put('message','successful equipment creation');
            return Redirect::to('all-equipments');
        }
        $data['equipment_image'] = ' ';
        DB::table('tbl_equipment')->insert($data);
        Session::put('message','Successfully created a equipment!');
        return Redirect::to('all-equipments');
    }

    public function active_equipment($equipment_id){
        $this->AuthentificationLogin();
        DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->update(['equipment_status'=>0]);
        Session::put('message','successful to unactive equipment status');
        return Redirect::to('all-equipments');
    }
    public function unactive_equipment($equipment_id){
        $this->AuthentificationLogin();
        DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->update(['equipment_status'=>1]);
        Session::put('message','successful to active equipment status');
        return Redirect::to('all-equipments');
    }   


    public function edit_equipment($equipment_id){
        $this->AuthentificationLogin();
        $edit_equipment = DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->get();
        $manager_equipment = view('admin.equipment.edit_equipment')->with('edit_equipment',$edit_equipment);
        return view('layouts.admin')->with('admin.equipment.edit_equipment', $manager_equipment);
    }   
    public function update_equipment(Request $request,$equipment_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['equipment_name'] = $request->equipment_name;
        $data['equipment_desc'] = $request->equipment_desc;
        $data['service_id'] = $request->equipment_service;
        $data['equipment_status'] = $request->equipment_status;
        $data['equipment_image'] = $request->equipment_image;
        $get_image = $request->file('equipment_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/equipment',$new_image);
            $data['equipment_image'] = $new_image;
            DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->update($data);
            Session::put('message','successful update equipment');
            return Redirect::to('all-equipments');
        }

        DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->update($data);
        Session::put('message','Successfully updated this equipment!');
        return Redirect::to('all-equipments');
    }
    public function delete_equipment($equipment_id){
        $this->AuthentificationLogin();
        DB::table('tbl_equipment')->where('equipment_id',$equipment_id)->delete();
        Session::put('message','Successfully deleted this equipment!');
        return Redirect::to('all-equipments');
    }

}
