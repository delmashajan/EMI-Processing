<?php

namespace App\Repositories;

use App\Models\LoanDetail;

class LoanRepository implements LoanRepositoryInterface
{

    public function getAllLoans()
    {
        return LoanDetail::all();
    }

    public function getMinFirstPaymentDate()
    {
        return LoanDetail::min('first_payment_date');
    }

    public function getMaxLastPaymentDate()
    {
        return LoanDetail::max('last_payment_date');
    }
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
}
