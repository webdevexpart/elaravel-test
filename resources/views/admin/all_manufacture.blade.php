@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome! All Manufacture</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li class="active">All Manufacture</li>
            </ol>
        </div>
</div>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">All Manufacture</h3></div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Manufacture Name</th>
                                <th>Manufacture Description</th>
                                <th>Manufacture Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @foreach($all_manufacture_info as $v_manufacture)
                        <tbody>
                            <tr>
                                <td>{{ $v_manufacture->manufacture_id }}</td>
                                <td>{{ $v_manufacture->manufacture_name }}</td>
                                <td>{{ $v_manufacture->manufacture_description }}</td>
                                <td>
                                    @if($v_manufacture->publication_status == 1)
                                        <span class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">Active</span>
                                    @else
                                        <span class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                @if($v_manufacture->publication_status == 1)
                                    <a href="{{ URL::to('/inactive-manufacture/'. $v_manufacture->manufacture_id)}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </a>
                                @else
                                    <a href="{{ URL::to('/active-manufacture/'. $v_manufacture->manufacture_id)}}" class="btn btn-icon waves-effect waves-light btn-warning m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-down"></i>
                                    </a>
                                @endif
                                    <a href="{{ URL::to('/edit-manufacture/'. $v_manufacture->manufacture_id)}}" class="btn btn-icon waves-effect waves-light btn-info m-b-5 btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ URL::to('/delete-manufacture/'. $v_manufacture->manufacture_id)}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>


                    <p class="alert-success text-center">

                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message', null);
                            }
                        ?>

                    </p>
                </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div>
@endsection