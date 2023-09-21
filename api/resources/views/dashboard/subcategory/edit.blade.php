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
                    <h1 class="m-0">Add Subcategory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subcategories.index') }}">Subcategories</a></li>
                        <li class="breadcrumb-item active">Edit Subcategory</li>
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
                        <form method="POST" action="{{ route('subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-primary card-outline card-outline-tabs">

                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a
                                                        class="lang-tab nav-link active"
                                                        id="english-tab"
                                                        data-toggle="pill"
                                                        href="#english-box"
                                                        role="tab"
                                                        aria-controls="english-box"
                                                        aria-selected="false"
                                                    >
                                                        English
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        class="lang-tab nav-link"
                                                        id="armenian-tab"
                                                        data-toggle="pill"
                                                        href="#armenian-box"
                                                        role="tab"
                                                        aria-controls="armenian-box"
                                                        aria-selected="false"
                                                    >
                                                        Հայերեն
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <div
                                                    class="tab-pane fade active show"
                                                    id="english-box"
                                                    role="tabpanel"
                                                    aria-labelledby="english-tab"
                                                >
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="en_name">Subucategory Name</label>
                                                                <input
                                                                    type="text"
                                                                    id="en_name"
                                                                    class="form-control"
                                                                    value="{{ old('en_name') ?? ($subcategory->translations[0]->name ?? '' )}}"
                                                                    placeholder="name"
                                                                    name="en_name">
                                                                @error('en_name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="tab-pane fade"
                                                    id="armenian-box"
                                                    role="tabpanel"
                                                    aria-labelledby="armenian-tab"
                                                >
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="am_name">Ենթակատեգորիայի անունը</label>
                                                                <input
                                                                    type="text"
                                                                    id="am_name"
                                                                    class="form-control"
                                                                    value="{{ old('en_name') ?? ($subcategory->translations[1]->name ?? '' )}}"
                                                                    placeholder="անուն"
                                                                    name="am_name"
                                                                >
                                                                @error('am_name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Category</label>
                                                        <select id="categories" class="form-control" name="category">
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    value="{{ $category->id }}"
                                                                    data-en-name="{{ @$category->translations[0]->name }}"
                                                                    data-am-name="{{ @$category->translations[1]->name }}"
                                                                    {{ $subcategory->category_id == $category->id ? 'selected' : '' }}
                                                                >
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('categories')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select subcategory</label>
                                                        <select id="subCategories" class="form-control" name="subcategory">
                                                            <option value="" selected>Not Selected</option>
                                                            @foreach ($subCategories as $subCategory)
                                                                <option
                                                                    value="{{ @$subCategory->id }}"
                                                                    data-category="{{ @$subCategory->category_id }}"
                                                                    data-en-name="{{ @$subCategory->translations[0]->name }}"
                                                                    data-am-name="{{ @$subCategory->translations[1]->name }}"
                                                                     {{ $subcategory->parent_id == $subCategory->id ? 'selected' : '' }}
                                                                >
                                                                    {{ $subCategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('subcategories')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @if(!is_null($subcategory->image))
                                                        <div class="image-box position-relative w-25 m-2">
                                                            <a class="position-absolute text-danger delete-image-btn" data-subcategory-id="{{ $subcategory->id }}">
                                                                <i class="nav-icon fas fa-times-circle fa-2x"></i>
                                                            </a>
                                                            <img
                                                                class="w-100"
                                                                src="{{ URL::asset('/storage/'.$subcategory->image) }}"
                                                                alt="img"
                                                            >
                                                        </div>
                                                    @endif

                                                    <div class="form-group add-image {{ !is_null($subcategory->image) ? 'd-none' : '' }}">
                                                        <label for="images">Ավելացնել Նկար</label>
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
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('js\product\form.js') }}"></script>
    <script src="{{ asset('js\subcategory\edit.js') }}"></script>
@endsection
