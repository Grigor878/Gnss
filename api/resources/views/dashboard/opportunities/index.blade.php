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

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Opportunities Table</h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table stripped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Count</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Price</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($opportunities as $opportunity)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $opportunity->customer->fullName }}</td>
                                        <td>{{ $opportunity->product->name }}</td>
                                        <td>{{ $opportunity->count }}</td>
                                        <td>{{ $opportunity->customer->email }}</td>
                                        <td>{{ $opportunity->customer->phone }}</td>
                                        <td>{{ $opportunity->product->price }}</td>
                                        <td>
                                            <span><a href="{{ route('opportunities.show', $opportunity->id) }}" class="btn btn-info">View</a></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $opportunities->links() }}
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
