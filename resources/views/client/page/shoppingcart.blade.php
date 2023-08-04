@extends('client.index')
 

@section('main')
 

 <x-cart.shoppingcart :product="$data" :total="$total" :number="$number"></x-cart.shoppingcart>

@endsection
