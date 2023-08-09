@extends('client.index')
@section('active4')
active
@endsection
@section('main')


<!-- Page Header Start -->
@php
$title = "Tin tức";
@endphp
<x-client.header.header :title="$title">

</x-client.header.header>
<!-- Page Header End -->

<div class="container">
<!-- Blog Start -->
<div class="col-12">
    <div class="section-header text-center mx-auto mb-5  col-12 fadeInUp" data-wow-delay="0.1s" >
        <h1 class="display-5 mb-3">Tin tức mới</h1>
        <p>Chào mừng bạn đến với trang tin tức của chúng tôi! Chúng tôi là một trang tin tức trực tuyến cung cấp thông tin mới nhất về các sự kiện đang diễn ra trên thế giới. Chúng tôi có đội ngũ phóng viên và biên tập viên chuyên nghiệp luôn cập nhật tin tức mới nhất và chính xác nhất.
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 mt-2">
        <x-client.header.sidebars :category="$category">

        </x-client.header.sidebars>

    </div>
    <div class="col-md-9 col-12 mt-2 p-0">
        <x-client.page.blog :post="$data??''" class="images-blog"  >

        </x-client.page.blog>
    </div>

</div>

</div>
<!-- Blog End -->




@endsection;
