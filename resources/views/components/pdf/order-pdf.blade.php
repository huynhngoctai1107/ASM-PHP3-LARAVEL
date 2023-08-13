<html>
<head>
    <title>Hoa don dien tu - Foody Organic</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:200px;
        height:60px;        
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">HOA DON DIEN TU</h1>
</div>
 
<div class="add-detail mt-10 col-12">
    <div class="w-400 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Ma hoa don:  - <span class="gray-color">#TH {{$order[0]->id}}</span></p>
        <p class="m-0 pt-5 text-bold w-400 d-flex">Ten khach hang - <span class="gray-color">{{Str::of($order[0]->fullname)->ascii()}}</span></p>

        <p class="m-0 pt-5 text-bold w-400 d-flex">Email khach hang - <span class="gray-color">{{$order[0]->email}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Ngay dat hang - <span class="gray-color"> {{date('d-m-Y',strtotime($order[0]->date_oder))}}</span></p>
    </div>
    {{-- <div class="w-50 float-left logo mt-10">
        <img src="https://techsolutionstuff.com/frontTheme/assets/img/logo_200_60_dark.png" alt="Logo">
    </div> --}}
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">THONG TIN CHI TIET</th>
            <th class="w-50">DIA CHI GIAO HANG</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                     <strong>Tong gia tri don hang:</strong> {{number_format($order[0]->total_money)}}   <br>
                    <strong>Trang thai don hang:</strong> <span class="text-success" style="color: rgb(9, 199, 9) !important">@if($order[0]->status == 0 ) {{Str::of('Đã đặt hàng')->ascii()}}  @elseif($order[0]->status == 1)  {{Str::of('Đang vận chuyển')->ascii()}} @elseif($order[0]->status == 2) {{Str::of('Đang giao hàng')->ascii()}}  @elseif($order[0]->status == 3) {{Str::of('Giao hàng thành công')->ascii()}}  @else Don hang da bi huy @endif</span> 
                    <br>
                    <strong>Thanh toan:</strong> @if($order[0]->pay==4) Chua thanh toan @else Da thanh toan  @endif <br>
 

                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{Str::of($order[0]->address)->ascii()}}</p>
                                    
                    <p>Lien he: {{$order[0]->phone_order ??""}}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Phuong thuc thanh toan</th>
            <th class="w-50">Hinh thuc giao hang</th>
        </tr>
        <tr>
            <td style="text-align: center"> <strong style="color:crimson">Thanh toan  @if($order[0]->pay==2 )Visa @elseif($order[0]->pay==1)Paypal @elseif($order[0]->pay==3)MoMo @else khi nhan hang @endif
            </strong>  </td>
            <td style="text-align: center"><strong style="color: green">Giao hang mien phi</strong> </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">ID</th>
            <th class="w-50">Ten San Pham</th>
            <th class="w-50">Gia</th>
            <th class="w-50">So Luong</th>
            <th class="w-50">Tong</th>
         </tr>
         @foreach($order as $item)
        <tr align="center">
            <td>{{$item->id_product}}</td>
            <td>{{Str::of($item->name)->ascii()}}</td>
            <td>{{number_format($item->price)}} </td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->price * $item->quantity)}}</td>
        </tr>
       @endforeach
    </table>
    <div class="total-part">
        <div class="" align="right" style="text-align: right !important">
            <p>Tong tien san pham:  <span style="font-weight: 600">{{number_format($item->total_money)}} VND</span></p>
            <p>Thue VAT:         <span style="font-weight: 600">0 VND</span></p>
            <h3>Tong tien don hang:  <span style="font-weight: 600">{{number_format($item->total_money)}} VND</span></h3>
        </div>
       
        
    </div> 
</div>
</html>