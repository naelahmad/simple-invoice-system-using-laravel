@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Invoice Date</th>
                                    <th scope="col">Invoice Number</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th scope="row">{{ $invoice->invoice_date }}</th>
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->customer->name }}</td>
                                        <td>{{ number_format($invoice->total_amount, 2) }}</td>
                                        <td><a href="{{ route('invocies.show', $invoice->id) }}"
                                                class="btn btn-primary">View
                                                Invoice</a></td>
                                        <td><a href="{{ route('invocies.download', $invoice->id) }}"
                                                class="btn btn-info">Download
                                                Invoice</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
