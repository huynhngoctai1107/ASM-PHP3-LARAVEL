@extends('admin.index')
@section('title')
    @if (!empty($data))
    Chỉnh sửa loại bài viết
    @else
    Thêm loại bài viết
@endif
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
@endsection

@section('main')

<x-admin.page.categorypost :check="$data">

</x-admin.page.categorypost>

@endsection
