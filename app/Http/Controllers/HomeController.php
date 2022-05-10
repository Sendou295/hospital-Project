<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    
    public function index(){
    $specialist_base = DB::table('tbl_base')->where('base_status','1')->orderby('base_id','desc')->get();
    $specialist_department = DB::table('tbl_department')->where('department_status','1')->orderby('department_id','desc')->get();
    $specialist_equipment = DB::table('tbl_equipment')->where('equipment_status','1')->orderby('equipment_id','desc')->get();
    $specialist_service = DB::table('tbl_service')->where('service_status','1')->orderby('service_id','desc')->get();
    $specialist_special_service = DB::table('tbl_special_service')->where('special_service_status','1')->orderby('special_service_id','desc')->get();
    $specialist_position = DB::table('tbl_position')->where('position_status','1')->orderby('position_id','desc')->get();
    
    $all_specialists = DB::table('tbl_specialist')->where('specialist_status','1')
        ->join('tbl_base','tbl_base.base_id','=','tbl_specialist.base_id')
        ->join('tbl_department','tbl_department.department_id','=','tbl_specialist.department_id')
        ->join('tbl_equipment','tbl_equipment.equipment_id','=','tbl_specialist.equipment_id')
        ->join('tbl_service','tbl_service.service_id','=','tbl_specialist.service_id')
        ->join('tbl_special_service','tbl_special_service.special_service_id','=','tbl_specialist.special_service_id')
        ->join('tbl_position','tbl_position.position_id','=','tbl_specialist.position_id')
        ->orderby('tbl_specialist.specialist_id','desc')->get();
        $manager_specialist = view('admin.specialist.all_specialists')->with('all_specialists',$all_specialists);
        
    return view('pages.home')->with('category',$product_category)
    ->with('base',$specialist_base)
    ->with('department',$specialist_department)
    ->with('equipment',$specialist_equipment)
    ->with('service',$specialist_service)
    ->with('special_service',$specialist_special_service)
    ->with('position',$specialist_position)
    ->with('all_specialists',$all_specialists);
    }
}
