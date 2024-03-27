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
                    <h1 class="m-0">Edit Partner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
                        <li class="breadcrumb-item active">Edit Partner</li>
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
                        <form method="POST" action="{{ route('partners.update', $partner->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">

                                                                <div class="form-group">
                                                                    <label for="en_name">Partner Name</label>
                                                                    <input
                                                                        type="text"
                                                                        id="name"
                                                                        class="form-control"
                                                                        value="{{ old('name') ?? ($partner->name ?? '' )}}"
                                                                        placeholder="name"
                                                                        name="name"
                                                                    >
                                                                    @error('en_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input
                                                                    type="text"
                                                                    id="address"
                                                                    class="form-control"
                                                                    value="{{ old('address') ?? ($partner->address ?? '' ) }}"
                                                                    placeholder="address"
                                                                    name="address"
                                                                >
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            @if(!is_null($partner->image))
                                                                <div class="image-box position-relative w-25 m-2">
                                                                    <a class="position-absolute text-danger delete-image-btn" data-partner-id="{{ $partner->id }}">
                                                                        <i class="nav-icon fas fa-times-circle fa-2x"></i>
                                                                    </a>
                                                                    <img
                                                                        class="w-100"
                                                                        src="{{ URL::asset('/storage/'.$partner->image) }}"
                                                                        alt="img"
                                                                    >
                                                                </div>
                                                            @endif

                                                            <div class="form-group add-image {{ !is_null($partner->image) ? 'd-none' : '' }}">
                                                                <label for="images">Add image</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="image">
                                                                        <label class="custom-file-label" for="images">Choose file</label>
                                                                        @error('image')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">

                                                    <div class="row persons">
                                                        @if (count($partner->contactPersons))
                                                            @foreach ($partner->contactPersons as $person)

                                                                <div class="col-12 person">
                                                                    <div class="card">

                                                                        <input type="hidden" name="contactPersons[{{ $loop->iteration }}][id]" value="{{ $person->id }}">

                                                                        <div class="card-header">
                                                                            <div class="d-flex justify-content-between">
                                                                                <h4>Person</h4>
                                                                                <a class="btn btn-danger remove-partner" data-person-id="{{ $person->id }}">
                                                                                    <i class="fas fa-trash nav-icon"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    value="{{ old('contactPersons[]') ?? ($person->name ?? '' ) }}"
                                                                                    placeholder="name"
                                                                                    name="contactPersons[{{ $loop->iteration }}][name]"
                                                                                >
                                                                                @error('contactPersons')
                                                                                    <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    value="{{ old('contactPersons[]') ?? ($person->email ?? '' ) }}"
                                                                                    placeholder="email"
                                                                                    name="contactPersons[{{ $loop->iteration }}][email]"
                                                                                >
                                                                                @error('contactPersons')
                                                                                    <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    value="{{ old('contactPersons[]') ?? ($person->phone ?? '' ) }}"
                                                                                    placeholder="phone"
                                                                                    name="contactPersons[{{ $loop->iteration }}][phone]"
                                                                                >
                                                                                @error('contactPersons')
                                                                                    <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        @endif

                                                    </div>
                                                    <a class="btn btn-info float-right" id="add-person">Add person</a>

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

                        <div class="col-12 d-none person" id="person-example">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h4>Person</h4>
                                        <a class="btn btn-danger remove-partner">
                                            <i class="fas fa-trash nav-icon"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('contactPersons[]') ?? '' }}"
                                            placeholder="name"
                                            name="contactPersons[personNumber][name]"
                                        >
                                        @error('contactPersons')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('contactPersons[]') ?? '' }}"
                                            placeholder="email"
                                            name="contactPersons[personNumber][email]"
                                        >
                                        @error('contactPersons')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('contactPersons[]') ?? '' }}"
                                            placeholder="phone"
                                            name="contactPersons[personNumber][phone]"
                                        >
                                        @error('contactPersons')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
    <script src="{{ asset('js\partner\form.js') }}"></script>
@endsection
