@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Partner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
                        <li class="breadcrumb-item active">Add Partner</li>
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
                        <form method="POST" action="{{ route('partners.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="name">Partner Name</label>
                                                                <input
                                                                    type="text"
                                                                    id="name"
                                                                    class="form-control"
                                                                    value="{{ old('name') ?? '' }}"
                                                                    placeholder="name"
                                                                    name="name"
                                                                >
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
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
                                                                    value="{{ old('address') ?? '' }}"
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
                                                            <div class="form-group">
                                                                <label for="images">Add</label>
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
                                                        <div class="col-12 person">
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
                                                                            name="contactPersons[1][name]"
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
                                                                            name="contactPersons[1][email]"
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
                                                                            name="contactPersons[1][phone]"
                                                                        >
                                                                        @error('contactPersons')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
