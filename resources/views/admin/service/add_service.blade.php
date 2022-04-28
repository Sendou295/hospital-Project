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
                    <form role="form" action="{{URL::to('/save-service')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Service Department</label>
                        <select name="service_department" class="form-control input-sm m-bot15">
                            @foreach ($service_department as $key => $department_value)
                            <option value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="exampleInputEmail1" required="" placeholder="service name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="service_image" class="form-control" id="exampleInputEmail1" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Service Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="service_desc" class="form-control" id="exampleInputPassword1" required="" placeholder="service description"></textarea>
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

