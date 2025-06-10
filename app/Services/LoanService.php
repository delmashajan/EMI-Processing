<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class LoanService
{
    protected $loanRepo;

    public function __construct(LoanRepositoryInterface $loanRepo)
    {
        $this->loanRepo = $loanRepo;
    }

    public function processEMIData()
    {
        // Drop existing table
        DB::statement('DROP TABLE IF EXISTS emi_details');

        // Date Range
        $minDate = Carbon::parse($this->loanRepo->getMinFirstPaymentDate());
        $maxDate = Carbon::parse($this->loanRepo->getMaxLastPaymentDate());
        $months = [];

        foreach (CarbonPeriod::create($minDate, '1 month', $maxDate) as $date) {
            $months[] = $date->format('Y_M');
        }

        // Create table dynamically
        $query = "CREATE TABLE emi_details (id INT AUTO_INCREMENT PRIMARY KEY, clientid INT";
        foreach ($months as $month) {
            $query .= ", `$month` DECIMAL(10,2) DEFAULT 0.00";
        }
        $query .= ")";
        DB::statement($query);

        // Fill data
        $loans = $this->loanRepo->getAllLoans();

        foreach ($loans as $loan) {
            $emi = round($loan->loan_amount / $loan->num_of_payment, 2);
            $start = Carbon::parse($loan->first_payment_date)->startOfMonth();
            $end = Carbon::parse($loan->last_payment_date)->startOfMonth();
            $range = CarbonPeriod::create($start, '1 month', $end);

            $emiMonths = [];
            foreach ($range as $i => $month) {
                $emiMonths[] = $month->format('Y_M');
            }

            $values = ['clientid' => $loan->clientid];
            $remaining = $loan->loan_amount;

            for ($i = 0; $i < count($emiMonths); $i++) {
                $m = $emiMonths[$i];
                if ($i === count($emiMonths) - 1) {
                    $values[$m] = number_format($remaining, 2, '.', '');
                } else {
                    $values[$m] = number_format($emi, 2, '.', '');
                    $remaining -= $emi;
                }
            }

            $columns = implode(",", array_map(fn($k) => "`$k`", array_keys($values)));
            $bindings = implode(",", array_map(fn($v) => DB::getPdo()->quote($v), array_values($values)));
            DB::statement("INSERT INTO emi_details ($columns) VALUES ($bindings)");
        }
    }

    public function getEMIDetails()
    {
        return DB::table('emi_details')->get();
    }
}
