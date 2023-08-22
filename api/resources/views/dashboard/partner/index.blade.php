@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Partners</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Partners</li>
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
                        <h3 class="card-title">Partners Table</h3>
                        <div class="card-tools">
                            <div>
                                <a href="{{ route('partners.create') }}" class="btn btn-block btn-primary">Add Partner</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $partner->name }}</td>
                                        <td>
                                            <span><a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning">Edit</a></span>
                                            <span>
                                                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="DELETE" class="btn btn-danger">
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
