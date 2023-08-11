@extends('admin.index')

@section('title')
Chi tiết sản phẩm
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endsection

@section('main')
<div class="content-wrapper  bg-white my-5  ">
    <x-oder.detail-oder :oder="$oder" :product="$product??''"></x-oder.detail-oder>

  </div>


@endsection
@section('script')
    {{-- <script src="{{ asset('dist/js/showhiden.js') }}"></script> --}}
    
@endsection
