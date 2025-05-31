<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LoanService;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index()
    {
        $loanDetails = app(\App\Models\LoanDetail::class)::all();
        return view('admin.loans.index', compact('loanDetails'));
    }

    public function emiForm()
    {
        return view('admin.loans.emi');
    }

    public function processData()
    {
        $this->loanService->processEMIData();
        $emiDetails = $this->loanService->getEMIDetails();
        return view('admin.loans.emi', compact('emiDetails'));
    }
}
