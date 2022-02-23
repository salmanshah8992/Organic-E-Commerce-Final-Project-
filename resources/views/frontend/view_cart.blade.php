@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <div class="page-cart">
        <div class="table-responsive">
            <table class="cart-summary table table-bordered">
                <thead>
                    <tr>
                        <th class="width-20">&nbsp;</th>
                        <th class="width-100 text-center">Image</th>
                        <th class="width-200 text-center">Name</th>
                        <th class="width-200 text-center">Color</th>
                        <th class="width-200 text-center">Size</th>
                        <th class="width-100 text-center">Qty</th>
                        <th class="width-100 text-center">Sub Total</th>
                    </tr>
                </thead>

                <tbody id="cartPage">

                </tbody>
            </table>
        </div>

        <div class="checkout-btn">
            <a href="{{ route('checkout') }}" class="btn btn-primary pull-right" title="Proceed to checkout">
                <span>Proceed to checkout</span>
                <i class="fa fa-angle-right ml-xs"></i>
            </a>
        </div>
    </div>
</div>

@endsection
