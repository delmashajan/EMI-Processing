@extends('layouts.app')
@section('content')
<h3>Loan Details</h3>
<form action="{{ route('admin.loans.process') }}" method="POST">
    @csrf
    <button class="btn btn-primary mb-3">Process Data</button>
</form>
<table class="table">
    <tr>
        <th>Client ID</th><th>Number of Payments</th><th>Start Date</th><th>End Date</th><th>Amount</th>
    </tr>
    @foreach ($loanDetails as $loan)
    <tr>
        <td>{{ $loan->clientid }}</td>
        <td>{{ $loan->num_of_payment }}</td>
        <td>{{ $loan->first_payment_date }}</td>
        <td>{{ $loan->last_payment_date }}</td>
        <td>{{ $loan->loan_amount }}</td>
    </tr>
    @endforeach
</table>
@endsection
