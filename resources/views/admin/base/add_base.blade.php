@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Base
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
                    <form role="form" action="{{URL::to('/save-base')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Base Name</label>
                        <input type="text" name="base_name" class="form-control" id="exampleInputEmail1" required="" placeholder="Name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Base Address</label>
                        <input type="text" name="base_address" class="form-control" id="exampleInputEmail1" required="" placeholder="Address"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Base Email</label>
                        <input type="text" name="base_email" class="form-control" id="exampleInputEmail1" required="" placeholder="Email"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Base Phone</label>
                        <input type="text" name="base_phone" class="form-control" id="exampleInputEmail1" required="" placeholder="Phone number"> 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="base_image" class="form-control" id="exampleInputEmail1" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="base_status" class="form-control input-sm m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_base" class="btn btn-info">Create</button>
                </form>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection

