<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mdata = Invoice::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $invoices = Invoice::select(DB::raw("COUNT(*) as count"), DB::raw("sum(grand_total) as grand_total"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("YEAR(created_at) as year"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->get();

        $labels = $mdata->keys();
        $data = $mdata->values();
        return view('laporan.reports', ['invoices' => $invoices, 'labels' => $labels, 'data' => $data]);
    }
}
