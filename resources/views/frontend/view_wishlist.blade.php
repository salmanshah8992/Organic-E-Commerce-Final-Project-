@extends('layouts.frontend_master')

@section('main_content')

<div class="container" style="margin-top: 5rem;margin-bottom:5rem;">
    <div class="page-cart">
        <div class="table-responsive">
            <table class="cart-summary table table-bordered">
                <thead>
                    <tr>
                        <th class="width-20">&nbsp;</th>
                        <th class="width-80 text-center">Image</th>
                        <th>Name</th>
                        <th class="width-100 text-center">Unit price</th>
                        <th class="width-100 text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="wishlist">

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
