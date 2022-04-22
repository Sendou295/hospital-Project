@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Specialist
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
                    <form role="form" action="{{URL::to('/save-specialist')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Name</label>
                        <input type="text" name="specialist_name" class="form-control" id="exampleInputEmail1" required="" placeholder="specialist name"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="specialist_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/upload/specialist/'.$specialist->specialist_image)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Email</label>
                        <input type="text" name="specialist_email" class="form-control" id="exampleInputEmail1" required="" placeholder="specialist email"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Phone Number</label>
                        <input type="text" name="specialist_phone" class="form-control" id="exampleInputEmail1" required="" placeholder="specialist phone number"> 
                    </div>

                    {{-- department --}}

                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <select name="position" class="form-control input-sm m-bot15">
                            @foreach ($position as $key => $position_value)
                            <option value="{{$position_value->position_id}}">{{$position_value->position_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Academic Rank</label>
                        <select name="academicRank" class="form-control input-lg m-bot15">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Degree</label>
                        <select name="academicRank" class="form-control input-lg m-bot15">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Base</label>
                        <select name="base" class="form-control input-sm m-bot15">
                            @foreach ($base as $key => $base_value)
                            <option value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist introduction</label>
                        <textarea style="resize:none" rows="5" type="text" name="specialist_introduction" class="form-control" id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Members Of The Organizing Committee</label>
                        <textarea style="resize:none" rows="5" type="text" name="membersOfTheOrganizingCommittee" class="form-control" id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Areas Of Expertise</label>
                        <textarea style="resize:none" rows="5" type="text" name="areasOfExpertise" class="form-control" id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Award Title</label>
                        <textarea style="resize:none" rows="5" type="text" name="awardTitle" class="form-control" id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Research Works</label>
                        <textarea style="resize:none" rows="5" type="text" name="researchWorks" class="form-control" id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Status</label>
                        <select name="specialist_status" class="form-control input-sm m-bot15">
                            <option value="1">Working</option>
                            <option value="0">Busy</option>
                        </select>
                    </div>
                    <button type="submit" name="add_specialist" class="btn btn-info">Create Specialist</button>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

