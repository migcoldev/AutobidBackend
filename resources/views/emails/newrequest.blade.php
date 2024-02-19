<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <title>Autobid Registry</title>
    <style type="text/css">
        body{
            margin:0;
            padding:0;
            font-family:Arial,Helvetica,sans-serif;
            color: #ffffff;
            font-size: 14px;
        }
        /* yahoo, hotmail */
        .ReadMsgBody{ width:100%; }
        .ExternalClass{ width:100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
        .yshortcuts a{ border-bottom: none !important; }
        .vb-outer{ min-width: 0 !important; }
        .RMsgBdy, .ExternalClass{
            width: 100%;
            background-color: #ffffff;
        }
        /* outlook/office365 add buttons outside not-linked images and safari have 2px margin */
        [o365] button{ margin: 0 !important; }
        /* outlook */
        table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
        #outlook a{ padding: 0; }
        a { border: 0 !important; text-decoration: none !important; }
        img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
        a img{ border: none; }
        /* Gmail */
        .ii a[href] {
            color: #333333 !important;
        }
        @media only screen and (max-width: 599px) {
            .mobile-hide, td[class="mobile-hide"]{ display: none !important; }
            .mobile-textcenter, td[class="mobile-textcenter"] { text-align: center !important; }
            .mobile-textleft, td[class="mobile-textleft"] { text-align: left !important; }
            .mobile-height-auto {
                height: auto !important;
            }
            .lh-1 {
                line-height: 1.3 !important;
            }
            .mobile-sinborde {
                border: 0 !important;
                border: none !important;
            }
            .mobile-img-full {
                width: 100% !important;
                max-width: 100% !important;
            }
            .mobile-margen {
                width: 8% !important;
            }
            td[class="mobile-margen"] {
                width: 8% !important;
            }
            .mobile-full {
                width: 100% !important;
                max-width: 480px !important;
            }
            table[class="mobile-full"] {
                width: 100% !important;
                max-width: 480px !important;
            }
            .textmobile, font[class="textmobile"] {
                font-size: 24px !important;
                line-height: 35px !important;
            }
        }
    </style>
</head>
<body  alink="#00a94f" vlink="#00a94f">
<!--[if (gte mso 9)|(IE)]>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
<![endif]-->
<table border="0" cellspacing="0" cellpadding="0" style="margin:auto; width:100%; max-width:100%; font-family:Arial,Helvetica,sans-serif; border-collapse: collapse;">
    <tr>
        <td>
            <!--[if (gte mso 9)|(lte ie 8)]>
            <table width="650" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
            <![endif]-->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="650" style="max-width: 650px; width: 100%;">
                <tbody>
                <tr>
                    <td height="40"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="25" style="width: 25px;"></td>
                                <td>
                                    <img alt="Autobid Registry" border="0" hspace="0" vspace="0" width="178" height="50" style="border: 0px; display: block; color: #333333; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 178px; height: auto; max-width:178px;" src="{{ config('app.url_composer') }}img/logo-make.png">
                                </td>
                                <td width="25" style="width: 25px;"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td colspan="3" height="40"></td>
                            </tr>
                            <tr>
                                <td width="25" style="width: 25px;"></td>
                                <td>
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="250">
                                    <![endif]-->
                                    <table width="250" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 599px; max-width: 599px;" class="mobile-full">
                                        <tbody>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Vehículo : {{$bid->year.' '.$bid->brand.' '.$bid->model}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    VIN : {{$bid->vin}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Nombres : {{$contact_request->first_name}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Apellidos : {{$contact_request->last_name}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Email : {{$contact_request->email}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Teléfono : {{$contact_request->phone}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 20px; font-weight: 300;">
                                                    Mensaje : {{$contact_request->message}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="mobile-height-auto">
                                                <div style="font-family:Arial,Helvetica,sans-serif; font-size: 14px; font-weight: bold; color: #ffffff;">
                                                    Autobid Registry
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(lte ie 8)]>
                                    </td>
                                    <td align="left" valign="top" width="600">
                                    <![endif]-->
                                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 599px; max-width: 599px;" class="mobile-full">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <!--[if (gte mso 9)|(IE)]>
                                                <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td width="50">
                                                <![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%; max-width: 49px;" class="mobile-full">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center" width="50" height="50"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (gte mso 9)|(lte ie 8)]>
                                                </td>
                                                </tr>
                                                </table>
                                                <![endif]-->
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                                <td width="25" style="width: 25px;"></td>
                            </tr>
                            <tr>
                                <td colspan="3" height="40"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <!--[if (gte mso 9)|(lte ie 8)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</body>
</html>