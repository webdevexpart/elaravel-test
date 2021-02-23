@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome! All Product</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li class="active">All Product</li>
            </ol>
        </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">All Product</h3></div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Category Name</th>
                                <th>Manufacture Name</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @foreach($all_product_info as $v_product)
                        <tbody>
                            <tr>
                                <td>{{ $v_product->product_id }}</td>
                                <td>{{ $v_product->product_name }}</td>
                                <td>{!! $v_product->product_short_description !!}</td>
                                <td>
                                    <img src="{{ URL::to($v_product->product_image) }}" alt="" style="width:50px">
                                </td>
                                <td>{{ $v_product->product_price }} Tk</td>
                                <td>{{ $v_product->category_name }}</td>
                                <td>{{ $v_product->manufacture_name }}</td>
                      
                                <td>
                                    @if($v_product->publication_status == 1)
                                        <span class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">Active</span>
                                    @else
                                        <span class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">Inactive</span>
                                    @endif
                                </td>
                               
                                <td>
                                @if($v_product->publication_status == 1)
                                    <a href="{{ URL::to('/inactive-product/'. $v_product->product_id)}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </a>
                                @else
                                    <a href="{{ URL::to('/active-product/'. $v_product->product_id)}}" class="btn btn-icon waves-effect waves-light btn-warning m-b-5 btn-sm">
                                        <i class="fa fa-thumbs-o-down"></i>
                                    </a>
                                @endif
                                    <a href="{{ URL::to('/edit-product/'. $v_product->product_id)}}" class="btn btn-icon waves-effect waves-light btn-info m-b-5 btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ URL::to('/delete-product/'. $v_product->product_id)}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-sm">
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