@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Opportunities</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Opportunities</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card card-primary">
                        <form method="POST" action="{{ route('opportunities.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="product">Select product</label>
                                                        <select name="product_id" id="product" class="form-control selectpicker" data-live-search="true">
                                                            @foreach ($products as $product)
                                                                <option data-tokens="{{ $product->name }}" value="{{ $product->id }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="customer">Select customer</label>
                                                        <select name="customer_id" id="customer" class="form-control selectpicker" data-live-search="true">
                                                            <option value="0" selected disabled>Customers</option>
                                                            @foreach ($customers as $customer)
                                                                <option data-tokens="{{ $customer->name }}" value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="user">Select user</label>
                                                        <select name="user_id" id="user" class="form-control selectpicker" data-live-search="true">
                                                            @foreach ($users as $user)
                                                                <option data-tokens="{{ $user->name }}" value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="count">Count</label>
                                                        <input type="number" name="count" id="count" class="form-control" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
