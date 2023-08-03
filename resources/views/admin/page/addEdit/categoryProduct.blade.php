@extends('admin.index')
@section('title')
    @if (!empty($data))
    Chỉnh sửa loại loại sản phẩm
    @else
    Thêm loại sản phẩm
@endif
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
@endsection

@section('main')

<x-admin.page.categoryproduct :check="$data">

</x-admin.page.categoryproduct>

@endsection
