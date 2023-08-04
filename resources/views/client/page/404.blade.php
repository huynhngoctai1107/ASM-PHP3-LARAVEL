@extends('client.index')
@section('active7')
active
@endsection
@section('main')

@php
$title = "Lỗi 404";
@endphp
<x-client.header.header :title="$title"></x-client.header.header>

<!-- 404 Start -->
<x-client.page.404></x-client.page.404>
  
@endsection
