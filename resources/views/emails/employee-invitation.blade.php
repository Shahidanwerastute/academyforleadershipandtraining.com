<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <style type="text/css">
        body {
            color: #777;
            padding: 0;
            margin: 0;
        }
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: none !important;
            font-style: normal;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
        }
        @import 'https://fonts.googleapis.com/css?family=Roboto';
        @import 'url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css)';
        button {
            width: 90%;
        }
        p {
            font-size: 13px !important;
            color: #000 !important;
            line-height: normal !important;
            padding-bottom: 14px !important;
            margin: 0px !important;
        }

        .coupon-code {
            font-weight: 600;
            display: inline-block;
            margin: 0;
            padding: 6px 13px 5px;
            border-radius: 50px;
        }
        .coupon-code {
            background: #607D8B;
            color: #fff;
        }

        @media screen and (max-width:600px) {
            /*styling for objects with screen size less than 600px; */
            body, table, td, p, a, li, blockquote {
                -webkit-text-size-adjust: none!important;
            }
            table {
                /* All tables are 100% width */
                width: 100%;
            }
            .footer {
                /* Footer has 2 columns each of 48% width */
                height: auto !important;
                max-width: 48% !important;
                width: 48% !important;
            }
            table.responsiveImage {
                /* Container for images in catalog */
                height: auto !important;
                max-width: 30% !important;
                width: 30% !important;
            }
            table.responsiveContent {
                /* Content that accompanies the content in the catalog */
                height: auto !important;
                max-width: 66% !important;
                width: 66% !important;
            }
            .top {
                /* Each Columnar table in the header */
                height: auto !important;
                max-width: 48% !important;
                width: 48% !important;
            }
            .catalog {
                margin-left: 0%!important;
            }
        }

        @media screen and (max-width:480px) {
            /*styling for objects with screen size less than 480px; */
            body, table, td, p, a, li, blockquote {
            }
            table {
                /* All tables are 100% width */
                width: 100% !important;
                border-style: none !important;
            }
            .logo_regular {
                width: 150px;
                height: 70px;
                display:block;
            }
            .footer {
                /* Each footer column in this case should occupy 96% width  and 4% is allowed for email client padding*/
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }
            .table.responsiveImage {
                /* Container for each image now specifying full width */
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }
            .table.responsiveContent {
                /* Content in catalog  occupying full width of cell */
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }
            .top {
                /* Header columns occupying full width */
                height: auto !important;
                max-width: 100% !important;
                width: 100% !important;
            }
            .catalog {
                margin-left: 0%!important;
            }
            button {
                width: 90%!important;
            }
        }
    </style>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td>
            <table width="600"  align="center" cellpadding="0" cellspacing="0" style="
                color: #444;
                background-color: #f4f4f4;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-position: top center;
            ">
                <thead style="background-color:#fff;">
                <tr>

                    <th style="color: brown; min-width: 100px;">
                        {{$carbon::now()->toFormattedDateString()}}
                    </th>
                </tr>
                <tr>
                    <th colspan="2" style="padding:20px 0 0">
                        <table style="width:100%; border:0;" cellpadding="0" cellspacing="0">
                            <tr>
                                <th style="width:36px;">&nbsp;</th>
                                <th align="left" colspan="2" style="color:#29378f; border-bottom: 1px solid #29378f; font-size:22px; font-weight:bold; white-space: nowrap">
                                    {!!$data['subject']!!}
                                </th>
                                <th style="width:36px;">&nbsp;</th>
                            </tr>
                        </table>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="padding: 45px 35px;">
                        <table style="display: block;width: 100%;">
                            <tbody style="display: block;width: 100%;">

                            <tr style="display: block;width: 100%;">
                                <td style="
                                            display: block;
                                            width: 100%;
                                            font-size: 13px;
                                            font-weight: normal;
                                            padding-bottom: 11px;
                                            word-spacing: 1px;
                                        ">
                                    {!!$data['content']!!}
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" style="
                            padding: 12px 35px;
                            text-align: center;
                            background-color: #45b2e3;
                            color: #fff;
                            font-size: 17px;
                            font-weight: normal;
                        ">
                        {!!str_replace("{year}",$carbon::now()->year,trans('language.email_copyright_text'))!!}
                        <a style="color:#fff;" href="http://taflat.com">www.taflat.com</a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
