@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome! Add Category</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li class="active">Add Category</li>
            </ol>
        </div>
</div>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">Add Category</h3></div>
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
                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{ url('/save-category') }}" novalidate="novalidate">
                            @csrf

                            <div class="form-group ">
                                <label for="category_name" class="control-label col-lg-2">Category Name</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="category_name" name="category_name" type="text" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_description" class="control-label col-lg-2">Category Description</label>
                                <div class="col-lg-10">
                                    <textarea class="summernote" name="category_description"></textarea>
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