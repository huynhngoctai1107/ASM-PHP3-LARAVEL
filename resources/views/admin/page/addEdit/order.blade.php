@extends('admin.index')
@section('title')
    Chỉnh sửa hóa đơn
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
@endsection

@section('main')
    <div class="content-wrapper bg-white">
        <section class="content mt-5 bg-white">
            <div class="container-fluid bg-white">
                <div class="  my-5  ">

                    <form action="/admin/edit-order/{{$order[0]->id}}" method="post" class="col-12">
                        @csrf
                        @if ($order['0']->status > 0)
                            <fieldset disabled>
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                            <input type="text" name="fullname" value="{{ $order['0']->fullname }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone_order" value="{{ $order['0']->phone_order }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Địa chỉ giao hàng</label>
                            <textarea class="form-control" placeholder="Địa chỉ giao hàng" name="address" id="floatingTextarea">{{ $order['0']->address }}</textarea>

                        </div>
                        <div class="form-floating mb-4">
                            <label for="floatingTextarea">Ghi chú</label>
                            <textarea class="form-control" placeholder="Địa chỉ giao hàng" name="note" id="floatingTextarea">{{ $order['0']->note }}</textarea>

                        </div>
                       
                            </fieldset>
                  



                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label mb-4">Phương thức thanh toán</label>
                            @if ($order['0']->pay < 4)
                                <fieldset disabled>
                            @endif
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="1"
                                        {{ $order[0]->pay == 1 ? 'checked' : '' }} type="radio" name="pay"
                                        id="radioNoLabel1" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel1">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">

                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/888/888870.png"
                                                alt="American Express" /></i> Thanh toán Paypal

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class=" ms-4 d-flex align-items-center ">
                                    <input class="form-check-input" type="radio" value="2"
                                        {{ $order[0]->pay == 2 ? 'checked' : '' }} name="pay" id="radioNoLabel2"
                                        value="" aria-label="..." />

                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel2">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/10605/10605892.png"
                                                alt="American Express" />

                                            Thanh toán qua Visa
                                        </p>
                                    </div>
                                </label>

                            </div>
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="3"
                                        {{ $order[0]->pay == 3 ? 'checked' : '' }} type="radio" name="pay"
                                        id="radioNoLabel3" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel3">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
                                                alt="American Express" />
                                            Thanh toán qua MoMo

                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="4"
                                        {{ $order[0]->pay == 4 ? 'checked' : '' }} type="radio" name="pay"
                                        id="radioNoLabel4" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel4">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/814/814245.png"
                                                alt="American Express" />
                                            Thanh toán khi nhận hàng
                                        </p>
                                    </div>
                                </label>
                            </div>
                            @if ($order['0']->pay < 4)
                                </fieldset>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label mb-4">Trạng thái đơn hàng</label>

                            @if ($order['0']->status > 0)
                                <fieldset disabled>
                            @endif
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="0"
                                        {{ $order['0']->status == 0 ? 'checked' : '' }} type="radio" name="status"
                                        id="radioNoLabel11" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel11">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">

                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/2833/2833509.png"
                                                alt="American Express" /></i> Đang chờ xác nhận

                                        </p>
                                    </div>
                                </label>
                            </div>
                            </fieldset>

                            @if ($order['0']->status > 1)
                                <fieldset disabled>
                            @endif

                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class=" ms-4 d-flex align-items-center ">
                                    <input class="form-check-input" type="radio" value="1"
                                        {{ $order['0']->status == 1 ? 'checked' : '' }} name="status"
                                        id="radioNoLabel21" value="" aria-label="..." />

                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel21">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/575/575780.png"
                                                alt="American Express" />

                                            Đang vận chuyển
                                        </p>
                                    </div>
                                </label>

                            </div>

                            </fieldset>

                            @if ($order['0']->status > 2 || $order['0']->status == 0)
                                <fieldset disabled>
                            @endif
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="2"
                                        {{ $order['0']->status == 2 ? 'checked' : '' }} type="radio" name="status"
                                        id="radioNoLabel31" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel31">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/9198/9198208.png"
                                                alt="American Express" />
                                            Đang giao hàng

                                        </p>
                                    </div>
                                </label>
                            </div>

                            </fieldset>

                            @if ($order['0']->status > 3 || $order['0']->status == 0 || $order['0']->status == 1)
                                <fieldset disabled>
                            @endif
                            <div class="d-flex mb-3 px-4 justify-content-center">
                                <div class="  ms-4 d-flex align-items-center ">
                                    <input class="form-check-input " class="checked" value="3"
                                        {{ $order['0']->status == 3 ? 'checked' : '' }} type="radio" name="status"
                                        id="radioNoLabel41" value="" aria-label="..." />
                                </div>
                                <label class="form-check-label col-12" for="radioNoLabel41">
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img class="me-2" width="35px"
                                                src="https://cdn-icons-png.flaticon.com/128/9129/9129538.png"
                                                alt="American Express" />
                                            Giao hàng thành công
                                        </p>
                                    </div>
                                </label>
                            </div>

                            </fieldset>


                          
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
