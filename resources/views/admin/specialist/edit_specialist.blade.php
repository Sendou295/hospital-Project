@extends('layouts.admin')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Specialist
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_specialist as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-specialistt/'.$edit_value->specialist_id)}}" 
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Name</label>
                        <input type="text" value="{{$edit_value->specialist_name}}" name="specialist_name" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Image</label>
                        <input type="file" name="specialist_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/upload/specialist/'.$edit_value->specialist_image)}}" height="100" width="100">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Email</label>
                        <input type="text" value="{{$edit_value->specialist_email}}" name="specialist_email" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specialist Phone Number</label>
                        <input type="text" value="{{$edit_value->specialist_phone}}" name="specialist_phone" 
                        class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Base</label>
                        <select name="base" class="form-control input-sm m-bot15">
                            @foreach ($base as $base_value)
                            @if($base_value->base_id==$edit_value->base_id)
                            <option selected value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @else
                            <option value="{{$base_value->base_id}}">{{$base_value->base_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department</label>
                        <select name="department" class="form-control input-sm m-bot15">
                            @foreach ($department as $key => $department_value)
                            @if($department_value->department_id==$edit_value->department_id)
                            <option selected value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @else
                            <option value="{{$department_value->department_id}}">{{$department_value->department_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <select name="position" class="form-control input-sm m-bot15">
                            @foreach ($position as $key => $position_value)
                            @if($position_value->position_id==$edit_value->position_id)
                            <option selected value="{{$position_value->position_id}}">{{$position_value->position_name}}</option>
                            @else
                            <option value="{{$position_value->position_id}}">{{$position_value->position_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Academic Rank</label>
                        <select name="academicRank" class="form-control input-lg m-bot15">
                            <option selected value="{{$edit_value->specialist_academicRank}}"></option>
                            <option>Assistant Professor</option>
                            <option>Senior Assistant Professor</option>
                            <option>Associate Professor</option>
                            <option>Senior Associate professor</option>
                            <option>Professor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Degree</label>
                        <select name="academicRank" class="form-control input-lg m-bot15">
                            <option selected value="{{$edit_value->specialist_degree}}"></option>
                            <option>Master's Degree</option>
                            <option>PH.D Degree</option>
                            <option>College Degree</option>
                            <option>Bachelor Degree</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist introduction</label>
                        <textarea style="resize:none" rows="5" type="text" 
                            name="specialist_introduction" class="form-control" id="exampleInputPassword1" >{{$edit_value->specialist_introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Members Of The Organizing Committee</label>
                        <textarea style="resize:none" rows="5" type="text" 
                            name="membersOfTheOrganizingCommittee" class="form-control" id="exampleInputPassword1" >{{$edit_value->membersOfTheOrganizingCommittee}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Areas Of Expertise</label>
                        <textarea style="resize:none" rows="5" type="text" 
                            name="areasOfExpertise" class="form-control" id="exampleInputPassword1" >{{$edit_value->areasOfExpertise}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Award Title</label>
                        <textarea style="resize:none" rows="5" type="text" 
                            name="awardTitle" class="form-control" id="exampleInputPassword1" >{{$edit_value->awardTitle}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialist Research Works</label>
                        <textarea style="resize:none" rows="5" type="text" 
                            name="researchWorks" class="form-control" id="exampleInputPassword1" >{{$edit_value->researchWorks}}</textarea>
                    </div>
                    <button type="submit" name="update_department" class="btn btn-info">Update Specialist</button>
                </form>
                </div>
                @endforeach
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

