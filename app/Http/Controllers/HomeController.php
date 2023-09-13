<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Invoice;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inv = Invoice::count();
        $inv_today = Invoice::whereDate('created_at', Carbon::today())->count();
        $inv_all = Invoice::count();

        $doc = Document::count();
        $doc_today = Document::whereDate('created_at', Carbon::today())->count();
        $doc_all = Document::count();

        $shp = Shipping::count();
        $shp_today = Shipping::whereDate('created_at', Carbon::today())->count();
        $shp_all = Shipping::count();

        return view('home', [
            'inv'  => $inv,
            'inv_today'  => $inv_today,
            'inv_all'  => $inv_all,
            'doc'  => $doc,
            'doc_today'  => $doc_today,
            'doc_all'  => $doc_all,
            'shp'  => $shp,
            'shp_today'  => $shp_today,
            'shp_all'  => $shp_all,
        ]);
    }
}
