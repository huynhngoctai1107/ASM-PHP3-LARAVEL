@extends('client.index')
 

@section('main')
 

 <x-cart.paycart :product="$data" :total="$total" :number="$number"></x-cart.paycart>

@endsection
