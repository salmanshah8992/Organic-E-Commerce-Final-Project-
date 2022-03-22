@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <h2 class="text-center bg-success">Order Items</h2>
    <hr>
    <div class="row">
        <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn=1;
                        @endphp
                        @foreach ($ordersItem as $item)
                            <tr>
                                <th scope="row">{{ $sn++ }}</th>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->products->product_name_en }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

