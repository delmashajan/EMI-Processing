@extends('layouts.app')
@section('content')
<h3>EMI Details</h3>
<form action="{{ route('admin.loans.process') }}" method="POST">
    @csrf
    <button class="btn btn-primary mb-3">Process Data</button>
</form>

@if(isset($emiDetails))
<table class="table table-bordered">
    <tr>
        @foreach (array_keys((array)$emiDetails[0]) as $header)
            <th>{{ $header }}</th>
        @endforeach
    </tr>
    @foreach ($emiDetails as $row)
        <tr>
            @foreach ((array)$row as $value)
                <td>{{ $value }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
@endif
@endsection
