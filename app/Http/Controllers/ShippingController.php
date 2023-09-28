<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::with('user')->get();
        return view('shippings.index', ['shippings' => $shippings]);
    }

    public function list()
    {
        $shippings = Shipping::with('user')->get();
        return view('list.shippings', ['shippings' => $shippings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = date("y");
        $bulan = date("m");
        $query = DB::select("select max(substring(id,8,3)) as lastcode 
								from `shippings`
								where substring(id,4,2)='$tahun' 
								and substring(id,6,2)='$bulan' ");

        if ($query[0]->lastcode > 0) {
            $lastcode = $query[0]->lastcode;
            $tmp = ((int)$lastcode) + 1;
            $lastcode = sprintf("%03s", $tmp);
            $lastcode = $tahun . $bulan . $lastcode;
        } else {
            $lastcode = $tahun . $bulan . "001";
        }
        $invoice_no = 'MAU' . $lastcode;


        return view('shippings.create', ['id' => $invoice_no]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'to'   => 'required',
            'attn'   => 'required',
            'phone'   => 'required',
            'shipper'   => 'required',
            'shipper_address'   => 'required',
            'consigne'   => 'required',
            'consigne_address'   => 'required',
            'stuffin_date'   => 'required',
            'stuffin_time'   => 'required',
            'destination'   => 'required',
            'port_loading'   => 'required',
            'qty'   => 'required',
            'gross_weight'   => 'required',
            'net_weight'   => 'required',
            'measurement'   => 'required',
            'volume'   => 'required',
            'notify'   => 'required',
            'freight'   => 'required',
            'vessel'   => 'required',
            'stuffing_palace'   => 'required'
        ]);

        $shipping = Shipping::create([
            'id' => $request->id,
            'user_id' => Auth::user()->id,
            'to' => $request->to,
            'attn' => $request->attn,
            'phone' => $request->phone,
            'shipper' => $request->shipper,
            'shipper_address' => $request->shipper_address,
            'consigne' => $request->consigne,
            'consigne_address' => $request->consigne_address,
            'stuffin_date' => $request->stuffin_date,
            'stuffin_time' => $request->stuffin_time,
            'destination' => $request->destination,
            'port_loading' => $request->port_loading,
            'qty' => $request->qty,
            'gross_weight' => $request->gross_weight,
            'net_weight' => $request->net_weight,
            'measurement' => $request->measurement,
            'volume' => $request->volume,
            'notify' => $request->notify,
            'freight' => $request->freight,
            'vessel' => $request->vessel,
            'stuffing_palace' => $request->stuffing_palace,
        ]);

        if ($shipping) {
            return redirect()->route('shippings.index', $shipping)->withSuccess('New shipping created');
        } else {
            return redirect()->route('shippings.index')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('shippings.edit', [
            'shipping'  => $shipping,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $this->validate($request, [
            'to'   => 'required',
            'attn'   => 'required',
            'phone'   => 'required',
            'shipper'   => 'required',
            'shipper_address'   => 'required',
            'consigne'   => 'required',
            'consigne_address'   => 'required',
            'stuffin_date'   => 'required',
            'stuffin_time'   => 'required',
            'destination'   => 'required',
            'port_loading'   => 'required',
            'qty'   => 'required',
            'gross_weight'   => 'required',
            'net_weight'   => 'required',
            'measurement'   => 'required',
            'volume'   => 'required',
            'notify'   => 'required',
            'freight'   => 'required',
            'vessel'   => 'required',
            'stuffing_palace'   => 'required'

        ]);
        $shipping->user_id             = Auth::user()->id;
        $shipping->to                  = $request->to;
        $shipping->attn                = $request->attn;
        $shipping->phone               = $request->phone;
        $shipping->shipper             = $request->shipper;
        $shipping->shipper_address     = $request->shipper_address;
        $shipping->consigne            = $request->consigne;
        $shipping->consigne_address    = $request->consigne_address;
        $shipping->stuffin_date        = $request->stuffin_date;
        $shipping->stuffin_time        = $request->stuffin_time;
        $shipping->destination         = $request->destination;
        $shipping->port_loading        = $request->port_loading;
        $shipping->qty                 = $request->qty;
        $shipping->gross_weight        = $request->gross_weight;
        $shipping->net_weight          = $request->net_weight;
        $shipping->measurement         = $request->measurement;
        $shipping->volume              = $request->volume;
        $shipping->notify              = $request->notify;
        $shipping->freight             = $request->freight;
        $shipping->vessel             = $request->vessel;
        $shipping->stuffing_palace             = $request->stuffing_palace;
        $shipping->update();


        if ($shipping) {
            return redirect()->route('shippings.index', $shipping)->withSuccess('Success Update Shippings');
        } else {
            return redirect()->route('shippings.index')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();
    }

    public function activate(Request $request, Shipping $shipping)
    {
        $shipping->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $shipping->update();
        return ['state' => $shipping->status == "Aktif" ? true : false];
    }

    public function detail(Request $request)
    {
        $shipping = Shipping::where('id', $request->id)->first();

        return view('shippings.detail', [
            'shipping'  => $shipping,
        ]);
    }

    public function download(Request $request)
    {
        //  ini_set('memory_limit', '2048M');
        $shipping = Shipping::where('id', $request->id)->first();
        // dd($shipping);
        $filename = 'Shipping_' . $shipping->id . '.pdf';

        $path = storage_path('public/shipping');
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0755, true, true);
        }
        $pdf = PDF::loadView('laporan.shipping', [
            'shipping' => $shipping
        ]);
        $pdf->setPaper('a4', 'portrait')
            ->setWarnings(false)->save('' . $path . '/' . $filename . '.pdf');

        return $pdf->download('' . $filename . '.pdf');
        // return view('laporan.shipping', [
        //     'shipping'  => $shipping,
        // ]);
    }
}
