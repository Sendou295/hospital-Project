@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Base
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_base as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-base/'.$edit_value->base_id)}}" 
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" value="{{$edit_value->base_name}}" name="base_name" 
                                class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" value="{{$edit_value->base_address}}" name="base_address" 
                                class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" value="{{$edit_value->base_email}}" name="base_email" 
                                class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" value="{{$edit_value->base_phone}}" name="base_phone" 
                                class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" name="base_image" class="form-control" id="exampleInputEmail1">
                                <img src="{{URL::to('upload/base/'.$edit_value->base_image)}}" height="100" width="100">
                                
                            </div>

                            <button type="submit" name="update_base" class="btn btn-info">Update</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

