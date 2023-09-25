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
        <td colspan="2" style="padding:0px;">
            <div style="background:#ffffff!important;display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;padding:10px 5px;">
                <table style="width:100%">
                    <tr style="padding:0;text-align:center;vertical-align:top">
                        <th style="text-align: center;color:#ffffff">
                            <img src="https://www.doctorpescadosportfishing.com/img/dr_pescado_logo.png?" alt="" style="margin:0 auto;width:40%;max-width:50%;height:auto;margin:0">
                        </th>
                    </tr>
                </table>
            </div>
        </td>
    </tr>

    <tr>
        <td colspan="2" style="padding: 15px;">
            <div style=" display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;">
                <table style="width:100%;color:#14213d">
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <th style="text-align: center;color:#14213d">
                            <strong class="text-white">{!! Carbon\Carbon::now('America/Mazatlan')->toFormattedDateString('Y-m-d H:i:s') !!} - {!! \Carbon\Carbon::now('America/Mazatlan')->format('h:i A') !!}</strong>
                        </th>
                    </tr>
                </table>
                    <table style="width:50%;color:#14213d;font-size:10px">
                        <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="text-align: center;color:#14213d">
                                Méx: <a href="tel:+526241177992" style="color:#14213d;font-size:.1.5rem;word-break: break-word;text-decoration:none">
                                            <strong class="text-white">+52 (624) 117 79 92</strong>
                                        </a>
                            </th>
                        </tr>
                    </table>
                    <table style="width:50%;color:#14213d;font-size:10px">
                        <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="text-align: center;color:#14213d">
                                US: <a href="tel:+5216241575157" style="color:#14213d;font-size:.1.5rem;word-break: break-word;text-decoration:none">
                                    <strong class="text-white">000 00 0 000 000 00 00</strong>
                                </a>
                            </th>
                        </tr>
                    </table>
                    <table style="width:100%">
                        <tr style="padding:0;text-align:center;vertical-align:top">
                            <th style="text-align: center;color:#14213d">
                                <a href="mailto:info@doctorpescadosportfishing.com" style="word-break: break-word;text-decoration: none;color:#fff!important;font-size:9.5px">
                                    <strong>info@doctorpescadosportfishing.com</strong>
                                </a>
                            </th>
                        </tr>
                    </table>
            </div>
        </td>
    </tr>
        <tr style="padding:0;text-align:left;vertical-align:top" >
            <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;text-align:left;padding:2rem 1rem 0 1rem">
                <h3  style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:1.5rem;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">
                    @if ($reservation->orderID)
                        <strong>{{ucfirst($reservation->name)}},</strong>
                        @else
                        <strong>{{ucfirst($reservation->name)}},</strong>
                    @endif
                </h3>
                <p style="margin:0;margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:15px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                    This email is to confirm that your Reservation
                    @if ($reservation->orderID)
                    Payment
                    @else
                    Request
                    @endif
                    was received.
                </p>
                <p style="margin:0;margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:15px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">This is a short version of your request:</p>
                <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
            </th>
        </tr>
        <tr>
        <td colspan="2" style="padding: 15px;">
            <div style=" display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;">



                    <table style="border-collapse:collapse;border-spacing:0;text-align:left;vertical-align:top;width:50%">
                        <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;text-align:left">
                                <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">Personal Info</h2>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Name: <strong>{{ucfirst($reservation->name)}}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Email: <strong>{{$reservation->email}}</strong>
                                </p>
                                <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                                <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">Appointment</h2>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Trip Date: <strong>{!!  Carbon\Carbon::parse($reservation->fishingDate)->toFormattedDateString() !!}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Trip Time: <strong>{{ $reservation->fishingTime }}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Trip Duration: <strong>{{$reservation->duration}} Hrs</strong>
                                </p>
                                <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">

                            </th>
                        </tr>
                    </table>

                    <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:50%">
                        <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;margin:0;padding:0;text-align:left">
                                <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">Details</h2>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Trip: <strong>{{$reservation->charter}}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Persons: <strong>{{$reservation->anglers}}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Special Request: <strong>{!! $reservation->request !!}</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Total: <strong>{{$reservation->cost}} USD</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Payment Status: <strong style="color:springgreen">Paid</strong>
                                </p>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Order ID: <strong>{{ $reservation->orderID }}</strong>
                                </p>
                                <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                            </th>
                        </tr>
                    </table>

            </div>

            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;margin:0;text-align:left" class="px-3">
                        <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">Ubication</h2>
                        <p>
                            <img src="https://www.doctorpescadosportfishing.com/img/ubication.png?{{date("Y-m-d")}}" alt="" style="max-width: 100%;max-height:300px;margin:0 auto">
                            <img src="https://www.doctorpescadosportfishing.com/img/puerta.jpg?{{date("Y-m-d")}}" alt="" style="max-width: 100%;max-height:300px;margin:0 auto">
                        </p>
                        <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:900;line-height:19px;margin:0;margin-bottom:0;text-align:left">
                            Andador Atun Dock 1-B Orange Gate Near Cabo Dolphins 23450 Cabo San Lucas, Baja California Sur Mexico.
                        </p>
                        <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                    </th>
                </tr>
            </table>

            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;margin:0;text-align:left" class="px-3">
                        <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">
                            <b>where to park?</b>
                        </h2>
                        <p>
                            <img src="https://www.doctorpescadosportfishing.com/img/parking_map.png?{{date("Y-m-d")}}" alt="" style="max-width: 100%;max-height:300px;margin:0 auto">
                            <img src="https://www.doctorpescadosportfishing.com/img/parking.png?{{date("Y-m-d")}}" alt="" style="max-width: 100%;max-height:300px;margin:0 auto">
                        </p>
                        <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                    </th>
                </tr>
            </table>

            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%" class="mt-4">
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <th style="color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:19px;margin:0;text-align:left" class="px-3">
                        <h2 style="margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#619ED1;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">Recomendations for the trip:</h2>
                        <ul style="color:#47959E;" class="pl-4">
                            <li>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    A cap for the sun, Sunscreen & warm jacket (in cold season).
                                </p>
                            </li>
                            <li>
                                <p style="margin:0;margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    Take a pill for motion sickness (It is advisable to take the night before the fishing day).
                                </p>
                            </li>
                            <li>
                                <p style="margin-bottom:10px;color:#47959E;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                    bring your lunch or snack.
                                </p>
                            </li>
                        </ul>

                        <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                    </th>
                </tr>
            </table>

            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%" class="mt-3">
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <th style="margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:900;line-height:19px;margin:0;text-align:left" class="px-3">
                        <h2 style="margin:0;margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#ffa600;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">EXTRAS:</h2>
                        <p style="margin-bottom:10px;color:#fff;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:400;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:center;background: linear-gradient(45deg, forestgreen, transparent 40%), linear-gradient(-125deg, red, transparent 40%), #f77 url('http://orig12.deviantart.net/3e72/f/2007/232/e/f/escudo_nacional_mexicano_by_radikian.jpg')no-repeat center center;;border-radius:10px;padding:.8rem .3rem">
                            <span style="color:#ffffff;font-size:12px;font-weight:bolder;background:#444;padding:3px">
                                <b>Mexican lunch </b><span style="fon-size:10px;background:#444">(optional)
                            </span>:</span> <br>
                            <span style="background:#444;padding:4px">
                                1 sandwich, 2 burritos, chopped fruit, boiled egg <strong style="color: #ff5747">16 USD</strong>  notify the captain 1 day before.
                            </span>
                        </p>
                        <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                    </th>
                </tr>
            </table>

            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%" class="mt-3">
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <th style="margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:900;line-height:19px;margin:0;text-align:left" class="px-3">
                        <h2 style="margin:0;margin-bottom:10px;border-bottom:2px solid #C6C6C6;color:#fb5607;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:700;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-bottom:5px;text-align:left;width:90%;word-wrap:normal">BE AWARE:</h2>
                        <ul class="pl-4">
                            <li style="margin:0;margin-bottom:10px;color:#bd632f;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:700;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                Cancellations 72 hours in advance full refund except paypal commisions (5.4% + 0.3usd).
                            </li>
                            <li style="margin:0;margin-bottom:10px;color:#bd632f;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:700;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                Cancellations within 24 and 48 hours will incur a penalty of 50% minus paypal commisions (5.4% + 0.3usd).
                            </li>
                            <li style="margin:0;margin-bottom:10px;color:#bd632f;font-family:Tahoma,Geneva,sans-serif;font-size:12px;font-weight:700;line-height:19px;margin:0;margin-bottom:0;padding:0;text-align:left">
                                In case the port is closed due to storms or unsafe weather conditions, <br> or you can change the date by checking with the captain the availability of your reservation, Better to call afternoon or send us a whatsapp message.

                            </li>
                        </ul>
                        <hr class="hSep" style="margin:20px auto;border:none;border-bottom:1px solid #cacaca;border-left:0;border-right:0;border-top:0;clear:both;display:block;height:1px;margin:4px auto;max-width:580px;width:100%;border-color:#fff;">
                    </th>
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
