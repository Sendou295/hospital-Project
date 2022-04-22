@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Service
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
                    <form role="form" action="{{URL::to('/save-service')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="exampleInputEmail1" required="" placeholder="service name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Service Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="service_desc" class="form-control" id="exampleInputPassword1" required="" placeholder="service introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department</label>
                        <select name="department" class="form-control input-sm m-bot15">
                            @foreach ($department as $key => $department_value)
                            <option value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="service_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/upload/service/'.$service->service_image)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Service Status</label>
                        <select name="service_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_service" class="btn btn-info">Create Service</button>
                </form>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

