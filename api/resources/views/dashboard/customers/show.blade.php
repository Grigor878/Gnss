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

                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link active" id="configuration-details-tab" data-toggle="pill"
                                                href="#configuration-details-box" role="tab"
                                                aria-controls="configuration-details-box" aria-selected="true">
                                                Customer
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link" id="notes-attachments-tab"
                                                data-toggle="pill" href="#notes-attachments-box" role="tab"
                                                aria-controls="notes-attachments-box" aria-selected="false">
                                                Contact persons
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link" id="activities-tasks-tab" data-toggle="pill"
                                                href="#activities-tasks-box" role="tab"
                                                aria-controls="activities-tasks-box" aria-selected="false">
                                                Opportunities
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">

                                        <div class="tab-pane fade active show" id="configuration-details-box" role="tabpanel"
                                            aria-labelledby="armenian-tab">

                                            <h1>{{ $customer->name }}</h1>
                                            <h3>{{ $customer->address }}</h3>

                                        </div>

                                        <div class="tab-pane fade" id="notes-attachments-box" role="tabpanel"
                                            aria-labelledby="english-tab">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>name</th>
                                                        <th>phone</th>
                                                        <th>email</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if(isset($customer->contactPersons)  && count($customer->contactPersons) > 0)
                                                        @foreach ($customer->contactPersons as $person)
                                                            <tr>
                                                                <td>{{ $person->name }}</td>
                                                                <td>{{ $person->phone }}</td>
                                                                <td>{{ $person->email }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane fade" id="activities-tasks-box" role="tabpanel"
                                            aria-labelledby="armenian-tab">

                                            <h4 class="text-info ">
                                                @if (count($customer->opportunities) > 0)
                                                    <span class="text-bold">{{ count($customer->opportunities) }}</span>
                                                @endif
                                                Opportunities
                                            </h4>


                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>name</th>
                                                        <th>count</th>
                                                        <th>status</th>
                                                        <th>view</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if(isset($customer->opportunities) && count($customer->opportunities) > 0)
                                                        @foreach ($customer->opportunities as $opportunity)
                                                            <tr>
                                                                <td>{{ $opportunity->product->name }}</td>
                                                                <td>{{ $opportunity->count }}</td>
                                                                <td>{{ $opportunity->status->name }}</td>
                                                                <td><a class="btn btn-info" href={{ route('opportunities.show', $opportunity->id) }}>View</a></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

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
