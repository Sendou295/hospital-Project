@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Department
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_department as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-department/'.$edit_value->department_id)}}" 
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" value="{{$edit_value->department_name}}" name="department_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Introduction</label>
                        <textarea style="resize:none" rows="5" type="text" name="department_introduction" class="form-control" 
                        id="exampleInputPassword1" >{{$edit_value->department_introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Base</label>
                        <select name="base" class="form-control input-sm m-bot15">
                            @foreach ($base as $key => $base_value)
                            @if($base_value->base_id==$edit_value->base_id)
                            <option selected value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @else
                            <option value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" name="update_department" class="btn btn-info">Update</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

