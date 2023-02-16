<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>How to Generate QR Code Using Simple QRcode In Laravel 8</title>

</head>
<body>

    <table style="border: 1px; border-collapse: collapse;">
       <tr>
          <td>
             QR with text <br>
             Generated from controller
          </td>
          <td>
             {!! $qrcode !!}
          </td>
       </tr>

       <tr>
          <td>
             QR with text        
          </td>
          <td>
             {!! QrCode::generate('Welcome to Makitweb'); !!}
          </td>
       </tr>

       <tr>
          <td>
             QR with URL
          </td>
          <td>
             {!! QrCode::generate('https://makitweb.com'); !!}
          </td>
       </tr>

       <tr>
          <td>
             Change QR color
          </td>
          <td>
             {!! QrCode::color(224, 224, 224)->backgroundColor(102, 0, 204)->generate('Welcome to Makitweb'); !!}
          </td>
       </tr>

       <tr>
          <td>
             Change default size to 200px
          </td>
          <td>
             {!! QrCode::size(200)->generate('Welcome to Makitweb'); !!}
          </td>
       </tr>

       <tr>
          <td>
             PNG format
          </td>
          <td>
             {!! QrCode::format('png')->generate('Welcome to Makitweb'); !!}
          </td>
       </tr>

       <tr>
          <td>Download QR code</td>
          <td>
             <a href="{{ asset('images/qrcode.svg') }}" download>Download</a>
          </td>
        </tr>

    </table>
</body>
</html>