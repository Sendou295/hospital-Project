@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Special Service
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class = "text-alert">',$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-special_service')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Special Service Department</label>
                        <select name="special_service_department" class="form-control input-sm m-bot15">
                            @foreach ($special_service_department as $key => $department_value)
                            <option value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Special Service Name</label>
                        <input type="text" name="special_service_name" class="form-control" id="exampleInputEmail1" required="" placeholder="Special Service name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="special_service_image" class="form-control" id="exampleInputEmail1" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Special Service Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="special_service_desc" class="form-control" id="exampleInputPassword1" required="" placeholder="Special Service description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Special Service Status</label>
                        <select name="special_service_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_special_service" class="btn btn-info">Create Special Service</button>
                </form>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

