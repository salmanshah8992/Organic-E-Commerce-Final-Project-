@extends('layouts.admin_dashboard')

@section('admin_content')

<section id="responsive-datatable">
    <div class="row">

      <div class="col-8">
        <div class="card">
          <div class="card-header border-bottom">
            <h4 class="card-title">All </h4>
          </div>
          <div class="card-datatable">
            <table class="dt-responsive table dataTable dtr-column collapsed" id="DataTables_Table_3" role="grid"     aria-describedby="DataTables_Table_3_info">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Coupon Name</th>
                        <th>Coupon Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sn=1;
                    @endphp
                    @foreach ($Coupons as $Coupon)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $Coupon->coupon_name }}</td>
                        <td>{{ $Coupon->coupon_discount }}</td>
                        <td>
                            <button type="button" class="btn btn-relief-warning"><a href="{{ route('edit.coupon',$Coupon->id) }}"><i class="fa fa-edit"></i></a></button>
                            <button type="button" class="btn btn-relief-danger"><a href="{{ route('delete.coupon',$Coupon->id) }}">
                              <i class="fa fa-trash"></i></a> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Coupon Add</h4>
          </div>
          <div class="card-body">
            <form  method="POST" action="{{ route('add.coupon') }}" class="form form-vertical">
                @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-icon">Coupon Name</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="first-name-icon" class="form-control" name="coupon_name" placeholder="Coupon Name English">
                    </div>
                    @error('coupon_name')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Coupon Discount</label>
                      <div class="input-group input-group-merge">
                        <input type="text" id="first-name-icon" class="form-control" name="coupon_discount" placeholder="Coupon Discount">
                      </div>
                      @error('coupon_discount')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-icon">Coupon Validity</label>
                      <div class="input-group input-group-merge">
                        <input type="date" id="first-name-icon" class="form-control" name="coupon_validity" placeholder="Coupon Validity">
                      </div>
                      @error('coupon_validity')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection
