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
                    <h1 class="m-0">View Inquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inquiries') }}">Inquiries</a></li>
                        <li class="breadcrumb-item active">View Inquiry</li>
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

                                <div class="card-header">
                                    <p class="product-name">{{ $inquiry->product->name }}</p>

                                    <div class="row">
                                        @if (!$inquiry->is_rejected)
                                            <div class="col-lg-2">
                                                <form action="{{ route('inquiries.reject', $inquiry->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="submit" value="Reject" class="btn btn-danger card-link">
                                                </form>
                                            </div>
                                        @endif

                                        <div class="col-lg-10">
                                            <form action="{{ route('inquiries.toOpportunity') }}" method="POST" class="row">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="id" value="{{ $inquiry->id }}">
                                                <div class="col-lg-8">
                                                    <select name="manager" class="manager-selector form-control selectpicker d-inline-block" data-live-search="true">
                                                        <option value="0" selected disabled>Choose Sales Manager</option>
                                                        @foreach ($managers as $manager)
                                                            <option
                                                                data-tokens="{{ $manager->name . " " . $manager->surname }}"
                                                                value="{{ $manager->id }}" class=""
                                                            >
                                                                {{ $manager->name . " " . $manager->surname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="submit" value="Move to opportunities" class="btn btn-success card-link to-opportunity-btn d-none">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body row">
                                    <div class="col-lg-6">
                                        <h5>Order</h5>
                                        <p class="order-count">{{ $inquiry->count }}</p>
                                        <div>
                                            <h5>Product</h5>
                                            <p class="product-name">{{ $inquiry->product->name }}</p>
                                            <p class="product-price">{{ $inquiry->product->price }}</p>
                                            <p class="product-description">{{ $inquiry->product->description }}</p>
                                            @if (count($inquiry->product->images))
                                                <img class="product-image w-25"
                                                    src="{{ asset('storage/' . $inquiry->product->images[0]->filename) }}"
                                                    alt="image">
                                            @endif
                                        </div>
                                        <hr>
                                        <p class="order-note">{{ $inquiry->note }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Customer</h5>
                                        <p class="customer-name">{{ $inquiry->fullName }}</p>
                                        <p class="customer-email">{{ $inquiry->email }}</p>
                                        <p class="customer-phone">{{ $inquiry->phone }}</p>
                                        <p class="customer-company">{{ $inquiry->company }}</p>
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
