

@extends('client/index')
 
@section('main')
<!-- Page Header Start -->
<div class="container">
 <x-client.page.detailpost :detail="$data">
    <x-slot name="similarPosts">
        <div class="section-header text-center mx-auto mb-5  col-12 fadeInUp" data-wow-delay="0.1s" >
            <h1 class="display-5 mb-3">Tin tức cùng loại</h1>
            <p>Chào mừng bạn đến với trang tin tức của chúng tôi! Chúng tôi là một trang tin tức trực tuyến cung cấp thông tin mới nhất về các sự kiện đang diễn ra trên thế giới. Chúng tôi có đội ngũ phóng viên và biên tập viên chuyên nghiệp luôn cập nhật tin tức mới nhất và chính xác nhất.
        </div>
    </x-slot>

</x-client.page.detailpost>



 <x-client.page.blog :post="$similarPosts" class="images-blog"  >

</x-client.page.blog>

</div>

@endsection
