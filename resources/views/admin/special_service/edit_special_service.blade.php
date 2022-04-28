@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Special Service
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_special_service as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-special_service/'.$edit_value->special_service_id)}}" 
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Special Service Name</label>
                        <input type="text" value="{{$edit_value->special_service_name}}" name="special_service_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="special_service_desc" class="form-control" 
                        id="exampleInputPassword1" >{{$edit_value->special_service_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department</label>
                        <select name="department" class="form-control input-sm m-bot15">
                            @foreach ($special_service_department as $key => $department_value)
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
                        <input type="file" name="special_service_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('upload/special_service/'.$edit_value->special_service_image)}}" height="100" width="100">
                    </div>
                    <button type="submit" name="update_special_service" class="btn btn-info">Update Special Service</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

