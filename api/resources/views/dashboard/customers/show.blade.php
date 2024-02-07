@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css\product\edit.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
                        <li class="breadcrumb-item active">View customer</li>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-body">

                                            <div class="card-body row">
                                                <div class="col-lg-6">
                                                    <h5>Customer</h5>
                                                    <div>
                                                        <h5>Product</h5>
                                                        <p class="product-name">{{ $customer->fullName }}</p>
                                                        <p class="product-price">{{ $customer->email }}</p>
                                                        <p class="product-description">{{ $customer->company }}</p>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5>Customer</h5>
                                                    <p class="customer-name">{{ $customer->fullName }}</p>
                                                    <p class="customer-email">{{ $customer->email }}</p>
                                                    <p class="customer-phone">{{ $customer->phone }}</p>
                                                    <p class="customer-company">{{ $customer->company }}</p>
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
        </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('js\partner\edit.js') }}"></script>
@endsection
