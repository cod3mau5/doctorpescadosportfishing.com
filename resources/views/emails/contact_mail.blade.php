<!DOCTYPE html>
<html>
<head>
    <title>Order Reservation</title>
    <style type="text/css">


        @media  only screen and (max-width: 500px) {
            table {
                width: 100%;
            }

           .fulltd {
                display: block;
                width: 100%;
            }
            .logo {
                text-align: right;
            }
        }
            .contact-header{
                font-size: 12px!important;
                color: #fff;!important
            }
            .contact-header a{
                color: #fff!important
            }
    </style>
</head>
<body>

<table width="600" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 0;border-collapse: 0;border: 1px solid #444;margin: 0 auto; display:block;margin-bottom: 50px;">

    <tr>
        <td>
            <div  style="background:#ffffff!important;text-align:center;padding:1rem 0.35rem; display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;">
                <img src="https://www.doctorpescadosportfishing.com/img/dr_pescado_logo.png?" alt="" style="max-width: 100%;max-height:95px;margin:0 auto">
            </div>
        </td>
    </tr>
        <tr>
            <th>
                <strong class="text-white">{!! Carbon\Carbon::now('America/Mazatlan')->toFormattedDateString('Y-m-d H:i:s') !!}<br>{!! \Carbon\Carbon::now('America/Mazatlan')->format('h:i A') !!}</strong>
            </th>
        </tr>

        <tr>
            <td colspan="2" style="padding:5px 15px; font-family: Arial, Helvetica, sans-serif;">
                <p>Un nuevo email de contacto desde la pagina sido enviado:</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 15px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0; border-collapse: 0; border: 0; margin: 0 auto; display: block;">
                    <tr style="background-color: #FFFFFF;">
                        <td width="250" bgcolor="#FFFFFF" style="width: 200px; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">Name:</td>
                        <td width="350" bgcolor="#FFFFFF" style="width: 400px; border-left: 5px solid #ffffff; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">{{$data['fullname']}}</td>
                    </tr>
                    <tr style="background-color: #FFFFFF;">
                        <td width="250" bgcolor="#FFFFFF" style="width: 200px; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">Email:</td>
                        <td width="350" bgcolor="#FFFFFF" style="width: 400px; border-left: 5px solid #ffffff; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">{{$data['email']}}</td>
                    </tr>
                    <tr style="background-color: #FFFFFF;">
                        <td width="250" bgcolor="#FFFFFF" style="width: 200px; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">Message:</td>
                        <td width="350" bgcolor="#FFFFFF" style="width: 400px; border-left: 5px solid #ffffff; padding:5px 15px;font-family: Arial, Helvetica, sans-serif;" class="fulltd">{{$data['message']}}</td>
                    </tr>
                </table>
            </td>
        </tr>


    <tr>
        <td colspan="2" style="background: #e4eef1; color: #a4a7ac; padding: 10px 0; text-align: center;font-size:.8rem;">
            <p>
                From USA: +52 (624) 117 79 92<br>
                 <br>

                <a href="mailto:info@doctorpescadosportfishing.com" style="text-decoration: none;">
                    <strong>info@doctorpescadosportfishing.com</strong>
                </a><br>
            </p>
            <p>&copy; {{date('Y')}} {{config('app.name')}}. All Right Reserved.</p>
        </td>
    </tr>
</table>
</body>
</html>
