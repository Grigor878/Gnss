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
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
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
                                                                <label for="name">Product Name</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    value="{{ old('en_name') ?? ($product->translations[0]->name ?? '' )}}"
                                                                    placeholder="name"
                                                                    name="en_name"
                                                                >
                                                                @error('en_name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Product Description</label>
                                                                <textarea
                                                                    class="form-control"
                                                                    rows="3"
                                                                    placeholder="Description ..."
                                                                    name="en_description"
                                                                >{{ old('en_description') ?? ($product->translations[0]->description ?? '' )}}</textarea>
                                                                @error('en_description')
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
                                                                <label for="name">Ապրանքի անունը</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    value="{{ old('am_name') ?? ($product->translations[1]->name ?? '' )}}"
                                                                    placeholder="անուն"
                                                                    name="am_name"
                                                                >
                                                                @error('am_name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Ապրանքի նկարագրությունը</label>
                                                                <textarea class="form-control" rows="3" placeholder="Description ..." name="am_description">
                                                                    {{ old('am_description') ?? ($product->translations[1]->description ?? '' )}}
                                                                </textarea>
                                                                @error('am_description')
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
                                                        <select id="categories" multiple="" class="form-control" name="categories[]">
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    value="{{ $category->id }}"
                                                                    data-en-name="{{ $category->translations[0]->name }}"
                                                                    data-am-name="{{ $category->translations[1]->name }}"
                                                                    @foreach ($product->category as $productCat )
                                                                        {{ $productCat->id == $category->id ? 'selected' : '' }}
                                                                    @endforeach
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
                                                        <select id="subCategories" multiple="" class="form-control" name="subcategories[]">
                                                            @foreach ($subCategories as $subCategory)
                                                                <option
                                                                    value="{{ $subCategory->id }}"
                                                                    data-category="{{ $subCategory->category_id }}"
                                                                    data-en-name="{{ $subCategory->translations[0]->name }}"
                                                                    data-am-name="{{ $subCategory->translations[1]->name }}"
                                                                    @foreach ($product->subcategory as $productSub )
                                                                        {{ $productSub->id == $subCategory->id ? 'selected' : '' }}
                                                                    @endforeach
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
                                                    <div class="form-group">
                                                        <label for="price">Product price</label>
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            value="{{ old('price') ?? ($product->price ?? '' )}}"
                                                            placeholder="price"
                                                            name="price"
                                                        >
                                                        @error('price')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="images">Product Images</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="images[]" multiple>
                                                                <label class="custom-file-label" for="images">Choose files</label>
                                                                @error('images')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="d-flex">
                                                            @foreach ($product->images as $image)
                                                                <div class="image-box position-relative w-25 m-2">
                                                                    <a class="position-absolute text-danger delete-image-btn" data-image-id="{{ $image->id }}">
                                                                        <i class="nav-icon fas fa-times-circle fa-2x"></i>
                                                                    </a>
                                                                    <img
                                                                        class="w-100"
                                                                        src="{{ URL::asset('/storage/'.$image->filename) }}"
                                                                        alt="img"
                                                                    >
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="count">Available count</label>
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            value="{{ old('count') ?? ($product->count ?? '' )}}"
                                                            placeholder="available count"
                                                            name="count"
                                                        >
                                                        @error('count')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
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
    <script src="{{ asset('js\product\edit.js') }}"></script>
@endsection

