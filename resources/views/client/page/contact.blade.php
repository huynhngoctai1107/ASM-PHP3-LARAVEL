@extends('client.index')
@section('active8')
active
@endsection

@section('main')


    <!-- Page Header Start -->
    @php
    $title = "Liên hệ";
    @endphp
    <x-client.header.header  :title="$title">
    
    </x-client.header.header>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <x-client.page.contact>
    
    </x-client.page.contact>
    <!-- Contact End -->


    <!-- Google Map Start -->
    <x-client.page.map>
    
    </x-client.page.map>
    <!-- Google Map End -->

@endsection
