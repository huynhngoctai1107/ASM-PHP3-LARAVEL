@extends('admin.index')

@section('title')


@if (isset($data))
    Chỉnh sửa tài khoản
    @else
    Thêm tài khoản
    @endif
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
@endsection

@section('script')
<script src="{{asset('dist/js/showhiden.js')}}"></script>
@endsection
@section('main')

<x-admin.page.user :check="$data">

</x-admin.page.user>
@endsection
