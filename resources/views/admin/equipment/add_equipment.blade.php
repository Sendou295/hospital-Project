@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Equipment
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
                    <form role="form" action="{{URL::to('/save-equipment')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Equipment Name</label>
                        <input type="text" name="equipment_name" class="form-control" id="exampleInputEmail1" required="" placeholder="equipment name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Equipment Description</label>
                        <textarea style="resize:none" rows="5" type="text" name="equipment_desc" class="form-control" id="exampleInputPassword1" required="" placeholder="equipment description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Equipment Service</label>
                        <select name="equipment_service" class="form-control input-sm m-bot15">
                            @foreach ($equipment_service as $key => $service_value)
                            <option value="{{$service_value->service_id}}">{{$service_value->service_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Equipment Status</label>
                        <select name="equipment_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_equipment" class="btn btn-info">Create Equipment</button>
                </form>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

