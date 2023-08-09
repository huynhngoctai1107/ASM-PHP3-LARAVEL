 @extends('client.index')
 @section('active3')
active
@endsection
 @section('main')

    <!-- Product Start -->
 <x-client.page.product :product="$data??''" category="product"></x-client.page.product>
    <!-- Product End -->


    <!-- Firm Visit Start -->
    <x-client.page.visit>

    </x-client.page.visit>
    <!-- Firm Visit End -->


    <!-- Testimonial Start -->
    <x-client.page.comment>

    </x-client.page.comment>
    <!-- Testimonial End -->
 @endsection
