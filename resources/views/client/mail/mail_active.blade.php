<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css" />
  
    <link href="{{asset('css/mail.css')}}" rel="stylesheet">
</head>

<body style="margin: 0; background-color: #eb5a59; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">

 
<x-client.mail.mail>
    <x-slot name="active">
        <table border="0" cellpadding="0" cellspacing="0" class="heading_block block-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tr>
                <td class="pad" style="text-align:center;width:100%;">
                    <h1 style="margin: 0; color: #ffffff; direction: ltr; font-family: 'Shrikhand', Impact, Charcoal, sans-serif; font-size: 38px; font-weight: normal; letter-spacing: 2px; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><span class="tinyMce-placeholder">Kích hoạt tài khoản</span></h1>
                </td>
            </tr>
        </table>
        <div class="spacer_block block-9" style="height:30px;line-height:30px;font-size:1px;"> </div>
        <table border="0" cellpadding="10" cellspacing="0" class="button_block block-10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
            <tr>
                <td class="pad">
                    <div align="center" class="alignment">
          <a href="http://127.0.0.1:8000/active-now/{{$user->token}}/{{$user->id}}" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#feac04;border-radius:4px;width:auto;border-top:2px solid #FFFFFF;border-right:2px solid #FFFFFF;border-bottom:2px solid #FFFFFF;border-left:2px solid #FFFFFF;padding-top:10px;padding-bottom:10px;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;font-size:18px;text-align:center;mso-border-alt:none;word-break:keep-all;"       
                                target="_blank"><span style="padding-left:30px;padding-right:30px;font-size:18px;display:inline-block;letter-spacing:normal;"><span dir="ltr" style="word-break: break-word; line-height: 21.6px;"><strong>ACTIVE NOW !</strong></span></span></a>
                  
                    </div>
                </td>
            </tr>
        </table>
    </x-slot>
</x-client.mail.mail>

</body>

</html>
