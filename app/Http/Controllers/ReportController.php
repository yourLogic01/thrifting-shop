<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function profitLossReport()
    {
        return view('reports.profit-loss.index');
    }
}
