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
        $specialist_position = DB::table('tbl_position')->orderby('position_id','desc')->get();
        $specialist_base = DB::table('tbl_base')->pluck("base_name","base_id");
        
        return view('admin.specialist.add_specialist',compact('specialist_base'))
        ->with('specialist_position', $specialist_position);

    }
    public function myformAjax($base_id)
    {
        $specialist_department = DB::table("tbl_department")
                    ->where("department_id",$base_id)
                    ->pluck("department_name","department_id");
        return json_encode($specialist_department);
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
        $data['specialist_image'] = $request->specialist_image;
        $data['specialist_email'] = $request->specialist_email;
        $data['specialist_phone'] = $request->specialist_phone;
        $data['position_id'] = $request->specialist_position;
        $data['base_id'] = $request->specialist_base;
        $data['department_id'] = $request->specialist_department;
        $data['specialist_academic_rank'] = $request->specialist_academic_rank;
        $data['specialist_degree'] = $request->specialist_degree;
        $data['specialist_introduction'] = $request->specialist_introduction;
        $data['specialist_members_of_the_organizing_committee'] = $request->specialist_members_of_the_organizing_committee;
        $data['specialist_areas_of_expertise'] = $request->specialist_areas_of_expertise;
        $data['specialist_award_title'] = $request->specialist_award_title;
        $data['specialist_research_works'] = $request->specialist_research_works;
        $data['specialist_status'] = $request->specialist_status;
        $get_image = $request->file('specialist_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/specialist',$new_image);
            $data['specialist_image'] = $new_image;
            DB::table('tbl_specialist')->insert($data);
            Session::put('message','successful specialist creation');
            return Redirect::to('all-specialists');
        }
        $data['specialist_image'] = ' ';
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
        $data['specialist_image'] = $request->specialist_image;
        $data['specialist_email'] = $request->specialist_email;
        $data['specialist_phone'] = $request->specialist_phone;
        $data['position_id'] = $request->specialist_position;
        $data['base_id'] = $request->specialist_base;
        $data['department_id'] = $request->specialist_department;
        $data['specialist_academic_rank'] = $request->specialist_academic_rank;
        $data['specialist_degree'] = $request->specialist_degree;
        $data['specialist_introduction'] = $request->specialist_introduction;
        $data['specialist_members_of_the_organizing_committee'] = $request->specialist_members_of_the_organizing_committee;
        $data['specialist_areas_of_expertise'] = $request->specialist_areas_of_expertise;
        $data['specialist_award_title'] = $request->specialist_award_title;
        $data['specialist_research_works'] = $request->specialist_research_works;
        $data['specialist_status'] = $request->specialist_status;

        $get_image = $request->file('specialist_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/specialist',$new_image);
            $data['specialist_image'] = $new_image;
            DB::table('tbl_specialist')->where('specialist_id',$specialist_id)->update($data);
            Session::put('message','successful update specialist');
            return Redirect::to('all-specialists');
        }
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
