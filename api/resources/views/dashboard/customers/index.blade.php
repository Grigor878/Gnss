@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
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
                        <h3 class="card-title">Customers Table</h3>
                        <div class="card-tools">
                            <div>
                                <a href="{{ route('customers.create') }}" class="btn btn-block btn-primary">Add Partner</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>
                                            <span><a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a></span>
                                            <span><a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">View</a></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $customers->links() }}
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
