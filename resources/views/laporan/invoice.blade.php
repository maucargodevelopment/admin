<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Report Invoice</title>
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
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 0px 60px 0px 60px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        {{-- customer --}}
                        <td width="6%" valign="top">To</td>
                        <td width="50%" valign="top">{{ $invoice->consignee }}<br />{{ $invoice->address }}
                        </td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h2>INVOICE
                </h2>
            </td>
        </tr>
        <tr>
            <td align="left">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Ref. NO. : {{ $invoice->invoice }}</td>
                        <td align="right"> Issued Date : {{ $invoice->issued_date }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <hr />
            </td>
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top">
                            {{-- digunakan untuk tujuan --}}
                            <strong>To</strong>
                        </td>
                        <td valign="top">
                            <strong>: </strong>{{ $invoice->to }}
                        </td>
                        <td valign="top">
                            <strong>Vessel/Voyage</strong>
                        </td>
                        <td valign="top">
                            <strong>: {{ $invoice->vessel }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong>MAWB</strong>
                        </td>
                        <td valign="top">
                            <strong>: </strong>{{ $invoice->mawb }}
                        </td>
                        <td valign="top">
                            <strong>HBL</strong>
                        </td>
                        <td valign="top">
                            <strong>:</strong><strong>{{ $invoice->hbl }} </strong>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong>No</strong>
                        </td>
                        <td valign="top">
                            <strong>: </strong>{{ $invoice->no }}
                        </td>
                        <td valign="top">
                            <strong>GW/MEA</strong>
                        </td>
                        <td valign="top">
                            <strong>: {{ $invoice->gw }}
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong>Mode</strong>
                        </td>
                        <td valign="top">
                            <strong>: {{ $invoice->mode }}</strong>
                        </td>
                        <td valign="top">
                            <strong>ETD POL</strong>
                        </td>
                        <td valign="top">
                            <strong>: {{ $invoice->etd_pol }}</strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td align="center">
                <hr>
            </td>
        </tr>

        <tr>
            <td align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="50%">DESCRIPTION</td>
                        <td width="50%">AMMOUNT</td>
                    </tr>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $order->item }} ($
                                {{ number_format($order->price) }}*{{ number_format($order->curs) }})</td>
                            <td align="right">
                                <p>{{ number_format($order->subtotal) }}
                            </td>
                        </tr>
                    @endforeach

                </table>
            </td>
        </tr>

        <tr>
            <td align="center">
                <hr>
            </td>
        </tr>

        <tr>
            <td align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="50%" align="center"><strong>GRAND TOTAL</strong></td>
                        <td width="50%" align="right">
                            <p>IDR {{ number_format($invoice->grand_total) }}
                        </td>
                    </tr>
                </table>
            </td>
        <tr>
            <td height="63" align="center" valign="top">
                <hr>
            </td>
        <tr>
            <td align="center">
                <table width="100%" border="0">
                    <tr>
                        <td width="10%" valign="top"><strong>NOTE : </strong></td>
                        <td width="36%" valign="top">{{ $invoice->note }}</td>
                        <td width="19%" valign="top">&nbsp;</td>
                        <td width="35%" rowspan="4" valign="top">
                            <table width="100%" height="186" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="25" align="center">
                                        {{ \Carbon\Carbon::now()->locale('id_ID')->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td height="125" align="center"><img src="{{ public_path('assets/ttd.png') }}"
                                            alt="" width="161" height="160" /></td>
                                </tr>
                                <tr>
                                    <td height="17" align="center"><strong> {{ Auth::user()->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td height="17" align="center"><strong>Authorized Signature</strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" valign="top">
                            <p><strong>PLEASE REMIT TO :</strong>
                        </td>
                        <td valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" valign="top">
                            <p><strong>PT. MEGA ANUGRAH UTAMA</strong><br><strong>BANK MANDIRI ( IDR )</strong><br>
                                <strong>A/C : 136.00888.22231</strong>

                        </td>
                        <td valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center" valign="middle">
                            <p style="font-size:8px">All business transacted subject to Indonesia standard trading
                                conditions. Only Official Receipt will be recognized as proof of payment.<br>
                                It is hereby agreed that interest will be charged at 2% per month on payment overdu
                        </td>
                    </tr>
                </table>
            </td>
        <tr>
            <td align="center">
                3
            </td>
        </tr>

    </table>
</body>

</html>
