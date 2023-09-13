<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MAUCARGO</title>
    <style>
        body {
            font-size: 10pt;

        }

        .page-break {
            page-break-after: always;
        }

        h1 {
            margin: 0 !important;
            padding: 0 !important;
            font-size: 16pt;
        }

        h2 {
            margin: 0 !important;
            padding: 0 !important;
            font-size: 15pt;
        }

        h3 {
            margin: 0 !important;
            padding: 0 !important;
            font-size: 14pt;
        }
    </style>
</head>

<body>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <img src="{{ public_path('assets/logo2.png') }}" width="90%">
            </td>
        </tr>
    </table>
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-left: 60px">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="54%" valign="top">
                            <p><strong>SHIPPING INTRUCTION<br>NO.{{ $shipping->id }}</strong></p>
                        </td>
                        <td width="46%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="12%">To</td>
                                    <td width="3%">:</td>
                                    <td width="85%">{{ $shipping->to }}</td>
                                </tr>
                                <tr>
                                    <td>Attn</td>
                                    <td>:</td>
                                    <td>{{ $shipping->attn }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td> {{ $shipping->phone }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="60%" border="0">
                    <tr>
                        <td width="15%">SHIPPER</td>
                        <td width="3%">:</td>
                        <td width="40%"><strong>{{ $shipping->shipper }}</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>{!! nl2br(e($shipping->shipper_address)) !!}</td>
                    </tr>
                    <tr>
                        <td>CONSIGNEE</td>
                        <td>: </td>
                        <td><strong>{{ $shipping->consigne }}</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td rowspan="2">{!! nl2br(e($shipping->consigne_address)) !!}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>NOTIFY PARTY</td>
                        <td>:</td>
                        <td><strong>{{ $shipping->notify }}</strong></td>
                    </tr>
                    <tr>
                        <td>STUFFING DATE</td>
                        <td>:</td>
                        <td><strong>{{ \Carbon\Carbon::parse($shipping->stuffin_date)->format(' l, j F Y') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>STUFFING TIME</td>
                        <td>:</td>
                        <td> <strong>{{ $shipping->stuffin_time }}
                                WIB</strong></td>
                    </tr>
                    <tr>
                        <td>DESTINATION</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->destination }}</strong></td>
                    </tr>
                    <tr>
                        <td>PORT OF LOADING </td>
                        <td>:</td>
                        <td> {{ $shipping->port_loading }}</td>
                    </tr>
                    <tr>
                        <td>QTY</td>
                        <td>:</td>
                        <td> {{ $shipping->qty }}</td>
                    </tr>
                    <tr>
                        <td>GROSS WEIGHT</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->gross_weight }} KGS</strong></td>
                    </tr>
                    <tr>
                        <td>NETT WEIGHT</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->net_weight }} KGS</strong></td>
                    </tr>
                    <tr>
                        <td>MEASUREMENT</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->measurement }} M<sup>3</sup></strong></td>
                    </tr>
                    <tr>
                        <td>VOLUME </td>
                        <td>:</td>
                        <td><strong> {{ $shipping->volume }}</strong></td>
                    </tr>
                    <tr>
                        <td>FREIGHT</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->freight }}</strong></td>
                    </tr>
                    <tr>
                        <td>VESSEL</td>
                        <td>:</td>
                        <td><strong> {{ $shipping->vessel }}</strong></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">SEMARANG,
                {{ \Carbon\Carbon::now()->locale('id_ID')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>MEGA ANUGRAH UTAMA</strong></td>
        </tr>
        </td>
        </tr>
        <tr>
            <td height="71" colspan="2">&nbsp;&nbsp; </td>
        </tr>
        <tr>
            <td colspan="2"><strong> {{ Auth::user()->name }}</strong></td>
        </tr>
    </table>

</html>
