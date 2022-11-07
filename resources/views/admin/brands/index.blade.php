@extends('admin.layouts.app')
@section('title', 'Brands')

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
                        <li class="breadcrumb-item"><a href="#!"> Brands </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>All Admin User List</h5>
                <a href="{{ route('brands.create') }}" class="btn btn-glow-dark btn-dark flot-r">Add Brand</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="datTable">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
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
            $('#datTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('allbrands') }}",
                    "dataType": "json",
                    "type": "post",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "description" },
                { "data": "created_at" },
                { "data": "options" }
            ]

            });
        });
    </script>
@endpush
