@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Position
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_position as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-position/'.$edit_value->position_id)}}" 
                        method="POST">
                        {{ csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Position Name</label>
                        <input type="text" value="{{$edit_value->position_name}}" name="position_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    
                    <button type="submit" name="update_position" class="btn btn-info">Update Position</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection

