@extends('admin.layouts.app')
@section('title', 'Brand Edit')

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
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item"><a href="#!">Edit</a></li>
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
                    <h5>Edit User Info</h5>
                    <a href="{{ route('brands.index') }}" class="btn btn-glow-dark btn-dark flot-r">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="form-label">Brand Name:</label>
                                <input type="text" name="name" value="{{ old('name') ?? $brand->name }}"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="Enter brand name">
                                @if ($errors->has('name'))
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter brand name</small>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="exampleFormControlTextarea1">Description:</label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="4"
                                    placeholder="Enter description">{{ old('description') ?? $brand->description }}</textarea>
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


                        {{-- <div class="form-group row">

                            <div class="col-lg-4">
                                <label class="form-label">Status:</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline21" name="type" value="1"
                                            class="custom-control-input @error('type') is-invalid @enderror">
                                        <label class="custom-control-label" for="customRadioInline21">Administrator</label>
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
                            </div>
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
        $(document).ready(function() {});
    </script>
@endpush
