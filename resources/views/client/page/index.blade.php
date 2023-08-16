@extends('client.index')

@section('active1')
active
@endsection
@section('main')


<x-client.banner.banner>

</x-client.banner.banner>
<!-- Carousel End -->


<!-- About Start -->
<x-client.about.index>

</x-client.about.index>
<!-- About End -->
<x-client.page.product :product="$product ?? '' "  category="product"></x-client.page.product>

<!-- Feature Start -->
<x-client.page.feature>

</x-client.page.feature>
<!-- Feature End -->


<!-- Product Start -->

<!-- Product End -->


<!-- Firm Visit Start -->
<x-client.page.visit>

</x-client.page.visit>
<!-- Firm Visit End -->


<!-- Testimonial Start -->
{{-- <x-client.page.comment>

</x-client.page.comment> --}}
<!-- Testimonial End -->
<br>
<x-client.page.blog :post="$post ?? ''" class="images-index"  >
    <x-slot name="category">
        <div class="section-header text-center mx-auto mb-5 col-12 wow fadeInUp" data-wow-delay="0.1s" >
            <h1 class="display-5 mb-3">Tin tức mới</h1>
            <p>Chào mừng bạn đến với trang tin tức của chúng tôi! Chúng tôi là một trang tin tức trực tuyến cung cấp thông tin mới nhất về các sự kiện đang diễn ra trên thế giới. Chúng tôi có đội ngũ phóng viên và biên tập viên chuyên nghiệp luôn cập nhật tin tức mới nhất và chính xác nhất.
        </div>
    </x-slot>
</x-client.page.blog>
<!-- Blog Start -->

@endsection

