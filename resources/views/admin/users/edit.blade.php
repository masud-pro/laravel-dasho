@extends('admin.layouts.app')
@section('title', 'User Edit')

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
                    <a href="{{ route('users.index') }}" class="btn btn-glow-dark btn-dark flot-r">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                                    class="form-control  @error('name') is-invalid @enderror" placeholder="Enter full name">
                                @if ($errors->has('name'))
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your full name</small>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" value="{{ old('email') ?? $user->email }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your email</small>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Phone:</label>
                                <input type="text" name="phone" value="{{ old('phone') ?? $user->phone }}"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter your number">
                                @if ($errors->has('phone'))
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your number</small>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="form-label">Password:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                    </div>
                                    <input type="password" name="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        placeholder="Enter Password">

                                </div>
                                @if ($errors->has('password'))
                                    @error('password')
                                        <div class="mt-8 c-alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please enter your Password</small>
                                @endif



                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Confirm Password:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                    </div>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Retype Password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                    <small class="form-text text-muted">Please retype your Password</small>
                                @endif

                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option disabled>Select status</option>
                                        <option value="1"{{ $user->status == 1 ? 'selected' : '' }}>Open</option>
                                        <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Pending</option>
                                        <option value="3" {{ $user->status == 3 ? 'selected' : '' }}>Close</option>
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
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-4">
                                <label class="form-label">User Type:</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline21" name="type" value="1" {{ $user->type == 1 ? 'checked' : '' }}
                                            class="custom-control-input @error('type') is-invalid @enderror">
                                        <label class="custom-control-label" for="customRadioInline21">Administrator</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline22" name="type" value="2" {{ $user->type == 2 ? 'checked' : '' }}
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
                        </div>

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
