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
                    <h1 class="m-0">Opportunity</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('opportunities.index') }}">Opportunities</a></li>
                        <li class="breadcrumb-item active">Opportunity</li>
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


                            <div>
                                <div class="row mx-0 card progress-bar-custom">
                                    <div class="col-12 p-0">
                                        <ul class="steps-list p-0 m-0">
                                            @foreach ($statuses as $status)
                                                <li
                                                    class="step {{ $opportunity->status->name == $status->name ? 'active-status' : '' }}">
                                                    <div class="content step-status-btn" data-id="{{ $status->id }}">
                                                        {{ $status->name }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-info mb-3 update-status-btn">Update Status</button>
                            </div>

                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link active" id="configuration-details-tab" data-toggle="pill"
                                                href="#configuration-details-box" role="tab"
                                                aria-controls="configuration-details-box" aria-selected="true">
                                                Configuration & Details
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link" id="notes-attachments-tab"
                                                data-toggle="pill" href="#notes-attachments-box" role="tab"
                                                aria-controls="notes-attachments-box" aria-selected="false">
                                                Notes & Attachments
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="lang-tab nav-link" id="activities-tasks-tab" data-toggle="pill"
                                                href="#activities-tasks-box" role="tab"
                                                aria-controls="activities-tasks-box" aria-selected="false">
                                                Activities & Tasks
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">

                                        <div class="tab-pane fade active show" id="configuration-details-box" role="tabpanel"
                                            aria-labelledby="armenian-tab">

                                            <div id="opportunity">
                                                <input id="oppId" type="hidden" data-id="{{ $opportunity->id }}">
                                                <input id="oppStatusId" type="hidden"
                                                    data-status-id="{{ $opportunity->status->id }}">

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
                                                            <p class="product-price">{{ $opportunity->product->price }}
                                                            </p>
                                                            <p class="product-description">
                                                                {{ $opportunity->product->description }}</p>
                                                            <img class="product-image w-25"
                                                                src="{{ asset('storage/' . $opportunity->product->images[0]->filename) }}"
                                                                alt="image">
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>Customer</h5>
                                                        <p class="customer-name">{{ $opportunity->customer->fullName }}
                                                        </p>
                                                        <p class="customer-email">{{ $opportunity->customer->email }}</p>
                                                        <p class="customer-phone">{{ $opportunity->customer->phone }}</p>
                                                        <p class="customer-company">{{ $opportunity->customer->company }}
                                                        </p>
                                                    </div>

                                                </div>


                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="notes-attachments-box" role="tabpanel"
                                            aria-labelledby="english-tab">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <h5>Notes</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-primary mr-4 add-note-btn">Add Note <i class="down-icon fas fa-angle-down"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <form action="addNote" style="display:none" class="card p-2 add-note-form" method="post">
                                                                @csrf
                                                                <div class="col-10">
                                                                    <input type="hidden" name="status" value="{{ $opportunity->status_id }}">
                                                                    <input type="hidden" name="opportunity" value="{{ $opportunity->id }}">

                                                                    <label for="newNote">Add note text</label>
                                                                    <textarea class="form-control" name="note" id="newNote" rows="4"></textarea>

                                                                    <input type="submit" class="btn btn-success mt-1">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        @foreach ($opportunity->notes as $note)
                                                            <div class="col-md-8 single-note-item all-category" style="display: block">
                                                                <div class="card card-body">
                                                                    <span class="side-stick"></span>
                                                                    <h5 class="note-title w-75 mb-0" data-noteheading="{{ $note->text }}">
                                                                        {{ $note->text }}
                                                                    </h5>
                                                                    <p class="note-date font-12 text-muted">{{ $note->created_at->format('d-m-Y') }}</p>
                                                                    <div class="note-content">
                                                                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                                            {{ $note->status->name }}
                                                                        </p>
                                                                    </div>

                                                                    <div class="align-items-center d-flex">
                                                                        <button class="btn note-delete-button mr-1" data-id="{{ $note->id }}">
                                                                            <i class="fa fa-trash remove-note"></i>
                                                                        </button>
                                                                    </div>

                                                                    {{-- <div class="align-items-center d-flex"><span class=mr-1><i class="fa fa-star favourite-note"></i></span> <span class=mr-1><i class="fa fa-trash remove-note"></i></span><div class=ml-auto><div class="btn-group category-selector"><a class="category-dropdown dropdown-toggle label-group nav-link p-0"href=# aria-expanded=true aria-haspopup=true data-toggle=dropdown role=button><div class=category><div class=category-business></div><div class=category-social></div><div class=category-important></div><span class="more-options text-dark"><i class=icon-options-vertical></i></span></div></a><div class="category-menu dropdown-menu dropdown-menu-right"><a class="badge-group-item dropdown-item position-relative badge-business category-business note-business text-success"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i>Business </a><a class="badge-group-item dropdown-item position-relative badge-social category-social note-social text-info"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Social </a><a class="badge-group-item dropdown-item position-relative badge-important category-important note-important text-danger"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Important</a></div></div></div></div> --}}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <h5>Attachments</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-primary mr-4 attach-file-btn">Attach file <i class="down-icon fas fa-angle-down"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <form action="attachFile" style="display:none" class="card p-4 attach-file-form" method="post" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="col-10">
                                                                    <input type="hidden" name="status" value="{{ $opportunity->status_id }}">
                                                                    <input type="hidden" name="opportunity" value="{{ $opportunity->id }}">

                                                                    <label for="file">Upload file</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="file" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon04" required>
                                                                            <label class="custom-file-label" for="file">Choose file</label>
                                                                        </div>
                                                                        <div class="input-group-append">
                                                                            <input class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        @foreach ($opportunity->attachments as $attachment)
                                                            <div class="col-md-8 single-note-item all-category" style="display: block">
                                                                <div class="card card-body">
                                                                    <span class="side-stick"></span>

                                                                    <a href="{{ URL::asset('/storage/'.$attachment->fileName) }}" target="_blank" rel="noopener noreferrer">
                                                                        {{-- {{ $attachment->fileName }} --}}
                                                                        Click to open
                                                                    </a>

                                                                    {{-- <h5 class="note-title w-75 mb-0" data-noteheading="{{ $attachment->fileName }}">
                                                                        {{ $attachment->fileName }}
                                                                    </h5> --}}
                                                                    <p class="note-date font-12 text-muted">{{ $attachment->created_at->format('d-m-Y') }}</p>
                                                                    <div class="note-content">
                                                                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                                            {{ $attachment->status->name }}
                                                                        </p>
                                                                    </div>

                                                                    <div class="align-items-center d-flex">
                                                                        <button class="btn file-delete-button mr-1" data-id="{{ $attachment->id }}">
                                                                            <i class="fa fa-trash remove-note"></i>
                                                                        </button>
                                                                    </div>

                                                                    {{-- <div class="align-items-center d-flex"><span class=mr-1><i class="fa fa-star favourite-note"></i></span> <span class=mr-1><i class="fa fa-trash remove-note"></i></span><div class=ml-auto><div class="btn-group category-selector"><a class="category-dropdown dropdown-toggle label-group nav-link p-0"href=# aria-expanded=true aria-haspopup=true data-toggle=dropdown role=button><div class=category><div class=category-business></div><div class=category-social></div><div class=category-important></div><span class="more-options text-dark"><i class=icon-options-vertical></i></span></div></a><div class="category-menu dropdown-menu dropdown-menu-right"><a class="badge-group-item dropdown-item position-relative badge-business category-business note-business text-success"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i>Business </a><a class="badge-group-item dropdown-item position-relative badge-social category-social note-social text-info"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Social </a><a class="badge-group-item dropdown-item position-relative badge-important category-important note-important text-danger"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Important</a></div></div></div></div> --}}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                            </div>


                                        </div>

                                        <div class="tab-pane fade" id="activities-tasks-box" role="tabpanel"
                                            aria-labelledby="armenian-tab">
                                            <div class="row">
                                               <div class="col-lg-6">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <h5>Tasks</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-primary mr-4 add-task-btn">Add Task <i class="down-icon fas fa-angle-down"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <form action="addTask" style="display:none" class="card p-2 add-task-form" method="post">
                                                                @csrf
                                                                <div class="col-10">
                                                                    <input type="hidden" name="status" value="{{ $opportunity->status_id }}">
                                                                    <input type="hidden" name="opportunity" value="{{ $opportunity->id }}">

                                                                    <label for="newNote">Add task text</label>
                                                                    <input class="form-control" type="text" name="title">

                                                                    <input type="submit" class="btn btn-success mt-1">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        @foreach ($opportunity->tasks as $task)
                                                            <div class="col-md-8 single-task-item all-category" style="display: block">
                                                                <div class="card card-body task" data-task-id="{{ $task->id }}">
                                                                    <span class="side-stick"></span>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <h5 class="task-title w-75 mb-0" data-task-heading="{{ $task->title }}">
                                                                                {{ $task->title }}
                                                                            </h5>
                                                                            <p class="task-date font-12 text-muted">{{ $task->created_at->format('d-m-Y') }}</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input class="custom-control-input complete-task" type="checkbox" {{ $task->complete_date ? 'checked' : '' }} id="complete-task{{ $task->id }}">
                                                                                <label for="complete-task{{ $task->id }}" class="custom-control-label">Complete</label>
                                                                            </div>
                                                                            @if ($task->complete_date)
                                                                                @php
                                                                                    $dateTime = strtotime( $task->complete_date )
                                                                                @endphp
                                                                                <p class="task-update-date font-12 text-muted">{{ date('d-m-Y', $dateTime) }}</p>
                                                                            @else
                                                                                <p class="task-update-date font-12 text-muted"></p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="task-content">
                                                                        <p class="task-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                                            {{ $task->status->name }}
                                                                        </p>
                                                                    </div>

                                                                    <div class="align-items-center d-flex">
                                                                        <button class="btn task-delete-button mr-1" data-id="{{ $task->id }}">
                                                                            <i class="fa fa-trash remove-task"></i>
                                                                        </button>
                                                                    </div>

                                                                    {{-- <div class="align-items-center d-flex"><span class=mr-1><i class="fa fa-star favourite-note"></i></span> <span class=mr-1><i class="fa fa-trash remove-note"></i></span><div class=ml-auto><div class="btn-group category-selector"><a class="category-dropdown dropdown-toggle label-group nav-link p-0"href=# aria-expanded=true aria-haspopup=true data-toggle=dropdown role=button><div class=category><div class=category-business></div><div class=category-social></div><div class=category-important></div><span class="more-options text-dark"><i class=icon-options-vertical></i></span></div></a><div class="category-menu dropdown-menu dropdown-menu-right"><a class="badge-group-item dropdown-item position-relative badge-business category-business note-business text-success"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i>Business </a><a class="badge-group-item dropdown-item position-relative badge-social category-social note-social text-info"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Social </a><a class="badge-group-item dropdown-item position-relative badge-important category-important note-important text-danger"href=javascript:void(0);><i class="mr-1 mdi mdi-checkbox-blank-circle-outline"></i> Important</a></div></div></div></div> --}}
                                                                </div>
                                                            </div>
                                                        @endforeach
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
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('js\opportunity\script.js') }}"></script>
@endsection
