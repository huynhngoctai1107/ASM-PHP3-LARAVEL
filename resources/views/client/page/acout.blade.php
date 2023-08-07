@extends('client.index')
@section('css')

<link rel="stylesheet" href="{{asset('css/button.css')}}">
@endsection
@section('main')
<br>


<div class="container-xxl py-6" style="margin-top:80px !important;">
     
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
           
            <h1 class="display-5 mb-3">Tài khoản</h1>
              
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
             @endif  
        </div>
 
        <x-client.page.view-acout :oder="$oder" :product='$product' :count="$count"></x-client.page.view-acout>
    
</div>




@endsection
<style>
  html,
body,
.intro {
  height: auto;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

thead th {
  color: #fff;
}

.card {
  border-radius: .5rem;
}

.table-scroll {
  border-radius: .5rem;
}

.table-scroll table thead th {
  font-size: 1.25rem;
}
thead {
  top: 0;
  position: sticky;
}
</style>