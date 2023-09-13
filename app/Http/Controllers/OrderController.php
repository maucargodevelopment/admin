<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
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
            'item'   => 'required',
            'price'   => 'required',
            'curs'   => 'required',
            'remarks'   => 'required'
        ]);

        $subtotal = $request->price * $request->curs;

        $order = Order::create([
            'invoice'             => $request->invoice,
            'item'         => $request->item,
            'price'            => $request->price,
            'curs'          => $request->curs,
            'subtotal'          => $subtotal,
            'remarks'          => $request->remarks,
        ]);

        $grand_total = Order::where('invoice',  $request->invoice)->sum('subtotal');
        $invoice = Invoice::where('invoice', $request->invoice)->first();
        $invoice->grand_total      = $grand_total;
        $invoice->update();

        if ($order) {
            return redirect()->route('invoices.detail',  $request->invoice)->withSuccess('New order created');
        } else {
            return redirect()->route('invoices.detail',  $request->invoice)->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order'  => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $subtotal = $request->price * $request->curs;

        $data = [
            'item'             => $request->item,
            'price'         => $request->price,
            'curs'            => $request->curs,
            'subtotal'          => $subtotal,
            'remarks'          => $request->remarks,
        ];



        $order->update($data);
        $grand_total = Order::where('invoice',  $request->invoice)->sum('subtotal');
        $invoice = Invoice::where('invoice', $request->invoice)->first();
        $invoice->grand_total      = $grand_total;
        $invoice->update();

        return redirect()->route('invoices.detail', $request->invoice)->withSuccess('Order updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $grand_total = Order::where('invoice',  $order->invoice)->sum('subtotal');
        $invoice = Invoice::where('invoice', $order->invoice)->first();
        $invoice->grand_total      = $grand_total;
        $invoice->update();
    }

    public function activate(Request $request, Order $order)
    {

        $order->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $order->update();
        return ['state' => $order->status == "Aktif" ? true : false];
    }
}
