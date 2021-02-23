@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome! Add Product</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li class="active">Add Product</li>
            </ol>
        </div>
</div>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">Add Product</h3></div>
                <p class="alert-success">
                <?php

                    $message = Session::get('message');

                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }

                ?>

                </p>


                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{ url('/save-product') }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group ">
                                <label for="product_name" class="control-label col-lg-2">Product Name</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="product_name" name="product_name" type="text" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="select2" name="category_id">
                                        <option value="">Select Category Name</option>
                                        @php
                                            $category = DB::table('tbl_category')
                                                        ->where('publication_status', 1)
                                                        ->get();
                                        @endphp
                                        @foreach($category as $v_category)
                                            <option value="{{ $v_category->category_id }}">{{ $v_category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Manufacture Name</label>
                                <div class="col-sm-10">
                                    <select class="select2" name="manufacture_id">
                                        <option value="">Select Manufacture Name</option>
                                        @php
                                            $manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status', 1)
                                                        ->get();
                                        @endphp
                                        @foreach($manufacture as $v_manufacture)
                                            <option value="{{ $v_manufacture->manufacture_id }}">{{ $v_manufacture->manufacture_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="product_short_description" class="control-label col-lg-2">Product Short Description</label>
                                <div class="col-lg-10">
                                    <textarea class="summernote" name="product_short_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_long_description" class="control-label col-lg-2">Product Long Description</label>
                                <div class="col-lg-10">
                                    <textarea class="summernote" name="product_long_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="product_image" class="control-label col-lg-2">Product Image</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="product_image" name="product_image" type="file" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="product_price" class="control-label col-lg-2">Product Price</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="product_price" name="product_price" type="text" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="product_size" class="control-label col-lg-2">Product Size</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="product_size" name="product_size" type="text" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="product_color" class="control-label col-lg-2">Product Color</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="product_color" name="product_color" type="text" aria-required="true">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="publication_status" class="control-label col-lg-2">Publication Status</label>
                                <div class="col-lg-10">
                                    <input type="radio" name="publication_status" id="active" value="1">
                                    <label for="active">Active</label>
                                    <input type="radio" name="publication_status" id="inactive" value="0">
                                    <label for="inactive">Inactive</label>
                                </div>
                            </div>
                                               
                                                
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                    <button class="btn btn-default waves-effect" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .form -->
                </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div>
@endsection