@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Service
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_service as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-service/'.$edit_value->service_id)}}" 
                        method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input type="text" value="{{$edit_value->service_name}}" name="service_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="service_desc" class="form-control" 
                        id="exampleInputPassword1" >{{$edit_value->service_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department</label>
                        <select name="department" class="form-control input-sm m-bot15">
                            @foreach ($department as $key => $department_value)
                            @if($department_value->department_id==$edit_value->department_id)
                            <option selected value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @else
                            <option value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="service_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/upload/service/'.$service->service_image)}}" height="100" width="100">
                    </div>
                    <button type="submit" name="update_service" class="btn btn-info">Update Service</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

