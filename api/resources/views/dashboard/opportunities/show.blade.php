@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css\opportunity\show.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Opportunity</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('opportunities.index') }}">Opportunities</a></li>
                        <li class="breadcrumb-item active">View Opportunity</li>
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


                            {{-- <div class="card">
                                <div class="d-flex">
                                    @foreach ($statuses as $status)
                                        <div class="step bg-info">
                                            <button class="btn btn-info">{{ $status->name }}</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}


                            <div class="row mx-0 card progress-bar-custom">
                                <div class="col-12 p-0">
                                    <ul class="steps-list p-0 m-0">
                                        @foreach ($statuses as $status)
                                            <li class="step {{ $opportunity->status->name == $status->name ? 'active-status' : '' }}">
                                                <div class="content step-status-btn" data-id="{{ $status->id }}">{{ $status->name }}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <button class="btn btn-info mb-2 update-status-btn">Update Status</button>


                            {{-- <div class="container">
                                <ul>
                                    <li>
                                        <div class="content">Normal state</div>
                                    </li>
                                    <li class="current">
                                        <div class="content">Active tab</div>
                                    </li>
                                    <li>
                                        <div class="content">Normal state</div>
                                    </li>
                                    <li class="completed">
                                        <div class="content">Completed tab state</div>
                                    </li>
                                    <li class="completed">
                                        <div class="content">Completed tab state</div>
                                    </li>

                                </ul>
                            </div> --}}





                            <div class="card" id="opportunity">

                                <input id="oppId" type="hidden" data-id="{{ $opportunity->id }}">
                                <input id="oppStatusId" type="hidden" data-status-id="{{ $opportunity->status->id }}">

                                <div class="card-header">
                                    <p class="product-name">{{ $opportunity->product->name }}</p>
                                </div>
                                <div class="card-body row">
                                    <div class="col-lg-6">
                                        <h5>Order</h5>
                                        <p class="order-count">{{ $opportunity->count }}</p>
                                        <div>
                                            <h5>Product</h5>
                                            <p class="product-name">{{ $opportunity->product->name }}</p>
                                            <p class="product-price">{{ $opportunity->product->price }}</p>
                                            <p class="product-description">{{ $opportunity->product->description }}</p>
                                            <img class="product-image w-25"
                                                src="{{ asset('storage/' . $opportunity->product->images[0]->filename) }}"
                                                alt="image">
                                        </div>
                                        <hr>
                                        <p class="order-note">{{ $opportunity->note }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Customer</h5>
                                        <p class="customer-name">{{ $opportunity->customer->fullName }}</p>
                                        <p class="customer-email">{{ $opportunity->customer->email }}</p>
                                        <p class="customer-phone">{{ $opportunity->customer->phone }}</p>
                                        <p class="customer-company">{{ $opportunity->customer->company }}</p>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('js\opportunity\script.js') }}"></script>
@endsection
