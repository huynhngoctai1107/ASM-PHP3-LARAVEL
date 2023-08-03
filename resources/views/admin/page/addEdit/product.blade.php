@extends('admin.index')
@section('title')

    @if (!empty($data['page']))
    Chỉnh sửa sản phẩm
    @else
    Thêm sản phẩm
    @endif
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
@endsection
@section('script')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- Page specific script -->
    <script>
        $(function() {
            //Add text editor
            $('#compose-textarea').summernote()
        })
        $(function() {
            //Add text editor
            $('#compose-textarea1').summernote()
        })
    </script>
@endsection


@section('main')

    <x-admin.page.product :check="$data">

    </x-admin.page.product>
@endsection
