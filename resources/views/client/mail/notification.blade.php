<x-mail.notification>

<x-slot name="content">
    <table border="0" cellpadding="0" cellspacing="0"
    class="text_block block-1" role="presentation"
    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
    width="100%">
    <tr>
         <td class="pad"
            style="padding-bottom:10px;padding-left:20px;padding-right:10px;padding-top:30px;">
            <div style="font-family: sans-serif">
                <div class=""
                    style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21.6px; color: #848484; line-height: 1.8;">
                    <p
                        style="margin: 0; font-size: 14px; text-align: center;padding-bottom:10px; mso-line-height-alt: 32.4px;">
                        <span style="font-size:18px;">XIN
                                CHÀO BẠN: <strong> {{$user['user']->name}}</strong></span></p>
                    <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Tài khoản: <em>{{ $user['user']->email}} </em></strong>
                    </p>
                    <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Đăng nhập lúc: <em>{{$user['browser']['time']}}</em></strong>
                    </p>
                    <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Phương thức đăng nhập: <em>{{$user['browser']['method']}} </em></strong></p>
                    <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Địa chỉ Addpress: <em>{{$user['browser']['version']}}  </em></strong></p>
                   <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Hệ điều hành máy: <em>{{$user['browser']['platform']}}  </em></strong></p>
                    <p
                        style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 25.2px;">
                        <strong>Đăng nhập bằng trình duyệt: <em>{{$user['browser']['browser']}}</em></strong><strong><br /><br /><span
                                style="color:#464646;">CÁM ƠN BẠN
                                ĐÃ TIN TƯỞNG CHÚNG TÔI, XIN CẢM ƠN
                                BẠN</span></strong></p>
                </div>
            </div>
        </td>
    </tr>
</table>
</x-slot>


</x-mail.notification>