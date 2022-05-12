@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Equipment
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_equipment as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-equipment/'.$edit_value->equipment_id)}}" 
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Equipment Name</label>
                        <input type="text" value="{{$edit_value->equipment_name}}" name="equipment_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="equipment_desc" class="form-control" 
                        id="exampleInputPassword1" >{{$edit_value->equipment_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Service</label>
                        <select name="service" class="form-control input-sm m-bot15">
                            @foreach ($service as $key => $service_value)
                            @if($service_value->service_id==$edit_value->service_id)
                            <option selected value="{{$service_value->service_id}}">{{$service_value->service_name}}</option>
                            @else
                            <option value="{{$service_value->service_id}}">{{$service_value->service_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" name="update_equipment" class="btn btn-info">Update Equipment</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

