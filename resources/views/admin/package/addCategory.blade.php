@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
	<section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title space-bot-0">Add Package Category</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => '/admin/handleAddPackageCategory', 'class' => 'basic-form', 'method' => 'post')) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    {!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Package Category Name', 'required' => 'required')) !!}
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    {!! Form::textarea('description', null, array('class' => 'form-control',  'placeholder' => 'Category Description', 'rows' => '4')) !!}
                                </div>
                            </div>
                        </div>          
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::submit('submit', array('class' => 'btn btn-default')) !!}
                            </div>
                        </div>    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </section>
@endsection
@section('script')
<!--page level script-->
@endsection