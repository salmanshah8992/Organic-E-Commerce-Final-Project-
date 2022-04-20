@extends('layouts.admin_dashboard')
@section('admin_content')

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Products</span>
        </nav>

        <div class="sl-pagebody">
          <div class="row row-sm">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">Products List</div>
                <div class="card-body">
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th class="wd-20p">Image</th>
                        <th class="wd-20p">Product Name English</th>
                        <th class="wd-20p">Product Price</th>
                        <th class="wd-15p">Product Quantity</th>
                        <th class="wd-5p">Product Discount</th>
                        <th class="wd-5p">Status</th>
                        <th class="wd-15p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl=1;
                        @endphp
                      @foreach ($products as $item)
                      <tr>
                          <td>{{ $sl++ }}</td>
                        <td>
                            <img src="{{ asset($item->product_thambnail) }}" alt="" style="height: 60px; width:60px;">
                        </td>
                        <td>{{ $item->product_name_en }}</td>
                        <td>{{ $item->selling_price }}৳</td>
                        <td>{{ $item->product_qty }}</td>
                        <td>
                          @if ($item->discount_price == NULL)
                          <span class="badge badge-pill badge-danger">No</span>
                          @else
                          @php
                              $amount = $item->selling_price - $item->discount_price;
                             $discount =  ( $amount/$item->selling_price) * 100;
                          @endphp
                             <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                          @endif
                        </td>
                        <td>
                            @if($item->status == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                         @else
                         <span class="badge badge-pill badge-danger">Deactive</span>
                         @endif
                        </td>
                        <td>

                            <a href="{{ route('edit.product', $item->id) }}"
                                class="btn btn-success"><i class="fa fa-edit"></i></a>

                            <a href="{{ route('delete.product', $item->id) }}"
                                class="btn btn-danger" id="#"><i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                <a href="{{ route('product.deactive',$item->id) }}" class="btn btn-danger" title="Product Deactive Now">DeActive </a>
                             @else
                             <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Product Active Now">Active</a>
                             @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div>
              </div><!-- card -->
            </div>

          </div>
        </div>
    </div>

    @endsection

