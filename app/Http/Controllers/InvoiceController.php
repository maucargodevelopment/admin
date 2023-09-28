<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('user')->get();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function list()
    {
        $invoices = Invoice::with('user')->get();
        return view('list.invoices', ['invoices' => $invoices]);
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
        $query = DB::select("select max(substring(invoice,8,3)) as lastcode 
								from `invoices`
								where substring(invoice,4,2)='$tahun' 
								and substring(invoice,6,2)='$bulan' ");

        if ($query[0]->lastcode > 0) {
            $lastcode = $query[0]->lastcode;
            $tmp = ((int)$lastcode) + 1;
            $lastcode = sprintf("%03s", $tmp);
            $lastcode = $tahun . $bulan . $lastcode;
        } else {
            $lastcode = $tahun . $bulan . "001";
        }
        $invoice_no = 'MAU' . $lastcode;



        return view('invoices.create', ['invoice' => $invoice_no]);
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
            'consignee'   => 'required',
            'address'   => 'required',
            'issued_date'   => 'required',
            'to'   => 'required',
            'mawb'   => 'required',
            'no'   => 'required',
            'mode'   => 'required',
            'vessel'   => 'required',
            'hbl'   => 'required',
            'gw'   => 'required',
            'etd_pol'   => 'required',
            'note'   => 'required',
            'validity'   => 'required',

        ]);


        $invoice = Invoice::create([
            'invoice' =>  $request->invoice,
            'user_id' => Auth::user()->id,
            'consignee' => $request->consignee,
            'address' => $request->address,
            'issued_date' => $request->issued_date,
            'to' => $request->to,
            'mawb' => $request->mawb,
            'no' => $request->no,
            'mode' => $request->mode,
            'vessel' => $request->vessel,
            'hbl' => $request->hbl,
            'gw' => $request->gw,
            'etd_pol' => $request->etd_pol,
            'note' => $request->note,
            'grand_total' => 0,
            'validity' => $request->validity,
        ]);

        if ($invoice) {
            return redirect()->route('invoices.detail', $invoice->invoice)->withSuccess('New invoice created');
        } else {
            return redirect()->route('invoices.create')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {

        return view('invoices.edit', [
            'invoice'  => $invoice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $this->validate($request, [
            'consignee'   => 'required',
            'address'   => 'required',
            'issued_date'   => 'required',
            'to'   => 'required',
            'mawb'   => 'required',
            'no'   => 'required',
            'mode'   => 'required',
            'vessel'   => 'required',
            'hbl'   => 'required',
            'gw'   => 'required',
            'etd_pol'   => 'required',
            'note'   => 'required',
            'validity'   => 'required',

        ]);
        $invoice->user_id            = Auth::user()->id;
        $invoice->consignee          = $request->consignee;
        $invoice->address            = $request->address;
        $invoice->issued_date        = $request->issued_date;
        $invoice->to                 = $request->to;
        $invoice->mawb               = $request->mawb;
        $invoice->no                 = $request->no;
        $invoice->mode               = $request->mode;
        $invoice->vessel             = $request->vessel;
        $invoice->hbl                = $request->hbl;
        $invoice->gw                 = $request->gw;
        $invoice->etd_pol            = $request->etd_pol;
        $invoice->note               = $request->note;
        $invoice->update();


        if ($invoice) {
            return redirect()->route('invoices.detail', $invoice->invoice)->withSuccess('Success Update Invoices');
        } else {
            return redirect()->route('invoices.detail', $invoice->invoice)->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
    }

    public function activate(Request $request, Invoice $invoice)
    {
        $invoice->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $invoice->update();
        return ['state' => $invoice->status == "Aktif" ? true : false];
    }

    public function detail(Request $request)
    {
        $invoice = Invoice::where('invoice', $request->invoice)->first();
        $orders = Order::where('invoice', $request->invoice)->get();


        return view('invoices.detail', [
            'invoice'  => $invoice, 'orders'  => $orders,
        ]);
    }

    public function download(Request $request)
    {
        //  ini_set('memory_limit', '2048M');
        $invoice = Invoice::where('invoice', $request->invoice)->first();
        $orders = Order::where('invoice', $request->invoice)->get();
        // dd($invoice);
        $filename = 'Invoice_' . $invoice->invoice . '.pdf';

        $path = storage_path('public/invoice');
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0755, true, true);
        }
        $pdf = PDF::loadView('laporan.invoice', [
            'invoice' => $invoice, 'orders' => $orders
        ]);
        $pdf->setPaper('a4', 'portrait')
            ->setWarnings(false)->save('' . $path . '/' . $filename . '.pdf');

        return $pdf->download('' . $filename . '.pdf');
        // return view('laporan.invoice', [
        //     'invoice'  => $invoice,
        // ]);
    }
}
