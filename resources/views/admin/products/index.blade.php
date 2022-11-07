@extends('admin.layouts.app')
@section('title', 'Products')

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
                        <li class="breadcrumb-item"><a href="#!"> Products </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>All Product List</h5>
                <a href="{{ route('products.create') }}" class="btn btn-glow-dark btn-dark flot-r">Add Product</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="posts">
                            <thead>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                                <th>Options</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#posts').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('allproducts') }}",
                    "dataType": "json",
                    "type": "post",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "brand" },
                { "data": "category" },
                { "data": "supplier" },
                { "data": "price" },
                { "data": "quantity" },
                { "data": "created_at" },
                { "data": "options" }
            ]

            });
        });
    </script>
@endpush
