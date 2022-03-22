@extends('layouts.admin_dashboard')
@section('admin_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        <div class="sign-in-page">
         <div class="row">
            <div class="col-md-11 mt-2">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item active text-center">Shipping Information</li>
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                {{ $order->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Division:</strong>
                                {{ $order->division->division_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>District:</strong>
                                {{ $order->district->district_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>State:</strong>
                                {{ $order->state->state_name }}
                            </li>

                                <li class="list-group-item">
                                    <strong>Post Code:</strong>
                                    {{ $order->post_code }}
                                </li>
                            <li class="list-group-item">
                                <strong>Order Date:</strong>
                                {{ $order->order_date }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item active text-center">Order Information</li>
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->user->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->user->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Payment By:</strong>
                                {{ $order->payment_method }}
                            </li>
                            <li class="list-group-item">
                                <strong>Invoice No:</strong>
                                {{ $order->invoice_no }}
                            </li>
                            <li class="list-group-item">
                                <strong>Order Total:</strong>
                                {{ $order->amount }}Tk
                            </li>

                            <li class="list-group-item">
                                <strong>Order Status:</strong>
                                @if ($order->status == 0)
                                    <span class="badge bg-primary">Pending</span> <br>
                                @elseif ($order->status == 1)
                                    <span class="badge bg-warning">Processing</span> <br>
                                @elseif ($order->status == 2)
                                    <span class="badge bg-success">Delivered</span> <br>
                                @endif
                            </li>
                            <li class="list-group-item">
                                @if ($order->status == 0)
                                    <span class="btn btn-info"><a href="{{ route('order.confirm',$order->id) }}">Confirm Order</a></span> <br>
                                @elseif ($order->status == 1)
                                    <span class="btn btn-info"><a href="{{ route('order.deliver',$order->id) }}">Deliver Order</a></span> <br>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 m-auto">
                          <div class="table-responsive">
                              <table class="table table-bordered">
                              <tbody>
                                      <tr">
                                          <td class="col-md-1">
                                              <label for="">Image</label>
                                          </td>
                                          <td class="col-md-3">
                                          <label for="">Poduct Name</label>
                                          </td>

                                          <td class="col-md-3">
                                              <label for="">Poduct Code</label>
                                          </td>

                                          <td class="col-md-2">
                                              <label for="">Color</label>
                                          </td>

                                          <td class="col-md-2">
                                              <label for="">Size</label>
                                          </td>

                                          <td class="col-md-2">
                                              <label for="">Quantity</label>
                                          </td>

                                          <td class="col-md-1">
                                              <label for="">Price</label>
                                          </td>

                                      </tr>

                                   @foreach ($orderItems as $item)
                                      <tr>
                                          <td class="col-md-1"><img src="{{ asset($item->products->product_thambnail) }}" height="50px;" width="50px;" alt="imga"></td>
                                          <td class="col-md-3">
                                              <div class="product-name"><strong>{{ $item->products->product_name_en }}</strong>
                                              </div>
                                          </td>

                                          <td class="col-md-2">
                                          <strong>{{ $item->products->product_code }}</strong>
                                          </td>

                                          <td class="col-md-2">
                                              <strong>{{ $item->color }}</strong>
                                              </td>

                                          <td class="col-md-2">
                                          <strong>{{ $item->size }}</strong>
                                          </td>

                                          <td class="col-md-2">
                                          <strong>{{ $item->qty }}</strong>
                                          </td>

                                          <td class="col-md-1">
                                          <strong>৳{{ $item->price }} ({{ $item->price * $item->qty }})</strong>
                                      </tr>
                                   @endforeach
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

@endsection
