@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css\orders\style.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div id="orders">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card-box opened-box">
                            <h4 class="text-dark header-title">Opened</h4>
                            @if (isset($orders['opened']))
                                @foreach ($orders['opened'] as $order)
                                    <div class="small-box bg-info order-box">
                                        <input type="hidden" class="orderId" value="{{ $order->id }}">

                                        <div class="inner">
                                            <h3>${{ $order->product->price }}</h3>
                                            <p>{{ $order->product->name }}</p>
                                        </div>
                                        <div class="small-box-footer">
                                            <a href="#" class="text-white move-left-btn">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Move Left
                                            </a>
                                            <!-- Button trigger modal -->
                                            <a type="button" class="text-white more-info-btn" data-toggle="modal" data-target="#orderModal">
                                                More info
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <a href="#" class="text-white move-right-btn">
                                                Move Right
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>

                                        <div class="d-none order-more-info">
                                            <div class="order">
                                                <input type="hidden" name="count" value="{{ $order->count ?? 1 }}">
                                                <input type="hidden" name="note" value="{{ $order->note ?? '' }}">
                                            </div>
                                            <div class="customer">
                                                <input type="hidden" name="fullname" value="{{ $order->customer->fullname ?? '' }}">
                                                <input type="hidden" name="company" value="{{ $order->customer->company ?? '' }}">
                                                <input type="hidden" name="email" value="{{ $order->customer->email ?? '' }}">
                                                <input type="hidden" name="phone" value="{{ $order->customer->phone ?? '' }}">
                                            </div>
                                            <div class="product">
                                                <input type="hidden" name="name" value="{{ $order->product->name ?? '' }}">
                                                <input type="hidden" name="price" value="{{ $order->product->price ?? '' }}">
                                                <input type="hidden" name="description" value="{{ $order->product->description ?? '' }}">
                                                <input type="hidden" name="image" value="{{ asset('storage/'.$order->product->images[0]->filename) ?? '' }}">
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card-box released-box">
                            <h4 class="text-dark header-title">Released</h4>
                            @if (isset($orders['released']))
                                @foreach ($orders['released'] as $order)
                                    <div class="small-box bg-warning order-box">
                                        <input type="hidden" class="orderId" value="{{ $order->id }}">
                                        <div class="inner">
                                            <h3>${{ $order->product->price }}</h3>
                                            <p>{{ $order->product->name }}</p>
                                        </div>
                                        <div class="small-box-footer">
                                            <a href="#" class="text-white move-left-btn">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Move Left
                                            </a>
                                            <a type="button" class="text-white more-info-btn" data-toggle="modal" data-target="#orderModal">
                                                More info
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <a href="#" class="text-white move-right-btn">
                                                Move Right
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>

                                        <div class="d-none">
                                            <div class="card order-more-info">
                                                <div class="order">
                                                    <input type="hidden" name="count" value="{{ $order->count ?? 1 }}">
                                                    <input type="hidden" name="note" value="{{ $order->note ?? '' }}">
                                                </div>
                                                <div class="customer">
                                                    <input type="hidden" name="fullname" value="{{ $order->customer->fullname ?? '' }}">
                                                    <input type="hidden" name="company" value="{{ $order->customer->company ?? '' }}">
                                                    <input type="hidden" name="email" value="{{ $order->customer->email ?? '' }}">
                                                    <input type="hidden" name="phone" value="{{ $order->customer->phone ?? '' }}">
                                                </div>
                                                <div class="product">
                                                    <input type="hidden" name="name" value="{{ $order->product->name ?? '' }}">
                                                    <input type="hidden" name="price" value="{{ $order->product->price ?? '' }}">
                                                    <input type="hidden" name="description" value="{{ $order->product->description ?? '' }}">
                                                    <input type="hidden" name="image" value="{{ asset('storage/'.$order->product->images[0]->filename) ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card-box progress-box">
                            <h4 class="text-dark header-title">Progress</h4>
                            @if (isset($orders['progress']))
                                @foreach ($orders['progress'] as $order)
                                    <div class="small-box bg-success order-box">
                                        <input type="hidden" class="orderId" value="{{ $order->id }}">
                                        <div class="inner">
                                            <h3>${{ $order->product->price }}</h3>
                                            <p>{{ $order->product->name }}</p>
                                        </div>
                                        <div class="small-box-footer">
                                            <a href="#" class="text-white move-left-btn">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Move Left
                                            </a>
                                            <a type="button" class="text-white more-info-btn" data-toggle="modal" data-target="#orderModal">
                                                More info
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <a href="#" class="text-white move-right-btn">
                                                Move Right
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>

                                        <div class="d-none">
                                            <div class="card order-more-info">
                                                <div class="order">
                                                    <input type="hidden" name="count" value="{{ $order->count ?? 1 }}">
                                                    <input type="hidden" name="note" value="{{ $order->note ?? '' }}">
                                                </div>
                                                <div class="customer">
                                                    <input type="hidden" name="fullname" value="{{ $order->customer->fullname ?? '' }}">
                                                    <input type="hidden" name="company" value="{{ $order->customer->company ?? '' }}">
                                                    <input type="hidden" name="email" value="{{ $order->customer->email ?? '' }}">
                                                    <input type="hidden" name="phone" value="{{ $order->customer->phone ?? '' }}">
                                                </div>
                                                <div class="product">
                                                    <input type="hidden" name="name" value="{{ $order->product->name ?? '' }}">
                                                    <input type="hidden" name="price" value="{{ $order->product->price ?? '' }}">
                                                    <input type="hidden" name="description" value="{{ $order->product->description ?? '' }}">
                                                    <input type="hidden" name="image" value="{{ asset('storage/'.$order->product->images[0]->filename) ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card-box closed-box">
                            <h4 class="text-dark header-title">Closed</h4>
                            @if (isset($orders['closed']))
                                @foreach ($orders['closed'] as $order)
                                    <div class="small-box bg-primary order-box">
                                        <input type="hidden" class="orderId" value="{{ $order->id }}">

                                        <div class="inner">
                                            <h3>${{ $order->product->price }}</h3>
                                            <p>{{ $order->product->name }}</p>
                                        </div>
                                        <div class="small-box-footer">
                                            <a href="#" class="text-white move-left-btn">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Move Left
                                            </a>
                                            <a type="button" class="text-white more-info-btn" data-toggle="modal" data-target="#orderModal">
                                                More info
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <a href="#" class="text-white move-right-btn">
                                                Move Right
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>

                                        <div class="d-none">
                                            <div class="card order-more-info">
                                                <div class="order">
                                                    <input type="hidden" name="count" value="{{ $order->count ?? 1 }}">
                                                    <input type="hidden" name="note" value="{{ $order->note ?? '' }}">
                                                </div>
                                                <div class="customer">
                                                    <input type="hidden" name="fullname" value="{{ $order->customer->fullname ?? '' }}">
                                                    <input type="hidden" name="company" value="{{ $order->customer->company ?? '' }}">
                                                    <input type="hidden" name="email" value="{{ $order->customer->email ?? '' }}">
                                                    <input type="hidden" name="phone" value="{{ $order->customer->phone ?? '' }}">
                                                </div>
                                                <div class="product">
                                                    <input type="hidden" name="name" value="{{ $order->product->name ?? '' }}">
                                                    <input type="hidden" name="price" value="{{ $order->product->price ?? '' }}">
                                                    <input type="hidden" name="description" value="{{ $order->product->description ?? '' }}">
                                                    <input type="hidden" name="image" value="{{ asset('storage/'.$order->product->images[0]->filename) ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <p class="product-name">Product Name</p>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6">
                                    <h5>Order</h5>
                                    <p class="order-count">Count</p>
                                    <div>
                                        <h5>Product</h5>
                                        <p class="product-name">Product name</p>
                                        <p class="product-price">Product price</p>
                                        <p class="product-description">Product description</p>
                                        <img class="product-image" src="{{ asset('storage/products/1/95876379247_product_1_image_1.jpg') }}" alt="image" class="w-25">
                                    </div>
                                    <hr>
                                    <p class="order-note">note</p>
                                </div>
                                <div class="col-lg-6">
                                    <h5>Customer</h5>
                                    <p class="customer-name">Customer name</p>
                                    <p class="customer-email">Customer email</p>
                                    <p class="customer-phone">Customer phone</p>
                                    <p class="customer-company">Customer company</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->




@endsection

@section('scripts')
    <script src="{{ asset('js\orders\script.js') }}"></script>
@endsection
