@extends('admin.layouts.app')
@section('title', 'Tittle_Name')

@push('css')
<style>
    .css {
       content: "i am css";
    }
</style>
@endpush

@section('content')
  <div class="">
    <h2>i </h2>
  </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('i am script');
        });
    </script>
@endpush
