@php
$colspan = '9';
@endphp
<table>


    <tr>

        <td style="text-align: center;"><strong>JOB</strong></td>
        <td style="text-align: center;"><strong>CUSTOMER</strong></td>
        <td style="text-align: center;"><strong>SHIPPER</strong></td>
        <td style="text-align: center;"><strong>CONSIGNE</strong></td>
        <td style="text-align: center;"><strong>POD</strong></td>
        <td style="text-align: center;"><strong>COUNTRY</strong></td>
        <td style="text-align: center;"><strong>FREIGHT</strong></td>
        <td style="text-align: center;"><strong>EMK</strong></td>
        <td style="text-align: center;"><strong>CARRIER</strong></td>
        <td style="text-align: center;"><strong>NO_BL</strong></td>
        <td style="text-align: center;"><strong>STUFFIN</strong></td>
        <td style="text-align: center;"><strong>VOLUME</strong></td>
        <td style="text-align: center;"><strong>NO_CONTAINER</strong></td>
        <td style="text-align: center;"><strong>NO_SEAL</strong></td>
        <td style="text-align: center;"><strong>VESSEL</strong></td>
        <td style="text-align: center;"><strong>ETD</strong></td>
    </tr>
    @foreach ($documents as $index => $document)
        <tr>
            <td style="text-align: center;">
                {{ $document->job }}
            </td>
            <td style="white-space: nowrap;">
                {{ $document->customer }}
            </td>
            <td style="text-align: center;">
                {{ $document->shipper }}
            </td>
            <td style="text-align: center;">
                {{ $document->consignee }}
            </td>
            <td style="text-align: right;">
                {{ $document->pod }}
            </td>
            <td style="text-align: right;">
                {{ $document->country }}
            </td>
            <td style="text-align: center;">
                {{ $document->freight }}
            </td>
            <td style="text-align: center;">
                {{ $document->emk }}
            </td>
            <td style="text-align: center;">
                {{ $document->carrier }}
            </td>
            <td style="text-align: center;">
                {{ $document->no_bl }}
            </td>
            <td style="text-align: center;">
                {{ $document->stuffin }}
            </td>
            <td style="text-align: center;">
                {{ $document->volume }}
            </td>
            <td style="text-align: center;">
                {{ $document->no_container }}
            </td>
            <td style="text-align: center;">
                {{ $document->no_seal }}
            </td>

            <td style="text-align: center;">
                {{ $document->vessel }}
            </td>
            <td style="text-align: center;">
                {{ $document->etd }}
            </td>
        </tr>
    @endforeach


</table>
