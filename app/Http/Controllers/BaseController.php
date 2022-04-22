<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BaseController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_base(){
        $this->AuthentificationLogin();
        return view('admin.base.add_base');
    }
    public function all_bases(){
        $this->AuthentificationLogin();
        $all_bases = DB::table('tbl_base')->get();
        $manager_base = view('admin.base.all_bases')->with('all_bases',$all_bases);
        return view('layouts.admin')->with('admin.base.all_bases', $manager_base);
    }
    public function save_base(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['base_name'] = $request->base_name;
        $data['base_address'] = $request->base_address;
        $data['base_email'] = $request->base_email;
        $data['base_phone'] = $request->base_phone;
        $data['base_image'] = $request->base_image;
        $data['base_status'] = $request->base_status;

        DB::table('tbl_base')->insert($data);
        Session::put('message','Successfully created a base!');
        return Redirect::to('all-bases');
    }

    public function active_base($base_id){
        $this->AuthentificationLogin();
        DB::table('tbl_base')->where('base_id',$base_id)->update(['base_status'=>0]);
        Session::put('message','successful to unactive base status');
        return Redirect::to('all-bases');
    }
    public function unactive_base($base_id){
        $this->AuthentificationLogin();
        DB::table('tbl_base')->where('base_id',$base_id)->update(['base_status'=>1]);
        Session::put('message','successful to active base status');
        return Redirect::to('all-bases');
    }   


    public function edit_base($base_id){
        $this->AuthentificationLogin();
        $edit_base = DB::table('tbl_base')->where('base_id',$base_id)->get();
        $manager_base = view('admin.base.edit_base')->with('edit_base',$edit_base);
        return view('layouts.admin')->with('admin.base.edit_base', $manager_base);
    }   
    public function update_base(Request $request,$base_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['base_name'] = $request->base_name;
        $data['base_address'] = $request->base_address;
        $data['base_email'] = $request->base_email;
        $data['base_phone'] = $request->base_phone;
        $data['base_image'] = $request->base_image;

        DB::table('tbl_base')->where('base_id',$base_id)->update($data);
        Session::put('message','Successfully updated this base!');
        return Redirect::to('all-bases');
    }
    public function delete_base($base_id){
        $this->AuthentificationLogin();
        DB::table('tbl_base')->where('base_id',$base_id)->delete();
        Session::put('message','Successfully deleted this base!');
        return Redirect::to('all-bases');
    }

}
