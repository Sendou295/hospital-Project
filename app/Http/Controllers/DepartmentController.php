<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\tbl_departments;
use Illuminate\Support\Facades\Redirect;
session_start();
class DepartmentController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_department(){
        $this->AuthentificationLogin();
        $department_base = DB::table('tbl_bases')->orderby('base_id','desc')->get();
        return view('admin.department.add_department')->with('department_base', $department_base);
    }
    public function all_departments(){
        $this->AuthentificationLogin();
        $all_departments = DB::table('tbl_departments')
        ->join('tbl_bases','tbl_bases.base_id','=','tbl_departments.base_id')
        ->orderby('tbl_departments.department_id','desc') ->get();
        $manager_department = view('admin.department.all_departments')->with('all_departments',$all_departments);
        return view('layouts.admin')->with('admin.department.all_departments', $manager_department);
    }
    public function save_department(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['department_name'] = $request->department_name;
        $data['department_introduction'] = $request->department_introduction;
        $data['base_id'] = $request->department_base;
        $data['department_status'] = $request->department_status;

        DB::table('tbl_departments')->insert($data);
        Session::put('message','Successfully created a department!');
        return Redirect::to('all-departments');
    }

    public function active_department($department_id){
        $this->AuthentificationLogin();
        DB::table('tbl_departments')->where('department_id',$department_id)->update(['department_status'=>0]);
        Session::put('message','successful to unactive department status');
        return Redirect::to('all-departments');
    }
    public function unactive_department($department_id){
        $this->AuthentificationLogin();
        DB::table('tbl_departments')->where('department_id',$department_id)->update(['department_status'=>1]);
        Session::put('message','successful to active department status');
        return Redirect::to('all-departments');
    }   


    public function edit_department($department_id){
        $this->AuthentificationLogin();
        $department_base = DB::table('tbl_bases')->orderby('base_id','desc')->get();

        $edit_department = DB::table('tbl_departments')->where('department_id',$department_id)->get();
        $manager_department = view('admin.department.edit_department')
        ->with('edit_department',$edit_department)
        ->with('department_base',$department_base);
        return view('layouts.admin')->with('admin.department.edit_department', $manager_department);
    }   
    public function update_department(Request $request,$department_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['department_name'] = $request->department_name;
        $data['department_introduction'] = $request->department_introduction;
        $data['base_id'] = $request->department_base;
        DB::table('tbl_departments')->where('department_id',$department_id)->update($data);
        Session::put('message','Successfully updated this department!');
        return Redirect::to('all-departments');
    }
    public function delete_department($department_id){
        $this->AuthentificationLogin();
        DB::table('tbl_departments')->where('department_id',$department_id)->delete();
        Session::put('message','Successfully deleted this department!');
        return Redirect::to('all-departments');
    }

}
