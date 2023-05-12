@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="invoice-title">
                                        <h2>Invoice</h2>
                                        <h3 class="pull-right">Order # {{ $invoice->invoice_number }}</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <strong>Billed To:</strong><br>
                                                {{ $invoice->id }}<br>
                                                {{ $invoice->customer->address }}<br>
                                                {{ $invoice->customer->city }}<br>
                                                {{ $invoice->customer->country }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong>Order Date:</strong><br>
                                                {{ $invoice->invoice_date }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Item</strong></td>
                                                            <td class="text-center"><strong>Price</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                            <td class="text-right"><strong>Totals</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoice->invoice_items as $item)
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td class="text-center">${{ $item->price }}</td>
                                                                <td class="text-center">{{ $item->quantity }}</td>
                                                                <td class="text-right">
                                                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center"><strong>Subtotal</strong>
                                                            </td>
                                                            <td class="thick-line text-right">
                                                                ${{ number_format($invoice->total_amount, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Tax Amount</strong></td>
                                                            <td class="no-line text-right">
                                                                ${{ number_format(($invoice->total_amount * $invoice->tax_percent) / 100, 2) }}
                                                            </td>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Total</strong></td>
                                                            <td class="no-line text-right">
                                                                ${{ number_format($invoice->total_amount + ($invoice->total_amount * $invoice->tax_percent) / 100, 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
