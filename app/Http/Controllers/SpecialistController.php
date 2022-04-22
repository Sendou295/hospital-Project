<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SpecialistController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_specialist(){
        $this->AuthentificationLogin();
        return view('admin.specialist.add_specialist');
    }
    public function all_specialists(){
        $this->AuthentificationLogin();
        $all_specialists = DB::table('tbl_specialist')->get();
        $manager_specialist = view('admin.specialist.all_specialists')->with('all_specialists',$all_specialists);
        return view('layouts.admin')->with('admin.specialist.all_specialists', $manager_specialist);
    }
    public function save_specialist(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['specialist_name'] = $request->specialist_name;
        $data['specialist_address'] = $request->specialist_address;
        $data['specialist_email'] = $request->specialist_email;
        $data['specialist_phone'] = $request->specialist_phone;
        $data['specialist_image'] = $request->specialist_image;
        $data['specialist_status'] = $request->specialist_status;

        DB::table('tbl_specialist')->insert($data);
        Session::put('message','Successfully created a specialist!');
        return Redirect::to('all-specialists');
    }

    public function active_specialist($specialist_id){
        $this->AuthentificationLogin();
        DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->update(['specialist_status'=>0]);
        Session::put('message','successful to unactive specialist status');
        return Redirect::to('all-specialists');
    }
    public function unactive_specialist($specialist_id){
        $this->AuthentificationLogin();
        DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->update(['specialist_status'=>1]);
        Session::put('message','successful to active specialist status');
        return Redirect::to('all-specialists');
    }   


    public function edit_specialist($specialist_id){
        $this->AuthentificationLogin();
        $edit_specialist = DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->get();
        $manager_specialist = view('admin.specialist.edit_specialist')->with('edit_specialist',$edit_specialist);
        return view('layouts.admin')->with('admin.specialist.edit_specialist', $manager_specialist);
    }   
    public function update_specialist(Request $request,$specialist_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['specialist_name'] = $request->specialist_name;
        $data['specialist_address'] = $request->specialist_address;
        $data['specialist_email'] = $request->specialist_email;
        $data['specialist_phone'] = $request->specialist_phone;
        $data['specialist_image'] = $request->specialist_image;

        DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->update($data);
        Session::put('message','Successfully updated this specialist!');
        return Redirect::to('all-specialists');
    }
    public function delete_specialist($specialist_id){
        $this->AuthentificationLogin();
        DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->delete();
        Session::put('message','Successfully deleted this specialist!');
        return Redirect::to('all-specialists');
    }

}
