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
                    <form role="form" action="{{URL::to('/save-specialist')}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Specialist Name</label>
                            <input type="text" name="specialist_name" class="form-control" id="exampleInputEmail1"
                                required="" placeholder="specialist name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="specialist_image" class="form-control" id="exampleInputEmail1"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Specialist Email</label>
                            <input type="text" name="specialist_email" class="form-control" id="exampleInputEmail1"
                                required="" placeholder="specialist email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Specialist Phone Number</label>
                            <input type="text" name="specialist_phone" class="form-control" id="exampleInputEmail1"
                                required="" placeholder="specialist phone number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Position</label>
                            <select name="specialist_position" class="form-control input-sm m-bot15">
                                @foreach ($specialist_position as $key => $position_value)
                                <option value="{{$position_value->position_id}}">{{$position_value->position_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Base</label>
                            <select name="specialist_base" class="form-control input-sm m-bot15" id="base-dropdown">
                                <option value="">--- Select Base ---</option>
                                @foreach ($base as $base_value)
                                <option value="{{$base_value->base_id}}">
                                    {{$base_value->base_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- department --}}
                        <div class="form-group">
                            {{-- <label for="exampleInputPassword1">Department</label>
                            <select name="specialist_department" class="form-control input-sm m-bot15">
                            </select> --}}
                            <label for="exampleInputPassword1">Department</label>
                            <select name="specialist_department" class="form-control input-sm m-bot15" class="department" id="department-dropdown">
                                @foreach ($department as $department_value)
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Academic Rank</label>
                            <select name="specialist_academic_rank" class="form-control input-lg m-bot15">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Degree</label>
                            <select name="specialist_degree" class="form-control input-lg m-bot15">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Specialist introduction</label>
                            <textarea style="resize:none" rows="5" type="text" name="specialist_introduction"
                                class="form-control" id="exampleInputPassword1" required=""
                                placeholder="specialist introduction"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Members Of The Organizing Committee</label>
                            <textarea style="resize:none" rows="5" type="text"
                                name="specialist_members_of_the_organizing_committee" class="form-control"
                                id="exampleInputPassword1" required="" placeholder="specialist introduction"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Specialist Areas Of Expertise</label>
                            <textarea style="resize:none" rows="5" type="text" name="specialist_areas_of_expertise"
                                class="form-control" id="exampleInputPassword1" required=""
                                placeholder="specialist introduction"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Specialist Award Title</label>
                            <textarea style="resize:none" rows="5" type="text" name="specialist_award_title"
                                class="form-control" id="exampleInputPassword1" required=""
                                placeholder="specialist introduction"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Specialist Research Works</label>
                            <textarea style="resize:none" rows="5" type="text" name="specialist_research_works"
                                class="form-control" id="exampleInputPassword1" required=""
                                placeholder="specialist introduction"></textarea>
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
<script>
    $(document).ready(function () {
        $('#base-dropdown').on('change', function () {
            var base_id = this.value;
            $("#department-dropdown").html('');
            $.ajax({
                url: "{{ route('get:get_Department')}}",
                type: "POST",
                data: {
                    base_id: base_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#department-dropdown').html('<option value="">Select department</option>');
                    $.each(result.department, function (key, value) {
                        $("#department-dropdown").append('<option value="' + value.department_id + '">' + value.department_name + '</option>');
                    });
                    
                }
            });
        });

    });
</script>
@endsection