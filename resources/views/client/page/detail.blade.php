@extends('client.index')
@section('active3')
    active
@endsection
@section('css')

    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">

@endsection
@section('js')

    <script src="{{asset('js/details.js')}}"></script>
    <script src="{{asset('js/number.js')}}"></script>
@endsection


@section('main')

    <!-- Product Start -->
    <x-client.page.detail :detail="$data"  >

    </x-client.page.detail>

   <x-client.page.product :product="$similarProducts" category="" >

    </x-client.page.product> 

@endsection
