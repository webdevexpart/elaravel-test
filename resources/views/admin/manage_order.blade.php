@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome! All Order</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li class="active">All Order</li>
            </ol>
        </div>
</div>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">All Order</h3></div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @foreach($all_order_info as $v_order)
                        <tbody>
                            <tr>
                                <td>{{ $v_order->order_id }}</td>
                                <td>{{ $v_order->customer_name }}</td>
                                <td>{{ $v_order->order_total }}</td>
                                <td>
                                    @if($v_order->order_status == 0)
                                        <span class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">Pending</span>
                                    @else
                                        <span class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">Complated</span>
                                    @endif
                                </td>
                                <td>
                                @if($v_order->order_status == 0)
                                    <a href="{{ URL::to('/inactive/'. $v_order->order_id)}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </a>
                                @else
                                    <a href="{{ URL::to('/active/'. $v_order->order_id)}}" class="btn btn-icon waves-effect waves-light btn-warning m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-down"></i>
                                    </a>
                                @endif
                                    <a href="{{ URL::to('/view-order-details/'. $v_order->order_id)}}" class="btn btn-icon waves-effect waves-light btn-info m-b-5 btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ URL::to('/delete/'. $v_order->order_id)}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">
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