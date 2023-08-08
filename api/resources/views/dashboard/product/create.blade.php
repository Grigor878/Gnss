@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="name" name="name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="price">Product price</label>
                                            <input type="number" class="form-control" id="price" placeholder="price" name="price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select multiple="" class="form-control" name="categories[]">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select subcategory</label>
                                            <select multiple="" class="form-control" name="subcategories[]">
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Description ..." name="description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="images">Product Images</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
                                                    <label class="custom-file-label" for="images">Choose files</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="count">Available count</label>
                                            <input type="number" class="form-control" id="count" placeholder="available count" name="count">
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
