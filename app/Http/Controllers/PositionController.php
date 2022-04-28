<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class PositionController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_position(){
        $this->AuthentificationLogin();
        return view('admin.position.add_position');
    }
    public function all_positions(){
        $this->AuthentificationLogin();
        $all_positions = DB::table('tbl_position')->get();
        $manager_position = view('admin.position.all_positions')->with('all_positions',$all_positions);
        return view('layouts.admin')->with('admin.position.all_positions', $manager_position);
    }
    public function save_position(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['position_name'] = $request->position_name;
        $data['position_status'] = $request->position_status;

        DB::table('tbl_position')->insert($data);
        Session::put('message','Successfully created a position!');
        return Redirect::to('all-positions');
    }

    public function active_position($position_id){
        $this->AuthentificationLogin();
        DB::table('tbl_position')->where('position_id',$position_id)->update(['position_status'=>0]);
        Session::put('message','successful to unactive position status');
        return Redirect::to('all-positions');
    }
    public function unactive_position($position_id){
        $this->AuthentificationLogin();
        DB::table('tbl_position')->where('position_id',$position_id)->update(['position_status'=>1]);
        Session::put('message','successful to active position status');
        return Redirect::to('all-positions');
    }   


    public function edit_position($position_id){
        $this->AuthentificationLogin();
        $edit_position = DB::table('tbl_position')->where('position_id',$position_id)->get();
        $manager_position = view('admin.position.edit_position')->with('edit_position',$edit_position);
        return view('layouts.admin')->with('admin.position.edit_position', $manager_position);
    }   
    public function update_position(Request $request,$position_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['position_name'] = $request->position_name;
        $data['position_status'] = $request->position_status;

        DB::table('tbl_position')->where('position_id',$position_id)->update($data);
        Session::put('message','Successfully updated this position!');
        return Redirect::to('all-positions');
    }
    public function delete_position($position_id){
        $this->AuthentificationLogin();
        DB::table('tbl_position')->where('position_id',$position_id)->delete();
        Session::put('message','Successfully deleted this position!');
        return Redirect::to('all-positions');
    }

}
