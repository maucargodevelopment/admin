<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\TipeContainer;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Exports\DocumentsExport;
use Excel;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::with('user', 'container')->get();
        return view('documents.index', ['documents' => $documents]);
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
        $query = DB::select("select max(substring(job,8,3)) as lastcode 
								from `documents`
								where substring(job,4,2)='$tahun' 
								and substring(job,6,2)='$bulan' ");

        if ($query[0]->lastcode > 0) {
            $lastcode = $query[0]->lastcode;
            $tmp = ((int)$lastcode) + 1;
            $lastcode = sprintf("%03s", $tmp);
            $lastcode = $tahun . $bulan . $lastcode;
        } else {
            $lastcode = $tahun . $bulan . "001";
        }
        $invoice_no = 'MAU' . $lastcode;


        return view('documents.create', ['job' => $invoice_no]);
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
            'job'   => 'required',
            'customer'   => 'required',
            'shipper'   => 'required',
            'consignee'   => 'required',
            'pod'   => 'required',
            'country'   => 'required',
            'freight'   => 'required',
            'stuffin'   => 'required',
            'etd'   => 'required',
            'emk'   => 'required',
            'carrier'   => 'required',
            'no_bl'   => 'required'
        ]);

        $document = Document::create([
            'user_id' => Auth::user()->id,
            'job' => $request->job,
            'customer' => $request->customer,
            'shipper' => $request->shipper,
            'consignee' => $request->consignee,
            'pod' => $request->pod,
            'country' => $request->country,
            'freight' => $request->freight,
            'stuffin' => $request->stuffin,
            'etd' => $request->etd,
            'emk' => $request->emk,
            'carrier' => $request->carrier,
            'no_bl' => $request->no_bl,
        ]);

        if ($document) {
            return redirect()->route('documents.detail', $document->id)->withSuccess('New document created');
        } else {
            return redirect()->route('documents.create')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit', [
            'document'  => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $this->validate($request, [
            'job'   => 'required',
            'customer'   => 'required',
            'shipper'   => 'required',
            'consignee'   => 'required',
            'pod'   => 'required',

        ]);
        $document->user_id             = Auth::user()->id;
        $document->job                 = $request->job;
        $document->customer            = $request->customer;
        $document->shipper             = $request->shipper;
        $document->consignee           = $request->consignee;
        $document->pod                 = $request->pod;
        $document->country             = $request->country;
        $document->freight             = $request->freight;
        $document->stuffin             = $request->stuffin;
        $document->etd                  = $request->etd;
        $document->emk                  = $request->emk;
        $document->carrier               = $request->carrier;
        $document->no_bl               = $request->no_bl;
        $document->update();


        if ($document) {
            return redirect()->route('documents.detail', $document->id)->withSuccess('Success Update Documents');
        } else {
            return redirect()->route('documents.detail', $document->id)->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
    }

    public function activate(Request $request, Document $document)
    {
        $document->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $document->update();
        return ['state' => $document->status == "Aktif" ? true : false];
    }

    public function detail(Request $request)
    {
        $document = Document::where('id', $request->id)->first();
        $containers = Container::where('document_id', $request->id)->get();
        $tipecontainers = TipeContainer::get();
        return view('documents.detail', [
            'document'  => $document, 'containers'  => $containers, 'tipecontainers' => $tipecontainers,
        ]);
    }


    public function exportexcel()
    {

        return Excel::download(new DocumentsExport, 'documents.xlsx');
    }
}
