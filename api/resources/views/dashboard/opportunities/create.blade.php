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
                                                        <select name="product" id="product" class="form-control">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user">Select user</label>
                                                        <select name="user_id" id="user" class="form-control">
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="count">Count</label>
                                                        <input type="number" name="count" id="count" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="card card-primary card-outline card-outline-tabs">
                                                        <div class="card-header p-0 border-bottom-0">
                                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home"
                                                                        role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">New Customer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                                                        aria-selected="false">Select From Customers</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-four-home-tab">

                                                                    <div class="form-group">
                                                                        <label for="customer_email">E-mail</label>
                                                                        <input type="email" name="customer_email" id="customer_email" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="customer_phone">Phone</label>
                                                                        <input type="text" name="customer_phone" id="customer_phone" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="customer_name">Name</label>
                                                                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="company">Company</label>
                                                                        <input type="text" name="company" id="company" class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-four-profile-tab">

                                                                    <label for="customer">Select customer</label>
                                                                    <select name="customer" id="customer" class="form-control">
                                                                        <option value="0" selected disabled>Customers</option>
                                                                        @foreach ($customers as $customer)
                                                                            <option value="{{ $customer->phone }}">{{ $customer->fullName }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
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
