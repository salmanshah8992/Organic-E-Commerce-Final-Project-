@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <div style="margin:5rem;font-size:22px;">
        <div class="row">
            <div class="col-4">
                <b>Name:  {{ Auth::user()->name }}</b><br>
                <b>Email: {{ Auth::user()->email }}</b><br>
                <b>Phone: {{ $order_phone->phone }}</b><br>
            </div>
        </div><br>
        <h2 class="text-center bg-success">My Orders</h2>
        <hr>
        <div class="row">
            <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Date</th>
                                <th scope="col">Division</th>
                                <th scope="col">District</th>
                                <th scope="col">State</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn=1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $sn++ }}</th>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->division->division_name }}</td>
                                    <td>{{ $order->district->district_name }}</td>
                                    <td>{{ $order->state->state_name }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>
                                            @if ($order->status == 0)
                                            <p class="btn-sm btn-danger" style="text-align: center;">Pending</p>
                                            @elseif ($order->status == 1)
                                            <p class="btn-sm btn-primary" style="text-align: center;">Processing</p>
                                            @elseif ($order->status == 2)
                                                <p class="btn-sm btn-success" style="text-align: center;">Delivered</p>
                                            @endif
                                            <a href="{{ route('user.profile.order.items',$order->id) }}" class="btn-sm btn-warning">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <br>

    </div>
</div>

@endsection
