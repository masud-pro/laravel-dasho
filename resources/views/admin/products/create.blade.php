@extends('admin.layouts.app')
@section('title', 'Product Create')

@push('css')
    <style>

    </style>
@endpush


@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5>Home</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Products</a></li>
                        <li class="breadcrumb-item"><a href="#!">Create</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ form-element ] start -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create New Products</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-glow-dark btn-dark flot-r">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="form-label">Product Name:</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="Enter product name">
                                @if ($errors->has('name'))
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your product name</small>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Category:</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option disabled selected>Select Category</option>
                                        @forelse($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            <option disabled>No Category Found</option>
                                        @endforelse

                                    </select>
                                    @if ($errors->has('category_id'))
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @else
                                        <small class="form-text text-muted">Please select category</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Brand:</label>
                                    <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                        <option disabled selected>Select Brand</option>
                                        @forelse($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @empty
                                            <option disabled>No Brand Found</option>
                                        @endforelse

                                    </select>
                                    @if ($errors->has('brand_id'))
                                        @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @else
                                        <small class="form-text text-muted">Please select brand</small>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">


                            {{-- <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option disabled selected>Select status</option>
                                        <option value="1">Open</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Close</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @else
                                        <small class="form-text text-muted">Please select status</small>
                                    @endif
                                </div>
                            </div> --}}


                            <div class="col-lg-4">
                                <label class="form-label">Product Net Price:</label>
                                <input type="number" min="0" name="origin_price" value="{{ old('origin_price') }}"
                                    class="form-control  @error('origin_price') is-invalid @enderror"
                                    placeholder="Enter product origin price">
                                @if ($errors->has('origin_price'))
                                    @error('origin_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your net price</small>
                                @endif
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Product Sell Price:</label>
                                <input type="number" min="0" name="price" value="{{ old('price') }}"
                                    class="form-control  @error('price') is-invalid @enderror"
                                    placeholder="Enter product sell price">
                                @if ($errors->has('price'))
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your sell price</small>
                                @endif
                            </div>


                            <div class="col-lg-4">
                                <label class="form-label" for="exampleFormControlTextarea1">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    id="exampleFormControlTextarea1" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your description</small>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-4">
                                <label class="form-label">Product Quantity:</label>
                                <input type="number" min="0" name="quantity" value="{{ old('quantity') }}"
                                    class="form-control  @error('quantity') is-invalid @enderror"
                                    placeholder="Enter product quantity">
                                @if ($errors->has('quantity'))
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your quantity</small>
                                @endif


                            </div>

                            <div class="col-lg-4 mb-44">
                                <label class="form-label">Product Image:</label>
                                <div class="">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text image-btn" id="selectFile"><i
                                                class="feather icon-upload-cloud"></i></span>
                                    </div>
                                    <input type="file" name="featured_image" id="profileImage" hidden
                                        class="form-control  @error('featured_image') is-invalid @enderror">
                                    <div class="card image-card">
                                        <img class="profile-img" src="" alt="">
                                    </div>

                                </div>
                                @if ($errors->has('password'))
                                    @error('password')
                                        <div class="mt-8 c-alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please select your product image</small>
                                @endif
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Supplier</label>
                                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                                        <option disabled selected>Select supplier</option>
                                        @forelse($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @empty
                                            <option disabled>No Supplier Found</option>
                                        @endforelse

                                    </select>
                                    @if ($errors->has('supplier_id'))
                                        @error('supplier_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @else
                                        <small class="form-text text-muted">Please select brand</small>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-lg-4">
                                <label class="form-label">User Type:</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline21" name="type" value="1"
                                            class="custom-control-input @error('type') is-invalid @enderror">
                                        <label class="custom-control-label"
                                            for="customRadioInline21">Administrator</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline22" name="type" value="2"
                                            class="custom-control-input  @error('type') is-invalid @enderror">
                                        <label class="custom-control-label" for="customRadioInline22">Manager</label>
                                    </div>
                                </div>

                                @if ($errors->has('type'))
                                    @error('type')
                                        <div class="mt-8 c-alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please select User Type</small>
                                @endif
                            </div> --}}

                            <div class="col-sm-6 text-sm-right mt-3 mt-sm-0">
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>
    <!-- [ Main Content ] end -->

@endsection

@push('scripts')
    <script>
        // function selectFile() {
        //         alert("Hello! I am an alert box!!");
        //         document.getElementById("profileImage").click();
        //     }

        document.getElementById("selectFile").onclick = function() {
            document.getElementById("profileImage").click();
        }


        $('#profileImage').change(function() {
            var file = this.files[0];

            console.log(file);
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.profile-img').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });

        $(document).ready(function() {





        });
    </script>
@endpush
