@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Position
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
                    <form role="form" action="{{URL::to('/save-position')}}" method="POST" >
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Position Name</label>
                        <input type="text" name="position_name" class="form-control" id="exampleInputEmail1" required="" placeholder="position name"> 
                    </div>     
                    <div class="form-group">
                        <label for="exampleInputPassword1">Position Status</label>
                        <select name="position_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>               
                    <button type="submit" name="add_position" class="btn btn-info">Create</button>
                    </form>
                    
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

