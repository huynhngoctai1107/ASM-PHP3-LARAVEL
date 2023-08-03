

@extends('client/index')
@section('active2')
active
@endsection
@section('main')
<!-- Page Header Start -->
@php
$title = "Giới thiệu";
@endphp
<x-client.header.header :title="$title">

</x-client.header.header>
<!-- Page Header End -->


<!-- About Start -->
<x-client.about.index>

</x-client.about.index>
<!-- About End -->

<!-- Firm Visit Start -->
<x-client.page.visit>

</x-client.page.visit>
<!-- Firm Visit End -->

 <!-- Feature Start -->
<x-client.page.feature>

</x-client.page.feature>
<!-- Feature End -->



@endsection
