@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Department
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
                    <form role="form" action="{{URL::to('/save-department')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" name="department_name" class="form-control" id="exampleInputEmail1" required="" placeholder="department name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department introduction</label>
                        <textarea style="resize:none" rows="5" type="text" name="department_introduction" class="form-control" id="exampleInputPassword1" required="" placeholder="department introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department Base</label>
                        <select name="department_base" class="form-control input-sm m-bot15">
                            @foreach ($department_base as $key => $base_value)
                            <option value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department Status</label>
                        <select name="department_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_department" class="btn btn-info">Create Department</button>
                </form>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

