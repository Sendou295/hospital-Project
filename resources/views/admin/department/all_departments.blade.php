@extends('layouts.admin')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Department Table
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Department name</th>
                        <th>Introduction</th>
                        <th>Base</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_departments as $key => $department)
                    <tr>
                        <td>{{$department->department_name}}</td>
                        <td>{{$department->department_introduction}}</td>
                        <td>{{$department->base_name}}</td>
                        <td><span class="text-ellipsis">
                            <?php
                            if($department->department_status==0){
                            ?>
                             <a href="{{URL::to('/unactive-department/'.$department->department_id)}}"><span class="fa-eye-styling far fa-eye-slash"></span></a>
                            <?php
                            }
                            else
                            {
                            ?>
                               <a href="{{URL::to('/active-department/'.$department->department_id)}}"><span class="fa-eye-styling far fa-eye"></span></a>
                            <?php
                            }
                            ?>    
                            </span></td>                     
                        <td>
                            <a href="{{URL::to('/edit-department/'.$department->department_id)}}" class="active style-edit" ui-toggle-class="">
                                <i
                                    class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Are you sure to delete this department?')" href="{{URL::to('/delete-department/'.$department->department_id)}}" class="active style-edit" ui-toggle-class="">
                                <i
                                    class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection

